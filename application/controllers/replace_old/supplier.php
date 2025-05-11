<?php

class Supplier extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();

        // get all godown
        $this->data['allGodown'] = getAllGodown();

        // header info
        $this->data['meta_title'] = 'Replace';
        $this->data['active']     = 'data-target="replace_menu"';
    }

    /**
     * show all client replace data
     */
    public function index()
    {
        $this->data['subMenu']      = 'data-target="supplierReplace"';
        $this->data['confirmation'] = null;

        $this->data['results'] = $this->search();

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/supplier/index', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    /**
     * search client replace data
     */
    private function search()
    {
        $where = [
            'replace.party_type' => 'supplier',
            'replace.trash'      => 0
        ];

        if (isset($_POST['show'])) {

            foreach ($_POST['search'] as $key => $value) {
                if (!empty($value)) {
                    $where['replace.' . $key] = $value;
                }
            }

            if (!empty($_POST['dateFrom'])) {
                $where['replace.created_at >='] = $_POST['dateFrom'];
            }

            if (!empty($_POST['dateTo'])) {
                $where['replace.created_at <='] = $_POST['dateTo'];
            }
        } else {
            $where['replace.created_at'] = date('Y-m-d');
        }

        if (!empty($_POST['godown_code'])) {
            if ($_POST['godown_code'] != 'all') {
                $where['replace.godown_code'] = $_POST['godown_code'];
            }
        } elseif (!empty($this->data['branch'])) {
            $where['replace.godown_code'] = $this->data['branch'];
        }

        $select = ['replace.*', 'parties.name', 'parties.mobile', 'parties.address'];

        return get_join('replace', 'parties', 'replace.party_code=parties.code', $where, $select, '', 'replace.id', 'desc');
    }

    public function create()
    {
        $this->data['subMenu']      = 'data-target="supplierReplaceCreated"';
        $this->data['confirmation'] = null;
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/supplier/create', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    /**
     * store data
     */
    public function store()
    {
        if (isset($_POST['save'])) {

            // get voucher no
            $voucher_no = 'R' . date('ymd') . rand(0000, 9999);
            while (checkAuth('replace', ['voucher_no' => $voucher_no])) {
                $voucher_no = 'R' . date('ymd') . rand(0000, 9999);
            }

            $godownCode = $this->input->post('godown_code');

            $data = [
                'created_at'     => $this->input->post('created_at'),
                'delivery_date'  => $this->input->post('delivery_date'),
                'voucher_no'     => $voucher_no,
                'godown_code'    => $godownCode,
                'party_code'     => $this->input->post('party_code'),
                'total_quantity' => $this->input->post('total_quantity'),
                'replace_amount' => $this->input->post('replace_amount'),
                'party_type'     => 'supplier',
                'remarks'        => $this->input->post('remarks'),
                'status'         => $this->input->post('status'),
            ];

            if (!empty($this->input->post('replace_type'))) {
                $data['replace_type'] = $this->input->post('replace_type');
            }

            $id = save_data('replace', $data, '', true);

            if (!empty($_POST['product_code'])) {
                foreach ($_POST['product_code'] as $key => $value) {

                    if (!empty($value)) {

                        // save replace items
                        $data = [
                            'replace_id'     => $id,
                            'voucher_no'     => $voucher_no,
                            'product_code'   => $_POST['product_code'][$key],
                            'quantity'       => $_POST['quantity'][$key],
                            'product_serial' => $_POST['product_serial'][$key],
                            'stock_type'     => $_POST['stock_type'][$key],
                        ];
                        if ($_POST['status'] == 'supplier_delivery') {
                            save_data('replace_items', $data);
                        }
                        // save replace stock
                        if ($_POST['status'] == 'supplier_delivery') {

                            $replaceWhere = ['product_code' => $_POST['product_code'][$key], 'godown_code' => $godownCode];
                            $replaceInfo  = get_row('replace_stock', $replaceWhere);
                            $quantity     = $replaceInfo->quantity - $_POST['quantity'][$key];

                            save_data('replace_stock', ['quantity' => $quantity], $replaceWhere);
                        }
                    }
                }
            }


            // handle stock
            if (!empty($_POST['replace_type']) && !empty($_POST['replace_product_code']) && $_POST['replace_type'] == 'product' && $_POST['status'] == 'supplier_receive') {

                foreach ($_POST['replace_product_code'] as $key => $value) {

                    if (!empty($value)) {

                        // save replace items
                        $data = [
                            'replace_id'     => $id,
                            'product_code'   => $_POST['replace_product_code'][$key],
                            'product_serial' => $_POST['product_serial'][$key],
                            'quantity'       => $_POST['replace_quantity'][$key],
                            'stock_type'     => $_POST['replace_stock_type'][$key],
                        ];

                        save_data('replace_items', $data);

                        $stockWhere = ['code' => $_POST['replace_product_code'][$key], 'godown_code' => $godownCode];
                        $stockInfo  = get_row('stock', $stockWhere, 'quantity');

                        if (!empty($stockInfo)) {

                            $replaceQuantity = $stockInfo->quantity + $_POST['replace_quantity'][$key];
                            save_data('stock', ['quantity' => $replaceQuantity], $stockWhere);
                        } else {

                            $productInfo = get_result('products', ['code' => $_POST['replace_product_code'][$key]]);
                            if (!empty($productInfo)) {

                                $data = [
                                    'code'           => $_POST['replace_product_code'][$key],
                                    'name'           => $productInfo->product_name,
                                    'product_model'  => $productInfo->product_model,
                                    'category'       => $productInfo->product_cat,
                                    'subcategory'    => $productInfo->subcategory,
                                    'brand'          => $productInfo->brand,
                                    'quantity'       => $_POST['replace_quantity'][$key],
                                    'unit'           => $productInfo->unit,
                                    'purchase_price' => $productInfo->purchase_price,
                                    'sell_price'     => $productInfo->sale_price,
                                    'godown_code'    => $godownCode,
                                ];

                                save_data('stock', $data);
                            }
                        }
                    }
                }
            }

            // handel party transaction
            if (!empty($_POST['replace_type']) && $_POST['replace_type'] == 'amount' && $_POST['status'] == 'supplier_receive') {

                $data = [
                    'transaction_at'  => $this->input->post('created_at'),
                    'party_code'      => $this->input->post('party_code'),
                    'debit'           => $this->input->post('replace_amount'),
                    'transaction_by'  => 'supplier',
                    'transaction_via' => 'cash',
                    'relation'        => 'replace:' . $voucher_no,
                    'remark'          => 'transaction',
                    'comment'         => $this->input->post('remarks'),
                    'godown_code'     => $godownCode,
                    'status'          => $this->input->post('status'),
                ];

                save_data('partytransaction', $data);
            }

            $msg = [
                'title' => 'success',
                'emit'  => 'Client replace successful.',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('success', $msg));
            //redirect('replace/replace/show?vno=' . $voucher_no, 'refresh');
        }

        redirect('replace/supplier', 'refresh');
    }


    /**
     * show voucher details
     */
    public function show()
    {
        $this->data['subMenu']      = 'data-target="supplierReplace"';
        $this->data['confirmation'] = null;

        if (!empty($_GET['vno'])) {

            $where = [
                'voucher_no' => $_GET['vno'],
                'trash'      => 0,
            ];

            // get voucher info
            $this->data['voucherInfo'] = $voucherInfo = get_row('replace', $where);
            $this->data['partyInfo']   = get_row('parties', ['code' => $voucherInfo->party_code], ['name', 'mobile', 'address']);


            // get voucher items
            $where = [
                'replace_items.replace_id'    => $voucherInfo->id,
                'replace_items.stock_type !=' => 'stock',
                'replace_items.trash'         => 0,
            ];

            $select                     = ['replace_items.*', 'products.product_name', 'products.product_model', 'products.product_cat', 'products.unit'];
            $this->data['voucherItems'] = get_left_join('replace_items', 'products', 'replace_items.product_code=products.product_code', $where, $select);


            // get replace items
            $this->data['replaceItems'] = [];
            if ($voucherInfo->replace_type == 'product') {

                unset($where['replace_items.stock_type !=']);
                $where['replace_items.stock_type'] = 'stock';
                $select                            = ['replace_items.*', 'products.product_name', 'products.product_model', 'products.product_cat', 'products.unit'];
                $this->data['replaceItems']        = get_left_join('replace_items', 'products', 'replace_items.product_code=products.product_code', $where, $select);
            }

        } else {
            redirect('replace/supplier', 'refresh');
        }


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/supplier/show', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }


    public function delete()
    {
        $vno   = $this->input->get('vno');
        $where = ['voucher_no' => $vno, 'trash' => 0];
        $data  = ['trash' => 1];

        // get replace info
        $info = get_row('replace', $where);

        if (!empty($info)) {

            $itemWhere = ['replace_id' => $info->id, 'trash' => 0];
            $itemInfo  = get_result('replace_items', $itemWhere);

            if (!empty($itemInfo)) {

                if ($info->status == 'supplier_delivery') {
                    foreach ($itemInfo as $row) {
                        // update stock
                        if ($row->stock_type == 'replace_stock') {

                            $replaceWhere = ['product_code' => $row->product_code, 'godown_code' => $info->godown_code];
                            $replaceInfo  = get_row('replace_stock', $replaceWhere);
                            $quantity     = $replaceInfo->quantity + $row->quantity;
                            save_data('replace_stock', ['quantity' => $quantity], $replaceWhere);
                        }
                    }
                }

                if ($info->status == 'supplier_receive' && $info->replace_type == 'product') {
                    foreach ($itemInfo as $row) {
                        if ($row->stock_type == 'stock') {
                            $stockWhere = ['code' => $row->product_code, 'godown_code' => $info->godown_code];
                            $stockInfo  = get_row('stock', $stockWhere, 'quantity');
                            $quantity   = $stockInfo->quantity - $row->quantity;
                            save_data('stock', ['quantity' => $quantity], $stockWhere);
                        }
                    }
                }

                // update replace items
                save_data('replace_items', $data, $itemWhere);
                save_data('replace', $data, $where);
            }

            $msg = [
                'title' => 'delete',
                'emit'  => 'Date successfully deleted.',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('danger', $msg));
        }

        redirect('replace/supplier', 'refresh');
    }

}

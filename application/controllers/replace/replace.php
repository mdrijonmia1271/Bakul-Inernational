<?php

class Replace extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();

        // get all godown
        $this->data['allGodown'] = getAllGodown();

        $this->data['meta_title']   = 'Replace';
        $this->data['active']       = 'data-target="replace_menu"';
    }

    public function index()
    {

        $this->data['subMenu']      = 'data-target="all-replace"';
        $this->data['confirmation'] = null;

        $this->data['results'] = $this->search();

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/index', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function edit()
    {
        $this->data['meta_title']   = 'Purchase';
        $this->data['active']       = 'data-target="replace_menu"';
        $this->data['subMenu']      = 'data-target="all-replace"';
        $this->data['confirmation'] = null;

        if (!empty($_GET['vno'])) {

            $where = [
                'replace.voucher_no' => $_GET['vno'],
                'replace.trash'      => 0,
            ];

            $joinCond = 'replace.party_code=parties.code';
            $select   = ['replace.created_at', 'replace.delivery_date', 'replace.voucher_no', 'replace.party_type', 'replace.status', 'replace.remarks', 'SUM(replace.quantity) AS total_quantity', 'parties.name', 'parties.mobile', 'parties.address','replace.godown_code'];

            $this->data['voucherInfo'] = get_row_join('replace', 'parties', $joinCond, $where, $select, 'replace.voucher_no');


            // get voucher items
            $select                     = ['replace.*', 'products.product_name', 'products.product_model', 'products.product_cat', 'products.unit'];
            $this->data['voucherItems'] = get_left_join('replace', 'products', 'replace.product_code=products.product_code', $where, $select);
           
            
        }
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/edit', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // update data
    public function update()
    {
        if (isset($_POST['update'])) {
            
            $voucher_no = $_POST['voucher_no'];
            $party_type = get_name('replace','party_type',['voucher_no' => $voucher_no]);
            
             // Client part info save
            if($party_type == 'client'){
                    
                    if(!empty($_POST['item_id'])) {
                        foreach ($_POST['item_id'] as $key => $value) {
        
                            $data = [
                                'created_at'    => $this->input->post('created_at'),
                                'particular'    => $_POST['particular'][$key],
                                'quantity'      => $_POST['quantity'][$key],
                                'remarks'       => $this->input->post('remarks'),
                                'voucher_status'=> $this->input->post('voucher_status'),
                                'status'        => $_POST['status'][$key],
                            ];
        
        
                            if($_POST['status'][$key] == 'exchange'){
                                 if($_POST['status'][$key] == 'exchange'){
                                     $stock_qty = 0;
                                     $product_code = $_POST['product_code'][$key];
                                     $stock_qty_res = get_row('stock',['code' => $product_code,'godown_code' => $_POST['godown_code']],'quantity');
                                     $stock_qty = $stock_qty_res->quantity;
             
                                     if($stock_qty > $_POST['quantity'][$key]){
                                         $stock_qty = $stock_qty - $_POST['quantity'][$key];
                                         save_data('stock',['quantity' => $stock_qty],['code' => $product_code,'godown_code' => $_POST['godown_code']]);
                                     }
                                     
                                }
                                 
                            }
                            
                            if($_POST['status'][$key] == 'delivered'){
                                     $product_code = $_POST['product_code'][$key];
                                     $party_code = $_POST['party_code'];
                                     $this->action->update('replace',['party_code'=> $party_code],['id' => $_POST['item_id'][$key]]);
                            }
                                 
                            if($_POST['status'][$key] == 'pending'){
                                     $product_code = $_POST['product_code'][$key];
                                     $this->action->update('replace',['quantity'=>1],['id' => $_POST['item_id'][$key]]);
                            }
                            
                            
        
                            if (!empty($_POST['delivery_date'])) {
                                $data['delivery_date'] = $_POST['delivery_date'];
                            }else{
                                $data['delivery_date'] = null;
                            }
        
                            save_data('replace', $data, ['id' => $value]);
                        }
                    }
            }else{

                // supplier part info save
                if (!empty($_POST['item_id'])) {
                    foreach ($_POST['item_id'] as $key => $value) {
    
                        $data = [
                            'created_at'    => $this->input->post('created_at'),
                            'particular'    => $_POST['particular'][$key],
                            'quantity'      => $_POST['quantity'][$key],
                            'remarks'       => $this->input->post('remarks'),
                            'voucher_status'=> $this->input->post('voucher_status'),
                            'status'        => $_POST['status'][$key],
                        ];
    
    
                        if($_POST['status'][$key] == 'receive'){
                             if($_POST['status'][$key] == 'receive'){
                                 $stock_qty = 0;
                                 $product_code = $_POST['product_code'][$key];
                                 $stock_qty_res = get_row('stock',['code' => $product_code,'godown_code' => $_POST['godown_code']],'quantity');
                                 $stock_qty = $stock_qty_res->quantity;
         
                                 $stock_qty = $stock_qty + $_POST['quantity'][$key];
                                 save_data('stock',['quantity' => $stock_qty],['code' => $product_code,'godown_code' => $_POST['godown_code']]);
                                 
                                 
                            }
                             
                        }
                        
                        if($_POST['status'][$key] == 'delivered'){
                                 $product_code = $_POST['product_code'][$key];
                                 $party_code = $_POST['party_code'];
                                 $this->action->update('replace',['quantity' => 0,'party_code'=> $party_code],['id' => $_POST['item_id'][$key]]);
                        }
                             
                        if($_POST['status'][$key] == 'pending'){
                                 $product_code = $_POST['product_code'][$key];
                                 $this->action->update('replace',['quantity'=>0],['id' => $_POST['item_id'][$key]]);
                        }
                        
                        
    
                        if (!empty($_POST['delivery_date'])) {
                            $data['delivery_date'] = $_POST['delivery_date'];
                        }else{
                            $data['delivery_date'] = null;
                        }
    
                        save_data('replace', $data, ['id' => $value]);
                    }
                }
            }    


            $msg = [
                'title' => 'update',
                'emit'  => 'Invoice update successfully.',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('success', $msg));
        }
        redirect('replace/client', 'refresh');
    }

    // search all data
    private function search()
    {
        $where = ['replace.trash' => 0];

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
        } else {
            $where['replace.godown_code'] = $this->data['branch'];
        }

        $joinCond = 'replace.party_code=parties.code';
        $select   = ['replace.*', 'SUM(replace.quantity) AS quantity', 'parties.name'];

        return get_join('replace', 'parties', $joinCond, $where, $select, 'replace.voucher_no', 'replace.id', 'desc');
    }

    // show details
    public function show()
    {
        $this->data['meta_title']   = 'Purchase';
        $this->data['active']       = 'data-target="c"';
        $this->data['subMenu']      = 'data-target="all-replace"';
        $this->data['confirmation'] = null;

        if (!empty($_GET['vno'])) {

            $where = [
                'replace.voucher_no' => $_GET['vno'],
                'replace.trash'      => 0,
            ];

            $joinCond = 'replace.party_code=parties.code';
            $select   = ['replace.created_at','replace.delivery_date','replace.voucher_no','replace.voucher_status','replace.remarks','SUM(replace.quantity) AS total_quantity', 'parties.name', 'parties.mobile', 'parties.address'];

            $this->data['voucherInfo'] = get_row_join('replace', 'parties', $joinCond, $where, $select, 'replace.voucher_no');


            // get voucher items
            $select                     = ['replace.*', 'products.product_name', 'products.product_model', 'products.product_cat', 'products.unit'];
            $this->data['voucherItems'] = get_left_join('replace', 'products', 'replace.product_code=products.product_code', $where, $select);

        } else {
            redirect('replace/replace', 'refresh');
        }


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/invoice', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // show stock
    public function stock()
    {
        $this->data['meta_title']   = 'Purchase';
        $this->data['active']       = 'data-target="replace_menu"';
        $this->data['subMenu']      = 'data-target="replace-stock"';
        $this->data['confirmation'] = null;


        $this->data['productList'] = get_result('products', '', ['product_code', 'product_name', 'product_model', 'product_cat']);

        $this->data['results'] = $this->stockData();

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/stock', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    private function stockData()
    {
        $where = ['replace.party_type' => 'client', 'replace.trash' => 0];

        if (isset($_POST['show'])){

            foreach ($_POST['search'] as $key => $value) {
                if (!empty($value)) {
                    $where['replace.' . $key] = $value;
                }
            }
        }

        if (!empty($_POST['godown_code'])) {
            if ($_POST['godown_code'] != 'all') {
                $where['replace.godown_code'] = $_POST['godown_code'];
            }
        } else {
            $where['replace.godown_code'] = $this->data['branch'];
        }

        $select = ['replace.id','replace.product_code', 'SUM(replace.quantity) AS quantity', 'replace.godown_code','replace.product_code','replace.created_at','replace.delivery_date','replace.voucher_no','replace.party_code','replace.particular','replace.status', 'products.product_name', 'products.product_model', 'products.product_cat', 'products.subcategory', 'products.brand', 'products.unit','products.purchase_price','replace.party_type'];
        return get_join('replace', 'products', 'replace.product_code=products.product_code', $where, $select, 'replace.id');
    }

    // delete data
    public function delete()
    {
        if (!empty($_GET['vno'])) {

            $info = get_row('replace', ['voucher_no' => $_GET['vno']]);

            save_data('replace', ['trash' => 1], ['voucher_no' => $_GET['vno']]);

            $msg = [
                'title' => 'delete',
                'emit'  => filter($info->party_type) . ' replace successfully deleted.',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('danger', $msg));
        }

        redirect('replace/replace', 'refresh');
    }
}

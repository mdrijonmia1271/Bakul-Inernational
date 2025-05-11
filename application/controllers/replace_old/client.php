<?php
class Client extends Admin_Controller{
    function __construct() {
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
    public function index() {
        $this->data['subMenu']      = 'data-target="clientReplace"';
        $this->data['confirmation'] = null;

        $this->data['results'] = $this->search();

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/client/index', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    /**
     * search client replace data
     */
    private function search() {
        $where   = ['replace.trash' => 0];
        $whereIn = [['party_type ', ['cash', 'client']]];
        if (isset($_POST['show'])) {
            foreach ($_POST['search'] as $key => $value) {
                if (!empty($value)) {
                    $where[$key] = $value;
                }
            }
            if (!empty($_POST['dateFrom'])) {
                $where['created_at >='] = $_POST['dateFrom'];
            }
            if (!empty($_POST['dateTo'])) {
                $where['created_at <='] = $_POST['dateTo'];
            }
        } else {
            $where['created_at'] = date('Y-m-d');
        }
        if (!empty($_POST['godown_code'])) {
            if ($_POST['godown_code'] != 'all') {
                $where['godown_code'] = $_POST['godown_code'];
            }
        } elseif (!empty($this->data['branch'])) {
            $where['godown_code'] = $this->data['branch'];
        }
        return get_result('replace', $where, '', '', 'replace.id', 'desc', '', '', $whereIn);
    }

    public function create() {
        $this->data['subMenu']      = 'data-target="clientReplaceCreated"';
        $this->data['confirmation'] = null;

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/client/create', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function store() {
        
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
                'total_quantity' => $this->input->post('total_quantity'),
                'total_amount'   => $this->input->post('total_amount'),
                'replace_amount' => $this->input->post('replace_amount'),
                'party_type'     => $this->input->post('party_type'),
                'remarks'        => $this->input->post('remarks'),
                'status'         => $this->input->post('status'),
            ];
            
            if ($this->input->post('party_type') == 'cash') {
                $data['party_code']  = $this->input->post('party_name');
                $data['client_info'] = json_encode($this->input->post('partyInfo'));
            } else {
                $data['party_code'] = $this->input->post('party_code');
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
                            'product_serial' => $_POST['product_serial'][$key],
                            'quantity'       => $_POST['quantity'][$key],
                            'price'          => $_POST['price'][$key],
                        ];
                        
                        if ($_POST['status'] == 'client_delivery') {
                            $data['stock_type'] = $_POST['stock_type'][$key];
                        }
                        
                        $itemId = save_data('replace_items', $data, '', true);
                        
                        // save replace stock
                        if ($_POST['status'] == 'client_receive') {
                            
                            $rStockWhere = [
                                'product_code' => $_POST['product_code'][$key],
                                'godown_code'  => $godownCode,
                            ];
                            $rStockInfo = get_row('replace_stock', $rStockWhere);
                            
                            if (!empty($rStockInfo)) {
                                $quantity = $rStockInfo->quantity + $_POST['quantity'][$key];
                                $data = ['quantity' => $quantity];
                            } else {
                                $rStockWhere = [];
                                $data        = [
                                    'product_code' => $_POST['product_code'][$key],
                                    'quantity'     => $_POST['quantity'][$key],
                                    'godown_code'  => $godownCode,
                                ];
                            }
                            save_data('replace_stock', $data, $rStockWhere);
                        }
                        // handle stock
                        if ($_POST['status'] == 'client_delivery') {
                            $this->handleStock($key);
                        }
                    }
                }
            }
            
            // handel party transaction
            $data = [
                'transaction_at'  => $this->input->post('created_at'),
                'party_code'      => !empty($_POST['party_code']) ? $_POST['party_code'] : $_POST['party_name'],
                //'debit'           => $this->input->post('replace_amount'),
                'transaction_by'  => 'client',
                'transaction_via' => 'cash',
                'relation'        => 'replace:' . $voucher_no,
                'remark'          => 'replace',
                'comment'         => $this->input->post('remarks'),
                'godown_code'     => $godownCode,
                'status'          => $this->input->post('status'),
            ];
            
            if($_POST['status'] == 'client_delivery'){
                $data['debit'] = $this->input->post('replace_amount');
            }else{
                $data['credit'] = $this->input->post('replace_amount');
            }
            
            save_data('partytransaction', $data);
            
            $msg = [
                'title' => 'success',
                'emit'  => 'Client replace successful.',
                'btn'   => true
            ];
            $this->session->set_flashdata('confirmation', message('success', $msg));
            
            // send sms
        	$this->sendSMS();
        	
            redirect('replace/client/show?vno=' . $voucher_no, 'refresh');
        }
        redirect('replace/client', 'refresh');
    }

    // handle stock
    private function handleStock($key) {
        if (!empty($_POST['stock_type'][$key])) {
            $godownCode = $this->input->post('godown_code');
            // update stock
            if ($_POST['stock_type'][$key] == 'stock') {
                $stockWhere = ['code' => $_POST['product_code'][$key], 'godown_code' => $godownCode];
                $stockInfo  = get_row('stock', $stockWhere, 'quantity');
                $quantity   = $stockInfo->quantity - $_POST['quantity'][$key];
                save_data('stock', ['quantity' => $quantity], $stockWhere);
            }
            // update replace stock
            if ($_POST['stock_type'][$key] == 'replace_stock') {
                $replaceWhere = ['product_code' => $_POST['product_code'][$key], 'godown_code' => $godownCode];
                $replaceInfo  = get_row('replace_stock', $replaceWhere);
                $quantity     = $replaceInfo->quantity - $_POST['quantity'][$key];
                save_data('replace_stock', ['quantity' => $quantity], $replaceWhere);
            }
        }
    }
    // show details
    public function show() {
        $this->data['subMenu']      = 'data-target="clientReplace"';
        $this->data['confirmation'] = null;
        echo '<pre>';
        echo 'vno='.$_GET['vno'];
        echo '</pre>';
        if (!empty($_GET['vno'])) {
            echo 'system in';
            $where = [
                'voucher_no' => $_GET['vno'],
                'trash'      => 0,
            ];
            // get voucher info
            $this->data['voucherInfo'] = $voucherInfo = get_row('replace', $where);
                echo '<pre>';
                print_r($voucherInfo);
                echo '</pre>';
           
            // get party info
            $partyInfo = [];
            if ($voucherInfo->party_type == 'cash') {
                $cInfo = json_decode($voucherInfo->client_info);

                $partyInfo['code']    = '';
                $partyInfo['name']    = filter($voucherInfo->party_code);
                $partyInfo['mobile']  = $cInfo->mobile;
                $partyInfo['address'] = $cInfo->address;
            } else {
                $pInfo = get_row('parties', ['code' => $voucherInfo->party_code], ['name', 'mobile', 'address']);

                $partyInfo['code']    = $voucherInfo->party_code;
                $partyInfo['name']    = $pInfo->name;
                $partyInfo['mobile']  = $pInfo->mobile;
                $partyInfo['address'] = $pInfo->address;
            }
            $this->data['partyInfo'] = (object)$partyInfo;
             echo '<pre>';
             print_r($this->data['partyInfo']);
             echo '<pre>';
             
            // get voucher items
            $where = [
                'replace_items.replace_id' => $voucherInfo->id,
                'replace_items.trash'      => 0,
            ];
             echo 'id='.$voucherInfo->id;
            $select = ['replace_items.*', 'products.product_name', 'products.product_model', 'products.product_cat', 'products.unit'];
            $this->data['voucherItems'] = get_left_join('replace_items', 'products', 'replace_items.product_code=products.product_code', $where, $select);
        } else {
           // redirect('replace/client', 'refresh');
        }

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/client/show', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }


    public function delete() {
        $vno   = $this->input->get('vno');
        $where = ['voucher_no' => $vno, 'trash' => 0];
        $data  = ['trash' => 1];
        // get replace info
        $info = get_row('replace', $where);
        if (!empty($info)) {
            $itemWhere = ['replace_id' => $info->id, 'trash' => 0];
            $itemInfo  = get_result('replace_items', $itemWhere);
            if (!empty($itemInfo)) {
                if ($info->status == 'client_delivery') {
                    foreach ($itemInfo as $row) {
                        // update stock
                        if ($row->stock_type == 'stock') {
                            $stockWhere = ['code' => $row->product_code, 'godown_code' => $info->godown_code];
                            $stockInfo  = get_row('stock', $stockWhere, 'quantity');
                            $quantity   = $stockInfo->quantity + $row->quantity;
                            save_data('stock', ['quantity' => $quantity], $stockWhere);
                        }
                        // update replace stock
                        if ($row->stock_type == 'replace_stock') {
                            $replaceWhere = ['product_code' => $row->product_code, 'godown_code' => $info->godown_code];
                            $replaceInfo  = get_row('replace_stock', $replaceWhere);
                            $quantity     = $replaceInfo->quantity + $row->quantity;
                            save_data('replace_stock', ['quantity' => $quantity], $replaceWhere);
                        }
                    }
                }
                // update replace stock
                if ($info->status == 'client_receive') {
                    foreach ($itemInfo as $row) {
                        $replaceWhere = ['product_code' => $row->product_code, 'godown_code' => $info->godown_code];
                        $replaceInfo  = get_row('replace_stock', $replaceWhere);
                        $quantity     = $replaceInfo->quantity - $row->quantity;
                        save_data('replace_stock', ['quantity' => $quantity], $replaceWhere);
                    }
                }
                // pudate party transaction
                 save_data('partytransaction', ['trash' => 1], ['relation' => 'replace:' . $vno]);
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
        redirect('replace/client', 'refresh');
    }
    
    // send client sms
    private function sendSMS(){
        
        if(isset($_POST['send_sms'])){
            
            if($_POST['party_type'] == 'cash'){
                $name   = $_POST['party_name'];
                $mobile = $_POST['partyInfo']['mobile'];
            }else{
                $pInfo  = get_row('parties', ['code' => $_POST['party_code']], ['name', 'mobile']);
                $name   = $pInfo->name;
                $mobile = $pInfo->mobile;
            }
            
            $createdAt     = $this->input->post('created_at');
            $deliveryData  = $this->input->post('delivery_date');
            $replaceAmount = $this->input->post('replace_amount');
            
            if($_POST['status'] == 'client_delivery'){
                $content = "নামঃ " . filter($name) . ", পরিবর্তন ফিঃ " . $replaceAmount . " টাকা, তাঃ " .  $createdAt . ", মেসার্স বকুল ব্যাটারী";
            }else{
                $content = "নামঃ " . filter($name) . ", পরিবর্তন ফিঃ " . $replaceAmount . " টাকা, ডেলিভারি তাঃ " . $deliveryData . " তাঃ " .  $createdAt . ", মেসার্স বকুল ব্যাটারী";
            }
           
            $num = $mobile;
            $message = send_sms($num, $content);
            
            $insert = array(
                'delivery_date'     => date('Y-m-d'),
                'delivery_time'     => date('H:i:s'),
                'mobile'            => $num,
                'message'           => $content,
                'total_characters'  => strlen($content),
                'total_messages'    => message_length(strlen($content),$message),
                'delivery_report'   => $message
            );
            if($message){
                $this->action->add('sms_record', $insert);
                $this->data['confirmation'] = message('success', array());
            } else {
                $this->data['confirmation'] = message('warning', array());
            }
        }
    }
}
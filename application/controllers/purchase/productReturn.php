<?php

class ProductReturn extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->model('retrieve');
    }
    
    public function index() {
        $this->data['meta_title']   = 'Purchase Return';
        $this->data['active']       = 'data-target="purchase_menu"';
        $this->data['subMenu']      = 'data-target="return"';
        $this->data['confirmation'] = null;
        
        $this->data['invoice'] = generate_invoice("saprecords",array("status" => "purchase"));

        // save purchase data
        if(isset($_POST['save'])){
           $this->data['confirmation'] = $this->create();
           $this->session->set_flashdata("confirmation",$this->data['confirmation']);
           redirect("purchase/productReturn","refresh");
        }

        // get all vendors
        $this->data['allParty'] = $this->getAllparty();

        // get all products
        $this->data['allProducts'] = $this->getAllProducts();

        // get all godowns
        $this->data['allGodowns'] = getAllGodown();

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/purchase/nav', $this->data);
        $this->load->view('components/purchase/product_wise_return', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    private function create(){
        // insert purchase record into `purchase_return`
        $total_quantity = 0;
        $voucher = generate_invoice("purchase_return",array());
        foreach ($_POST['product'] as $key => $value) {
            $total_quantity += $_POST['quantity'][$key];

            $data = array();
            $data['date']             = $this->input->post('date');
            $data['voucher_no']       = $voucher;
            $data['party_code']       = $this->input->post('party_code');
            $data['product_code']     = $_POST['product_code'][$key];
            $data['product_model']    = $_POST['product_model'][$key];
            //$data['product_serial']   = $_POST['product_serial'][$key];
            $data['purchase_price']   = $_POST['purchase_price'][$key];
            $data['quantity']         = $_POST['quantity'][$key];
            $data['unit']             = $_POST['unit'][$key];
            $data['previous_balance'] = $_POST['previous_balance'];
            $data['grand_total']      = $_POST['grand_total'];
            $data['current_balance']  = $_POST['current_balance'];
            $data['godown_code']      = $_POST['godown_code'];
            $data['status']           = 'purchase return';

            if($this->action->add('purchase_return', $data)){
                $this->handelStock($key);
            }
        }
        
        $this->handelPartyTransaction($voucher);

        $options = array(
            'title' => 'success',
            'emit'  => 'Purchase Return successfully Completed!',
            'btn'   => true
        );
        $status = 'success';
        return message($status, $options);
    }
    
    
    /**
    * Table : partytransaction
    * Strategy : 
    *    set purchase grandtotal amount to credit column
    *    set paid amount to debit column
    **/
    private function handelPartyTransaction($voucher){
        
        // fetch last insert record and increase by 1.
        $where = array('party_code' => $this->input->post('party_code'));
        $last_sl = $this->action->read_limit('partytransaction',$where,'desc',1);
        $voucher_sl = ($last_sl)? ($last_sl[0]->serial+1) : 1;
        
        
        $data = array(
            'transaction_at'    => $this->input->post('date'),
            'party_code'        => $this->input->post('party_code'),
            'debit'             => $this->input->post('grand_total'),
            'godown_code'       => $this->input->post('godown_code'),
            'relation'          => 'purchaseReturn:'.$voucher,
            'remark'            => 'purchase return',
            'serial'            => $voucher_sl
        );

        $this->action->add('partytransaction', $data);
        return true;
    }


    private function sapmeta() {
        if (isset($_POST['meta'])) {
            foreach ($_POST['meta'] as $key => $value) {
                $data = array(
                    'voucher_no'    => $this->input->post('voucher_no'),
                    'meta_key'      => $key,
                    'meta_value'    => $value
                );
                $this->action->add('sapmeta', $data);
            }
        }
        $data['meta_key']   = 'purchase_by';
        $data['meta_value'] = $this->data['name'];
        $this->action->add('sapmeta', $data);
    }


    private function handelStock($index) {
        // get stock info
        $where                     = array();
        $where['code']             = $_POST['product_code'][$index];
        $where['godown_code']      = $_POST['godown_code'];
        $where['product_model']    = $_POST['product_model'][$index];
        //$where['product_serial'] = $_POST['product_serial'][$index];
        $record                    = $this->action->read('stock', $where);

        // set the quantity
        $quantity = ($record[0]->quantity - $_POST['quantity'][$index]);
        
        $data = array('quantity' => $quantity);
        $this->action->update('stock', $data, $where);
        
        return true;
    }
    

    public function show_purchase() {
        $this->data['meta_title'] = 'All Purchase Return';
        $this->data['active']     = 'data-target="purchase_menu"';
        $this->data['subMenu']    = 'data-target="all"';
        $this->data['result']     = null;

        $where = array();

        if(isset($_POST['show'])){
            $where = array();
            foreach($_POST['search'] as $key => $val){
                if($val != null){
                    $where["saprecords.".$key] = $val;
                }
            }

            foreach($_POST['date'] as $key => $val){
                if($val != null && $key == 'from'){
                    $where['saprecords.sap_at >'] = $val;
                }

                if($val != null && $key == 'to'){
                    $where['saprecords.sap_at <'] = $val;
                }
            }
        }

        $where["saprecords.status"] = 'purchase';
        $where["saprecords.trash"] = 0;
        $joinCond = "saprecords.party_code = parties.code";
        $this->data['result'] = $this->action->joinAndReadPurchase("saprecords", "parties", $joinCond, $where,"saprecords.id","desc");

        // get all party
        $this->data['allParty'] = $this->getAllparty();

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/purchase/nav', $this->data);
        $this->load->view('components/purchase/view-all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }


    public function view() {
        $this->data['meta_title'] = 'Purchase';
        $this->data['active'] = 'data-target="purchase_menu"';
        $this->data['subMenu'] = 'data-target="all_return"';
        $this->data['confirmation'] = null;

        $where = array('voucher_no' => $this->input->get('vno'));
        $this->data['purchase_record'] = $this->action->read('purchase_return', $where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/purchase/nav', $this->data);
        $this->load->view('components/purchase/return_view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }


    /**
    * Delete purchase and update stock
    * table : saprecords,sapitems,stock,partytransaction
    * Strategy:
    *   Update column trash 0 to 1
    *   Update Stock quantity by code,category,subcategory,godown
    *
    **/
    public function delete_purchase() {
        $where = array('voucher_no' => $this->input->get('vno'));

        $where = array('voucher_no' => $this->input->get('vno'));
        $purchaseInfo = $this->action->read('sapitems', $where);

        foreach ($purchaseInfo as $key => $value) {
            // set condition for every item
            $stockWhere = array("code" => $value->product_code);

            // get stock information
            $stockInfo = $this->action->read('stock', $stockWhere);

            // caltulate new quantity
            if($stockInfo != null){
                $quantity = $stockInfo[0]->quantity - $purchaseInfo[$key]->quantity;
                $data = array('quantity' => $quantity);

                // update the stock
                $this->action->update('stock', $data, $stockWhere);
            }
        }

        // Update row
        $data = array("trash" => 1);
        $response = $this->action->update('sapitems', $data, $where);
        $response = $this->action->update('saprecords', $data, $where);
        $response = $this->action->update('sapmeta', $data, $where);
        $this->action->update('partytransaction', $data, array("relation" => "purchase:".$this->input->get('vno')));

        $options = array(
            'title' => 'delete',
            'emit'  => 'Purchase  delete successfully!',
            'btn'   => true
        );
        
        $this->session->set_flashdata('deleted', message($response, $options));
        redirect('purchase/purchase/show_purchase', 'refresh');
    }
    
    
    public function itemWise() {
        $this->data['meta_title'] = 'Purchase';
        $this->data['active'] = 'data-target="purchase_menu"';
        $this->data['subMenu'] = 'data-target="wise"';
        $this->data['result'] = null;
        
        $this->data['allProducts'] = get_result('products', '', ['product_code', 'product_name', 'product_model']);
    
        if(isset($_POST['show'])){ 
            $where = array();
            $where["product_code"] = $_POST['product_code'];
            $where["status"] ="purchase";
            $where["trash"] = 0;

            $this->data['result'] = $this->action->read("sapitems", $where);

            $cond = array('product_code'=>$_POST['product_code']); 
            $this->data['rawname'] = $this->action->read('products', $cond);           
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/purchase/nav', $this->data);
        $this->load->view('components/purchase/itemWise', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    
    public function allReturn() {
        $this->data['meta_title']   = 'Purchase Return';
        $this->data['active']       = 'data-target="purchase_menu"';
        $this->data['subMenu']      = 'data-target="all_return"';
        $this->data['confirmation'] = null;
        
        
        // get all products
        $this->data['allProducts'] = get_result('stock', '', ['code', 'name', 'product_model'], 'code');
        
        // get all godowns
        $this->data['allGodowns'] = getAllGodown();
    
        $where = [];
        // show all retuan and search
        if(isset($_POST['show'])){
            if(isset($_POST['search'])){
                foreach($_POST['search'] as $key => $val){
                    if($val != null){
                        $where["purchase_return.$key"] = $val;
                    }
                }
            }
            
                
            if(!empty($_POST['godown_code'])){
                if($_POST['godown_code'] != 'all'){
                    $where['purchase_return.godown_code'] = $_POST['godown_code'];
                }
            }else{
                $where['purchase_return.godown_code'] = $this->data['branch'];
            }

            foreach($_POST['date'] as $key => $val){
                if($val != null && $key == 'from'){
                    $where["purchase_return.date >="] = $val;
                }

                if($val != null && $key == 'to'){
                    $where["purchase_return.date <="] = $val;
                }
            }
            
            /*echo '<pre>';
            print_r($where);
            die();*/
            
        }else{
            $where['purchase_return.date'] = date('Y-m-d');
            $where['purchase_return.godown_code'] = $this->data['branch'];
        }
        
        $select = ['purchase_return.*', 'godowns.name as godown_name'];
        $this->data['result'] = get_join('purchase_return', 'godowns', 'godowns.code=purchase_return.godown_code', $where, $select);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/purchase/nav', $this->data);
        $this->load->view('components/purchase/all_return', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    
    // get all partys
    private function getAllparty(){
        $where = [
            "type !="   => "client",
            "status" => "active",
            "trash"   => 0
        ];
        $result = get_result("parties", $where, ['code', 'name', 'address']);
        return $result;
    }

    // get all products
    private function getAllProducts(){
        $result = get_result('stock', ['quantity >' => 0], ['code', 'name'], 'code');
        return $result;
    }

}

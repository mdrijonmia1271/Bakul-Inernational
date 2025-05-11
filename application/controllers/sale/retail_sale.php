<?php

/**
 * Working with product sale
 * Methods:
 *   index: handle action to save record into database.
 *   itemWise: fetch product wise sell.
 *   getAllProducts: read all products from stock table.
 *   getAllClients : read all clients from parties table.
 *   getAllGodown : read all godowns.
 *   create: insert record into database.
 *   handelStock: manage stock.
 *   handelPartyTransaction: insert record into database.
 *   sapmeta: insert addiotional info into database.
 *
 **/

class Retail_sale extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('action');
    }


    public function index()
    {
        $this->data['meta_title']   = 'Sale';
        $this->data['active']       = 'data-target="sale_menu"';
        $this->data['subMenu']      = 'data-target="retail"';
        $this->data['confirmation'] = $this->data['voucher_number'] = null;

        // get last voucher
        $this->data['last_voucher'] = get_result('saprecords', '', 'voucher_no', '', 'id', 'desc', 1);

        // get all godowns
        $this->data['allGodowns'] = getAllGodown();


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/sale/nav', $this->data);
        $this->load->view('components/sale/retail-sale', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }


    // save data
    public function store()
    {
        if (isset($_POST['save'])) {
            
            $data = [
                'sap_at'         => $this->input->post('date'),
                'total_quantity' => $this->input->post('totalqty'),
                'total_bill'     => $this->input->post('grand_total'),
                'total_discount' => $this->input->post('total_discount'),
                'total_return' => $this->input->post('total_return'),
                'party_balance'  => 0,
                'paid'           => $this->input->post('paid'),
                'due'            => ($_POST['current_sign'] == 'Due' ? $_POST['current_balance'] : 0),
                'promise_date'   => $this->input->post('promise_date'),
                'method'         => $this->input->post('method'),
                'godown_code'    => $this->input->post('godown_code'),
                'sap_type'       => $this->input->post('sap_type'),
                'comment'        => $this->input->post('comment'),
                'status'         => 'sale',
            ];

            $partyInfo          = json_encode($_POST['partyInfo']);
            $data['address']    = $partyInfo;
            $data['party_code'] = str_replace(" ", "_", $_POST['party_code']);
            $data['due_status'] = ($_POST['current_sign'] == 'Due' ? 'due' : 'paid');
            
            if(!empty($_POST['commitment_date'])){
                $data['commitment_date']    =  $_POST['commitment_date'];
            }

            // save sap records and return insert id
            $lastId = save_data('saprecords', $data, '', true);

            // generate voucher no
            $this->data['voucher_no'] = get_voucher($lastId, 6);

            // update voucher no
            save_data('saprecords', ['voucher_no' => $this->data['voucher_no']], ['id' => $lastId]);

            // save sap items
            if(!empty($_POST['product'])){
                foreach ($_POST['product'] as $key => $value) {
    
                    $data = [
                        'sap_at'              => $this->input->post('date'),
                        'voucher_no'          => $this->data['voucher_no'],
                        'product_code'        => $_POST['product_code'][$key],
                        'product_model'       => $_POST['product_model'][$key],
                        'product_serial'      => $_POST['product_serial'][$key],
                        'unit'                => $_POST['unit'][$key],
                        'purchase_price'      => $_POST['purchase_price'][$key],
                        'quantity'            => $_POST['quantity'][$key],
                        'sale_price'          => $_POST['sale_price'][$key],
                        'godown_code'         => $_POST['godown_code'],
                        'discount'            => $_POST['discount'][$key],
                        'discount_percentage' => 0.0,
                        'sap_type'            => $this->input->post('sap_type'),
                        'status'              => 'sale',
                    ];
    
                    if (save_data('sapitems', $data)) {
                        $this->handelStock($key);
                    }
                }
            }
            
            // save sap items for sale purchase
            if(!empty($_POST['return_product'])){
                foreach ($_POST['return_product'] as $key => $value) {
    
                    $data = [
                        'sap_at'              => $this->input->post('date'),
                        'voucher_no'          => $this->data['voucher_no'],
                        'product_code'        => $_POST['return_product_code'][$key],
                        'product_model'       => $_POST['return_product_model'][$key],
                        'unit'                => $_POST['return_unit'][$key],
                        'purchase_price'      => $_POST['return_purchase_price'][$key],
                        'quantity'            => $_POST['return_quantity'][$key],
                        'return_quantity_kg'  => $_POST['return_quantity_kg'][$key],
                        'sale_price'          => $_POST['return_sale_price'][$key],
                        'godown_code'         => $_POST['return_godown_code'],
                        'sap_type'            => $this->input->post('sap_type'),
                        'status'              => 'sale_purchase',
                    ];
    
                    if (save_data('sapitems', $data)) {
                        $this->handelReturnStock($key);
                    }
                }
            }
            
            
            

            $this->handelPartyTransaction();
            $this->sapmeta();


            // Sending SMS Start
            if (!empty($_POST['send_sms'])) {
                $this->sendSMS();
            }

            $msg = [
                'title' => 'success',
                'emit'  => 'Sale successfully Completed!',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('success', $msg));
            redirect('sale/retail_sale/invoice?vno=' . $this->data['voucher_no'], 'refresh');

        } else {

            redirect('sale/retail_sale', 'refresh');
        }
    }


    // show invoice
    public function invoice()
    {
        $this->data['meta_title']   = 'Sale';
        $this->data['active']       = 'data-target="sale_menu"';
        $this->data['subMenu']      = 'data-target="all"';
        $this->data['confirmation'] = null;
        $this->data['result']       = null;

        if (!empty($_GET['vno'])) {
            $this->data['info'] = get_row('saprecords', ['voucher_no' => $_GET['vno'], 'status' => 'sale', 'trash' => 0]);
        } else {
            redirect('sale/search_sale', 'refresh');
        }


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/sale/nav', $this->data);
        $this->load->view('components/sale/retail-invoice', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }


    // handel stock
    private function handelStock($index)
    {
        $where                = [];
        $where['code']        = $_POST['product_code'][$index];
        $where['godown_code'] = $_POST['godown_code'];

        // get stock quantity
        $record = get_row('stock', $where, 'quantity');

        if(!empty($record)){

            // calculate quantity
            $quantity = $record->quantity - $_POST['quantity'][$index];

            // save data
            save_data('stock', ['quantity' => $quantity], $where);
        }
    }



 // handel stock
    private function handelReturnStock($index)
    {
            $where         = array();
            $where['code'] = $_POST['return_product_code'][$index];
            $where['godown_code'] = $this->input->post('return_godown_code');
            
            $record = $this->action->read('stock', $where);
    
            // set the quantity
            $quantity = ($record != null) ? ($record[0]->quantity + $_POST['return_quantity'][$index]) : $_POST['return_quantity'][$index];
    
            // check the product update or insert
            // set product an averge purchase price if the product have already purchased before.
    
            if ($record != null) {
                $data = array('quantity' => $quantity);
    
                if ($_POST['return_purchase_price'][$index] > 0) {
                    $data['purchase_price'] = $_POST['return_purchase_price'][$index];
                }
                $this->action->update('stock', $data, $where);

            }else{
                $data = array(
                    'code'           => $_POST['return_product_code'][$index],
                    'product_model'  => $_POST['return_product_model'][$index],
                    'category'       => $_POST['return_category'][$index],
                    'subcategory'    => $_POST['return_subcategory'][$index],
                    'quantity'       => $_POST['return_quantity'][$index],
                    'purchase_price' => $_POST['return_purchase_price'][$index],
                    'sell_price'     => $_POST['return_sale_price'][$index],
                    'godown_code'    => $_POST['return_godown_code'],
                    'unit'           => $_POST['return_unit'][$index],
                );
    
                $this->action->add('stock', $data);
            }
    }





    // save party transaction
    private function handelPartyTransaction()
    {
        $data = [
            'transaction_at'  => $this->input->post('date'),
            'credit'          => $this->input->post('paid'),
            'debit'           => $this->input->post('grand_total'),
            'transaction_via' => $this->input->post('method'),
            'godown_code'     => $this->input->post('godown_code'),
            'relation'        => 'sales:' . $this->data['voucher_no'],
            'remark'          => 'sale',
            'status'          => 'sale',
            'serial'          => 1
        ];

        save_data('partytransaction', $data);
    }


    // save sap meta info
    private function sapmeta()
    {
        if (isset($_POST['meta'])) {
            foreach ($_POST['meta'] as $key => $value) {
                $data = array(
                    'voucher_no' => $this->data['voucher_no'],
                    'meta_key'   => $key,
                    'meta_value' => $value
                );
                save_data('sapmeta', $data);
            }
        }
        $data['voucher_no'] = $this->data['voucher_no'];
        $data['meta_key']   = 'sale_by';
        $data['meta_value'] = $this->data['name'];
        save_data('sapmeta', $data);
    }


    // send message
    private function sendSMS()
    {
        // make a product and quantity string
        $productArray = array();
        foreach ($_POST['product'] as $key => $value) {
            $productArray[] = $value . "(" . $_POST['quantity'][$key] . " " . $_POST['quantity'][$key] . " )";
        }

        $productStr = implode(', ', $productArray);

        if ($_POST['current_balance'] >0 ) {
            $content = "নামঃ " . filter($this->input->post('party_code')) . ", বিল নংঃ " . $this->data['voucher_no'] . ", বিল এমাউন্টঃ " . $this->input->post("grand_total") . " Tk, " . ", জমাঃ " . $this->input->post('paid') . " Tk, মোট বাকীঃ " . $this->input->post("current_balance") . " Tk,  তাংঃ " . $this->input->post('date') . "বিল্লাহ সেন্টার";
        } else {
            $content = "নামঃ " . filter($this->input->post('party_code')) . ", বিল নংঃ " . $this->data['voucher_no'] . ", বিল এমাউন্টঃ " . $this->input->post("grand_total") . " Tk, " . ", জমাঃ " . $this->input->post('paid') . " Tk, মোট বাকীঃ 0 Tk,  তাংঃ " . $this->input->post('date') . "বিল্লাহ সেন্টার";
        }

        $num = $this->input->post("partyInfo")['mobile'];
        //$num = '01937476716';
        $message = send_sms($num, $content);

        $insert = array(
            'delivery_date'    => date('Y-m-d'),
            'delivery_time'    => date('H:i:s'),
            'mobile'           => $num,
            'message'          => $content,
            'total_characters' => strlen($content),
            'total_messages'   => message_length(strlen($content), $message),
            'delivery_report'  => $message
        );

        if ($message) {
            save_data('sms_record', $insert);
        }
    }


    // delete data
    public function delete($vno = null){

        $saleInfo = get_result('sapitems', ['voucher_no' => $vno, 'trash' => 0], ['product_code', 'quantity', 'godown_code','status']);

        if (!empty($vno)){

            foreach ($saleInfo as $value) {

                // get stock quantity
                $stockWhere = [
                    "code"           => $value->product_code,
                    "godown_code"    => $value->godown_code
                ];

                $stockInfo = get_row('stock', $stockWhere, 'quantity');

                // calculate new quantity
                $quantity = 0;
                if(!empty($stockInfo)){
                    
                    if($value->status == 'sale'){
                        $quantity = $stockInfo->quantity + $value->quantity;
                    }else{
                        $quantity = $stockInfo->quantity - $value->quantity;
                    }
                 
                    // update the stock
                    save_data('stock', ['quantity' => $quantity], $stockWhere);
                }
            }

            // update data
            $where = ['voucher_no' => $vno];
            $data = ["trash" => 1];

            save_data('sapitems', $data, $where);
            save_data('saprecords', $data, $where);
            save_data('sapmeta', $data, $where);
            save_data('partytransaction', $data, array("relation" => "sales:".$vno));

            $msg = [
                'title' => 'delete',
                'emit'  => 'Sale delete successfully!',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('danger', $msg));
        }

        redirect('sale/search_sale', 'refresh');

    }
}

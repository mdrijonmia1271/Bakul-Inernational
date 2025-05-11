<?php

/**
 * Working with client transaction
 * Methods():
 *   index: Add transactional record to database
 *   edit_transaction : Edit transaction record
 *   partyTransactionMeta: Add Additional transaction record to database
 **/
class Transaction extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('action');
        $this->load->model('retrieve');
    }

    public function index()
    {
        $this->data['meta_title']   = 'transaction';
        $this->data['active']       = 'data-target="client_menu"'; //sale_menu
        $this->data['subMenu']      = 'data-target="transaction"';
        $this->data['confirmation'] = null;

        // Get all client parties name
        $this->data['allGodowns'] = getAllGodown();
        $this->data['allClient']  = $this->getAllClient();


        // save installment
        if (isset($_POST['save'])) {


            // fetch last insert record and increase by 1.
            $where      = array('party_code' => $this->input->post('code'));
            $last_sl    = $this->action->read_limit('partytransaction', $where, 'desc', 1);
            $voucher_sl = ($last_sl) ? ($last_sl[0]->serial + 1) : 1;

            $data = array(
                'inc_code'        => installmentCollectionId('partytransaction'),
                'transaction_at'  => $this->input->post('created_at'),
                'party_code'      => $this->input->post('code'),
                'credit'          => $this->input->post('payment'),
                'transaction_via' => $this->input->post('payment_type'),
                'remission'       => $this->input->post('remission'),
                'transaction_by'  => 'client',
                'serial'          => $voucher_sl,
                'godown_code'     => !empty($_POST['godown_code']) ? $_POST['godown_code'] : $this->data['branch'],
                'comment'         => $this->input->post('comment'),
                'pr_no'           => $this->input->post('pr_no'),
            );


            if ($_POST['customer_type'] != 'dealer' && !empty($_POST['voucher_no'])) {
                $data['transaction_type'] = 'installment';
                $data['relation']         = $_POST['voucher_no'];
                $data['remark']           = 'installment';
            } else {
                $data['transaction_type'] = 'transaction';
                $data['relation']         = 'transaction';
                $data['remark']           = 'transaction';
            }

            $options = array(
                'title' => 'success',
                'emit'  => 'Client Transaction Successfully Saved!',
                'btn'   => true
            );


            $tid = $this->action->addAndGetId('partytransaction', $data);
            // save additional transaction info
            if ($this->input->post('payment_type') == 'cheque') {
                $this->partyTransactionMeta($tid);
            }


            // insert record into `installment` table
            /*if ($_POST['customer_type'] != 'dealer' && !empty($_POST['voucher_no'])) {

                $where = array(
                    'client_code' => $this->input->post('code'),
                    'status'      => 'active',
                    'voucher_no'  => $this->input->post('voucher_no')
                );

                // update saprecords
                $sapRecordInfo = get_row('saprecords', ['voucher_no' => $_POST['voucher_no']], ['due', 'paid', 'installment_type', 'installment_date']);
                $date          = ($sapRecordInfo->installment_type == 'weekly') ? date('Y-m-d', strtotime($sapRecordInfo->installment_date . "+7 days")) : date('Y-m-d', strtotime($sapRecordInfo->installment_date . "+30 days"));
                $remission     = !empty($_POST['remission']) ? $_POST['remission'] : 0;
                $sapData       = [
                    'due'              => $sapRecordInfo->due - ($_POST['payment'] + $remission),
                    'paid'             => $sapRecordInfo->paid + ($_POST['payment'] + $remission),
                    'installment_date' => $date
                ];


                $this->action->update('saprecords', $sapData, ['voucher_no' => $_POST['voucher_no']]);

            }*/

            //Sending SMS Start
            if (isset($_POST['send_sms'])) {

                $sign = ($this->input->post("current_sign") == 'Receivable') ? 'Payable' : 'Receivable';
                //$content = "Dear client, your payment " . $this->input->post("payment") . "TK successfully paid. Your current balance is " . $this->input->post("totalBalance") . "TK " . $sign. " Regards, RAFIQ ELECTRONICS.";
                $customer_name = get_row('parties', ['code' => $this->input->post('code')], ['name']);
                $content       = "নামঃ " . filter($customer_name->name) . ", জমাঃ  " . $this->input->post('payment') . " Tk, বর্তমান ব্যাল্যান্সঃ " . $this->input->post("totalBalance") . " Tk, তাংঃ " . $this->input->post('created_at') . ", মুন্না এন্ড ব্রাদার্স .";

                $num = $this->input->post("mobile_number");
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
                    $this->action->add('sms_record', $insert);
                    $this->data['confirmation'] = message('success', array());
                } else {
                    $this->data['confirmation'] = message('warning', array());
                }

            }
            //Sending SMS End


            $this->session->set_flashdata('confirmation', message("success", $options));
            $lastId = $this->action->read('partytransaction', array(), 'DESC');

            redirect('client/all_transaction/view/' . $lastId[0]->id, 'refresh');
        }


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/client/nav', $this->data);
        //$this->load->view('components/sale/nav', $this->data);
        $this->load->view('components/client/transaction', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }


    /**
     * Edit transaction
     * table : partytransaction
     * Strategy : Update column credit using table id
     *
     */
    public function edit_transaction($id = null)
    {
        $this->data['meta_title']   = 'transaction';
        $this->data['active']       = 'data-target="client_menu"'; //sale_menu
        $this->data['subMenu']      = 'data-target="all-transaction"';
        $this->data['confirmation'] = null;

        // Get transaction Info
        $where     = ["partytransaction.id" => $id];
        $select    = ['partytransaction.*', 'parties.name', 'parties.initial_balance'];
        $partyinfo = $this->data['records'] = get_row_join('partytransaction', 'parties', 'parties.code=partytransaction.party_code', $where, $select);


        $tranWhere      = array(
            'id <='      => $partyinfo->id,
            'party_code' => $partyinfo->party_code,
            'trash'      => 0
        );
        $select         = ['debit', 'credit', 'remission'];
        $allTranRecords = get_result('partytransaction', $tranWhere, $select);
        $debit          = $credit = $remission = $balance = $totalPaid = 0;
        if (!empty($allTranRecords)) {

            foreach ($allTranRecords as $record) {
                $debit     += $record->debit;
                $credit    += $record->credit;
                $remission += $record->remission;
            }

            if ($partyinfo->initial_balance >= 0) {
                $balance = ($partyinfo->initial_balance + $debit) - $credit;
            } else {
                $balance = $debit - ($credit + abs($partyinfo->initial_balance));
            }
            $balance_status = ($balance < 0) ? "Payable" : "Receivable";

        } else {
            $balance        = $partyinfo->initial_balance;
            $balance_status = ($balance < 0) ? "Payable" : "Receivable";
        }


        $this->data['current_balance'] = $balance;
        $this->data['current_sign']    = $balance_status;


        //Update start from here
        if (isset($_POST['update'])) {
            $where = array("id" => $id);
            $data  = array(
                "transaction_at"  => $this->input->post("date"),
                "change_at"       => date('Y-m-d'),
                "credit"          => $this->input->post("payment"),
                "remission"       => $this->input->post("remission"),
                "transaction_via" => $this->input->post("payment_type"),
                'pr_no'           => $this->input->post('pr_no'),
                "remark"          => $this->input->post("remark")
            );

            // Save additional transactional info
            if ($this->input->post('payment_type') == 'cheque') {
                $this->partyTransactionMeta($id);
            }

            if ($partyinfo->transaction_type == 'installment') {
                // get saprecords
                $sapRecordsInfo = get_row('saprecords', ['voucher_no' => $partyinfo->relation], ['paid', 'hire_price', 'due']);

                if (!empty($sapRecordsInfo)) {

                    $remission = !empty($_POST['remission']) ? $_POST['remission'] : 0;

                    $paid = ($sapRecordsInfo->paid - $partyinfo->credit - $partyinfo->remission) + ($_POST['payment'] + $remission);

                    //calculate due
                    $sapRecordsData = [
                        'due'  => $sapRecordsInfo->hire_price - $paid,
                        'paid' => $paid
                    ];

                    // update saprecords due
                    $this->action->update('saprecords', $sapRecordsData, ['voucher_no' => $partyinfo->relation]);
                }
            }

            $msg_array                  = array(
                "title" => "Success",
                "emit"  => "Transaction Successfully Updated",
                "btn"   => true
            );
            $this->data["confirmation"] = message($this->action->update("partytransaction", $data, $where), $msg_array);

            $this->session->set_flashdata("confirmation", $this->data['confirmation']);

            redirect('client/transaction/edit_transaction/' . $id, 'refresh');
        }
        // Update end here

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/client/nav', $this->data);
        //$this->load->view('components/sale/nav', $this->data);
        $this->load->view('components/client/edit_transaction', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }


    /**
     * Save cheque info
     * Table: partytransactionmeta
     * Strategy: partytransaction's table auto increament id
     *  save into transaction_id column and other info as meta_key and meta_value
     */
    private function partyTransactionMeta($id)
    {
        if (isset($_POST['meta'])) {
            foreach ($_POST['meta'] as $key => $value) {
                $data = array(
                    'transaction_id' => $id,
                    'meta_key'       => $key,
                    'meta_value'     => $value
                );
                $this->action->add('partytransactionmeta', $data);
            }
        }
        return true;
    }

    private function getAllClient()
    {
        $where = [];
        $where = [
            "type"   => "client",
            "status" => "active",
            "trash"  => 0
        ];

        if ($this->data['privilege'] != 'super') {
            $where["godown_code"] = $this->data['branch'];
        }


        $result = get_result('parties', $where, ['code', 'name', 'mobile']);
        return $result;
    }
}

<?php

class Transaction extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();

        // Get all client parties name
        $this->data['allGodown'] = getAllGodown();
    }

    // show all data
    public function index()
    {
        $this->data['meta_title']   = 'Transaction List';
        $this->data['active']       = 'data-target="party_menu"'; //sale_menu
        $this->data['subMenu']      = 'data-target="transaction-list"';
        $this->data['confirmation'] = null;

        $this->data['results'] = $this->search();

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/party/nav', $this->data);
        $this->load->view('components/party/transaction-list', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // search data
    private function search()
    {
        $where = ['partytransaction.remark' => 'transaction', 'partytransaction.trash' => 0];

        if (isset($_POST['show'])) {

            if (!empty($_POST['search'])) {
                foreach ($_POST['search'] as $key => $value) {
                    if (!empty($value)) {
                        $where['partytransaction.' . $key] = $value;
                    }
                }
            }

            if (!empty($_POST['godown_code'])) {
                if ($_POST['godown_code'] !== 'all') {
                    $where['partytransaction.godown_code'] = $_POST['godown_code'];
                }
            } else {
                $where['partytransaction.godown_code'] = $_POST['godown_code'];
            }

            if (!empty($_POST['type'])) {
                if($_POST['type']=='hire'){
                    $where['parties.type'] = 'client';
                    $where['parties.customer_type'] = 'hire';
                    
                }else{
                    $where['parties.type'] = $_POST['type'];
                }
                
            }

            if (!empty($_POST['date'])) {
                foreach ($_POST['date'] as $key => $value) {
                    if (!empty($value) && $key == 'from') {
                        $where['partytransaction.transaction_at >='] = $value;
                    }

                    if (!empty($value) && $key == 'to') {
                        $where['partytransaction.transaction_at <='] = $value;
                    }
                }
            }
        }
        
       /* echo '<pre>';
        print_r($where);
        die();*/
        

        return get_join('partytransaction', 'parties', 'partytransaction.party_code=parties.code', $where, ['partytransaction.*', 'parties.name'], '', 'partytransaction.id', 'desc');
    }

    // show all data
    public function show($id = null)
    {
        $this->data['meta_title']   = 'Show Transaction';
        $this->data['active']       = 'data-target="party_menu"'; //sale_menu
        $this->data['subMenu']      = 'data-target="transaction-list"';
        $this->data['confirmation'] = null;

        if (!empty($id)) {
            $this->data['info'] = get_row_join('partytransaction', 'parties', 'partytransaction.party_code=parties.code', ['partytransaction.id' => $id, 'partytransaction.trash' => 0], ['partytransaction.*', 'parties.name', 'parties.mobile', 'parties.type', 'parties.address']);
        } else {
            redirect('party/transaction', 'refresh');
        }

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/party/nav', $this->data);
        $this->load->view('components/party/transaction-show', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // show create form
    public function create()
    {
        $this->data['meta_title']   = 'Create Transaction';
        $this->data['active']       = 'data-target="party_menu"'; //sale_menu
        $this->data['subMenu']      = 'data-target="transaction-create"';
        $this->data['confirmation'] = null;


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/party/nav', $this->data);
        $this->load->view('components/party/transaction-create', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // store data
    public function store()
    {
        if (isset($_POST['save'])) {

            $where = [
                'party_code' => $this->input->post('party_code'),
                'trash'      => 0
            ];

            $serialInfo = get_last('partytransaction', $where, ['serial']);
            $voucher_sl = (!empty($serialInfo) ? ($serialInfo->serial + 1) : 1);

            $data = [
                'transaction_at'   => $this->input->post('created_at'),
                'party_code'       => $this->input->post('party_code'),
                'transaction_via'  => $this->input->post('payment_type'),
                'transaction_by'   => $this->input->post('type'),
                'serial'           => $voucher_sl,
                'godown_code'      => !empty($_POST['godown_code']) ? $_POST['godown_code'] : $this->data['branch'],
                'previous_balance' => ($_POST['previous_sign'] == 'Receivable') ? $_POST['previous_balance'] : -$_POST['previous_balance'],
                'current_balance'  => ($_POST['current_sign'] == 'Receivable') ? $_POST['current_balance'] : -$_POST['current_balance'],
                'comment'          => $this->input->post('comment'),
                'transaction_type' => 'transaction',
                'relation'         => 'transaction',
                'remark'           => 'transaction',
                'status'           => 'transaction',
            ];


            if ($_POST['type'] == 'supplier') {
                if ($_POST['transaction_type'] == 'payment') {
                    $data['debit'] = $this->input->post('payment');
                } else {
                    $data['credit'] = $this->input->post('payment');
                }

                $data['comission'] = $this->input->post('remission');

            } else {

                if ($_POST['transaction_type'] == 'payment') {
                    $data['debit']     = $this->input->post('payment');
                    $data['comission'] = $this->input->post('remission');
                } else {
                    $data['credit']    = $this->input->post('payment');
                    $data['remission'] = $this->input->post('remission');
                }
            }

            // save data and return id
            $tid = save_data('partytransaction', $data, '', true);

            // create inc code
            $inc_code = get_code($tid, 6, 'INC-');

            // update inc code
            save_data('partytransaction', ['inc_code' => $inc_code], ['id' => $tid]);

            //Sending SMS Start
            $this->sendSMS();

            // save additional transaction info
            if ($this->input->post('payment_type') == 'cheque') {
                $this->partyTransactionMeta($tid);
            }

            $msg = [
                'title' => 'success',
                'emit'  => 'Client Transaction Successfully Saved!',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('success', $msg));

            redirect('party/transaction/show/' . $tid, 'refresh');
        }

        redirect('party/transaction/create', 'refresh');
    }

    // show edit form
    public function edit($id = null)
    {
        $this->data['meta_title']   = 'transaction';
        $this->data['active']       = 'data-target="party_menu"';
        $this->data['subMenu']      = 'data-target="transaction-list"';
        $this->data['confirmation'] = null;

        if (!empty($id)) {
            $this->data['info'] = get_row_join('partytransaction', 'parties', 'partytransaction.party_code=parties.code', ['partytransaction.id' => $id], ['partytransaction.*', 'parties.name']);
        } else {
            redirect('party/transaction', 'refresh');
        }


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/party/nav', $this->data);
        $this->load->view('components/party/transaction-edit', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }


    // update data
    public function update()
    {
        if (isset($_POST['update']) && !empty($_POST['id'])) {

            $data = [
                'transaction_at'   => $this->input->post('created_at'),
                'change_at'        => date('Y-m-d'),
                'previous_balance' => ($_POST['previous_sign'] == 'Receivable') ? $_POST['previous_balance'] : -$_POST['previous_balance'],
                'current_balance'  => ($_POST['current_sign'] == 'Receivable') ? $_POST['current_balance'] : -$_POST['current_balance'],
                'comment'          => $this->input->post('comment'),
            ];


            if ($_POST['type'] == 'supplier') {
                if ($_POST['transaction_type'] == 'payment') {
                    $data['debit']  = $this->input->post('payment');
                    $data['credit'] = 0;
                } else {
                    $data['credit'] = $this->input->post('payment');
                    $data['debit']  = 0;
                }

                $data['comission'] = $this->input->post('remission');

            } else {

                if ($_POST['transaction_type'] == 'payment') {
                    $data['debit']     = $this->input->post('payment');
                    $data['comission'] = $this->input->post('remission');
                    $data['credit']    = 0;
                } else {
                    $data['credit']    = $this->input->post('payment');
                    $data['remission'] = $this->input->post('remission');
                    $data['debit']     = 0;
                }
            }

            save_data('partytransaction', $data, ['id' => $_POST['id']]);


            // save additional transaction info
            if ($this->input->post('payment_type') == 'cheque') {
                $this->partyTransactionMeta($_POST['id']);
            }

            $msg = [
                'title' => 'success',
                'emit'  => 'Client Transaction Successfully Saved!',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('success', $msg));

            redirect('party/transaction/edit/' . $_POST['id'], 'refresh');
        }

        redirect('party/transaction', 'refresh');
    }

    // delete data
    public function delete($id = null)
    {

        if (!empty($id)) {

            save_data('partytransaction', ['trash' => 1], ['id' => $id, 'trash' => 0]);

            $msg = [
                "title" => "delete",
                "emit"  => "Transaction successfully deleted.",
                "btn"   => true
            ];

            $this->session->set_flashdata("confirmation", message('success', $msg));
        }
        redirect('party/transaction', 'refresh');
    }

    // handle transaction meta
    private function partyTransactionMeta($id)
    {
        if (isset($_POST['meta'])) {
            foreach ($_POST['meta'] as $key => $value) {
                $data = [
                    'transaction_id' => $id,
                    'meta_key'       => $key,
                    'meta_value'     => $value
                ];
                save_data('partytransactionmeta', $data);
            }
        }
    }

    // send sms
    private function sendSMS()
    {
        if (isset($_POST['send_sms'])) {

            $smr = $this->action->read('smr');

            $partyInfo = get_row('parties', ['code' => $this->input->post('party_code')], ['name', 'mobile']);
            $content   = "নামঃ " . filter($partyInfo->name) . ", জমাঃ  " . $this->input->post('payment') . " Tk, বর্তমান ব্যাল্যান্সঃ " . $this->input->post("current_balance") . " Tk, তাংঃ " . $this->input->post('created_at') . ($smr ? $smr[0]->sms_regards : '');

            $num = $partyInfo->mobile;

            $message = send_sms($num, $content);

            if ($message) {

                $insert = [
                    'delivery_date'    => date('Y-m-d'),
                    'delivery_time'    => date('H:i:s'),
                    'mobile'           => $num,
                    'message'          => $content,
                    'total_characters' => strlen($content),
                    'total_messages'   => message_length(strlen($content), $message),
                    'delivery_report'  => $message
                ];

                save_data('sms_record', $insert);
            }


        }
    }
}

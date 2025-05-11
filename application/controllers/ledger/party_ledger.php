<?php

class Party_ledger extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('action');

        // get all godown
        $this->data['allGodown'] = getAllGodown();
    }

    public function index()
    {
        $this->data['meta_title']  = 'Client Ledger';
        $this->data['active']      = 'data-target="party-ledger"';
        $this->data['subMenu']     = 'data-target="party-ledger"';
        $this->data['defaultData'] = null;
        $this->data['results']     = null;

        //Get Data After Submit Query Start here
        if (isset($_POST['show']) && !empty($_POST['party_code'])) {

            $party_code = $_POST['party_code'];

            $where              = ['parties.code' => $party_code, 'parties.trash' => 0];
            $select             = ['parties.*', 'godowns.name AS godown_name'];
            $this->data['info'] = $info = get_row_join('parties', 'godowns', 'parties.godown_code=godowns.code', $where, $select);

            // get current balance
            $this->data['balanceInfo'] = get_party_balance($party_code);

            $this->data['fromDate'] = $dateFrom = (!empty($_POST['dateFrom']) ? $_POST['dateFrom'] : '');
            $this->data['toDate']   = $dateTo = (!empty($_POST['dateTo']) ? $_POST['dateTo'] : date('Y-m-d'));

            $where = ['party_code' => $party_code, 'trash' => 0];

            $previous_balance = 0;
            if (!empty($dateFrom)) {

                $where['transaction_at >='] = $dateFrom;
                $where['transaction_at <='] = $dateTo;

                $previousInfo = custom_query("SELECT party_code, SUM(credit + remission) AS credit, SUM(debit + comission) AS debit FROM partytransaction WHERE party_code='$party_code' AND transaction_at < '$dateFrom' AND trash=0", true);

                if (!empty($previousInfo->party_code)) {
                    $credit = (!empty($previousInfo->credit) ? $previousInfo->credit : 0);
                    $debit  = (!empty($previousInfo->debit) ? $previousInfo->debit : 0);

                    $previous_balance = $debit - $credit + $info->initial_balance;
                } else {
                    $previous_balance = $info->initial_balance;
                }
            } else {
                $previous_balance = $info->initial_balance;
            }

            // previous balance
            $this->data['previous_balance'] = $previous_balance;

            // get all data
            $this->data['results'] = get_result('partytransaction', $where, '', '', 'transaction_at', 'asc');

        } else {

            $this->data['defaultData'] = $this->getDefaultData();
        }

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        //$this->load->view('components/ledger/nav', $this->data);
        $this->load->view('components/ledger/party-ledger', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer', $this->data);
    }


    // Get the default data
    private function getDefaultData()
    {
        $where = ['parties.trash' => 0];

        if (!empty($_POST['godown_code'])) {
            if ($_POST['godown_code'] !== 'all') {
                $where['parties.godown_code'] = $_POST['godown_code'];
            }
        } else {
            $where['parties.godown_code'] = $this->data['branch'];
        }

        if (!empty($_POST['type'])) {
            $where['parties.type'] = $_POST['type'];
        }

        $select    = ['parties.code', 'parties.name', 'parties.type', 'parties.address','parties.mobile', 'parties.credit_limit', 'godowns.name AS godown_name'];
        $partyList = get_join('parties', 'godowns', 'parties.godown_code=godowns.code', $where, $select);

        // get Client transaction
        $data = [];
        
        if (!(empty($partyList))) {

            foreach ($partyList as $key => $value) {

                //balance info
                $balanceInfo = get_party_balance($value->code);

                // set the client information
                $data[$key]['code']            = $value->code;
                $data[$key]['name']            = $value->name;
                $data[$key]['type']            = $value->type;
                $data[$key]['address']         = $value->address;
                $data[$key]['mobile']          = $value->mobile;
                $data[$key]['credit_limit']    = $value->credit_limit;
                $data[$key]['initial_balance'] = $balanceInfo['initial_balance'];
                $data[$key]['initial_status']  = ($balanceInfo['initial_balance'] < 0) ? "Payable" : "Receivable";
                $data[$key]['debit']           = $balanceInfo['debit'];
                $data[$key]['credit']          = $balanceInfo['credit'];
                $data[$key]['remission']       = $balanceInfo['remission'];
                $data[$key]['comission']       = $balanceInfo['comission'];
                $data[$key]['balance']         = $balanceInfo['balance'];
                $data[$key]['status']          = $balanceInfo['status'];
                $data[$key]['godown_name']     = $value->godown_name;
            }
        }
        
        return $data;
    }

}
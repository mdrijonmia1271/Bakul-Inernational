<?php

class ViewDealerSale extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('action');
        $this->load->model('retrieve');
    }

    public function index()
    {
        $this->data['meta_title'] = 'Dealer Sale';
        $this->data['active']     = 'data-target="sale_menu"';
        $this->data['subMenu']    = 'data-target="dealer"';

        $where = array(
            'saprecords.voucher_no' => $this->input->get('vno'),
            'saprecords.status'     => 'sale',
            'saprecords.trash'      => 0
        );

        $joinCond             = 'parties.code=saprecords.party_code AND parties.godown_code=saprecords.godown_code';
        $select               = ['saprecords.*', 'parties.name', 'parties.initial_balance'];
        $this->data['result'] = get_join('saprecords', 'parties', $joinCond, $where, $select);

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/sale/nav', $this->data);
        $this->load->view('components/sale/view-dealer-sale', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
}

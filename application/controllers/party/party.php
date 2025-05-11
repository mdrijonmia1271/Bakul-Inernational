<?php

class Party extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();

        // load library
        $this->load->library('upload');

        // get all godown
        $this->data['allGodown'] = getAllGodown();

        // get all zone
        $this->data['allZone'] = get_result('zone');

        $this->data['confirmation'] = null;
    }

    // show all party
    public function index()
    {
        $this->data['meta_title'] = 'Party List';
        $this->data['active']     = 'data-target="party_menu"';
        $this->data['subMenu']    = 'data-target="list"';

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/party/nav', $this->data);
        $this->load->view('components/party/index', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // show create form
    public function create()
    {
        $this->data['meta_title'] = 'all';
        $this->data['active']     = 'data-target="party_menu"';
        $this->data['subMenu']    = 'data-target="create"';


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/party/nav', $this->data);
        $this->load->view('components/party/create', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // store data
    public function store()
    {

        if (isset($_POST['save'])) {

            $data = [
                'opening'         => date('Y-m-d'),
                'godown_code'     => $this->input->post('godown_code'),
                'name'            => $this->input->post('name'),
                'zone'            => $this->input->post('zone'),
                'father_name'     => $this->input->post('father_name'),
                'customer_type'   => $this->input->post('customer_type'),
                'category'        => $this->input->post('category'),
                'dealer_type'     => $this->input->post('dealer_type'),
                'type'            => $this->input->post('type'),
                'contact_person'  => $this->input->post('contact_person'),
                'mobile'          => $this->input->post('mobile'),
                'address'         => $this->input->post('address'),
                'id_card'         => $this->input->post('id_card'),
                'initial_balance' => ($_POST['status'] == 'receivable' ? $_POST['balance'] : -$_POST['balance']),
                'credit_limit'    => $this->input->post('credit_limit'),    
                'path'            => file_upload('attachFile', 'customer'),
            ];

            // save party and return id
            $id = save_data('parties', $data, '', true);

            $party_key = '';
            if ($_POST['type'] == 'supplier') {
                $party_key = 'S';
            } elseif ($_POST['type'] == 'client') {
                $party_key = 'C';
            } else {
                $party_key = 'B';
            }

            $g_prefix = get_name('godowns', 'prefix', ['code' => $_POST['godown_code'], 'trash' => 0]);

            $prefix = $g_prefix . $party_key;

            $party_code = get_code($id, 5, $prefix);

            save_data('parties', ['code' => $party_code], ['id' => $id]);


            $msg = [
                'title' => 'success',
                'emit'  => 'Party successfully added.',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('success', $msg));
        }

        redirect('party/party/create', 'refresh');
    }

    // show edit form
    public function edit($id = null)
    {
        $this->data['meta_title'] = 'Edit Party';
        $this->data['active']     = 'data-target="party_menu"';
        $this->data['subMenu']    = 'data-target="all"';

        if (!empty($id)) {
            $this->data['info'] = get_row('parties', ['id' => $id, 'trash' => 0]);
        } else {
            redirect('party/party', 'refresh');
        }

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/party/nav', $this->data);
        $this->load->view('components/party/edit', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // update data
    public function update()
    {
        if (isset($_POST['update'])) {

            $id = $this->input->post('id');

            $data = [
                'opening'         => date('Y-m-d'),
                'name'            => $this->input->post('name'),
                'zone'            => $this->input->post('zone'),
                'father_name'     => $this->input->post('father_name'),
                'dealer_type'     => $this->input->post('dealer_type'),
                'category'        => $this->input->post('category'),
                'contact_person'  => $this->input->post('contact_person'),
                'mobile'          => $this->input->post('mobile'),
                'address'         => $this->input->post('address'),
                'id_card'         => $this->input->post('id_card'),
                'initial_balance' => ($_POST['status'] == 'receivable' ? $_POST['balance'] : -$_POST['balance']),
                'credit_limit'    => $this->input->post('credit_limit')
            ];

            if (!empty($_POST['old_path'])) {
                if (file_exists($_POST['old_path'])) {
                    unlink($_POST['old_path']);
                }
            }

            $data['path'] = file_upload('attachFile', 'customer');

            // save party and return id
            save_data('parties', $data, ['id' => $id]);


            if (!check_exists('partytransaction', ['party_code' => $_POST['code'], 'trash' => 0])) {


                // update party code
                if ($_POST['godown_code'] != $_POST['old_godown'] || $_POST['old_type'] != $_POST['type']) {


                    $party_key = '';
                    if ($_POST['type'] == 'supplier') {
                        $party_key = 'S';
                    } elseif ($_POST['type'] == 'client') {
                        $party_key = 'C';
                    } else {
                        $party_key = 'B';
                    }

                    $g_prefix = get_name('godowns', 'prefix', ['code' => $_POST['godown_code'], 'trash' => 0]);

                    $prefix = $g_prefix . $party_key;

                    $partyCount = get_row('parties', ['godown_code' => $_POST['godown_code'], 'id <=' => $id], ['COUNT(*) AS total']);
                    $partyCount = (!empty($partyCount->total) ? $partyCount->total : 1);

                    $party_code = get_code($partyCount, 5, $prefix);

                    $data = [
                        'type' => $this->input->post('type'),
                        'code' => $party_code,
                    ];

                    save_data('parties', $data, ['id' => $id]);
                }
            }

            $msg = [
                'title' => 'update',
                'emit'  => 'Party successfully updated.',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('success', $msg));
        }

        redirect('party/party', 'refresh');
    }

    // show party info
    public function show($id = null)
    {
        $this->data['meta_title'] = 'view';
        $this->data['active']     = 'data-target="party_menu"';
        $this->data['subMenu']    = 'data-target="all"';

        if (!empty($id)) {

            $this->data['info']        = $info = get_row_join('parties', 'godowns', 'godowns.code=parties.godown_code', ['parties.id' => $id], ['parties.*', 'godowns.name as godown_name']);
            $this->data['commitments'] = get_result('commitments', ['party_code' => $info->code, 'trash' => 0]);
            $this->data['sales']       = get_result('saprecords', ['party_code' => $info->code, 'trash' => 0]);

        } else {
            redirect('party/party', 'refresh');
        }

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/party/nav', $this->data);
        $this->load->view('components/party/show', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // delete data
    public function delete($id = null)
    {
        if (!empty($id)) {

            save_data('parties', ['trash' => 1], ['id' => $id]);

            $msg = [
                'title' => 'delete',
                'emit'  => 'Party successfully deleted.',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('danger', $msg));
        }

        redirect('party/party', 'refresh');
    }

    // scrole and load data
    public function onscroll_load_all_data()
    {

        $where = ['parties.trash' => 0];

        if (!empty($_POST['find'])) {

            if ($_POST['godown_code'] != 'all') {
                $where['parties.godown_code'] = $_POST['godown_code'];
            }

            if (!empty($_POST['code'])) {
                $where['parties.code'] = $_POST['code'];
            }

            if (!empty($_POST['type'])) {
                $where['parties.type'] = $_POST['type'];
            }

            if (!empty($_POST['zone'])) {
                $where['parties.zone'] = $_POST['zone'];
            }

        } else {
            $where['parties.godown_code'] = !empty($_POST['godown_code']) ? $_POST['godown_code'] : $this->data['branch'];
        }

        $pageSize = !empty($_POST['pageSize']) ? $_POST['pageSize'] : 250;


        if (!empty($_POST['pageNumber']) && $_POST['pageNumber'] == 0) {
            $pageNumber = $_POST['pageNumber'];
        } else {
            $pageNumber = !empty($_POST['pageNumber']) ? ($_POST['pageNumber'] * $pageSize) : '';
        }

        //base loop
        $getData = get_join('parties', 'godowns', 'parties.godown_code=godowns.code', $where, ['parties.*', 'godowns.name AS godown_name'], '', '', '', $pageSize, $pageNumber);


        $total_row = count($getData);
        $data      = [];
        $i         = 0;
        $sl        =  1;

        if ($total_row > 0) {
            foreach ($getData as $member) {

                // get balance info
                $balanceInfo = get_party_balance($member->code);

                if (!empty($balanceInfo) && $balanceInfo['balance'] >= 0) {
                    $class = 'green';
                } else {
                    $class = 'red';
                }


                $data[$i]['sl']          = $sl;
                $data[$i]['id']          = $member->id;
                $data[$i]['code']        = $member->code;
                $data[$i]['photo']       = '';
                $data[$i]['name']        = $member->name;
                $data[$i]['type']        = filter($member->type);
                $data[$i]['dealer_type'] = filter($member->dealer_type);
                $data[$i]['address']     = $member->address;
                $data[$i]['mobile']      = $member->mobile;
                $data[$i]['balance']     = '<b><span style="color:' . $class . '">' . $balanceInfo['balance'] . '</span></b>';
                $data[$i]['credit_limit'] = $member->credit_limit;
                $data[$i]['showroom']    = $member->godown_name;
                $i++;
                $sl++;
            }
            echo json_encode($data);
        } else {
            echo false;
        }
    }
}

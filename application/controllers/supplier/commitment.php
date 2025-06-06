<?php
class Commitment extends Admin_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->model('retrieve');
        $this->load->library('upload');
    }
    public function index() {
        $this->data['meta_title']   = 'add';
        $this->data['active']       = 'data-target="supplier_menu"';
        $this->data['subMenu']      = 'data-target="add"';
        $this->data['confirmation'] = null;
        
        $this->data['allGodowns'] = getAllGodown();
        
        if(isset($_POST['add'])) {
          
            // input data
            $data = input_data(['godown_code', 'party_code', 'commitment', 'date', 'status']);
            
            // message
            $msg_array=array(
                'title' => 'success',
                'emit'  => 'Commitment Successfully Saved.',
                'btn'   => true
            );
            
            // add commitments
            $this->data['confirmation'] = message($this->action->add("supplier_commitments", $data), $msg_array);
            $this->session->set_flashdata("confirmation", $this->data["confirmation"]);
            redirect("supplier/commitment","refresh");
        }
        

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/supplier/commitment_nav', $this->data);
        $this->load->view('components/supplier/add_commitment', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function view_all() {
        $this->data['meta_title'] = 'all';
        $this->data['active']     = 'data-target="supplier_menu"';
        $this->data['subMenu']    = 'data-target="all"';
        $this->data["commitments"] = null;
        
        // get all godownl
        $this->data['allGodowns'] = getAllGodown();

        // search commit
        $where = [];
        if(isset($_POST['show'])){
            
            if(!empty($_POST['search'])){
                foreach($_POST['search'] as $_key => $value){
                    if(!empty($value) && $value!=''){
                        $where["supplier_commitments.$_key"] = $value;
                    }
                }
            }
            
            if(!empty($_POST['godown_code'])){
                if($_POST['godown_code'] != 'all'){
                    $where["supplier_commitments.godown_code"] = $_POST['godown_code'];
                }
            } else {
                $where['supplier_commitments.godown_code'] = $this->data['branch'];
            }        
            
            foreach($_POST['date'] as $key => $val){
                if($val != null && $key == 'from'){
                    $where['supplier_commitments.date >='] = $val;
                }

                if($val != null && $key == 'to'){
                    $where['supplier_commitments.date <='] = $val;
                }
            }
            
        }else{
            $where['supplier_commitments.date'] = date('Y-m-d');
            $where['supplier_commitments.godown_code'] = $this->data['branch'];
        }
        
        $select = ['supplier_commitments.*', 'parties.name', 'parties.mobile', 'parties.address', 'parties.initial_balance'];
        $this->data["commitments"] = get_join('supplier_commitments', 'parties', 'parties.code=supplier_commitments.party_code', $where, $select);
        
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/supplier/commitment_nav', $this->data);
        $this->load->view('components/supplier/commitment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    
    public function view($id)
    {
        $this->data['meta_title'] = 'view';
        $this->data['active']     = 'data-target="supplier_menu"';
        $this->data['subMenu']    = 'data-target="all"';
        
        $where['supplier_commitments.id'] = $id;
        $tableFrom = 'supplier_commitments';
        $tableTo   = ['parties', 'godowns'];
        $joinCond  = ['parties.code=supplier_commitments.party_code', 'godowns.code=supplier_commitments.godown_code'];
        $select = ['supplier_commitments.*', 'supplier_commitments.status', 'parties.name', 'parties.mobile', 'parties.address', 'godowns.name as godown_name'];
        $this->data['partyInfo'] = get_row_join($tableFrom, $tableTo, $joinCond, $where, $select);
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/supplier/commitment_nav', $this->data);
        $this->load->view('components/supplier/view_commitment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    
    public function edit($id)
    {
        $this->data['meta_title']   = 'edit';
        $this->data['active']       = 'data-target="supplier_menu"';
        $this->data['subMenu']      = 'data-target="all"';
        $this->data['confirmation'] = null;
        
        // get all godownl
        $this->data['allGodowns'] = getAllGodown();
        
        // get commitment info
        $this->data['info'] = get_row('supplier_commitments', ['id' => $id]);
        
       // update data
        if(isset($_POST['edit'])) {
                            
            // input data
            $data = input_data(['godown_code', 'party_code', 'commitment', 'date']);
            
            // set message
            $msg_array=array(
                'title' => 'success',
                'emit'  => 'Commitment Successfully Updated.',
                'btn'   => true
            );
            
            // update data
            $this->data['confirmation'] = message($this->action->update("supplier_commitments", $data, ['id' => $_POST['id']]), $msg_array);
            $this->session->set_flashdata("confirmation",$this->data["confirmation"]);
            redirect("supplier/commitment/edit/".$id,"refresh");
        }
        

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/supplier/commitment_nav', $this->data);
        $this->load->view('components/supplier/commitment_edit', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    public function delete($id)
    {
        $where['id'] = $id;
        $this->action->deleteData('supplier_commitments', $where);
        
        $msg_array=array(
            'title' => 'success',
            'emit'  => 'Commitment Successfully deleted.',
            'btn'   => true
        );
        $this->data['confirmation'] = message('success', $msg_array);
        
        $this->session->set_flashdata("confirmation",$this->data["confirmation"]);
        redirect("supplier/commitment/view_all","refresh");
    }
    
}

<?php
class Item_report extends Admin_Controller{
    
    function __construct() {
        parent::__construct();
        
        
        // get all godown
        $this->data['allGodown'] = getAllGodown();
        
        // get all product
        $this->data['productList'] = get_result('stock', '', ['code', 'name', 'product_model'], 'code');
        
        
        // header info
        $this->data['meta_title'] = 'Replace';
        $this->data['active']     = 'data-target="replace_menu"';
    }
    
    /**
     * show client replace item report
     */
    public function client() 
    {
        $this->data['subMenu']      = 'data-target="clientItemReplace"';
        $this->data['confirmation'] = null;
        
        
        $where   = ['replace_items.trash' => 0];
        $whereIn = [['replace.status', ['client_receive', 'client_delivery']]];
        
        if (isset($_POST['show'])) {
            
            foreach ($_POST['search'] as $key => $value) {
                if (!empty($value)) {
                    $where['replace.'.$key] = $value;
                }
            }
            
            if (!empty($_POST['product_code'])) {
                $where['replace_items.product_code'] = $_POST['product_code'];
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
        } elseif (!empty($this->data['branch'])) {
            $where['replace.godown_code'] = $this->data['branch'];
        }
        
        $tableTo  = ['replace', 'products'];
        $joinCond = ['replace_items.replace_id=replace.id', 'replace_items.product_code=products.product_code'];
        $select   = ['replace_items.*', 'replace.created_at', 'replace.delivery_date', 'replace.voucher_no', 'replace.client_info', 'replace.party_code', 'replace.party_type', 'replace.status', 'products.product_name']; 

        $this->data['results'] = get_left_join('replace_items', $tableTo,$joinCond, $where, $select,'', '', '', '', '', $whereIn);

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/client/item-report', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    /*
     * show supplier replace item report
     */
    public function supplier() 
    {
        $this->data['subMenu']      = 'data-target="supplierItemReplace"';
        $this->data['confirmation'] = null;
        
        $this->data['subcategoryList'] = get_result('subcategory', ['trash' => 0]);
        $this->data['brandList'] = get_result('brand', ['trash' => 0]);
        
        
        $where   = ['replace_items.trash' => 0];
        $whereIn = [['replace.status', ['supplier_delivery', 'supplier_receive']]];
        
        if (isset($_POST['show'])) {
            
            foreach ($_POST['search'] as $key => $value) {
                if (!empty($value)) {
                    $where['replace.'.$key] = $value;
                }
            }
            
            if (!empty($_POST['product_code'])) {
                $where['replace_items.product_code'] = $_POST['product_code'];
            }
            
            if (!empty($_POST['subcategory'])) {
                $where['products.subcategory'] = $_POST['subcategory'];
            }
            
            if (!empty($_POST['brand'])) {
                $where['products.brand'] = $_POST['brand'];
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
        } elseif (!empty($this->data['branch'])) {
            $where['replace.godown_code'] = $this->data['branch'];
        }
        
        $tableTo  = ['replace', 'products'];
        $joinCond = ['replace_items.replace_id=replace.id', 'replace_items.product_code=products.product_code'];
        $select   = ['replace_items.*', 'replace.created_at', 'replace.delivery_date', 'replace.voucher_no', 'replace.client_info', 'replace.party_code', 'replace.party_type', 'replace.status', 'products.product_name', 'products.product_cat', 'products.subcategory', 'products.brand']; 

        $this->data['results'] = get_left_join('replace_items', $tableTo,$joinCond, $where, $select,'', '', '', '', '', $whereIn);

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/supplier/item-report', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    
}
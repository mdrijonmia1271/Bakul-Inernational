<?php

class Stock extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();

        // get all godown
        $this->data['allGodown'] = getAllGodown();

        $this->data['meta_title'] = 'Replace';
        $this->data['active']     = 'data-target="replace_menu"';
    }

    public function index()
    {
        $this->data['subMenu']      = 'data-target="replaceStock"';
        $this->data['confirmation'] = null;
        
        $this->data['categoryList'] = get_result('category');
        $this->data['subcategoryList'] = get_result('subcategory', ['trash' => 0]);
        $this->data['brandList'] = get_result('brand', ['trash' => 0]);

        $this->data['results'] = $this->search();

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/replace/nav', $this->data);
        $this->load->view('components/replace/index', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // search all data
    private function search()
    {
        $where = [
            // 'replace_stock.quantity >' => 0,
            'replace_stock.trash' => 0,
        ];

        if (isset($_POST['show'])) {

            if (!empty($_POST['product_code'])){
                $where['replace_stock.product_code'] = $_POST['product_code'];
            }
            
            foreach ($_POST['search'] as $key => $value) {
                if (!empty($value)) {
                    $where['products.'.$key] = $value;
                }
            }
        }

        if (!empty($_POST['godown_code'])) {
            if ($_POST['godown_code'] != 'all') {
                $where['replace_stock.godown_code'] = $_POST['godown_code'];
            }
        } elseif (!empty($this->data['branch'])) {
            $where['replace_stock.godown_code'] = $this->data['branch'];
        }

        $select  = ['replace_stock.*', 'products.product_name', 'products.product_model', 'products.product_cat', 'products.subcategory', 'products.brand', 'products.unit'];
        $results = get_join('replace_stock', 'products', 'replace_stock.product_code=products.product_code', $where, $select);
        return $results;
    }
}

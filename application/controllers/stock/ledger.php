<?php

class Ledger extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();

        // get all godowns
        $this->data['allGodowns'] = getAllGodown();

        // get all category
        $this->data['allCategory'] = get_result('category');

        // get all subcategory
        $this->data['allSubcategory'] = get_result('subcategory');

        // get all category
        $this->data['allBrand'] = get_result('brand');

        // get all supplier
        $this->data['allProduct'] = get_result('stock', '', ['code', 'name', 'product_model'], 'code');

    }

    public function index()
    {
        $this->data['meta_title'] = 'Product Ledger';
        $this->data['active']     = 'data-target="product_ledger"';
        $this->data['subMenu']    = 'data-target="productLedger"';

        $this->data['results'] = $this->search();

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/stock/ledger', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer', $this->data);
    }

    private function search()
    {
        $pWhere      = [ 'trash' => 0];
        $sWhere      = ['status' => 'sale', 'trash' => 0];
        $prWhere     = [];
        $srWhere     = ['trash' => 0];
        $dWhere      = [];
        $stFromWhere = ['trash' => 0];
        $stToWhere   = ['trash' => 0];
        $where_client_replace = ['replace_items.trash' => 0,'replace_items.stock_type' => 'stock'];
        $whereIn = [['replace.status', ['client_delivery']]];
        $where_supplier_replace= ['replace_items.trash' => 0,'replace.status' => 'supplier_receive','stock_type' => 'stock'];
        //$whereInSupplierReplace=[['replace.status', ['supplier_receive']]];
        $where       = [];
      


        $results = [];

        if (isset($_POST{'show'})) {

            if (!empty($_POST['product_code'])) {
                $where['code'] = $where_client_replace['replace_items.product_code'] = $where_supplier_replace['replace_items.product_code'] = $stToWhere['code'] = $stFromWhere['code'] = $dWhere['product_code'] = $srWhere['product_code'] = $prWhere['product_code'] = $sWhere['product_code'] = $pWhere['product_code'] = $_POST['product_code'];
            }

            if (!empty($_POST['dateFrom'])) {
                $stToWhere['date >='] = $where_client_replace['replace.created_at >='] = $where_supplier_replace['replace.created_at >='] = $stFromWhere['date >='] = $dWhere['date >='] = $srWhere['date >='] = $prWhere['date >='] = $sWhere['sap_at >='] = $pWhere['sap_at >='] = $_POST['dateFrom'];
            }

            if (!empty($_POST['dateTo'])) {
                $stToWhere['date <='] = $where_client_replace['replace.created_at <='] = $where_supplier_replace['replace.created_at <='] = $stFromWhere['date <='] = $dWhere['date <='] = $srWhere['date <='] = $prWhere['date <='] = $sWhere['sap_at <='] = $pWhere['sap_at <='] = $_POST['dateTo'];
            }

            if (!empty($_POST['godown_code'])) {
                if ($_POST['godown_code'] != 'all') {
                    $where['godown_code'] = $where_client_replace['replace.godown_code'] = $where_supplier_replace['replace.godown_code'] = $stToWhere['godown_to'] = $stFromWhere['godown_from']  = $srWhere['godown_code'] = $prWhere['godown_code'] = $sWhere['godown_code'] = $pWhere['godown_code'] = $_POST['godown_code'];
                }
            } elseif (!empty($this->data['branch'])) {
                $where['godown_code'] = $where_client_replace['replace.godown_code'] =$where_supplier_replace['replace.godown_code']= $stToWhere['godown_to'] = $stFromWhere['godown_from']  = $srWhere['godown_code'] = $prWhere['godown_code'] = $sWhere['godown_code'] = $pWhere['godown_code'] = $this->data['branch'];
            }
            //get_result($table, $where = null, $select = null, $groupBy = null, $order_col = null, $order_by = 'ASC', $limit = null, $limit_offset = null, $where_in = null)
            $results['purchaseInfo']       = get_result('sapitems', $pWhere);
            $results['saleInfo']           = get_result('sapitems', $sWhere);
            $results['purchaseReturnInfo'] = get_result('purchase_return', $prWhere);
            $results['saleReturnInfo']     = get_result('sale_return', $srWhere);
            $tableTo  = ['replace', 'products'];
            $joinCond = ['replace_items.replace_id=replace.id', 'replace_items.product_code=products.product_code'];
            $select   = ['replace_items.*', 'replace.created_at', 'replace.delivery_date', 'replace.voucher_no', 'replace.client_info', 'replace.party_code', 'replace.party_type', 'replace.status', 'products.product_name','products.product_model']; 

            $results['clientReplaceDelivery'] = get_left_join('replace_items', $tableTo,$joinCond, $where_client_replace, $select,'', '', '', '', '', $whereIn);

            $tableToSuppRcv  = ['replace', 'products'];
            $joinCondSuppRcv = ['replace_items.replace_id=replace.id', 'replace_items.product_code=products.product_code'];
            $selectSuppRcv   = ['replace_items.*', 'replace.created_at', 'replace.delivery_date', 'replace.voucher_no', 'replace.client_info', 'replace.party_code', 'replace.party_type', 'replace.status', 'products.product_name','products.product_model', 'products.product_cat', 'products.subcategory', 'products.brand']; 
    
            $results['supplierReplaceRcv'] = get_left_join('replace_items', $tableToSuppRcv,$joinCondSuppRcv, $where_supplier_replace, $selectSuppRcv,'', '', '', '', '');



            $results['damageInfo']         = get_result('damage_product', $dWhere);
            //$results['stockTransferFrom']  = get_result('stock_transfer', $stFromWhere);
            //$results['stockTransferTo']    = get_result('stock_transfer', $stToWhere);
            $results['productInfo']        = get_row('stock', $where);
        }

        return (object)$results;
    }
}
<style>
    ul li a span.icon {
        float: right;
        margin-right: 20px;
    }

    .aside-head {
        position: fixed;
        z-index: 2;
        width: 150px;
    }

    .sidebar-brand {
        position: absolute;
        width: 250px;
        z-index: 2;
        transition: all 0.4s ease-in-out;
    }

    .sidebar-brand.sidebar-slide {
        transform: translateX(-100%);
        transition: all 0.4s ease-in-out;
    }

    .aside-nav {
        margin-top: 65px;
        z-index: -3;
    }

    @media screen and (max-width: 768px) {
        .sidebar-brand {
            transform: translateX(-100%);
            transition: all 0.4s ease-in-out;
        }

        .sidebar-brand.sidebar-slide {
            transform: translateX(0%);
            transition: all 0.4s ease-in-out;
        }
    }
</style>


<!-- Sidebar -->
<aside id="sidebar-wrapper">
    <div class="sidebar-nav">
        <h3 class="sidebar-brand <?php if ($this->data['width'] == 'full-width') {
            echo 'sidebar-slide';
        } ?>">
            <a style="font-size: 23px !important;" href="<?php echo site_url('super/dashboard'); ?>">Admin
                <span>Panel</span></a>
        </h3>
    </div>

    <nav class="aside-nav">
        <ul class="sidebar-nav">

            <li id="dashboard">
                <a href="<?php echo site_url('super/dashboard'); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> &nbsp;01. Dashboard
                </a>
            </li>

            <li id="calendarMenu">
               <a href="<?php echo site_url('calendar'); ?>">
                   <i class="fa fa-calendar"></i> &nbsp; Calendar
                   <?php if (!empty($todayEvents)) { ?>
                       <span class="badge badge-primary"><?php echo $todayEvents; ?></span>
                   <?php } ?>
               </a>
            </li>

            <!--<li id="category_menu">
                <a href="#category" data-toggle="collapse">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    &nbsp;02. Category
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="category" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('category/category'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('category/category/allCategory'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. View All
                        </a>
                    </li>
                </ul>
            </li>


            <li id="subCategory_menu">
                <a href="#subCategory" data-toggle="collapse">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    &nbsp;03. Subcategory
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="subCategory" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('subCategory/subCategory'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('subCategory/subCategory/all_subcategory'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. View All
                        </a>
                    </li>
                </ul>
            </li>


            <li id="brand_menu">
                <a href="#brand" data-toggle="collapse">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    &nbsp;04. Brand
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="brand" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('brand/brand'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('brand/brand/all_brand'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. View All
                        </a>
                    </li>
                </ul>
            </li>-->


            <li id="godown_menu">
                <a href="#godown" data-toggle="collapse">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                    &nbsp;05. Showroom
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="godown" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('godown/godown'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('godown/godown/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. View All
                        </a>
                    </li>
                </ul>
            </li>


            <!--<li id="fixed_assate_menu">
                <a href="#fixed_assate" data-toggle="collapse">
                    <i class="fa fa-bar-chart"></i>
                    &nbsp; Fixed assate
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="fixed_assate" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php /*echo site_url('fixed_assate/fixed_assate'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Field of Fixed Assate
                        </a>
                    </li>
                    <li>
                        <a href="<?php /*echo site_url('fixed_assate/fixed_assate/newfixed_assate'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; New Fixed Assate
                        </a>
                    </li>
                    <li>
                        <a href="<?php /*echo site_url('fixed_assate/fixed_assate/allfixed_assate'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; All Fixed Assate
                        </a>
                    </li>
                </ul>
            </li>-->


            <li id="product_menu">
                <a href="#product" data-toggle="collapse">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    &nbsp; 06. Product
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="product" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('product/product'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add Product
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('product/product/allProduct'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. All Product
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('ledger/party_ledger'); ?>">
                            <i class="fa fa-angle-right"></i>
                            03. Ledger
                        </a>
                    </li>
                    
                    <!--<li id="party-ledger">-->
                    <!--    <a href="<?php echo site_url('ledger/party_ledger'); ?>">-->
                    <!--        <i class="fa fa-money" aria-hidden="true"></i> 20. Ledger-->
                    <!--    </a>-->
                    <!--</li>-->
                </ul>
            </li>


            <!--Supplier-->
            <li id="party_menu">
                <a href="#party" data-toggle="collapse">
                    <i class="fa fa-building-o"></i>
                    &nbsp;07. Supplier/Client
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="party" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('party/party/create'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('party/party'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('party/transaction/create'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Transaction
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('party/transaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Transaction
                        </a>
                    </li>
                </ul>
            </li>


            <!--<li id="supplier-menu">
                <a href="#company" data-toggle="collapse">
                    <i class="fa fa-building-o"></i>
                    &nbsp;07. Supplier
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="company" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php /*echo site_url('supplier/supplier');*/ ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add Supplier
                        </a>
                    </li>

                    <li>
                        <a href="<?php /*echo site_url('supplier/supplier/view_all'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            02. All Supplier
                        </a>
                    </li>

                    <li>
                        <a href="<?php /*echo site_url('supplier/transaction/'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            03. Add Transaction
                        </a>
                    </li>

                    <li>
                        <a href="<?php /*echo site_url('supplier/all_transaction'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            04. All Transaction
                        </a>
                    </li>
                </ul>
            </li>-->


            <li id="zone_menu">
                <a href="#zone" data-toggle="collapse">
                    <i class="fa fa-area-chart"></i>
                    &nbsp;08. Zone
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="zone" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('zone/zone'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('zone/zone/allzone'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. View All
                        </a>
                    </li>
                </ul>
            </li>

            <!--<li id="client_menu">
                <a href="#client" data-toggle="collapse">
                    <i class="fa fa-users"></i>
                    &nbsp;09. Customer
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="client" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php /*echo site_url('client/client');*/ ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php /*echo site_url('client/client/view_all'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            02. View All
                        </a>
                    </li>

                     <li>
                        <a href="<?php /*echo site_url('client/transaction/'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            03. Customer Collection
                        </a>
                    </li>

                    <li>
                        <a href="<?php /*echo site_url('client/all_transaction'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            04. All Customer Collection
                        </a>
                    </li>
                    
                </ul>
            </li>-->


            <li id="commitment_menu">
                <a href="#commitment" data-toggle="collapse" title="Customer Commitment">
                    <i class="fa fa-users"></i>
                    &nbsp;10. Customer Com.
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="commitment" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('client/commitment'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('client/commitment/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. View All
                        </a>
                    </li>
                </ul>
            </li>

            <li id="supplier_menu">
                <a href="#supplier" data-toggle="collapse" title="Supplier Commitment">
                    <i class="fa fa-users"></i>
                    &nbsp;10. Supplier Com.
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="supplier" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('supplier/commitment'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('supplier/commitment/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. View All
                        </a>
                    </li>
                </ul>
            </li>


            <li id="purchase_menu">
                <a href="#purchase" data-toggle="collapse">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    &nbsp;11. Purchase
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="purchase" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('purchase/purchase'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add Purchase
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('purchase/purchase/show_purchase'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. All Purchase
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('purchase/purchase/itemWise'); ?>">
                            <i class="fa fa-angle-right"></i>
                            03. Item Wise
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('purchase/productReturn'); ?>">
                            <i class="fa fa-angle-right"></i>
                            04. Add Purchase Return
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('purchase/productReturn/allReturn'); ?>">
                            <i class="fa fa-angle-right"></i>
                            05. All Purchase Return
                        </a>
                    </li>
                </ul>
            </li>


            <li id="raw_stock_menu">
                <a href="<?php echo site_url('stock/stock'); ?>">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;12. Stock
                </a>
            </li>

            <li id="raw_stock_menu_date">
                <a href="<?php echo site_url('datewise_stock/stock'); ?>">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    &nbsp;13. Datewise Stock
                </a>
            </li>
            
            <li id="product_ledger">
                <a href="<?php echo site_url('stock/ledger'); ?>">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    Product Ledger
                </a>
            </li>

            <!--li id="damages_menu">
                <a href="#damages" data-toggle="collapse">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    &nbsp;Damage Product
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="damages" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('damages/damages'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('damages/damages/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                </ul>
            </li-->


            <!--li id="chalan_menu">
                <a href="#chalan" data-toggle="collapse">
                    <i class="fa fa-male"></i>
                    &nbsp;Chalan
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="chalan" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('chalan/chalan'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Chalan
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('chalan/chalan/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Chalan
                        </a>
                    </li>

                </ul>
            </li-->


            <li id="sale_menu">
                <a href="#sales" data-toggle="collapse">
                    <i class="fa fa-shopping-cart"></i>
                    &nbsp;14. Sale
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="sales" class="sidebar-nav collapse">
                    <!--<li>
                        <a href="<?php echo site_url('sale/sale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>-->

                    <li>
                        <a href="<?php  echo site_url('sale/retail_sale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Retail Sale
                        </a>
                    </li>

                   <li>
                        <a href="<?php echo site_url('sale/hire_sale');  ?>">
                            <i class="fa fa-angle-right"></i>
                            02. Hire Sale
                        </a>
                    </li>

                     <!--<li>
                        <a href="<?php /*echo site_url('sale/weekly_sale'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            03. Weekly Sale
                        </a>
                    </li>-->

                    <li>
                        <a href="<?php echo site_url('sale/dealerSale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            04. Dealer Sale
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('sale/DealerChalan'); ?>">
                            <i class="fa fa-angle-right"></i>
                            05. Dealer Chalan
                        </a>
                    </li>

                    <!--li>
                        <a href="<?php //echo site_url('sale/specialSale'); ?>">
			                <i class="fa fa-angle-right"></i> Special Sale
			            </a>
                    </li-->

                    <li>
                        <a href="<?php echo site_url('sale/search_sale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            06. View All
                        </a>
                    </li>

                    <!--<li>
                        <a href="<?php /*echo site_url('sale/search_sale/hireSale'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            07. All Hire Sale
                        </a>
                    </li>-->

                    <li>
                        <a href="<?php echo site_url('sale/sale/itemWise'); ?>">
                            <i class="fa fa-angle-right"></i>
                            08. Search Item Wise
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('sale/client_search'); ?>">
                            <i class="fa fa-angle-right"></i>
                            09. Search Client Wise
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('sale/multiSaleReturn'); ?>">
                            <i class="fa fa-angle-right"></i>
                            10. Sale Return
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('sale/multiSaleReturn/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            11. All Sale Return
                        </a>
                    </li>

                    <!--<li>
                        <a href="<?php //echo site_url('sale/deleted_sale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Deleted Sale
                        </a>
                    </li>-->
                </ul>
            </li>


            <!--li id="exchange_menu">
                <a href="#exchange" data-toggle="collapse">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    &nbsp;Exchange
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="exchange" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php //echo site_url('exchange/exchange'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Exchange
                        </a>
                    </li>

                    <li>
                        <a href="<?php //echo site_url('exchange/exchange/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Exchange
                        </a>
                    </li>
                </ul>
            </li-->


            <!--li id="lpr_menu">
                <a href="#lpr" data-toggle="collapse">
                    <i class="fa fa-money"></i>
                    &nbsp; LPR
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                
                <ul id="lpr" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php //echo site_url('lpr/lpr'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; New LPR
                        </a>
                    </li>
                    <li>
                        <a href="<?php //echo site_url('lpr/lpr/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; All LPR
                        </a>
                    </li>
                </ul>
            </li-->


            <li id="income_menu">
                <a href="#income" data-toggle="collapse">
                    <i class="fa fa-money"></i>
                    &nbsp;15. Income
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="income" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('income/income'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; 01. Field of Income
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('income/income/newIncome'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; 02. New Income
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('income/income/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; 03. All Income
                        </a>
                    </li>
                </ul>
            </li>


            <li id="cost_menu">
                <a href="#cost" data-toggle="collapse">
                    <i class="fa fa-money"></i>
                    &nbsp;16. Cost
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="cost" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('cost_category/cost_category'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; 01. Cost Category
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('cost/cost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; 02. Field of Cost
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('cost/cost/newcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; 03. New Cost
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('cost/cost/allcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; 04. All Cost
                        </a>
                    </li>
                </ul>
            </li>


            <li id="due_list_menu">
                <a href="#due_list" data-toggle="collapse">
                    <i class="fa fa-male"></i>
                    &nbsp;17. Due List
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="due_list" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('due_list/due_list'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Retail Due
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('due_list/due_list/retail_due_collection'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. Retail Due Colle.
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('due_list/due_list/dealer_due'); ?>">
                            <i class="fa fa-angle-right"></i>
                            03. Dealer Due
                        </a>
                    </li>

                   <!-- <li>
                        <a href="<?php echo site_url('due_list/due_list/credit'); ?>">
                            <i class="fa fa-angle-right"></i>
                            04. Hire Due
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('due_list/due_list/weekli_due'); ?>">
                            <i class="fa fa-angle-right"></i>
                            05. Weekly Due
                        </a>
                    </li>-->

                    <li>
                        <a href="<?php echo site_url('supplier/supplier/view_all/due'); ?>">
                            <i class="fa fa-angle-right"></i>
                            06. Supplier Due
                        </a>
                    </li>
                </ul>
            </li>


            <li id="bank_menu">
                <a href="#bank" data-toggle="collapse">
                    <i class="fa fa-university"></i>
                    &nbsp;18. Banking
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="bank" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/add_bank'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add Bank
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('bank/bankInfo'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. Add Account
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/all_account'); ?>">
                            <i class="fa fa-angle-right"></i>
                            03. All Account
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/transaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            04. Add Transaction
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/ledger'); ?>">
                            <i class="fa fa-angle-right"></i>
                            05. Bank Ledger
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/all_transaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            05. all Transaction
                        </a>
                    </li>

                    <!--li>
                        <a href="<?php echo site_url('bank/bankInfo/allTransaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Transaction
                        </a>
                    </li-->

                    <!--li>
                        <a href="<?php echo site_url('bank/bankInfo/searchViewTransaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Search Trnasaction
                        </a>
                    </li-->
                </ul>
            </li>
            
            <!-- Salary -->
            <li id="salary_menu">
                <a href="#salary" data-toggle="collapse">
                    <i class="fa fa-money new-aside-icon"></i> Salary
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="salary" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('salary/salary'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Basic
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('salary/salary/bonus'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Bonus
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('salary/salary/advanced'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Advanced
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('salary/payment'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Payment
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('salary/payment/all_payment'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Payment
                        </a>
                    </li>
                </ul>
            </li>


            <li id="loan-menu">
                <a href="#loan" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>&nbsp;
                    19. Loan
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="loan" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('loan_new/loan_new'); ?>">
                            <i class="fa fa-angle-right"></i>
                            01. New Loan
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('loan_new/loan_new/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. All Loan
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('loan_new/loan_new/add_trx'); ?>">
                            <i class="fa fa-angle-right"></i>
                            03. Add Transaction
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('loan_new/loan_new/all_trx'); ?>">
                            <i class="fa fa-angle-right"></i>
                            04. All Transaction
                        </a>
                    </li>

                </ul>
            </li>


            <!-- <li id="loan-menu">
                <a href="#loan" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>&nbsp;
                    Loan
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
            
                <ul id="loan" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php // echo site_url('loan/loan'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Received & Paid
                        </a>
                    </li>
            
                    <li>
                        <a href="<?php //echo site_url('loan/loan/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All Loan
                        </a>
                    </li>
                </ul>
            </li> -->


            <!--<li id="ledger">
                <a href="#ledger-menu" data-toggle="collapse">
                    <i class="fa fa-money"></i>
                    &nbsp;20. Ledger
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="ledger-menu" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php /*echo site_url('ledger/companyLedger'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            01. Supplier Ledger
                        </a>
                    </li>

                    <li>
                        <a href="<?php /*echo site_url('ledger/clientLedger'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            02. All Customer Ledger
                        </a>
                    </li>

                    <li>
                        <a href="<?php /*echo site_url('ledger/clientLedger?type=hire'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            03. Hire Ledger
                        </a>
                    </li>

                    <li>
                        <a href="<?php /*echo site_url('ledger/clientLedger?type=weekly'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            04. Weekly Ledger
                        </a>
                    </li>

                    <li>
                        <a href="<?php /*echo site_url('ledger/clientLedger?type=dealer'); */ ?>">
                            <i class="fa fa-angle-right"></i>
                            05. Dealer Ledger
                        </a>
                    </li>

                    <li>
                <a href="<?php /*//echo site_url('ledger/hire_client_ledger'); */ ?>">
                    <i class="fa fa-angle-right"></i>
                    Hire Client Ledger
                </a>
            </li>-->

        <li id="party-ledger">
            <a href="<?php echo site_url('ledger/party_ledger'); ?>">
                <i class="fa fa-money" aria-hidden="true"></i> 20. Ledger
            </a>
        </li>


        <!--<li id="opening_menu">
                <a href="<?php echo site_url('opening_balance/opening_balance'); ?>">
                    <i class="fa fa-dollar"></i>
                    Opening Balance
                </a>
            </li>-->


  <li id="replace_menu">
                <a href="#replace" data-toggle="collapse">
                    <i class="fa fa-shopping-cart"></i> Replace
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="replace" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('replace/client/create'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Client Replace
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('replace/client'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Client Replace
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('replace/item_report/client'); ?>" style="font-size: 12px;">
                            <i class="fa fa-angle-right"></i>
                            Client Replace Item Report
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('replace/supplier/create'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Supplier Replace
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('replace/supplier'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Supplier Replace
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('replace/item_report/supplier'); ?>" style="font-size: 13px;">
                            <i class="fa fa-angle-right"></i>
                            Supplier Replace Item Report
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('replace/stock'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Replace Stock
                        </a>
                    </li>
                </ul>
            </li>

        <li id="report_menu">
            <a href="#report" data-toggle="collapse">
                <i class="fa fa-money"></i>&nbsp;
                21. Report
                <span class="icon"><i class="fa fa-sort-desc"></i></span>
            </a>

            <ul id="report" class="sidebar-nav collapse">
                <li>
                    <a href="<?php echo site_url('report/purchase_report'); ?>">
                        <i class="fa fa-angle-right"></i>
                        01. Purchase Report
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('report/sales_report'); ?>">
                        <i class="fa fa-angle-right"></i>
                        02. Sales Report
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('report/income_report'); ?>">
                        <i class="fa fa-angle-right"></i>
                        03. Income Report
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('report/cost_report'); ?>">
                        <i class="fa fa-angle-right"></i>
                        04. Cost Report
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('report/client_profit'); ?>">
                        <i class="fa fa-angle-right"></i>
                        05. Profit / Loss
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('report/sale_profit'); ?>">
                        <i class="fa fa-angle-right"></i>
                        06. Sale Profit
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('report/balance_report'); ?>">
                        <i class="fa fa-angle-right"></i>
                        07. Cash Book
                    </a>
                </li>

                <!-- <li>
                        <a href="<?php //echo site_url('report/chalan_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Chalan Report
                        </a>
                    </li> -->
            </ul>
        </li>


        <li id="analytical_report_menu">
            <a href="#analytical_report" data-toggle="collapse">
                <i class="fa fa-money"></i>&nbsp;
                22. Analytical Report
                <span class="icon"><i class="fa fa-sort-desc"></i></span>
            </a>

            <ul id="analytical_report" class="sidebar-nav collapse">
                <li>
                    <a href="<?php echo site_url('report/analytical_report'); ?>">
                        <i class="fa fa-angle-right"></i>
                        01.Sales Report
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('report/analytical_report/client_collection'); ?>">
                        <i class="fa fa-angle-right"></i>
                        02.Collection Report
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('report/analytical_report/supplier_purchase'); ?>">
                        <i class="fa fa-angle-right"></i>
                        03.Purchase Report
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('report/analytical_report/supplier_payment'); ?>">
                        <i class="fa fa-angle-right"></i>
                        04. Payment Report
                    </a>
                </li>

            </ul>
        </li>


        <li id="sms_menu">
            <a href="#sms" data-toggle="collapse">
                <i class="fa fa-envelope-o"></i>
                &nbsp;23. Mobile SMS
                <span class="icon"><i class="fa fa-sort-desc"></i></span>
            </a>

            <ul id="sms" class="sidebar-nav collapse">
                <li>
                    <a href="<?php echo site_url('sms/sendSms'); ?>">
                        <i class="fa fa-angle-right"></i>
                        01. Send
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('sms/sendSms/send_custom_sms'); ?>">
                        <i class="fa fa-angle-right"></i>
                        02. Custom
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('sms/sendSms/sms_report'); ?>">
                        <i class="fa fa-angle-right"></i>
                        03. Report
                    </a>
                </li>
            </ul>
        </li>


        <li id="complain_menu">
                <a href="#complain" data-toggle="collapse">
                    <i class="fa fa-calendar-times-o"></i>&nbsp;
                    Customer Complain
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="complain" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('complain/complain'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Complain
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('complain/complain/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All complain
                        </a>
                    </li>
                </ul>
            </li>

        <?php /* ?>
        <li id="complain_menu">
            <a href="#complain" data-toggle="collapse">
                <i class="fa fa-calendar-times-o"></i>&nbsp;
                24. Complain
                <span class="icon"><i class="fa fa-sort-desc"></i></span>
            </a>

            <ul id="complain" class="sidebar-nav collapse">
                <li>
                    <a href="<?php echo site_url('new_complain/new_complain'); ?>">
                        <i class="fa fa-angle-right"></i>
                        01. Add Complain
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('new_complain/new_complain/all'); ?>">
                        <i class="fa fa-angle-right"></i>
                        02. All complain
                    </a>
                </li>
            </ul>
        </li>
        <?php */ ?>


        <li id="access_info">
            <a href="<?php echo site_url('access_info/access_info'); ?>">
                <i class="fa fa-cog"></i>
                &nbsp;25. Access Info
            </a>
        </li>


        <li id="privilege-menu">
            <a href="<?php echo site_url('privilege/privilege'); ?>">
                <i class="fa fa-cog"></i>
                &nbsp;26. Privilege
            </a>
        </li>


        <li id="theme_menu">
            <a href="#theme" data-toggle="collapse">
                <i class="fa fa-cog"></i>&nbsp;
                27. Settings
                <span class="icon"><i class="fa fa-sort-desc"></i></span>
            </a>

            <ul id="theme" class="sidebar-nav collapse">
                <li>
                    <a href="<?php echo site_url('theme/themeSetting'); ?>">
                        <i class="fa fa-angle-right"></i>
                        01. Banner/Icons
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('theme/themeSetting/theme_tools'); ?>">
                        <i class="fa fa-angle-right"></i>
                        02. Theme Tools
                    </a>
                </li>
            </ul>
        </li>


        <li id="backup_menu">
            <a href="#backup" data-toggle="collapse">
                <i class="fa fa-database"></i>&nbsp;
                28. Data Backup
                <span class="icon"><i class="fa fa-sort-desc"></i></span>
            </a>

            <ul id="backup" class="sidebar-nav collapse">
                <li>
                    <a href="<?php echo site_url('data_backup'); ?>">
                        <i class="fa fa-angle-right"></i>
                        01. Export Data
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('data_backup/import_data'); ?>">
                        <i class="fa fa-angle-right"></i>
                        02. Import Data
                    </a>
                </li>
            </ul>
        </li>

        <li>&nbsp;</li>
        <li>&nbsp;</li>

        </ul>
    </nav>
</aside>
<!-- /#sidebar-wrapper -->

<!--=================== online offline checker =========================-->
<style>
    .warning {
        height: 100vh;
        background: rgba(255, 255, 255, 0.85);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        position: fixed;
        z-index: 99999;
        top: 0;
        left: 0;
        user-select: none;
        color: red;
        font-family: serif;
        display: none;
    }
</style>

<div class="warning">
    <div>
        <h1>YOU'R OFFLINE</h1>
    </div>
</div>
<script>
    if (typeof navigator.connection !== 'undefined') {
        navigator.connection.onchange = function () {
            var warning = document.querySelector('.warning');
            if (navigator.onLine) {
                warning.style.display = 'none';
            } else {
                warning.style.display = 'flex';
            }
        }
    }
</script>

<!--=================== End online offline checker =========================-->
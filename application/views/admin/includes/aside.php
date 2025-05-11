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
            <a style="font-size: 23px !important;" href="<?php echo site_url('admin/dashboard'); ?>">Admin
                <span>Panel</span></a>
        </h3>
    </div>

    <nav class="aside-nav">
        <ul class="sidebar-nav">

            <?php if (ck_menu("dashboard")) { ?>
                <li id="dashboard">
                    <a href="<?php echo site_url('admin/dashboard'); ?>">
                        <i class="fa fa-home" aria-hidden="true"></i> &nbsp;01. Dashboard
                    </a>
                </li>
            <?php } ?>

            <li id="calendarMenu">
                <a href="<?php echo site_url('calendar'); ?>">
                    <i class="fa fa-calendar"></i> &nbsp; Calendar
                    <?php if (!empty($todayEvents)) { ?>
                        <span class="badge badge-primary"><?php echo $todayEvents; ?></span>
                    <?php } ?>
                </a>
            </li>


            <?php if (ck_menu("category_menu")) { ?>
                <li id="category_menu">
                    <a href="#category" data-toggle="collapse">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                        &nbsp;02. Category
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="category" class="sidebar-nav collapse">
                        <?php if (ck_action("category_menu", "add-new")) { ?>
                            <li>
                                <a href="<?php echo site_url('category/category'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Add New
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("category_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('category/category/allCategory'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. View All
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("subCategory_menu")) { ?>
                <li id="subCategory_menu">
                    <a href="#subCategory" data-toggle="collapse">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                        &nbsp;03. Subcategory
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="subCategory" class="sidebar-nav collapse">
                        <?php if (ck_action("subCategory_menu", "add-new")) { ?>
                            <li>
                                <a href="<?php echo site_url('subCategory/subCategory'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Add New
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("subCategory_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('subCategory/subCategory/all_subcategory'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. View All
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("brand_menu")) { ?>
                <li id="brand_menu">
                    <a href="#brand" data-toggle="collapse">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                        &nbsp;04. Brand
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="brand" class="sidebar-nav collapse">
                        <?php if (ck_action("brand_menu", "add-new")) { ?>
                            <li>
                                <a href="<?php echo site_url('brand/brand'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Add New
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("brand_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('brand/brand/all_brand'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. View All
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("godown_menu")) { ?>
                <li id="godown_menu">
                    <a href="#godown" data-toggle="collapse">
                        <i class="fa fa-archive" aria-hidden="true"></i>
                        &nbsp;05. Showroom
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="godown" class="sidebar-nav collapse">
                        <?php if (ck_action("godown_menu", "add-new")) { ?>
                            <li>
                                <a href="<?php echo site_url('godown/godown'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Add New
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("godown_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('godown/godown/all'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. View All
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("product_menu")) { ?>
                <li id="product_menu">
                    <a href="#product" data-toggle="collapse">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                        &nbsp;06. Product
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="product" class="sidebar-nav collapse">
                        <?php if (ck_action("product_menu", "add-new")) { ?>
                            <li>
                                <a href="<?php echo site_url('product/product'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Add Product
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("product_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('product/product/allProduct'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. All Product
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php /*if(ck_menu("supplier-menu")){ ?>
            <li id="supplier-menu">
                <a href="#company" data-toggle="collapse">
                    <i class="fa fa-building-o"></i>
                    &nbsp;07. Supplier
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="company" class="sidebar-nav collapse">
                    <?php if(ck_action("supplier-menu","add")){ ?>
                    <li>
                        <a href="<?php echo site_url('supplier/supplier');?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add Supplier
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("supplier-menu","all")){ ?>
                    <li>
                        <a href="<?php echo site_url('supplier/supplier/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. All Supplier
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("supplier-menu","transaction")){ ?>
                    <li>
                        <a href="<?php echo site_url('supplier/transaction/'); ?>">
                            <i class="fa fa-angle-right"></i>
                            03. Add Transaction
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("supplier-menu","all-transaction")){ ?>
                    <li>
                        <a href="<?php echo site_url('supplier/all_transaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            04. All Transaction
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php }*/ ?>



            <?php if (ck_menu("zone_menu")) { ?>
                <li id="zone_menu">
                    <a href="#zone" data-toggle="collapse">
                        <i class="fa fa-building-o"></i>
                        &nbsp;08. Zone
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="zone" class="sidebar-nav collapse">
                        <?php if (ck_action("zone_menu", "add-new")) { ?>
                            <li>
                                <a href="<?php echo site_url('zone/zone'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Add New
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("zone_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('zone/zone/allzone'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. View All
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("party_menu")) { ?>
                <li id="party_menu">
                    <a href="#party" data-toggle="collapse">
                        <i class="fa fa-building-o"></i>
                        &nbsp;07. Supplier/Client
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="party" class="sidebar-nav collapse">
                        <?php if (ck_action("party_menu", "create")) { ?>
                            <li>
                                <a href="<?php echo site_url('party/party/create'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Add New
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("party_menu", "list")) { ?>
                            <li>
                                <a href="<?php echo site_url('party/party'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. View All
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("party_menu", "transaction-create")) { ?>
                            <li>
                                <a href="<?php echo site_url('party/transaction/create'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    03. Add Transaction
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("party_menu", "transaction-list")) { ?>
                            <li>
                                <a href="<?php echo site_url('party/transaction'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    04. All Transaction
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php /*if(ck_menu("client_menu")){ ?>
            <li id="client_menu">
                <a href="#client" data-toggle="collapse">
                    <i class="fa fa-users"></i>
                    &nbsp;09. Customer
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="client" class="sidebar-nav collapse">
                    <?php if(ck_action("client_menu","add")){ ?>
                    <li>
                        <a href="<?php echo site_url('client/client');?>">
                            <i class="fa fa-angle-right"></i>
                            01. Add New
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("client_menu","all")){ ?>
                    <li>
                        <a href="<?php echo site_url('client/client/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            02. View All
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("client_menu","transaction")){ ?>
                    <li>
                        <a href="<?php echo site_url('client/transaction/'); ?>">
                            <i class="fa fa-angle-right"></i>
                            03. Customer Collection
                        </a>
                    </li>
                    <?php } ?>
                    
                    <?php if(ck_action("client_menu","all-transaction")){ ?>
                    <li>
                        <a href="<?php echo site_url('client/all_transaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            04. All Customer Collection
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php }*/ ?>


            <?php if (ck_menu("supplier_menu")) { ?>
                <li id="supplier_menu">
                    <a href="#supplier" data-toggle="collapse" title="Supplier Commitment">
                        <i class="fa fa-users"></i>
                        &nbsp;10. Customer Com.
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="supplier" class="sidebar-nav collapse">
                        <?php if (ck_action("supplier_menu", "add")) { ?>
                            <li>
                                <a href="<?php echo site_url('client/commitment'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Add New
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("commitment_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('client/commitment/view_all'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. View All
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("commitment_menu")) { ?>
                <li id="commitment_menu">
                    <a href="#commitment" data-toggle="collapse" title="Customer Commitment">
                        <i class="fa fa-users"></i>
                        &nbsp;10. Customer Com.
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="commitment" class="sidebar-nav collapse">
                        <?php if (ck_action("commitment_menu", "add")) { ?>
                            <li>
                                <a href="<?php echo site_url('client/commitment'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Add New
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("commitment_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('client/commitment/view_all'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. View All
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("purchase_menu")) { ?>
                <li id="purchase_menu">
                    <a href="#purchase" data-toggle="collapse">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        &nbsp;11. Purchase
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="purchase" class="sidebar-nav collapse">
                        <?php if (ck_action("purchase_menu", "add-new")) { ?>
                            <li>
                                <a href="<?php echo site_url('purchase/purchase'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Add Purchase
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("purchase_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('purchase/purchase/show_purchase'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. All Purchase
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("purchase_menu", "wise")) { ?>
                            <li>
                                <a href="<?php echo site_url('purchase/purchase/itemWise'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    03. Item Wise
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("purchase_menu", "return")) { ?>
                            <li>
                                <a href="<?php echo site_url('purchase/productReturn'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    04. Add Purchase Return
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("purchase_menu", "all_return")) { ?>
                            <li>
                                <a href="<?php echo site_url('purchase/productReturn/allReturn'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    05. All Purchase Return
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("raw_stock_menu")) { ?>
                <li id="raw_stock_menu">
                    <a href="<?php echo site_url('stock/stock'); ?>">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;12. Stock
                    </a>
                </li>
            <?php } ?>


            <?php if (ck_menu("sale_menu")) { ?>
                <li id="sale_menu">
                    <a href="#sales" data-toggle="collapse">
                        <i class="fa fa-shopping-cart"></i>
                        &nbsp;13. Sale
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="sales" class="sidebar-nav collapse">
                        <?php if (ck_action("sale_menu", "retail")) { ?>
                            <li>
                                <a href="<?php echo site_url('sale/retail_sale'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Retail Sale
                                </a>
                            </li>
                        <?php } ?>

                        <?php  if (ck_action("sale_menu", "hire")) { ?>
                            <li>
                                <a href="<?php echo site_url('sale/hire_sale'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. Hire Sale
                                </a>
                            </li>
                        <?php } ?>

                        <?php /*if (ck_action("sale_menu", "weekly")) { ?>
                            <li>
                                <a href="<?php echo site_url('sale/weekly_sale'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    03. Weekly Sale
                                </a>
                            </li>
                        <?php } */ ?>

                        <?php if (ck_action("sale_menu", "dealer")) { ?>
                            <li>
                                <a href="<?php echo site_url('sale/dealerSale'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    04. Dealer Sale
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("sale_menu", "d_c")) { ?>
                            <li>
                                <a href="<?php echo site_url('sale/DealerChalan'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    05. Dealer Chalan
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("sale_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('sale/search_sale'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    06. View All
                                </a>
                            </li>
                        <?php } ?>

                        <?php /* if (ck_action("sale_menu", "hire-all")) { ?>
                            <li>
                                <a href="<?php echo site_url('sale/search_sale/hireSale'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    07. All Hire Sale
                                </a>
                            </li>
                        <?php } */ ?>

                        <?php if (ck_action("sale_menu", "wise")) { ?>
                            <li>
                                <a href="<?php echo site_url('sale/sale/itemWise'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    08. Search Item Wise
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("sale_menu", "client_search")) { ?>
                            <li>
                                <a href="<?php echo site_url('sale/client_search'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    09. Search Client Wise
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("sale_menu", "multi-return")) { ?>
                            <li>
                                <a href="<?php echo site_url('sale/multiSaleReturn'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    10. Sale Return
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("sale_menu", "multi-return-all")) { ?>
                            <li>
                                <a href="<?php echo site_url('sale/multiSaleReturn/all'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    11. All Sale Return
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("income_menu")) { ?>
                <li id="income_menu">
                    <a href="#income" data-toggle="collapse">
                        <i class="fa fa-money"></i>
                        &nbsp;14. Income
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="income" class="sidebar-nav collapse">
                        <?php if (ck_action("income_menu", "field")) { ?>
                            <li>
                                <a href="<?php echo site_url('income/income'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;01. Field of Income
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("income_menu", "new")) { ?>
                            <li>
                                <a href="<?php echo site_url('income/income/newIncome'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;02. New Income
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("income_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('income/income/all'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;03. All Income
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("cost_menu")) { ?>
                <li id="cost_menu">
                    <a href="#cost" data-toggle="collapse">
                        <i class="fa fa-money"></i>
                        &nbsp;15. Cost
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="cost" class="sidebar-nav collapse">
                        <?php if (ck_action("cost_menu", "all_cost_category")) { ?>
                            <li>
                                <a href="<?php echo site_url('cost_category/cost_category'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; 01. Cost Category
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("cost_menu", "field")) { ?>
                            <li>
                                <a href="<?php echo site_url('cost/cost'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; 02. Field of Cost
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("cost_menu", "new")) { ?>
                            <li>
                                <a href="<?php echo site_url('cost/cost/newcost'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; 03. New Cost
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("cost_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('cost/cost/allcost'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; 04. All Cost
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("due_list_menu")) { ?>
                <li id="due_list_menu">
                    <a href="#due_list" data-toggle="collapse">
                        <i class="fa fa-male"></i>
                        &nbsp;16. Due List
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="due_list" class="sidebar-nav collapse">
                        <?php if (ck_action("due_list_menu", "cash")) { ?>
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
                        <?php } ?>

                        <?php if (ck_action("due_list_menu", "dealer")) { ?>
                            <li>
                                <a href="<?php echo site_url('due_list/due_list/dealer_due'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    03. Dealer Due
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("due_list_menu", "supplier")) { ?>
                            <li>
                                <a href="<?php echo site_url('supplier/supplier/view_all/due'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    03. Supplier Due
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("bank_menu")) { ?>
                <li id="bank_menu">
                    <a href="#bank" data-toggle="collapse">
                        <i class="fa fa-university"></i>
                        &nbsp;17. Banking
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="bank" class="sidebar-nav collapse">
                        <?php if (ck_action("bank_menu", "add-bank")) { ?>
                            <li>
                                <a href="<?php echo site_url('bank/bankInfo/add_bank'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Add Bank
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("bank_menu", "add-new")) { ?>
                            <li>
                                <a href="<?php echo site_url('bank/bankInfo'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. Add Account
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("bank_menu", "all-acc")) { ?>
                            <li>
                                <a href="<?php echo site_url('bank/bankInfo/all_account'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    03. All Account
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("bank_menu", "add")) { ?>
                            <li>
                                <a href="<?php echo site_url('bank/bankInfo/transaction'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    04. Add Transaction
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("bank_menu", "ledger")) { ?>
                            <li>
                                <a href="<?php echo site_url('bank/bankInfo/ledger'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    05. Bank Ledger
                                </a>
                            </li>
                        <?php } ?>
                        
                        <?php if (ck_action("bank_menu", "all_trx")) { ?>
                            <li>
                                <a href="<?php echo site_url('bank/bankInfo/all_transaction'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    06. All Transaction
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("loan-menu")) { ?>
                <li id="loan-menu">
                    <a href="#loan" data-toggle="collapse">
                        <i class="fa fa-money" aria-hidden="true"></i>&nbsp;
                        18. Loan
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="loan" class="sidebar-nav collapse">
                        <?php if (ck_action("loan-menu", "add-new")) { ?>
                            <li>
                                <a href="<?php echo site_url('loan_new/loan_new'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. New Loan
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("loan-menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('loan_new/loan_new/all'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. All Loan
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("loan-menu", "trans")) { ?>
                            <li>
                                <a href="<?php echo site_url('loan_new/loan_new/add_trx'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    03. Add Transaction
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("loan-menu", "all_trx")) { ?>
                            <li>
                                <a href="<?php echo site_url('loan_new/loan_new/all_trx'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    04. All Transaction
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php /*if (ck_menu("ledger")) { ?>
                <li id="ledger">
                    <a href="#ledger-menu" data-toggle="collapse">
                        <i class="fa fa-money"></i>
                        &nbsp;19. Ledger
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="ledger-menu" class="sidebar-nav collapse">
                        <?php if (ck_action("ledger", "company-ledger")) { ?>
                            <li>
                                <a href="<?php echo site_url('ledger/companyLedger'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Supplier
                                </a>
                            </li>
                        <?php } ?>


                        <?php if (ck_action("ledger", "client-ledger")) { ?>
                            <li>
                                <a href="<?php echo site_url('ledger/clientLedger'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. All Customer Ledger
                                </a>
                            </li>
                        <?php } ?>

                        <li>
                            <a href="<?php echo site_url('ledger/clientLedger?type=hire'); ?>">
                                <i class="fa fa-angle-right"></i>
                                03. Hire Ledger
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('ledger/clientLedger?type=weekly'); ?>">
                                <i class="fa fa-angle-right"></i>
                                04. Weekly Ledger
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('ledger/clientLedger?type=dealer'); ?>">
                                <i class="fa fa-angle-right"></i>
                                05. Dealer Ledger
                            </a>
                        </li>
                    </ul>
                </li>
            <?php }*/ ?>

            <?php if (ck_menu("party-ledger")) { ?>
                <li id="party-ledger">
                    <a href="<?php echo site_url('ledger/party_ledger'); ?>">
                        <i class="fa fa-money" aria-hidden="true"></i> 20. Ledger
                    </a>
                </li>
            <?php } ?>


            <?php if (ck_menu("report_menu")) { ?>
                <li id="report_menu">
                    <a href="#report" data-toggle="collapse">
                        <i class="fa fa-money"></i>&nbsp;
                        20. Report
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="report" class="sidebar-nav collapse">
                        <?php if (ck_action("report_menu", "purchase_report")) { ?>
                            <li>
                                <a href="<?php echo site_url('report/purchase_report'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Purchase Report
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("report_menu", "sales_report")) { ?>
                            <li>
                                <a href="<?php echo site_url('report/sales_report'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. Sales Report
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("report_menu", "income_report")) { ?>
                            <li>
                                <a href="<?php echo site_url('report/income_report'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    03. Income Report
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("report_menu", "cost_report")) { ?>
                            <li>
                                <a href="<?php echo site_url('report/cost_report'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    04. Cost Report
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("report_menu", "product_profit")) { ?>
                            <li>
                                <a href="<?php echo site_url('report/client_profit'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    05. Profit / Loss
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("report_menu", "sale_profit")) { ?>
                            <li>
                                <a href="<?php echo site_url('report/sale_profit'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    06. Sale Profit
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("report_menu", "balance_report")) { ?>
                            <li>
                                <a href="<?php echo site_url('report/balance_report'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    07. Cash Book
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("sms_menu")) { ?>
                <li id="sms_menu">
                    <a href="#sms" data-toggle="collapse">
                        <i class="fa fa-envelope-o"></i>
                        &nbsp;21. Mobile SMS
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="sms" class="sidebar-nav collapse">
                        <?php if (ck_action("sms_menu", "send-sms")) { ?>
                            <li>
                                <a href="<?php echo site_url('sms/sendSms'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Send
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("sms_menu", "custom-sms")) { ?>
                            <li>
                                <a href="<?php echo site_url('sms/sendSms/send_custom_sms'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. Custom
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("sms_menu", "sms-report")) { ?>
                            <li>
                                <a href="<?php echo site_url('sms/sendSms/sms_report'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    03. Report
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("complain_menu")) { ?>
                <li id="complain_menu">
                    <a href="#complain" data-toggle="collapse">
                        <i class="fa fa-calendar-times-o"></i>&nbsp;
                        22. Complain
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="complain" class="sidebar-nav collapse">
                        <?php if (ck_action("complain_menu", "new")) { ?>
                            <li>
                                <a href="<?php echo site_url('complain/complain'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Add Complain
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("complain_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('complain/complain/all'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. All complain
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("access_info")) { ?>
                <li id="access_info">
                    <a href="<?php echo site_url('access_info/access_info'); ?>">
                        <i class="fa fa-book"></i>
                        &nbsp;23. Access Info
                    </a>
                </li>
            <?php } ?>


            <?php if (ck_menu("privilege-menu")) { ?>
                <li id="privilege-menu">
                    <a href="<?php echo site_url('privilege/privilege'); ?>">
                        <i class="fa fa-book"></i>
                        &nbsp;24. Privilege
                    </a>
                </li>
            <?php } ?>


            <?php if (ck_menu("theme_menu")) { ?>
                <li id="theme_menu">
                    <a href="#theme" data-toggle="collapse">
                        <i class="fa fa-cog"></i>&nbsp;
                        25. Settings
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="theme" class="sidebar-nav collapse">
                        <?php if (ck_action("theme_menu", "logo")) { ?>
                            <li>
                                <a href="<?php echo site_url('theme/themeSetting'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Banner/Icons
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("theme_menu", "tools")) { ?>
                            <li>
                                <a href="<?php echo site_url('theme/themeSetting/theme_tools'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. Theme Tools
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php if (ck_menu("backup_menu")) { ?>
                <li id="backup_menu">
                    <a href="#backup" data-toggle="collapse">
                        <i class="fa fa-database"></i>&nbsp;
                        26. Data Backup
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    </a>

                    <ul id="backup" class="sidebar-nav collapse">
                        <?php if (ck_action("backup_menu", "add-new")) { ?>
                            <li>
                                <a href="<?php echo site_url('data_backup'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    01. Export Data
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (ck_action("backup_menu", "all")) { ?>
                            <li>
                                <a href="<?php echo site_url('data_backup/import_data'); ?>">
                                    <i class="fa fa-angle-right"></i>
                                    02. Import Data
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>

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
<style>
    ul li a span.icon{
        float: right;
        margin-right: 20px;
    }
    .aside-head{
        position: fixed;
        z-index: 2;
        width: 150px;
    }
    .sidebar-brand{
        position: absolute;
        width: 250px;
        z-index: 2;
        transition: all 0.4s ease-in-out;
    }
    .sidebar-brand.sidebar-slide{
        transform: translateX(-100%);
        transition: all 0.4s ease-in-out;
    }
    .aside-nav{
        margin-top: 65px;
        z-index: -3;
    }
    @media screen and (max-width: 768px){
        .sidebar-brand{
            transform: translateX(-100%);
            transition: all 0.4s ease-in-out;
        }
        .sidebar-brand.sidebar-slide{
            transform: translateX(0%);
            transition: all 0.4s ease-in-out;
        }
    }
</style>


<!-- Sidebar -->
<aside id="sidebar-wrapper">
    <div class="sidebar-nav">
        <h3 class="sidebar-brand <?php if($this->data['width'] == 'full-width') {echo 'sidebar-slide';} ?>">
			<a style="font-size: 23px !important;" href="<?php echo site_url('super/dashboard'); ?>">Admin <span>Panel</span></a>
		</h3>
    </div>

    <nav class="aside-nav">
        <ul class="sidebar-nav">
            
            <li id="dashboard">
                <a href="<?php echo site_url('super/dashboard'); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> &nbsp; Dashboard
                </a>
            </li>
            


            <!--  <li id="banner-menu">
               <a href="<?php // echo site_url('banner/banner'); ?>">
                   <i class="fa fa-book"></i> &nbsp; Banner
               </a>
            </li> -->
            
            
            <li id="category_menu">
                <a href="#category" data-toggle="collapse">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    &nbsp;Category
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="category" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('category/category'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('category/category/allCategory'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                </ul>
            </li>

            <li id="subCategory_menu">
                <a href="#subCategory" data-toggle="collapse">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    &nbsp;Subategory
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="subCategory" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('subCategory/subCategory'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('subCategory/subCategory/all_subcategory'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                </ul>
            </li>

            <li id="brand_menu">
                <a href="#brand" data-toggle="collapse">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    &nbsp;Brand
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="brand" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('brand/brand'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('brand/brand/all_brand'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                </ul>
            </li>


            <li id="godown_menu">
                <a href="#godown" data-toggle="collapse">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                    &nbsp;Showroom
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="godown" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('godown/godown'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('godown/godown/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                </ul>
            </li>


            <li id="product_menu">
                <a href="#product" data-toggle="collapse">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    &nbsp;Product
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="product" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('product/product'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Product
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('product/product/allProduct'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Product
                        </a>
                    </li>
                </ul>
            </li>

            <li id="supplier-menu">
                <a href="#company" data-toggle="collapse">
                    <i class="fa fa-building-o"></i>
                    &nbsp;Supplier
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="company" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('supplier/supplier');?>">
                            <i class="fa fa-angle-right"></i>
                            Add Supplier
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('supplier/supplier/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Supplier
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('supplier/transaction/'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Transaction
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('supplier/all_transaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Transaction
                        </a>
                    </li>
                </ul>
            </li>

            <li id="client_menu">
                <a href="#client" data-toggle="collapse">
                    <i class="fa fa-users"></i>
                    &nbsp;Customer
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="client" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('client/client');?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('client/client/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                    
                     <li>
                        <a href="<?php echo site_url('client/transaction/'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Installment Collection
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('client/all_transaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Installment Collection
                        </a>
                    </li>
                    
                </ul>
            </li>
            
            <li id="commitment_menu">
                <a href="#commitment" data-toggle="collapse">
                    <i class="fa fa-users"></i>
                    &nbsp;Customer Commitment
                    <span><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="commitment" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('client/commitment');?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('client/commitment/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                    
                   
                    
                    
                </ul>
            </li>

            <li id="purchase_menu">
                <a href="#purchase" data-toggle="collapse">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    &nbsp;Purchase
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="purchase" class="sidebar-nav collapse">

                    <li>
                        <a href="<?php echo site_url('purchase/purchase'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Purchase
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('purchase/purchase/show_purchase'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Purchase
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('purchase/purchase/itemWise'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Item Wise
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('purchase/productReturn'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Purchase Return
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('purchase/productReturn/allReturn'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Purchase Return
                        </a>
                    </li>
                </ul>
            </li>

            <li id="raw_stock_menu">
                <a href="<?php echo site_url('stock/stock'); ?>">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;Stock
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
                        <a href="<?php echo site_url('chalan/chalan');?>">
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
                    &nbsp;Sale
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="sales" class="sidebar-nav collapse">
                    
                    <!--<li>
                        <a href="<?php echo site_url('sale/sale');?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>-->
                    
                    <li>
                        <a href="<?php echo site_url('sale/retail_sale/retail_sale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Retail Sale
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('sale/weekly_sale/weekly_sale'); ?>">
                            <i class="fa fa-angle-right"></i>
                           Weekly Sale
                        </a>
                    </li>                     
                    
                    <li>
                        <a href="<?php echo site_url('sale/hire_sale/hire_sale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Hire Sale
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('sale/dealerSale'); ?>">
			                <i class="fa fa-angle-right"></i> Dealer Sale
		                </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('sale/DealerChalan'); ?>">
			                <i class="fa fa-angle-right"></i> Dealer Chalan
		                </a>
                    </li>
                    
                    <!--li>
                        <a href="<?php //echo site_url('sale/specialSale'); ?>">
			                <i class="fa fa-angle-right"></i> Special Sale
			            </a>
                    </li-->

                    <li>
                        <a href="<?php echo site_url('sale/searchSale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('sale/searchSale/hireSale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Hire Sale
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('sale/sale/itemWise'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Search Item Wise
                        </a>
                    </li>
                    
                     <li>
                        <a href="<?php echo site_url('sale/multiSaleReturn'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Sale Return
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('sale/multiSaleReturn/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Sale Return
                        </a>
                    </li>
                    
                
                   <!-- 
                    <li>
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
                    &nbsp; Income
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="income" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('income/income'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Field of Income
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('income/income/newIncome'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; New Income
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('income/income/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; All Income
                        </a>
                    </li>
                </ul>
            </li>

            <li id="cost_menu">
                <a href="#cost" data-toggle="collapse">
                    <i class="fa fa-money"></i>
                    &nbsp; Cost
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="cost" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('cost/cost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Field of Cost
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('cost_category/cost_category'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Cost Category
                        </a>
                    </li>                    
                    <li>
                        <a href="<?php echo site_url('cost/cost/newcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; New Cost
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('cost/cost/allcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; All Cost
                        </a>
                    </li>

                </ul>
            </li>

            <li id="due_list_menu">
                <a href="#due_list" data-toggle="collapse">
                    <i class="fa fa-male"></i>
                    &nbsp;Due List
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
                <ul id="due_list" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('due_list/due_list'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Cash Client Due
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('due_list/due_list/credit'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Credit Client Due
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('due_list/due_list/supplier'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Supplier Due
                        </a>
                    </li>
                </ul>
            </li>

            <li id="bank_menu">
                <a href="#bank" data-toggle="collapse">
                    <i class="fa fa-university"></i>
                    &nbsp;Banking
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="bank" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/add_bank'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Bank
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('bank/bankInfo'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Account
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/all_account'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Account
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/transaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Transaction
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/ledger'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Bank Ledger
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
            
            <li id="loan-menu">
                <a href="#loan" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>&nbsp;
                    Loan
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
            
                <ul id="loan" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('loan_new/loan_new'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Loan
                        </a>
                    </li>
            
                    <li>
                        <a href="<?php echo site_url('loan_new/loan_new/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Loan
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('loan_new/loan_new/add_trx'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Transaction
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('loan_new/loan_new/all_trx'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Transaction
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

            <li id="ledger">
                <a href="#ledger-menu" data-toggle="collapse">
                    <i class="fa fa-money"></i>
                    &nbsp;Ledger
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="ledger-menu" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('ledger/companyLedger'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Supplier Ledger
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('ledger/clientLedger'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Customer Ledger
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('ledger/clientLedger?type=customer'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Customer Ledger
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('ledger/clientLedger?type=dealer'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Dealer Ledger
                        </a>
                    </li>
                    
                    <!--<li>-->
                    <!--    <a href="<?php //echo site_url('ledger/hire_client_ledger'); ?>">-->
                    <!--        <i class="fa fa-angle-right"></i>-->
                    <!--        Hire Client Ledger-->
                    <!--    </a>-->
                    <!--</li>-->
                </ul>
            </li>
            
            <!--<li id="opening_menu">
                <a href="<?php echo site_url('opening_balance/opening_balance');?>">
                    <i class="fa fa-dollar"></i>
                    Opening Balance
                </a>
            </li>-->
            

            <li id="report_menu">
                <a href="#report" data-toggle="collapse">
                    <i class="fa fa-money"></i>&nbsp;
                    Report
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="report" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('report/purchase_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Purchase Report
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('report/sales_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Sales Report
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('report/income_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Income Report
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('report/cost_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Cost Report
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('report/report/profit_loss_report');?>">
                            <i class="fa fa-angle-right"></i>
                            Profit / Loss
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('report/balance_report');?>">
                            <i class="fa fa-angle-right"></i>
                           Cash Book
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

            <li id="sms_menu">
                <a href="#sms" data-toggle="collapse">
                    <i class="fa fa-envelope-o"></i>
                    &nbsp;Mobile SMS
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>
            
                <ul id="sms" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('sms/sendSms');?>">
                            <i class="fa fa-angle-right"></i>
                            Send
                        </a>
                    </li>
            
                    <li>
                        <a href="<?php echo site_url('sms/sendSms/send_custom_sms'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Custom
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('sms/sendSms/sms_report'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Report
                        </a>
                    </li>
                </ul>
            </li>
            
            <!--<li id="complain_menu">
                <a href="#complain" data-toggle="collapse">
                    <i class="fa fa-calendar-times-o"></i>&nbsp;
                    Customer Complain
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="complain" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('complain/complain');?>">
                            <i class="fa fa-angle-right"></i>
                            Add Complain
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('complain/complain/all');?>">
                            <i class="fa fa-angle-right"></i>
                            All complain
                        </a>
                    </li>
                </ul>
            </li>-->
            
            <li id="complain_menu">
                <a href="#complain" data-toggle="collapse">
                    <i class="fa fa-calendar-times-o"></i>&nbsp;
                    Complain
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="complain" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('new_complain/new_complain');?>">
                            <i class="fa fa-angle-right"></i>
                            Add Complain
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('new_complain/new_complain/all');?>">
                            <i class="fa fa-angle-right"></i>
                            All complain
                        </a>
                    </li>
                </ul>
            </li>
            
            <li id="access_info">
                <a href="<?php echo site_url('access_info/access_info');?>">
                    <i class="fa fa-cog"></i>
                        Access Info
                </a>
            </li>            
            
            
            <li id="privilege-menu">
                <a href="<?php echo site_url('privilege/privilege');?>">
                    <i class="fa fa-cog"></i>
                        Privilege
                </a>
            </li>
            
            <li id="theme_menu">
                <a href="#theme" data-toggle="collapse">
                    <i class="fa fa-cog"></i>&nbsp;
                    Settings
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="theme" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('theme/themeSetting');?>">
                            <i class="fa fa-angle-right"></i>
                            Banner/Icons
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('theme/themeSetting/theme_tools');?>">
                            <i class="fa fa-angle-right"></i>
                            Theme Tools
                        </a>
                    </li>
                </ul>
            </li>
            
            <li id="backup_menu">
                <a href="#backup" data-toggle="collapse">
                    <i class="fa fa-database"></i>&nbsp;
                    Data Backup
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="backup" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('data_backup');?>">
                            <i class="fa fa-angle-right"></i>
                            Export Data
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('data_backup/import_data');?>">
                            <i class="fa fa-angle-right"></i>
                            Import Data
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

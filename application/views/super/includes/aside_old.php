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
        position: fixed;
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
			<a style="font-size: 23px !important;" href="<?php echo site_url('super/dashboard'); ?>">Super Admin <span>Panel</span></a>
		</h3>
    </div>

    <nav class="aside-nav">
        <ul class="sidebar-nav">
            <li id="dashboard">
                <a href="<?php echo site_url('super/dashboard'); ?>">
                    <i class="fa fa-home"></i> &nbsp; Dashboard
                </a>
            </li>

            <li id="showroom-menu">
                <a href="#showroom" data-toggle="collapse">
                    <i class="fa fa-home"></i>
                    &nbsp;Showroom
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="showroom" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('showroom/showroom'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('showroom/showroom/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                    
                     <li>
                        <a href="<?php echo site_url('showroom/showroom/headoffice_balance'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Head Office Balance
                        </a>
                    </li>
                </ul>
            </li>

            <li id="category_menu">
                <a href="#category" data-toggle="collapse">
                    <i class="fa fa-tags" aria-hidden="true"></i>
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
                    <i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;
                    Brand
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
                        <a href="<?php echo site_url('subCategory/subCategory/allsubCategory'); ?>">
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
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('product/product/allProduct'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                </ul>
            </li>

            <li id="company-menu">
                <a href="#company" data-toggle="collapse">
                    <i class="fa fa-building-o"></i>
                    &nbsp;Company
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="company" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('company/company');?>">
                            <i class="fa fa-angle-right"></i>
                            Add Company
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('company/company/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Company
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('company/transaction/'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Transaction
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('company/all_transaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Transaction
                        </a>
                    </li>
                    
                    <li>
                    	<a href="<?php echo site_url('company/company/ad_brand'); ?>">
                    		<i class="fa fa-angle-right"></i>
                    		Add Brand
                    	</a>
                    </li>
                </ul>
            </li>

            <li id="client-menu">
                <a href="#client" data-toggle="collapse">
                    <i class="fa fa-users"></i>
                    &nbsp;Customer
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="client" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('client/client');?>">
                            <i class="fa fa-angle-right"></i>
                            Add Customer
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('client/client/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Customer
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('client/transaction/'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add Transaction
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('client/all_transaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Transaction
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url("client/brand_search"); ?>" >
                            <i class="fa fa-angle-right"></i>
                            Company Wise Search
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
                        <a href="<?php echo site_url('purchase/doPurchase'); ?>">
                            <i class="fa fa-angle-right"></i>
                            DO Purchase
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('purchase/purchase'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Retail Purchase
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('purchase/purchase/show_purchase'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                </ul>
            </li>

            <li id="stock_menu">
                <a href="#stock" data-toggle="collapse">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    &nbsp;Stock
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="stock" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('stock/stock'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Retail Stock
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('stock/stock/do_stock'); ?>">
                            <i class="fa fa-angle-right"></i>
                            DO Stock
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('stock/stock_distribution'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Stock Distribution
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('stock/stock_distribution/distribution_records'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Distribution Records
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('stock/stock_distribution/distribution_return'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Distribution Return
                        </a>
                    </li>
                </ul>
            </li>

            <li id="sale_menu">
                <a href="#sale" data-toggle="collapse">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Sale
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="sale" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('sale/do_sale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            DO Sale
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('sale/sale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Retail Sale
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('sale/searchSale'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('sale/due'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Due List
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('sale/do_search'); ?>">
                            <i class="fa fa-angle-right"></i>
                            DO Search
                        </a>
                    </li>
                </ul>
            </li>



            <li id="order-menu">
                <a href="#order" data-toggle="collapse">
                    <i class="fa fa-male"></i>
                    Order
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="order" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('order/order');?>">
                            <i class="fa fa-angle-right"></i>
                            New Order
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('order/order/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Order
                        </a>
                    </li>
                </ul>
            </li>

            <li id="employee_menu">
                <a href="#employee" data-toggle="collapse">
                    <i class="fa fa-male"></i>
                    &nbsp;Employee
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="employee" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('employee/employee');?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('employee/employee/show_employee'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>

                </ul>
            </li>

            <li id="cost_menu">
                <a href="#cost" data-toggle="collapse">
                    <i class="fa fa-money"></i>
                    &nbsp;Cost
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="cost" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('cost/cost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('cost/cost/showCost'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('cost/cost/cost_type_purpose'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Type & Purpose
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('cost/cost/physicalcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                           Physical Cost
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('cost/cost/showphysicalcost'); ?>">
                            <i class="fa fa-angle-right"></i>
                           Show Physical Cost
                        </a>
                    </li>
                </ul>
            </li>

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
                            Company
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('ledger/clientLedger'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Customer
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('ledger/showroomLedger'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Showroom
                        </a>
                    </li>
                </ul>
            </li>

            <li id="bank_menu">
                <a href="#bank" data-toggle="collapse">
                    <i class="fa fa-university"></i>
                    &nbsp;Bank
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="bank" class="sidebar-nav collapse">
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
                        <a href="<?php echo site_url('bank/bankInfo/allTransaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Transaction
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('bank/bankInfo/searchViewTransaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Search Trnasaction
                        </a>
                    </li>
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
                        <a href="<?php echo site_url('loan/loan'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Received & Paid
                        </a>
                    </li>


                    <li>
                        <a href="<?php echo site_url('loan/loan/view_all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All Loan
                        </a>
                    </li>


                    <li>
                        <a href="<?php echo site_url('loan/loan/transaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Transaction
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('loan/loan/alltransaction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All Transaction
                        </a>
                    </li>

                </ul>
            </li>


            <li id="cheque_menu">
                <a href="<?php echo site_url('chaque/chaque'); ?>">
                    <i class="fa fa-cc-diners-club" aria-hidden="true"></i>
                    &nbsp; Cheque Issue
                </a>
            </li>

			<li id="salary_menu">
                <a href="#salary" data-toggle="collapse">
                    <i class="fa">৳</i> Salary
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="salary" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('salary/salary');?>">
                            <i class="fa fa-angle-right"></i>
                            Basic
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('salary/salary/incentive'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Incentive
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('salary/salary/bonus'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Bonus
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('salary/salary/deduction'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Deduction
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

                    <li>
                        <a href="<?php echo site_url('salary/salary/report'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Report
                        </a>
                    </li>
                </ul>
            </li>


             <li id="target-menu">
                <a href="<?php echo site_url("target_commission/target_commission"); ?>">
                    <i class="fa fa-gamepad" aria-hidden="true"></i>
                    &nbsp; Target Commission
                </a>
            </li>


            <li id="profite_menu">
                <a href="#profite" data-toggle="collapse">
                    <i class="fa fa-money"></i>&nbsp;
                    Profit & Loss
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="profite" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('profite/profite');?>">
                            <i class="fa fa-angle-right"></i>
                            Product
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('profite/profite/brand_wise'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Company
                        </a>
                    </li>
                </ul>
            </li>


             <!-- Frontent Product Image  Start-->
            <li id="f_product_menu">
                <a href="#f_product" data-toggle="collapse">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    &nbsp; Front-End Product
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="f_product" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('frontproduct/product'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('frontproduct/product/allProduct'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
                </ul>
            </li>


            <li id="gallery-menu">
                <a href="<?php echo site_url("photo_gallery/photo_gallery"); ?>">
                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                    &nbsp;Photo Gallery
                </a>
            </li>


            <!-- Frontent Product Image  End -->

            <li id="sister_concern_menu">
                <a href="#sister_concern" data-toggle="collapse">
                    <i class="fa fa-paw" aria-hidden="true"></i>
                    &nbsp; Sister Concern
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="sister_concern" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('sister_concern/sister_concern'); ?>">
                            <i class="fa fa-angle-right"></i>
                            Add New
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('sister_concern/sister_concern/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            View All
                        </a>
                    </li>
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


            <li id="privilege-menu">
                <a href="<?php echo site_url('privilege/privilege');?>">
                    <i class="fa fa-user-plus"></i>&nbsp;
                    Set Privilege
                </a>
            </li>

            <li id="commission-menu">
                <a href="#commission" data-toggle="collapse">
                    <i class="fa fa-money"></i>&nbsp;
                    Commission
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="commission" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('commission/sale_commission');?>">
                            <i class="fa fa-angle-right"></i>
                            Sale Commission
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url('commission/client_commission');?>">
                            <i class="fa fa-angle-right"></i>
                            Customer Commission
                        </a>
                    </li>
                </ul>
            </li>

            <li id="report-settings">
                <a href="<?php echo site_url('report/report');?>">
                    <i class="fa fa-area-chart" aria-hidden="true"></i> &nbsp;
                    Expenditure
                </a>
            </li>

			<li id="general-settings">
                <a href="<?php echo site_url('generalSettings');?>">
                    <i class="fa fa-money"></i>&nbsp;
                    General Settings
                </a>
            </li>

            <li id="colloction_sheet_menu">
                <a href="<?php echo site_url('sheet/sheet'); ?>">
                    <i class="fa fa-clone"></i>
                    &nbsp;Collection Sheet
                </a>
            </li>

            <li id="collection">
                <a href="<?php echo site_url('sheet/showroom_collection'); ?>">
                    <i class="fa fa-clone"></i>
                    &nbsp;Collection From Showroom
                </a>
            </li>


            <!-- li id="initial_balance_menu">
                <a href="<?php echo site_url('initial_balance/initial_balance'); ?>">
                    <i class="fa fa-clone"></i>
                    &nbsp;Initial Balance
                </a>
            </li -->


            <li id="backup_menu">
                <a href="<?php echo site_url('data_backup'); ?>">
                    <i class="fa fa-database"></i>
                    &nbsp;Data Backup
                </a>
            </li>
        </ul>
    </nav>
</aside>
<!-- /#sidebar-wrapper -->

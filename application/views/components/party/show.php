<style>
    @media print {
        aside {display: none !important;}
        nav {display: none;}
        .panel {
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .none {display: none;}
        .panel-heading {display: none;}
        .panel-footer {display: none;}
        .panel .hide {display: block !important;}
        .title {font-size: 25px;}
        table tr th, table tr td {font-size: 12px;}
        .print_banner_logo {width: 19%;float: left;}
        .print_banner_logo img {margin-top: 10px;}
        .print_banner_text {width: 80%;float: right;text-align: center;}
        .print_banner_text h2 {margin: 0;line-height: 38px;text-transform: uppercase !important;}
        .print_banner_text p {margin-bottom: 5px !important;}
        .print_banner_text p:last-child {padding-bottom: 0 !important;margin-bottom: 0 !important;}
    }
    .table tr th {width: 22%;}
    .ml {margin-left: 8px;}
    .width-sl {width: 10px !important;}
    .width-cm {width: 50% !important;}
</style>
<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Profile</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
                       onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            <div class="panel-body" ng-cloak>
                <!-- Print banner Start Here -->
                <?php $this->load->view('print', $this->data); ?>
                <!-- Print banner End Here -->
                <!--<h4 class="text-center hide" style="margin-top: 0px;">Profile</h4>-->
                <div class="col-md-12 text-center hide">
                    <h3><?php echo filter($info->type); ?> Profile</h3>
                </div>
                <table class="table table-bordered table-hover">

                    <img style="width: 150px; margin: 10px; padding: 5px; border: 1px solid #ccc;"
                         src="<?php echo site_url($info->path); ?>">
                    <tr>
                        <th>Name</th>
                        <td><?php echo filter($info->name); ?></td>

                        <th>Opening Date</th>
                        <td> <?php echo d_formate($info->opening); ?> </td>
                    </tr>

                    <tr>
                        <th>Code</th>
                        <td><?php echo $info->code; ?></td>

                        <th>NID No.</th>
                        <td><?php echo $info->id_card; ?></td>
                    </tr>

                    <tr>
                        <th>Contact Person</th>
                        <td><?php echo filter($info->contact_person); ?></td>

                        <th>Initial Balance</th>
                        <td>
                            <?php echo $info->initial_balance; ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Mobile</th>
                        <td><?php echo $info->mobile; ?></td>
                        <th>Current Balance</th>
                        <td>
                            <?php
                            $balanceInfo = get_party_balance($info->code);
                            echo $balanceInfo['balance'] . ' ৳';
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td><?php echo filter($info->address); ?></td>
                        <th>Type</th>
                        <td><?php echo filter($info->type); ?></td>
                    </tr>

                    <tr>
                        <th>Dealer Type</th>
                        <td><?php echo filter($info->dealer_type); ?></td>
                        <th>Customer Type</th>
                        <td><?php echo filter($info->customer_type); ?></td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td><?php echo filter($info->status); ?></td>
                        <th>Showroom</th>
                        <td><?php echo filter($info->godown_name); ?></td>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        <!--Sale-->
        <!--End Sale-->



        <!--Commitment-->
        <?php if (!empty($commitments)) { ?>
            <div class="panel panel-default none">
                <div class="panel-heading">
                    <div class="panal-header-title">
                        <h1 class="pull-left">কমিটমেন্ট</h1>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="width-sl">#</th>
                            <th>গ্রাহকের নাম</th>
                            <th>তারিখ</th>
                            <th>মোবাইল</th>
                            <th class="width-cm">কমিটমেন্ট</th>
                            <th>ঠিকানা</th>
                        </tr>
                        <?php foreach ($commitments as $key => $commitment) { ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $info->name; ?></td>
                                <td><?php echo filter($commitment->date); ?></td>
                                <td><?php echo $info->mobile; ?></td>
                                <td width="40%"><?php echo $commitment->commitment; ?></td>
                                <td><?php echo $info->address; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="panel-footer">&nbsp;</div>
            </div>
        <?php } ?>

        <!--End Commitment-->
        <!--<div class="row none">
            <div class="col-md-12">
                <a class="btn btn-success" href="<?php /*echo site_url('/sale/searchSale/customer/' . $info->code); */?>"
                   target="_blank">
                    বিক্রয় দেখুন
                </a>
                <a class="btn btn-danger" href="<?php /*echo site_url('/ledger/clientLedger/customer/' . $info->code); */?>"
                   target="_blank">
                    লেজার দেখুন
                </a>
            </div>
        </div>-->
    </div>
</div>
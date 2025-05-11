<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700,900" rel="stylesheet">
<style>
    @media print {
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }
        .panel {
            border: 1px solid transparent;
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
        }
        .hide {display: block !important;}
        .custom-table > tbody > tr > th,
        .custom-table > tbody > tr > td {
            color: #000 !important;
        }
    }
    @page {margin: 0;}
    .custom-table > tbody > tr > th,
    .custom-table > tbody > tr > td {
        border: none;
        line-height: 18px;
        padding: 4px !important;
    }
    .custom-table > tbody > tr > th {
        width: 140px;
    }
    .invoice {
        border: 1px solid #313131;
        border-radius: 15px;
        padding: 3px 12px;
        font-size: 15px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default ">
            <div class="panel-heading none">
                <div class="panal-header-title">
                    <h1 class="pull-left">Voucher Details</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
                       onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php $this->load->view('print', $this->data); ?>
                <!-- Print banner End Here -->
                <div class="col-md-12 text-center hide">
                    <h3 class="invoice">Purchase Invoice</h3>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <table class="table custom-table view">
                            <tr>
                                <th>Name :</th>
                                <td><?php echo filter($voucherInfo->name); ?></td>
                            </tr>
                            <tr>
                                <th>Address :</th>
                                <td><?php echo filter($voucherInfo->address); ?></td>
                            </tr>
                            <tr>
                                <th>Mobile :</th>
                                <td><?php echo filter($voucherInfo->mobile); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-6">
                        <table class="table custom-table">
                            <tr>
                                <th>Voucher No :</th>
                                <td><?php echo $voucherInfo->voucher_no; ?></td>
                            </tr>
                            <tr>
                                <th width="200">Date :</th>
                                <td><?php echo $voucherInfo->created_at; ?></td>
                            </tr>
                            <?php if (!empty($voucherInfo->delivery_date)){ ?>
                            <tr>
                                <th>Delivery Date :</th>
                                <td><?php echo $voucherInfo->delivery_date; ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tr class="view">
                        <th width="50">Sl</th>
                        <th>Product Name</th>
                        <th>Model</th>
                        <th>Particular</th>
                        <th width="150">Quantity</th>
                    </tr>
                    <?php
                    if (!empty($voucherItems)) {
                        foreach ($voucherItems as $key => $row) { ?>
                            <tr>
                                <td><?php echo($key + 1); ?></td>
                                <td><?php echo filter($row->product_cat); ?></td>
                                <td><?php echo filter($row->product_model); ?></td>
                                <td><?php echo filter($row->particular); ?></td>
                                <td><?php echo $row->quantity; ?></td>
                            </tr>
                        <?php }
                    } ?>

                    <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <th><?php echo $voucherInfo->total_quantity; ?></th>
                    </tr>
                    <tr>
                        <th colspan="5" style="color: red;">Remarks: <?php echo $voucherInfo->remarks; ?></th>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
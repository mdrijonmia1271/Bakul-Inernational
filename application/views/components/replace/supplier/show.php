<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700,900" rel="stylesheet">
<style>
    @media print {
        .custom-table > tbody > tr > th,
        .custom-table > tbody > tr > td {
            color: #000 !important;
        }

        .remarks {
            color: #ff0000 !important;
        }
    }

    @page {
        margin: 0;
    }

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
        padding: 5px 20px;
        font-size: 16px;
        display: inline-block;
    }

    .remarks {
        color: #ff0000;
    }

    .signature_box {
        justify-content: space-between;
        margin-top: 55px;
        display: flex;
        width: 100%;
    }

    .signature_box h5 {
        border-top: 2px dashed #313131;
        display: inline-block;
        padding: 5px 0;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default ">
            <div class="panel-heading none">
                <div class="panal-header-title">
                    <h1 class="pull-left">Show Details</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
                       onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php $this->load->view('print', $this->data); ?>
                <!-- Print banner End Here -->
                <div class="col-md-12 text-center hide">
                    <h3 class="invoice">
                        <?php echo ($voucherInfo->status == "supplier_receive") ? "Supplier Replace Receive" : "Supplier Replace Delivery"; ?>
                    </h3>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <table class="table custom-table view">
                            <tr>
                                <th>Name :</th>
                                <td><?php echo filter($partyInfo->name); ?></td>
                            </tr>
                            <tr>
                                <th>Address :</th>
                                <td><?php echo filter($partyInfo->address); ?></td>
                            </tr>
                            <tr>
                                <th>Mobile :</th>
                                <td><?php echo filter($partyInfo->mobile); ?></td>
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
                            <?php if (!empty($voucherInfo->delivery_date)) { ?>
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
                        <?php if ($voucherInfo->status == 'supplier_delivery') { ?>
                            <th>Serial No</th>
                        <?php } ?>
                        <th width="150" class="text-right">Quantity</th>
                    </tr>
                    <?php
                    if (!empty($voucherItems)) {
                        foreach ($voucherItems as $key => $row) { ?>
                            <tr>
                                <td><?php echo($key + 1); ?></td>
                                <td><?php echo filter($row->product_cat); ?></td>
                                <td><?php echo filter($row->product_model); ?></td>
                                <?php if ($voucherInfo->status == 'supplier_delivery') { ?>
                                    <td><?php echo filter($row->product_serial); ?></td>
                                <?php } ?>
                                <td class="text-right"><?php echo $row->quantity; ?></td>
                            </tr>
                        <?php }
                    } ?>

                    <?php $colspan = ($voucherInfo->status == 'supplier_delivery' ? 5 : 4); ?>

                    <tr>
                        <th colspan="<?php echo ($voucherInfo->status == 'supplier_delivery' ? 4 : 3); ?>" class="text-right">Total</th>
                        <th class="text-right"><?php echo $voucherInfo->total_quantity; ?></th>
                    </tr>

                    <?php
                    if (empty($replaceItems)) {
                        if ($voucherInfo->replace_type == 'amount') { ?>
                            <tr>
                                <th colspan="<?php echo $colspan; ?>">Replace Amount: <?php echo $voucherInfo->replace_amount; ?> Tk</th>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th colspan="<?php echo $colspan; ?>" class="remarks">Remarks: <?php echo $voucherInfo->remarks; ?></th>
                        </tr>
                    <?php } ?>
                </table>

                <!-- replace items -->
                <?php if (!empty($replaceItems)) { ?>
                    <table class="table table-bordered">
                        <tr>
                            <th colspan="4" class="text-center">Replace Product</th>
                        </tr>
                        <tr class="view">
                            <th width="50">Sl</th>
                            <th>Product Name</th>
                            <th>Model</th>
                            <th width="150" class="text-right">Quantity</th>
                        </tr>
                        <?php
                        $totalQuantity = 0;
                        foreach ($replaceItems as $key => $row) {
                            $totalQuantity += $row->quantity;
                            ?>
                            <tr>
                                <td><?php echo($key + 1); ?></td>
                                <td><?php echo filter($row->product_cat); ?></td>
                                <td><?php echo filter($row->product_model); ?></td>
                                <td class="text-right"><?php echo $row->quantity; ?></td>
                            </tr>
                        <?php } ?>

                        <tr>
                            <th colspan="3" class="text-right">Total</th>
                            <th class="text-right"><?php echo $totalQuantity; ?></th>
                        </tr>
                        <tr>
                            <th colspan="4" class="remarks">Remarks: <?php echo $voucherInfo->remarks; ?></th>
                        </tr>
                    </table>
                <?php } ?>


                <div class="hide">
                    <div class="signature_box">
                        <h5>Signature of Customer</h5>
                        <h5>Signature of Authority</h5>
                    </div>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700,900" rel="stylesheet">
<style>
    @media print {
        .custom-table > tbody > tr > th, .custom-table > tbody > tr > td {color: #000 !important;}
        .remarks {color: #ff0000 !important;}
    }
    @page {margin: 0;}
    .custom-table > tbody > tr > th,
    .custom-table > tbody > tr > td {
        border: none;
        line-height: 18px;
        padding: 4px !important;
    }
    .custom-table > tbody > tr > th {width: 140px;}
    .invoice {
        border: 1px solid #313131;
        border-radius: 15px;
        padding: 5px 20px;
        font-size: 16px;
        display: inline-block;
    }
    .remarks {color: #ff0000;}
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
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php $this->load->view('print', $this->data); ?>
                <!-- Print banner End Here -->
                <div class="col-md-12 text-center hide">
                    <h3 class="invoice">
                        <?php echo ($voucherInfo->status == "client_receive") ? "Client Replace Receive" : "Client Replace Delivery"; ?>
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
                        <th>Stock Type</th>
                        <th>Serial No</th>
                        <th width="150" class="text-right">Quantity</th>
                        
                    </tr>
                    <?php if (!empty($voucherItems)) { foreach ($voucherItems as $key => $row) { ?>
                        <tr>
                            <td><?php echo($key + 1); ?></td>
                            <td><?php echo filter($row->product_cat); ?></td>
                            <td>
                                <?php
                                echo ($row->product_model); 
                                $status = ' (Wrong Return)';
                                if ($row->stock_type == 'stock') {
                                    $status = ' (New)';
                                }
                               
                                echo ($voucherInfo->status == 'client_delivery') ? $status : '';
                                ?>
                            </td>
                            <td><?php echo !empty($row->stock_type) ? filter($row->stock_type) : 'N/A'; ?></td>
                            <td><?php echo filter($row->product_serial); ?></td>
                            <td class="text-right"><?php echo $row->quantity .' '. $row->unit; ?></td>
                        </tr>
                    <?php } } ?>
                    <tr>
                        <th colspan="5" class="text-right">Total Qty.</th>
                        <th class="text-right"><?php echo $voucherInfo->total_quantity; ?></th>
                    </tr>
                    <tr>
                        <th colspan="5" class="text-right">Replace Amount</th>
                        <th class="text-right"><?php echo $voucherInfo->replace_amount; ?></th>
                    </tr>
                    <tr>
                        <th colspan="6" class="remarks">Remarks: <?php echo $voucherInfo->remarks; ?></th>
                    </tr>
                </table>
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
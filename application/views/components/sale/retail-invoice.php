<?php   if (isset($meta->header)) {$header_info = json_decode($meta->header, true);}
        if (isset($meta->footer)) {$footer_info = json_decode($meta->footer, true);}
        $logo_data = json_decode($meta->logo, true); ?>
<style>
    .invoice {
        margin-bottom: 12px;
        text-align: center;
    }
    .invoice h4 {
        border: 1px solid #212121;
        border-radius: 25px;
        padding: 4px 25px;
        font-size: 14px;
        display: inline-block;
    }
    .table > tbody > tr > td {
        vertical-align: middle !important;
        padding: 2px 6px
    }
    .banner_img {
        //border-bottom: 1px solid #ddd;
        max-height: 150px;
        height: 100%;
        width: 100%;
        display: none;
        margin-bottom: 10px;
    }
    @page {margin: 0;}
    /*@media print {
        .table > tbody > tr > th,
        .table > tbody > tr > td {padding: 2px 6px;}
        .__print-border {opacity: 0 !important;}
        .banner_img {display: block !important;}
    }*/
    *@media print {
        .table > tbody > tr > th,
        .table > tbody > tr >th > td {padding: 2px 6px;border:1px solid black;}
        .__print-border {opacity: 1 !important;}
    }
    .view {font-family: 'Raleway', sans-serif;}
    .header_info {
        margin-bottom: 15px;
        flex-wrap: wrap;
        display: flex;
        width: 100%;
    }
    .header_info li {
        min-width: 220px;
        width: 33%;
        font-size: 15px;
        margin: 5px 0;
    }
    .header_info li strong {
        display: inline-block;
        min-width: 85px;
    }
    .signature_box {
        border: 1px solid transparent;
        margin-top: 45px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .signature_box h4 {
        border-top: 2px dashed #212121;
        color: #212121;
        padding: 6px 0;
        margin: 0;
        font-size: 17px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default ">
            <div class="panel-heading none">
                <div class="panal-header-title">
                    <h1 class="pull-left">Voucher</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print', $this->data); ?>
                
                <div class="custom-header"></div>
                <!-- Print banner End Here -->
                <div class="col-md-12 invoice hide">
                    <h4>Cash Sale Invoice</h4>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php $address  = "N/A"; $patyInfo = json_decode($info->address);?>
                        <ul class="header_info">
                            <li><strong>Name</strong> : <?php echo filter($info->party_code); ?></li>
                            <li><strong>Voucher No</strong> : <?php echo $info->voucher_no; ?></li>
                            <li><strong>Mobile</strong> : <?php echo $patyInfo->mobile; ?></li>
                            <li><strong>Date</strong> : <?php echo d_formate($info->sap_at); ?></li>
                            <li><strong>Address</strong> : <?php echo $patyInfo->address; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40px">SL</th>
                                    <th>Product</th>
                                    <th width="80px">Serial</th>
                                    <th style="width:80px; text-align:center">Qty</th>
                                    <th style="width:100px; text-align: right;">Price</th>
                                    <th style="width:80px; text-align: right;">Dis(Tk)</th>
                                    <th style="width:120px; text-align: right;">Total(TK)</th>
                                </tr>
                                <?php
                                $total_sub = $total_dis = 0;
                                $where     = [
                                    'sapitems.voucher_no' => $info->voucher_no,
                                    'sapitems.trash'      => 0,
                                    'sapitems.status'      => 'sale',
                                ];
                                $select = ['sapitems.*', 'products.product_name', 'products.product_cat',  'products.subcategory', 'products.brand'];
                                $saleInfo  = get_join('sapitems', 'products', 'sapitems.product_code=products.product_code', $where, $select);

                                foreach ($saleInfo as $key => $row) {
                                    $product = get_result('products', ['product_code'=>$row->product_code]);
                                    $total_dis += $row->discount;
                                    $subtotal  = ($row->sale_price * $row->quantity) - $row->discount;
                                    $total_sub += $subtotal;
                                    ?>
                                    <tr>
                                        <td><?php echo($key + 1); ?></td>
                                        <td ><?php echo filter($row->product_model); ?></td>
                                        <td class="text-center"><?php echo $row->product_serial; ?></td>
                                        <td class="text-center"><?php echo number_format($row->quantity, 2); ?></td>
                                        <td class="text-right"> <?php echo $row->sale_price; ?></td>
                                        <td class="text-right"> <?php echo $row->discount;?></td>
                                        <td class="text-right"> <?php echo f_number($subtotal, 2); ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <th colspan="2" class="text-right">Total Qty</th>
                                    <td class="text-center"><?php echo $info->total_quantity; ?></td>
                                    <th colspan="2" class="text-right">Sub Total</th>
                                    <td class="text-right"><?php echo f_number($total_dis); ?></td>
                                    <td class="text-right"><?php echo f_number($total_sub); ?></td>
                                </tr>
                            </table>
                            
                            <?php
                                $total_sub = $total_dis = 0;
                                $where     = [
                                    'sapitems.voucher_no' => $info->voucher_no,
                                    'sapitems.trash'      => 0,
                                    'sapitems.status'      => 'sale_purchase',
                                ];
                                $select = ['sapitems.*', 'products.product_name', 'products.product_cat',  'products.subcategory', 'products.brand'];
                                $saleInfoReturn  = get_join('sapitems', 'products', 'sapitems.product_code=products.product_code', $where, $select);
                                if(!empty($saleInfoReturn)){
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 40px;">SL</th>
                                    <th>Product</th>
                                    <th style="width: 80px; text-align:center">Qty</th>
                                    <th style="width: 120px; text-align:center">Qty In Kg</th>
                                    <th style="width: 120px; text-align: right;">Price</th>
                                    <th style="width: 120px; text-align: right;">Total(TK)</th>
                                </tr>
                                <?php
                                foreach ($saleInfoReturn as $key => $row) {
                                    $product = get_result('products', ['product_code'=>$row->product_code]);
                                    $total_dis += $row->discount;
                                    $subtotal  = ($row->purchase_price * $row->quantity) - $row->discount;
                                    $total_sub += $subtotal;
                                    ?>
                                    <tr>
                                        <td><?php echo($key + 1); ?></td>
                                        <td><?php echo filter($row->product_model); ?></td>
                                        <td class="text-center"><?php echo number_format($row->quantity, 0); ?></td>
                                        <td class="text-center"><?php echo number_format($row->return_quantity_kg, 0); ?></td>
                                        <td class="text-right"> <?php echo $row->purchase_price; ?></td>
                                        <td class="text-right"> <?php echo f_number($subtotal, 2); ?></td>
                                    </tr>
                                <?php } ?>
                                
                                <tr>
                                    <th rowspan="6" colspan="4" style="padding-top: 55px;">
                                        In Word : <span id="inwords"></span> Taka Only.
                                    </th>
                                </tr>
                                <tr>
                                    <th>Discount(%)</th>
                                    <td class="text-right">
                                        <?php
                                            $total_discount = $info->total_discount;
                                            echo f_number($info->total_discount, 2);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Return</th>
                                    <td class="text-right">
                                        <?php echo f_number($info->total_return, 2);?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Grand Total</th>
                                    <td class="text-right">
                                        <?php
                                            $total = $info->total_bill;
                                            echo f_number($total, 2);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Paid</th>
                                    <td class="text-right"><?php echo f_number($info->paid);?></td>
                                </tr>
                                <tr>
                                    <th>Due</th>
                                    <td class="text-right"><?php echo f_number($info->due);?></td>
                                </tr>
                                <tr>
                                    <th>Remark</th>
                                    <td colspan="5" class="text-right">
                                        <?php echo $info->comment;?>
                                    </td>
                                </tr>
                            </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php $userName = get_name("sapmeta", "meta_value", ["meta_key" => "sale_by", "voucher_no" => $info->voucher_no]); ?>
                <div class="signature_box">
                    <h4>Signature of Customer</h4>
                    <h4>Signature of Seller</h4>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script src="<?php echo site_url("private/js/inworden.js"); ?>"></script>
<script>
    $(document).ready(function () {
        $(".inwords").html(inWorden(<?php echo $gtotal; ?>));
    });
</script>
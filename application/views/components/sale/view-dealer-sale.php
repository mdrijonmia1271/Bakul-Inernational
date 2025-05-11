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
                <!--<img class="banner_img" src="<?php //echo site_url('private/images/print_banner_img.jpg')?>" alt="">-->
                <!-- Print banner End Here -->
                <div class="col-md-12 invoice hide">
                    <h4>Dealer Sale Invoice</h4>
                </div>
                <div class="row">
                    <?php
                        $info = $this->action->read("sapmeta", array("meta_key" => "sale_by", "voucher_no" => $result[0]->voucher_no));
                        $address = "N/A";
                        $cdata   = json_decode($result[0]->address, true);
                        if(!empty($cdata['address'])){
                            $address = $cdata['address'];
                        }
                        
                        if ($result[0]->sap_type != "cash") {

                        $where      = array('code' => $result[0]->party_code);
                        $party_info = $this->action->read('parties', $where);
                        $address    = ($party_info) ? $party_info[0]->address : " ";
                    ?>
                    <div class="col-xs-12">
                        <ul class="header_info">
                            <li><strong>Name</strong> : <?php if ($party_info != null) {echo filter($party_info[0]->name);} else {echo "N/A";}?></li>
                            <li><strong>Customer ID</strong> : <?php echo $result[0]->party_code;?></li>
                            <li><strong>Voucher No</strong> : <?php echo $result[0]->voucher_no; ?></li>
                            <li><strong>Mobile</strong> : <?php if ($party_info != null) {echo $party_info[0]->mobile;} else {echo "N/A";}?></li>
                            <?php } else { ?>
                                <li><strong>Name</strong> : <?php echo filter($result[0]->party_code); ?></li>
                                <li><strong>Mobile</strong> : <?php echo $cdata['mobile']; ?></li>
                            <?php } ?>
                            
                            <?php if ($result[0]->sap_type == "cash") { ?>
                                <li><strong>Address</strong> : <?php echo $address;?></li>
                                <li><strong>Date</strong> : <?php echo d_formate($result[0]->sap_at);?></li>
                            <?php } else { ?>
                                <li><strong>Date</strong> : <?php echo d_formate($result[0]->sap_at); ?></li>
                            <?php } ?>
                            <li><strong>Address</strong> : <?php echo $address; ?></li>
                        </ul>
                    </div>
                </div>
                
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th width="230">Product Name</th>
                        <!--<th width="250">Product</th>-->
                        <th>Serial No.</th>
                        <!--<th>Category </th>
                        <th>SubCategory </th>
                        <th>Brand </th>-->
                        <th class="text-center">Qty</th>
                        <th>Price</th>
                        <!--<th width="100">Comm.(%)</th>-->
                        <th>Comm.</th>
                        <th>Total (TK)</th>
                    </tr>
                    <?php
                    $total_sub = $total_com = 0;
                    $where     = array('voucher_no' => $result[0]->voucher_no,'status' => 'sale');
                    $saleInfo  = get_result('sapitems', $where);
                    foreach ($saleInfo as $key => $row) {
                        $product = get_result('products', ['product_code'=>$row->product_code]);
                        ?>
                        <tr>
                            <td style="width: 50px;"><?php echo($key + 1); ?></td>
                           
                            <?php
                            $where       = array('code' => $row->product_code);
                            $productInfo = $this->action->read('stock', $where);
                           /* if ($productInfo) {
                                echo filter($productInfo[0]->subcategory);
                            }*/
                            ?>
                           
                            <td><?php echo ($productInfo) ? filter($productInfo[0]->product_model) : '' ?></td>
                            <td><?php echo $row->product_serial;?></td>
                            <td class="text-center"><?php echo $row->quantity; ?></td>
                            <td class="text-center"><?php echo $row->sale_price; ?></td>
                            <td class="text-right"><?php echo f_number($row->discount); ?></td>
                            <td class="text-right">
                                <?php
                                    $subtotal  = ($row->sale_price * $row->quantity - $row->discount);
                                    $total_sub += $subtotal;
                                    $total_com += $row->discount;
                                    echo f_number($subtotal, 2);
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="3" class="text-right">Total Qty</th>
                        <td class="text-center"><?php echo $result[0]->total_quantity; ?></td>
                        <th class="text-right">Sub Total</th>
                        <th class="text-right">
                            <?php echo f_number($total_com);?>
                        </th>
                        <td class="text-right"><?php echo f_number($total_sub, 2); ?></td>
                    </tr>
                </table>
               <?php
                    $total_dis = 0;
                    $where     = [
                        'sapitems.voucher_no' => $_GET['vno'],
                        'sapitems.trash'      => 0,
                        'sapitems.status'      => 'sale_purchase',
                    ];
                    $select = ['sapitems.*', 'products.product_name', 'products.product_cat',  'products.subcategory', 'products.brand'];
                    $saleInfo  = get_join('sapitems', 'products', 'sapitems.product_code=products.product_code', $where, $select);
                ?>
                
                
                <?php if(!empty($saleInfo)){ ?>
                
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 5%;">SL</th>
                        <th style="width: 22%;">Product Name</th>
                        <!--<th> Category </th>
                        <th> SubCategory </th>
                        <th> Brand </th>-->
                        <th style="width: 8%;text-align:center">Qty</th>
                        <th style="width: 8%;text-align:center">Qty In Kg</th>
                        <th style="width: 10%;">Price</th>
                        <th style="width: 20%;">Total (TK)</th>
                    </tr>
                        <?php
                        $total_ret_sub = 0;
                            foreach ($saleInfo as $key => $row) {
                                $product = get_result('products', ['product_code'=>$row->product_code]);
                                $total_dis += $row->discount;
                                $subtotal  = ($row->purchase_price * $row->quantity) - $row->discount;
                                $total_ret_sub += $subtotal;
                            ?>
                            <tr>
                                <td style="width: 50px;"><?php echo($key + 1); ?></td>
                                <td> <?php echo filter($row->product_model); ?> </td>
                                <td class="text-center"><?php echo number_format($row->quantity, 2); ?></td>
                                <td class="text-center"><?php echo number_format($row->return_quantity_kg, 2); ?></td>
                                <td class="text-right"> <?php echo $row->purchase_price; ?></td>
                                <td class="text-right"> <?php echo f_number($total_ret_sub, 2); ?></td>
                            </tr>
                        <?php }} ?>
                </table>
                <table class="table table-bordered">
                    <tr>
                        <th rowspan="7" colspan="3" style="padding-top: 75px;"> 
                            In Word : <span class="inword"></span> Taka Only.
                        </th>
                    </tr>

                    <tr>
                        <th>
                           Discount
                        </th>
                        <td class="text-right">
                            <?php
                            $total_discount = $result[0]->total_discount - $total_com;
                            echo f_number($total_discount); 
                            ?>
                        </td>
                    </tr>
                    
                     <tr>
                        <th>Total Return</th>
                        <td class="text-right">
                            <?php
                                $total_return = $result[0]->total_return;
                                echo f_number($result[0]->total_return, 2);
                            ?>
                        </td>
                    </tr>


                    <tr>
                        <th>Previous Balance</th>
                        <td class="text-right">
                            <?php
                            $where      = array('relation' => 'sales:' . $result[0]->voucher_no);
                            $current_sl = get_row('partytransaction', $where, 'id');

                            $where = array(
                                'party_code' => $result[0]->party_code,
                                'id <'       => $current_sl->id,
                                'trash'      => 0
                            );

                            $transactionRec = $this->retrieve->read('partytransaction', $where);
                            $total_credit   = $total_debit = $total_remission = 0.0;
                            if ($transactionRec != null) {
                                foreach ($transactionRec as $key => $row) {
                                    $total_credit    += $row->credit;
                                    $total_debit     += $row->debit;
                                    $total_remission += $row->remission;
                                }
                                $balance = $total_debit - $total_credit - $total_remission + $result[0]->initial_balance;
                            } else {
                                $balance = $result[0]->initial_balance;
                            }
                            $status  = ($balance < 0) ? " Payable" : " Receivable";
                            $status2 = ($balance < 0) ? "-" : "";
                            //echo 'aaaaaaaaaaaaa';
                            echo  f_number($balance, 2);
                            ?>

                        </td>
                    </tr>
                    <tr>
                        <th>Grand Total</th>
                        <td class="text-right">
                            <?php
                                $inword = $gtotal = $total = ($balance + $total_sub) - ($total_discount + $total_return);
                                echo f_number($total, 2);
                            ?>
                        </td>
                    </tr>
                    <?php
                    if ($result[0]->sap_type == 'cash') {
                        $due_paid          = $due = 0.00;
                        $where             = array('voucher_no' => $result[0]->voucher_no);
                        $due_paid_sum      = $this->action->read_sum('due_collect', 'paid', $where);
                        $due_remission_sum = $this->action->read_sum('due_collect', 'remission', $where);

                        $paid      = $result[0]->paid + $due_paid_sum[0]->paid;
                        $remission = ($due_remission_sum[0]->remission != null) ? $due_remission_sum[0]->remission : 0.00;
                        $due       = $total - $paid - $remission;
                    } else {
                        $paid      = $result[0]->paid;
                        $remission = 0.00;
                    }
                    ?>
                    <tr>
                        <th>Paid</th>
                        <td class="text-right"><?php echo f_number($paid, 2); ?></td>
                    </tr>

                    <!--previous current Balance-->
                    <tr>
                        <th>Due</th>
                        <td class="text-right">
                            <?php
                                $current_status = ($total - $paid < 0) ? "Payable" : "Receivable";
                                echo f_number(abs($total - $paid), 2);
                            ?>
                        </td>
                    </tr>
                </table>

                <?php
                    $info = $this->action->read("sapmeta", array("meta_key" => "sale_by", "voucher_no" => $result[0]->voucher_no));
                ?>
                <div class="signature_box">
                    <h4>Signature of Customer</h4>
                    <h4>Signature of Seller</h4>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo site_url("private/js/inworden.js"); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".inword").html(inWorden(<?php echo abs($inword); ?>)) ;
    });
</script>
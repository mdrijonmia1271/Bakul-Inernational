<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{display: block !important;}
        .panel-body {height: 96vh;}
        .table-bordered,
        .print-font {font-size: 16px;}
        .print_banner_logo {width: 19%;float: left;}
        .print_banner_logo img {margin-top: 10px;}
        .print_banner_text {width: 80%; float: right;text-align: center;}
        .print_banner_text h2 {margin:0;line-height: 38px;text-transform: uppercase !important;}
        .print_banner_text p {margin-bottom: 5px !important;}
        .print_banner_text p:last-child {padding-bottom: 0 !important;margin-bottom: 0 !important;}
    }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default ">
            <div class="panel-heading none">
                <div class="panal-header-title">
                    <h1 class="pull-left">Voucher </h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            
            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php $this->load->view('print', $this->data); ?>
                <!-- Print banner End Here -->

                <div class="row">
                    <div class="col-xs-8 print-font">
                        <label style="margin-bottom: 10px;">
                            Voucher No:
                            <?php
                            //echo $party_code . $info->id;
                            echo ($info->inc_code != '') ? $info->inc_code : '';
                            ?>
                        </label> <br>

                        <label style="margin-bottom: 10px;">
                            <?php echo filter($info->type); ?>: <?php  echo $info->name; ?>
                        </label>
                    </div>

                    <div class="col-xs-4 print-font">
                        <label>Date: <?php echo d_formate($info->transaction_at); ?></label> <br>
                        <label>Print Time: <?php echo date("h:i:s A"); ?></label>
                    </div>
                </div>

                <?php
                $paid = ($info->debit > 0 ? $info->debit : $info->credit);
                $label = ($info->remission > 0 ? 'Remission' : 'Commission');
                $remisssion = ($info->remission > 0 ? $info->remission : $info->comission);
                ?>

                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">Showroom</th>
                        <th class="text-center">Paid</th>
                        <th class="text-center"><?php echo $label; ?></th>
                        <th class="text-center">Payment Method</th>
                        <th class="text-center">Previous Balance (৳)</th>
                        <th class="text-center">Balance (৳)</th>
                        <th width="100">Transaction By</th>
                    </tr>

                    <tr>
                        <td class="text-center">
                            <?php   $showroom = get_name('godowns', 'name', ['code'=>$info->godown_code]);
                            echo (!empty($showroom) ? $showroom : ''); ?>
                        </td>
                        <td class="text-center"><?php echo $paid; ?></td>
                        <td class="text-center"><?php echo $remisssion; ?></td>
                        <td class="text-center"><?php echo ucfirst($info->transaction_via); ?></td>
                        <td>
                            <?php
                                $init_blnc = get_name('parties','initial_balance',['code' => $info->party_code]);
                                
                                
                                $where = array(
                                                'party_code' => $info->party_code,
                                                'id <' => $info->id,
                                                'trash' => 0
                                                );
                                $transactionRec = $this->retrieve->read('partytransaction', $where);
                    
                                $total_credit = $total_debit = $comission = 0.0;
                                if ($transactionRec != null) {
                                    foreach ($transactionRec as $key => $row) {
                                        $total_credit += $row->credit;
                                        $comission += $row->comission;
                                        $total_debit += $row->debit;
                                    }
                                    $balance = $total_debit -  $total_credit + $init_blnc + $comission;
                                }else{
                                    $balance = $init_blnc;
                                }
                                $balance_status = ($balance >= 0) ?  "Receivable" : "Payable";
                                $balance_status2 = ($balance >= 0) ?  "" : "-";
                                echo $balance.' '.' ['.$balance_status.' ]';
                            
                            ?>
                        </td>
                        <td class="text-center"><?php echo f_number(abs($info->current_balance)); ?></td>
                        <td><?php echo ucfirst($info->comment); ?></td>
                    </tr>

                    <tr>
                        <td colspan="5">In Word: <strong id="inword"></strong> Tk Only.</td>
                    </tr>
                </table>

                <div class="pull-right hide">
                    <h4 style="margin-top: 50px;" class="text-center print-font">
                        -------------------------------- <br>
                        Signature of authority
                    </h4>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo site_url("private/js/inworden.js"); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){ $("#inword").html(inWorden(<?php echo $paid; ?>)); });
</script>

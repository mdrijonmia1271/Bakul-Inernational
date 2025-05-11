<?php
if (isset($meta->header)) {
    $header_info = json_decode($meta->header, true);
}
if (isset($meta->footer)) {
    $footer_info = json_decode($meta->footer, true);
}
$logo_data = json_decode($meta->logo, true);
?>
<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>

<div class="container-fluid" ng-controller="partyLedgerCtrl" ng-cloak>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Ledger</h1>
                </div>
            </div>
            <div class="panel-body none">

                <?php echo form_open(); ?>

                <div class="form-group">
                    <?php if (checkAuth('super')) { ?>
                        <div class="col-md-2">
                            <select name="godown_code" ng-init="godown_code='<?php echo $this->data["branch"]; ?>'"
                                    ng-model="godown_code" class="form-control" required>
                                <option value="" selected disabled>-- Select Showroom --</option>
                                <option value="all">All Showroom</option>
                                <?php if (!empty($allGodown)) {
                                    foreach ($allGodown as $row) { ?>
                                        <option value="<?php echo $row->code; ?>">
                                            <?php echo filter($row->name) . " ( " . $row->address . " ) "; ?>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                        </div>

                    <?php } else { ?>
                        <input type="hidden" name="godown_code"
                               ng-init="godown_code='<?php echo $this->data["branch"]; ?>'" ng-model="godown_code"
                               value="godown_code" required>
                    <?php } ?>

                    <div class="col-md-2">
                        <select name="type" ng-model="party_type" class="form-control">
                            <option value="" selected>-- Select Type --</option>
                            <option value="client">Client</option>
                            <option value="supplier">Supplier</option>
                            <option value="hire">Hire</option>
                            <option value="both">Client/Supplier</option>
                        </select>
                    </div>


                    <div class="col-md-3">
                        <select name="party_code" ui-select2="{ allowClear: true}" class="form-control"
                                ng-model="party_code"
                                data-placeholder="-- Client Select --">
                            <option value="" selected></option>
                            <option ng-repeat="row in partyList" value="{{row.code}}">{{row.code}} - {{row.name}} - {{row.address}} - {{row.mobile}}
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <div class="input-group date" id="datetimepickerFrom">
                            <input type="text" name="dateFrom" value="<?php echo (!empty($_POST['dateFrom']) ? $_POST['dateFrom'] : ''); ?>" class="form-control" placeholder="From">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group date" id="datetimepickerTo">
                            <input type="text" name="dateTo" class="form-control" placeholder="To">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <input type="submit" name="show" value="Search" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php
        if (!empty($defaultData)) { ?>
            <!--Get data before submit result start here-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panal-header-title">
                        <h1 class="pull-left">Show Result</h1>
                        <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
                           onclick="window.print()">
                            <i class="fa fa-print"></i> Print
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <!-- Print banner Start Here -->
                    <?php $this->load->view('print', $this->data); ?>
                    <!-- Print banner End Here -->

                    <div class="col-md-12 text-center hide">
                        <h3 class="text-center">
                            Ledger
                        </h3>
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Showroom</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Address</th>
                            <th>Initial Balance</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Remission</th>
                            <th>Commission</th>
                            <th>Balance</th>
                        </tr>
                        <?php $debit = $credit = $remission = $comission = $balance = 0;
                        foreach ($defaultData as $key => $row) {

                            $debit     += $row['debit'];
                            $credit    += $row['credit'];
                            $remission += $row['remission'];
                            $comission += $row['comission'];
                            $balance   += $row['balance'];
                            ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $row['godown_name']; ?></td>
                                <td><?php echo filter($row['name']);echo '<br>';echo $row['mobile'] ?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo filter($row['address']); ?></td>
                                <td><?php echo f_number($row['initial_balance']); ?></td>
                                <td><?php echo f_number($row['debit']); ?> </td>
                                <td><?php echo f_number($row['credit']); ?> </td>
                                <td><?php echo f_number($row['remission']); ?> </td>
                                <td><?php echo f_number($row['comission']); ?> </td>
                                <td style="color: <?= ($row['balance'] < 0 ? 'red' : 'green') ?>"><?php echo f_number($row['balance']); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th colspan="6" class="text-right">Total</th>
                            <th><?php echo f_number($debit); ?></th>
                            <th><?php echo f_number($credit); ?></th>
                            <th><?php echo f_number($remission); ?></th>
                            <th><?php echo f_number($comission); ?></th>
                            <th style="color: <?= ($balance < 0 ? 'red' : 'green') ?>"><?php echo f_number($balance); ?></th>
                        </tr>
                    </table>
                </div>
                <div class="panel-footer">&nbsp;</div>
            </div>
            <!--Get data before submit result end here-->
        <?php } ?>




        <?php if (!empty($results)) { ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panal-header-title">
                        <h1 class="pull-left">Show Result</h1>
                        <a class="btn btn-primery pull-right" id="printButton" style="font-size: 14px; margin-top: 0;">
                            <i class="fa fa-print"></i> Print
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <!-- Print banner Start Here -->
                    <?php $this->load->view('print', $this->data); ?>
                    <!-- Print banner End Here -->

                    <h3 class="text-center hide"> Ledger </h3>
                    <div class="row">
                        <div class="col-xs-5">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="35%">Code :</th>
                                    <td><?php echo $info->code; ?></td>
                                </tr>
                                <tr>
                                    <th>Name :</th>
                                    <td><?php echo filter($info->name); ?></td>
                                </tr>
                                <tr>
                                    <th> Address :</th>
                                    <td> <?php echo $info->address; ?> </td>
                                </tr>
                                <tr>
                                    <th> Mobile :</th>
                                    <td> <?php echo $info->mobile; ?> </td>
                                </tr>
                                <tr>
                                    <th> Showroom :</th>
                                    <td> <?php echo $info->godown_name; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xs-offset-2 col-xs-5">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Date :</th>
                                    <td><?php echo d_formate($fromDate) . ' To ' . d_formate($toDate); ?></td>
                                </tr>
                                <tr>
                                    <th width="40%">Opening Balance :</th>
                                    <th> <?php echo $previous_balance; ?> </th>
                                </tr>
                                <tr>
                                    <th>Current Balance :</th>
                                    <th><?php echo $balanceInfo['balance']; ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th width="30">SL</th>
                            <th>Date</th>
                            <th>Description, Payment Method, Transaction By</th>
                            <!--<th>Payment Method</th>-->
                            <!--<th>Transaction By</th>-->
                            <th class="no-print">Voucher No</th>
                            <th>Product Details</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Remission</th>
                            <th>Commission</th>
                            <th>Balance</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td id="balanceTd" colspan="8">Previous Balance</td>
                            <td> <?php echo f_number($previous_balance); ?> </td>
                        </tr>
                        <!-- previous balance row end here -->
                        <?php
                        $credit = $debit = $remission = $comission = $opening_balance = 0;
                        $opening_balance += $previous_balance;
                        foreach ($results as $key => $row) {

                            $credit    += $row->credit;
                            $debit     += $row->debit;
                            $remission += $row->remission;
                            $comission += $row->comission;

                            $opening_balance += ($row->debit + $row->comission) - ($row->credit + $row->remission);

                            $voucher = ($row->remark == 'sale' || $row->remark == 'sales_return' || $row->remark == 'purchase' || $row->remark == 'purchase_return') ? explode(':', $row->relation)[1] : $row->inc_code;
                            ?>
                            <tr>
                                <td><?php echo($key + 2); ?></td>
                                <td><?php echo d_formate($row->transaction_at); ?></td>
                                <td><strong><?php echo filter($row->remark); ?></strong>, <?php echo $row->transaction_via; ?>, <?php echo($row->transaction_by) ? filter($row->transaction_by) : ''; ?></td>
                                <!--<td><?php //echo $row->transaction_via; ?></td>-->
                                <!--<td><?php //echo($row->transaction_by) ? filter($row->transaction_by) : ''; ?></td>-->
                                <!--<td><?php //echo($row->remark == "transaction" ? filter($row->comment) : get_name('saprecords', 'comment', ['voucher_no' => $voucher])); ?></td>-->
                                <td class="no-print"><?php echo $vno = isset($voucher) ? $voucher : ''; ?></td>
                                <td>
                                    <?php
                                        
                                        if($row->remark != "replace"){
                                            $productInfo = get_result("sapitems", ['voucher_no' => $voucher, 'trash' => 0], ['product_model', 'sale_price', 'quantity']);
                                            if(!empty($productInfo)){ foreach($productInfo as $key => $val){
                                                echo $val->product_model.' (Price: '.$val->sale_price.' Qty: '.$val->quantity.'), ';
                                            } }
                                        }else{
                                            $productInfo = get_join("replace", 'replace_items', 'replace.id=replace_items.replace_id', ['replace.voucher_no' => $voucher, 'replace.trash' => 0, 'replace_items.trash' => 0], ['replace.voucher_no', 'replace_items.*']);
                                            //print_r($productInfo);
                                            if(!empty($productInfo)){ foreach($productInfo as $key => $val){
                                                echo filter(get_name("products", 'product_name', ['product_code' => $val->product_code])).' (Price: '.$val->price.' Qty: '.$val->quantity.'), ';
                                            } }
                                        }
                                    ?>
                                    
                                </td>
                                <td><?php echo f_number($row->debit); ?></td>
                                <td><?php echo f_number($row->credit); ?></td>
                                <td><?php echo f_number($row->remission); ?></td>
                                <td><?php echo f_number($row->comission); ?></td>
                                <td><?php echo f_number($opening_balance); ?></td>
                                <td class="none">
                                    <?php if($row->remark == 'sale'){ ?>
                                        <a class="btn btn-info" title="Preview" target="_blank" href="<?php echo site_url('sale/viewDealerSale?vno=' . $voucher); ?>">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if($row->remark == 'purchase'){ ?>
                                        <a class="btn btn-info" title="Preview" target="_blank" href="<?php echo site_url('purchase/purchase/view?vno=' . $voucher); ?>">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th id="totalTh" colspan="5" class="text-right">Total</th>
                            <th><?php echo f_number($debit); ?></th>
                            <th><?php echo f_number($credit); ?></th>
                            <th><?php echo f_number($remission); ?></th>
                            <th><?php echo f_number($comission); ?></th>
                            <th><?php echo f_number($opening_balance); ?></th>
                        </tr>
                    </table>
                    <small class="insert_name hide">Software by Freelance iT Lab</small>
                </div>
                <div class="panel-footer">&nbsp;</div>
            </div>
        <?php } ?>
    </div>
</div>
<style>
    @page {
        size: A4;
        margin: 11mm 17mm 17mm 17mm;
    }

    @media print {
        .panel-body {
            position: relative;
            height: 97vh;
        }

        .insert_name {
            position: absolute;
            bottom: -53px;
            display: block;
            width: 100%;
            text-align: center;
        }

        .panel-body {
            page-break-inside: avoid;
        }

        html, body {
            width: 210mm;
            height: 297mm;
        }
    }
</style>
<script type="text/javascript">
    // linking between two date
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>

<script>
    app.controller('partyLedgerCtrl', function ($scope, $http) {

        $scope.partyList = [];

        $scope.$watchGroup(['godown_code', 'party_type'], function (searchInfo) {

            var godown_code = searchInfo[0];
            var party_type = searchInfo[1];
            

            if (typeof godown_code !== "undefined" && godown_code != '') {

                var partyWhere = {
                    table: 'parties',
                    cond: {trash: '0'},
                    select: ['code', 'name', 'mobile', 'address']
                }

                if (typeof godown_code !== 'undefined' && godown_code != '' && godown_code != 'all') {
                    partyWhere.cond['godown_code'] = godown_code
                }

                if (typeof party_type !== 'undefined' && party_type != '') {
                    
                    if(party_type=='hire'){
                        partyWhere.cond['type'] = 'client';
                        partyWhere.cond['customer_type'] = 'hire';
                    }else{
                        partyWhere.cond['type'] = party_type;
                    }
                   
                }

                console.log(partyWhere);

                // get all party
                $http({
                    method: 'post',
                    url: url + 'result',
                    data: partyWhere
                }).success(function (partyInfo) {

                    $scope.partyList = [];
                    if (partyInfo.length > 0) {
                        $scope.partyList = partyInfo;
                    }
                });
            }
        });
    })
</script>
<script>
    // Attach the function to a button or trigger it as needed
    document.getElementById('printButton').addEventListener('click', adjustColspanForPrint);
    
    function adjustColspanForPrint() {
        const balanceTd = document.getElementById('balanceTd');
        const totalTh = document.getElementById('totalTh');
        
        // Change colspan to 7 before printing
        balanceTd.setAttribute('colspan', '7');
        totalTh.setAttribute('colspan', '4');
        
        // Trigger print dialog
        window.print();

        // Revert colspan back to 8 after printing
        balanceTd.setAttribute('colspan', '8');
        totalTh.setAttribute('colspan', '5');
    }

    
</script>
</script>
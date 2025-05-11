<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"/>
<div class="container-fluid">
    <div class="row" ng-controller="addTransactionCtrl" ng-cloak>
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Transaction</h1>
                </div>
            </div>
            <div class="panel-body">
                <!-- horizontal form -->
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open('party/transaction/update', $attr);
                ?>

                <input type="hidden" name="id" ng-init="id='<?php echo $info->id; ?>'" ng-model="id" ng-value="id">
                <input type="hidden" name="type" value="<?php echo $info->transaction_by; ?>">

                <div class="form-group">
                    <label class="col-md-3 control-label">Date <span class="req">*</span></label>
                    <div class="col-md-5">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="created_at" class="form-control"
                                   value="<?php echo $info->transaction_at; ?>" placeholder="YYYY-MM-DD" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <?php if (checkAuth('super')) { ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Showroom<span class="req">&nbsp;*</span></label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" value="<?php echo get_name('godowns', 'name', ['code' => $info->godown_code]); ?>" readonly>
                        </div>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label class="col-md-3 control-label">Type<span class="req">&nbsp;*</span></label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" value="<?php echo $info->transaction_by; ?>" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Name <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" value="<?php echo get_name('parties', 'name', ['code' => $info->party_code]); ?>" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">
                        Balance (৳)<span class="req">&nbsp;</span>
                    </label>
                    <div class="col-md-3">
                        <input type="number" name="previous_balance" ng-value="partyInfo.balance" class="form-control" step="any" readonly>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="previous_sign" ng-value="partyInfo.sign" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Payment Method <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="payment_type" ng-model="transactionBy" ng-init="transactionBy='<?php echo $info->transaction_via; ?>'" class="form-control" required>
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                            <option value="bkash">bKash</option>
                            <option value="bank">Bank</option>
                            <option value="dbbl">DBBL</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Transaction Type <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="transaction_type" ng-model="transaction_type" class="form-control" required>
                            <option value="">-- Select --</option>
                            <option value="payment">Payment</option>
                            <option value="received">Received</option>
                        </select>
                    </div>
                </div>

                <!-- for selecting cheque -->
                <div ng-if="transactionBy == 'cheque'">
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Bank Name <span class="req">*</span>
                        </label>
                        <div class="col-md-5">
                            <input type="text" name="meta[bankname]" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Branch Name <span class="req">*</span>
                        </label>
                        <div class="col-md-5">
                            <input type="text" name="meta[branchname]" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Account No. <span class="req">*</span>
                        </label>
                        <div class="col-md-5">
                            <input type="text" name="meta[account_no]" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Check No. <span class="req">*</span>
                        </label>
                        <div class="col-md-5">
                            <input type="text" name="meta[chequeno]" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Pass Date <span class="req">*</span>
                        </label>
                        <div class="col-md-5">
                            <input type="text" name="meta[passdate]" placeholder="YYYY-MM-DD" class="form-control"
                                   value="<?php echo date("Y-m-d"); ?>">
                            <input type="hidden" name="meta[status]" value="pending">
                        </div>
                    </div>
                </div>
                <!-- cheque option end  -->


                <div class="form-group">
                    <label class="col-md-3 control-label">Paid (৳) <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="number" name="payment" ng-model="payment"  class="form-control" placeholder="0.00" step="any">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Remission (৳) </label>
                    <div class="col-md-5">
                        <input type="number" name="remission" ng-model="remission" class="form-control" step="any" placeholder="0.00">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">
                         Current Balance (৳) <span class="req">&nbsp;</span>
                    </label>
                    <div class="col-md-3">
                        <input type="number" name="current_balance" ng-value="getTotalFn()" class="form-control" step="any"
                               readonly>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="current_sign" ng-model="partyInfo.csign" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Transaction By <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <input type="text" name="comment" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Send SMS <span class="req">&nbsp;</span></label>
                    <div class="col-md-1">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="send_sms" style="padding-left: 5px; transform: scale(2);">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="btn-group pull-right">
                        <input type="submit" name="update" value="Update" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script>
    app.controller('addTransactionCtrl', function ($scope, $http) {

        $scope.partyList = [];
        $scope.transaction_type = '';

        $scope.partyInfo = {
            balance: 0,
            previous_balance: 0,
            sign: 'Receivable',
            csign: 'Receivable'
        };

        // get all party
        $scope.$watch('id', function (id) {


            $http({
                method: 'post',
                url: url + 'result',
                data: {
                    table: 'partytransaction',
                    cond : {id: id}
                }
            }).success(function (partyInfo) {

                if (partyInfo.length > 0) {

                    // get party balance
                    $http({
                        method: 'post',
                        url: url + 'party_balance',
                        data: {party_code: partyInfo[0].party_code}
                    }).success(function (balanceInfo) {

                        var balance = 0;

                        if (partyInfo[0].transaction_by == 'supplier'){

                            var paidAmount = (parseFloat(partyInfo[0].debit) > 0 ? ( - parseFloat(partyInfo[0].debit) - parseFloat(partyInfo[0].comission)) : (parseFloat(partyInfo[0].credit) + parseFloat(partyInfo[0].comission)));

                            balance = parseFloat(balanceInfo.balance) + paidAmount;

                        }else{

                            var paidAmount = (parseFloat(partyInfo[0].debit) > 0 ? (- parseFloat(partyInfo[0].debit) - parseFloat(partyInfo[0].comission)) : (parseFloat(partyInfo[0].credit) + parseFloat(partyInfo[0].remission)));

                            balance = parseFloat(balanceInfo.balance) + paidAmount;
                        }

                        $scope.partyInfo.balance = Math.abs(parseFloat(balance));
                        $scope.partyInfo.previous_balance = parseFloat(balance);
                        $scope.partyInfo.sign = (balance < 0 ? 'Payable' : 'Receivable');
                    });


                    var payment = (parseFloat(partyInfo[0].debit) > 0 ? parseFloat(partyInfo[0].debit) : parseFloat(partyInfo[0].credit));
                    var remission = (parseFloat(partyInfo[0].remission) > 0 ? parseFloat(partyInfo[0].remission) : parseFloat(partyInfo[0].comission));

                    $scope.transaction_type = (parseFloat(partyInfo[0].debit) > 0 ? 'payment' : 'received');
                    $scope.payment = payment;
                    $scope.remission = remission;
                }
            });

        });

        // get total balance
        $scope.getTotalFn = function (){

            var payment = (!isNaN(parseFloat($scope.payment)) ? parseFloat($scope.payment) : 0);
            var remission = (!isNaN(parseFloat($scope.remission)) ? parseFloat($scope.remission) : 0);

            var total = 0;

            if ($scope.transaction_type == 'payment'){

                total = $scope.partyInfo.previous_balance + payment + remission;
            }else{

                total = $scope.partyInfo.previous_balance - payment - remission;
            }

            $scope.partyInfo.csign = (total < 0 ? 'Payable' : 'Receivable');
            return Math.abs(total.toFixed(2));
        }
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"/>
<div class="container-fluid">
    <div class="row" ng-controller="addTransactionCtrl" ng-cloak>
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Transaction</h1>
                </div>
            </div>
            <div class="panel-body">
                <!-- horizontal form -->
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open('party/transaction/store', $attr);
                ?>

                <div class="form-group">
                    <label class="col-md-3 control-label">Date <span class="req">*</span></label>
                    <div class="col-md-5">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="created_at" class="form-control"
                                   value="<?php echo date("Y-m-d"); ?>" placeholder="YYYY-MM-DD" required>
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
                            <select name="godown_code" ng-init="godown_code='<?php echo $this->data["branch"]; ?>'"
                                    ng-model="godown_code" class="form-control" required>
                                <option value="" selected>-- Select --</option>
                                <?php if (!empty($allGodown)) {
                                    foreach ($allGodown as $row) { ?>
                                        <option value="<?php echo $row->code; ?>">
                                            <?php echo filter($row->name) . " ( " . $row->address . " ) "; ?>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                <?php } else { ?>
                    <input type="hidden" name="godown_code" ng-init="godown_code = '<?php echo $this->data["branch"]; ?>'"
                           ng-model="godown_code" ng-value="godown_code" required>
                <?php } ?>

                <div class="form-group">
                    <label class="col-md-3 control-label">Type<span class="req">&nbsp;*</span></label>
                    <div class="col-md-5">
                        <select name="type" ng-model="type" class="form-control" ng-change="getTransactionTypeFn(type)" required>
                            <option value="" selected>-- Select --</option>
                            <option value="client">Client</option>
                            <option value="supplier">Supplier</option>
                            <option value="hire">hire</option>
                            <option value="both">Supplier/Client</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Name <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select ui-select2="{ allowClear: true}" class="form-control" name="party_code" ng-model="party_code"
                                data-placeholder="-- Select --" ng-change="getBalanceFn(party_code);" required>
                            <option value="" selected></option>
                            <option ng-repeat="row in partyList" value="{{row.code}}">{{ row.code }} - {{ row.name }} - {{ row.address }}- {{ row.mobile }}</option>
                        </select>
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
                        <select name="payment_type" ng-model="transactionBy" ng-init="transactionBy='cash'" class="form-control" required>
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
                            Branch name <span class="req">*</span>
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
                    <label class="col-md-3 control-label">Remission (৳) <span class="req">&nbsp;</span></label>
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
                        <input type="submit" name="save" value="Save" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script type="text/javascript">
    let privilege ='<?= $this->data['privilege']; ?>';
    if(privilege=='user'){
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            minDate:new Date()
        });
    }else{
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
        }); 
    }
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
        $scope.$watchGroup(['godown_code', 'type'], function (searchInfo) {

            var godown_code = searchInfo[0];
            var type = searchInfo[1];
            
            var partyWhere = {
                table: 'parties',
                cond: {trash: '0'}
            };

            if (typeof type !== 'undefined' && type != '') {
                if(type=='hire'){
                    partyWhere.cond['type'] = 'client';
                    partyWhere.cond['customer_type'] = 'hire';
                }else{
                    partyWhere.cond['type'] = type;
                }
                
            }

            if (typeof godown_code !== 'undefined' && godown_code !== 'all' && godown_code != '') {
                partyWhere.cond['godown_code'] = godown_code;
            }

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

            $scope.partyInfo = {
                balance: 0,
                previous_balance: 0,
                sign: 'Receivable',
                csign: 'Receivable'
            };

            $scope.getTotalFn();
        });

        // get party balance
        $scope.getBalanceFn = function (party_code){

            if (typeof party_code !== 'undefined' && party_code != ''){
                $http({
                    method: 'post',
                    url: url + 'party_balance',
                    data: {party_code: party_code}
                }).success(function (balanceInfo) {

                    $scope.partyInfo.balance = Math.abs(parseFloat(balanceInfo.balance));
                    $scope.partyInfo.previous_balance = parseFloat(balanceInfo.balance);
                    $scope.partyInfo.sign = balanceInfo.status;
                });
            }
        };

        // select transaction type
        $scope.getTransactionTypeFn = function (type){

            if (typeof type !== 'undefined'){

                if (type == 'client'){
                    $scope.transaction_type = 'received';
                }else if (type == 'supplier'){
                    $scope.transaction_type = 'payment';
                }else{
                    $scope.transaction_type = '';
                }
            }
        }


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
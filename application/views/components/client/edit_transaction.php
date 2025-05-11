<script src="<?php echo site_url('private/js/ngscript/ClientEditTransactionCtrl.js?'.time()); ?>"></script>
<div class="container-fluid">
    <div class="row" ng-controller="ClientEditTransactionCtrl" ng-cloak>
        <?php echo $this->session->flashdata("confirmation"); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Customer</h1>
                </div>
            </div>
            <div class="panel-body">
                <!-- horizontal form -->
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open('', $attr);
                ?>
                <span ng-init="id=<?php echo $records->id; ?>"></span>
                <div class="form-group">
                    <label class="col-md-3 control-label">Date <span class="req">*</span></label>
                    <div class="col-md-5">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" value="<?php echo $records->transaction_at; ?>" placeholder="YYYY-MM-DD" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Name </label>
                    <div class="col-md-5">
                        <input type="text" value="<?php echo filter($records->name); ?>" class="form-control" readonly>
                        <input type="hidden" name="code" value="<?php echo $records->party_code; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Current Balance (TK) </label>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo abs($current_balance); ?>" class="form-control" readonly>
                        <input type="hidden" name="balance" ng-model="balance" ng-init="balance='<?php echo $current_balance; ?>'" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="sign" ng-model="sign" ng-init="sign='<?php echo $current_sign; ?>'" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Transaction Type <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select
                            name="payment_type"
                            class="form-control"
                            ng-init="transactionBy='<?php echo $records->transaction_via; ?>'"
                            ng-model="transactionBy"
                            required>
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                            <option value="bank">Bank</option>
                            <option value="Sonali">Sonali</option>
                            <option value="Islami">Islami</option>
                            <option value="dbbl">DBBL</option>
                            <option value="Nogod">Nogod</option>
                            <option value="bkash">BKash</option>
                            <option value="folio">Folio</option>
                        </select>
                    </div>
                </div>
                <!-- for selecting cheque -->
                <div ng-if="transactionBy == 'cheque'">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Bank name <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input type="text" name="meta[bankname]" ng-model="bankname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Branch name <span class="req">*</span>
                        </label>
                        <div class="col-md-5">
                            <input type="text" name="meta[branchname]" ng-model="branchname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Account No. <span class="req">*</span>
                        </label>
                        <div class="col-md-5">
                            <input type="text" name="meta[account_no]" ng-model="accountno" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Cheque No. <span class="req">*</span>
                        </label>
                        <div class="col-md-5">
                            <input type="text" name="meta[chequeno]" ng-model="chequeno" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Pass Date <span class="req">*</span>
                        </label>
                        <div class="col-md-5">
                            <input type="text" name="meta[passdate]" class="form-control" value="{{ passdate }}">
                            <input type="hidden" name="meta[status]" value="pending">
                        </div>
                    </div>
                </div>
                <!-- cheque option end  -->
                <div class="form-group">
                    <label class="col-md-3 control-label">Previous Payment (TK) </label>
                    <div class="col-md-5">
                        <input type="number" ng-init="prevPayment=<?php echo $records->credit; ?>" ng-model="prevPayment" class="form-control" step="any" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Current Payment (TK) <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="number" ng-init="payment=<?php echo $records->credit; ?>" name="payment" ng-model="payment" class="form-control" step="any" min="0" required>
                    </div>
                </div>
                
                <?php if($records->transaction_type == 'installment') { ?>
                <div class="form-group" >
                    <label class="col-md-3 control-label">Remission (TK) <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <input type="number" ng-init="remission=<?php echo $records->remission; ?>" name="remission" ng-model="remission" class="form-control" step="any" min="0">
                    </div>
                </div>
                <?php } ?>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Total Due (TK) </label>
                    <div class="col-md-3">
                        <input type="number" name="totalBalance" ng-value="getTotalFn()" class="form-control" step="any" readonly>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="csign" ng-model="csign" class="form-control" readonly>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Collected By <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <input type="text" value="<?php echo $records->comment; ?>" name="comment" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">PR No <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <input type="text" name="pr_no" value="<?php echo $records->pr_no; ?>" class="form-control">
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="btn-group pull-right">
                        <input type="submit" name="update" value="Change" class="btn btn-primary">
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
<script src="<?php echo site_url('private/js/ngscript/supplierReplaceEntryCtrl.js?').time(); ?>"></script>
<style>
    .table2 tr td input {border: 1px solid transparent;}
    .table2 tr td {padding: 0 !important;}
    .new-row-1 .col-md-4 {margin-bottom: 8px;}
    .red, .red:focus {border-color: red;}
</style>
<div class="container-fluid" ng-controller="supplierReplaceEntryCtrl" ng-cloak>
    <div class="row">
        <?php echo $this->session->flashdata("confirmation"); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Supplier Replace</h1>
                </div>
            </div>
            <div class="panel-body">
                <!-- horizontal form -->
                <?php echo form_open('replace/supplier/store', ['class' => 'form-horizontal']); ?>

                <div class="row new-row-1">
                    <div class="col-md-2">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="created_at" value="<?php echo date('Y-m-d');?>" class="form-control" placeholder="Date" <?php echo (checkAuth('user') ? 'readonly' : ''); ?> required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <?php if (checkAuth('super')) { ?>
                        <div class="col-md-2">
                            <select class="form-control" name="godown_code" ng-init="godown_code = '<?php echo $this->data["branch"]; ?>'" ng-model="godown_code" required>
                                <option value="" selected disabled>Select Showroom</option>
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
                        <input type="hidden" name="godown_code" ng-init="godown_code = '<?php echo $this->data["branch"]; ?>'"
                               ng-model="godown_code" ng-value="godown_code" required>
                    <?php } ?>

                    <div class="col-md-2">
                        <select ui-select2="{ allowClear: true}" class="form-control" name="party_code" ng-model="partyCode" ng-change="setPartyfn(partyCode)" required>
                            <option value="" selected disable>Select Supplier</option>
                            <option ng-repeat="row in supplierList" value="{{row.code}}">{{ row.name }} - {{ row.address }}
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select ui-select2="{ allowClear: true}" class="form-control" ng-model="product">
                            <option value="" selected disable>Select Product</option>
                            <option ng-repeat="row in productList" value="{{row.product_code}}-{{row.particular}}">{{ row.product_code }} - {{ row.product_model }} - {{ row.particular}}
                            </option>
                        </select>
                    </div>
                    
                    <div class="col-md-2">
                        <div>
                          <a class="btn btn-success" ng-click="addNewProductFn()">
                            <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                          </a>
                        </div>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered table2">
                    <tr>
                        <th width="45px">SL</th>
                        <th>Product Model</th>
                        <th>Serial No</th>
                        <th width="150">Qty</th>
                        <th width="60">Action</th>
                    </tr>
                    <tr ng-repeat="item in cart">
                        <td style="padding: 6px 8px !important;">{{ $index + 1 }}</td>
                        
                        <td>
                            <input type="text" name="product_model[]" class="form-control" ng-model="item.product_model" readonly>
                            <input type="hidden" name="product_code[]" ng-value="item.code">
                        </td>

                        <td>
                            <input type="text" name="particular[]" class="form-control"  ng-value="item.particular" reqiured readonly>
                        </td>

                        <td>
                            <input type="number" name="quantity[]" class="form-control" min="1"
                                   ng-model="item.quantity" step="any" readonly>
                        </td>

                        <td class="text-center">
                            <a title="Delete" class="btn btn-danger" ng-click="deleteItemFn($index)">
                                <i class="fa fa-times fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <th>{{getTotalQtyFn()}}</th>
                    </tr>
                </table>

                <div class="row">
                    <div class="col-md-offset-6 col-md-6">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="" class="control-label">Remarks</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="remarks" rows="2" class="form-control" placeholder="Remarks...."></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="" class="control-label">Delivery Date</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" name="delivery_date" class="form-control" placeholder="YYYY-MM-DD">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="submit" name="save" value="Save" class="btn btn-primary pull-right" ng-disabled="isDisabled">
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script>
    // linking between two date
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
    });
</script>
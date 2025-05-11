<script src="<?php echo site_url('private/js/ngscript/clientReplaceEntryCtrl.js?').time(); ?>"></script>
<style>
    .table2 tr td {
        padding: 0 !important;
    }

    .table2 tr td input {
        border: 1px solid transparent;
    }

    .new-row-1 .col-md-4 {
        margin-bottom: 8px;
    }

    .red,
    .red:focus {
        border-color: red;
    }

    .green,
    .green:focus {
        border-color: green;
    }
</style>
<div class="container-fluid" ng-controller="clientReplaceEntryCtrl" ng-cloak>
    <div class="row">
        <?php echo $this->session->flashdata("confirmation"); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Client Replace</h1>
                </div>
            </div>
            <div class="panel-body">
                <!-- horizontal form -->
                <?php echo form_open('replace/client/store', ['class' => 'form-horizontal']); ?>


                <div class="row new-row-1">
                    <div class="col-md-2">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="created_at" value="<?php echo date('Y-m-d');?>" class="form-control"
                                   placeholder="Date" <?php echo (checkAuth('user') ? 'readonly' : ''); ?> required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <?php if (checkAuth('super')) { ?>
                        <div class="col-md-3">
                            <select class="form-control" name="godown_code" ng-init="godown_code = '<?php echo $this->data["branch"]; ?>'" ng-model="godown_code" required>
                                <option value="" selected disabled>-- Select Showroom --</option>
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
                               ng-model="godown_code" ng-value="godown_code"
                               required>
                    <?php } ?>

                    <div class="col-md-3">
                        <select ui-select2="{ allowClear: true}" class="form-control" name="party_code" ng-model="partyCode" ng-change="setPartyfn(partyCode)" required>
                            <option value="" selected disable>--Select Client--</option>
                            <option ng-repeat="row in clientList" value="{{row.code}}">{{ row.name }} - {{ row.address }}
                            </option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select ui-select2="{ allowClear: true}" class="form-control" ng-model="product"  ng-change="addNewProductFn(product)"  required>
                            <option value="" selected disable>--Select Product--</option>
                            <option ng-repeat="row in productList" value="{{row.code}}">{{ row.code }} - {{ row.product_model }}
                            </option>
                        </select>
                    </div>

                </div>
                <hr>
                <table class="table table-bordered table2">
                    <tr>
                        <th width="45px">SL</th>
                        <th>Product Name</th>
                        <th>Model</th>
                        <th>Particular</th>
                        <th width="150">Qty</th>
                        <th width="60">Action</th>
                    </tr>
                    <tr ng-repeat="item in cart">
                        <td style="padding: 6px 8px !important;">{{ $index + 1 }}</td>
                        <td style="padding: 6px 8px !important; background-color: #eee;">
                            {{item.category | textBeautify}}
                        </td>

                        <td>
                            <input type="text" name="product_model[]" class="form-control" ng-model="item.product_model" readonly>
                            <input type="hidden" name="product_code[]" ng-value="item.code">
                        </td>

                        <td>
                            <input type="text" name="particular[]" class="form-control">
                        </td>
                        <td>
                            <input type="number" name="quantity[]" class="form-control" min="1" ng-model="item.quantity" step="any">
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
<script src="<?php echo site_url('private/js/ngscript/complainSaleTypeCtrl.js'); ?>"></script>
<style>
    @media print {
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }

        .panel {
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }

        .hide {
            display: block !important;
        }

        .block-hide {
            display: none;
        }
    }
</style>


<div class="container-fluid block-hide">
    <div class="row">

        <?php echo $this->session->flashdata('confirmation'); ?>

        <!-- horizontal form -->
        <?php
        $attribute = array('name' => '', 'class' => 'form-horizontal', 'id' => '');
        echo form_open('complain/complain/', $attribute);
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>New Customer Complain</h1>
                </div>
            </div>

            <div class="panel-body no-padding" ng-controller="complainSaleTypeCtrl">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Sale Type <span class="req">&nbsp;</span></label>
                        <div class="col-md-9">
                            <label ng-click="getsaleType('cash')">
                                <input type="radio" name="sale_type" ng-model="stype" checked value="cash">
                                <span>Cash</span>
                            </label>
                            <label ng-click="getsaleType('credit')" style="margin-left: 20px;">
                                <input type="radio" name="sale_type" ng-model="stype" value="credit">
                                <span>Credit</span>
                            </label>
                        </div>
                    </div>

                    <div ng-if="active=='cash'">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Customer Name <span class="req">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Mobile <span class="req">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="mobile" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Address </label>
                            <div class="col-md-7">
                                <textarea name="address" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div ng-if="active=='credit'">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Customer Name</label>
                            <div class="col-md-7">
                                <select ui-select2="{ allowClear: true}" class="form-control"
                                        ng-model="party_code"
                                        ng-change="findPartyFn(party_code)" data-placeholder="Select client">
                                    <option value="" selected disable></option>
                                    <?php
                                    if (!empty($allClients)) {
                                        foreach ($allClients as $key => $row) { ?>
                                            <option value="<?php echo $row->code; ?>">
                                                <?php echo filter($row->name) . " ( " . $row->address . " ) "; ?>
                                            </option>
                                        <?php }
                                    } ?>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="name" ng-value="partyInfo.name">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Mobile </label>
                            <div class="col-md-7">
                                <input type="text" name="mobile" ng-model="partyInfo.contact" class="form-control"
                                       readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Address </label>
                            <div class="col-md-7">
                                <textarea rows="3" name="cre_address" class="form-control" readonly>{{ partyInfo.address }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Product Name </label>
                        <div class="col-md-7">
                            <textarea name="product_name" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Complain <span class="req">*</span></label>
                        <div class="col-md-7">
                            <textarea name="complain" class="form-control" cols="30" rows="4" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input class="btn btn-danger" type="reset" value="Clear">
                                <!--<input class="btn btn-primary" type="submit" name="save" value="Save">-->
                                <input type="submit" name="save" value="Save" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>


<script>
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
    #container {width: 500px; height: 375px; border: 10px #333 solid; position: relative; overflow:hidden; background: #666666;}
    #video {width: 100%; background-color: #666; display: block;}
    .scale {background: rgba(0,0,0,.5); position: absolute; width: 105px; height: 100%; top:0;}
    .s-left {left: 0; }
    .s-right {right: 0;}
    .modal-header .close {margin-top: -35px;}
</style>

<div class="container-fluid" ng-controller="addPartyCtrl">
    <div class="row">
        <?php echo $this->session->flashdata("confirmation"); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add New</h1>
                </div>
            </div>

            <div class="panel-body">
                <!-- horizontal form -->
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open_multipart('party/party/store', $attr);
                ?>
                <?php if(checkAuth('super')) { ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Showroom<span class="req">&nbsp;*</span></label>
                        <div class="col-md-5">
                            <select name="godown_code" ng-init="godown_code='<?php echo $this->data["branch"]; ?>'" ng-model="godown_code" class="form-control" required>
                                <option value=""  disabled>-- Select --</option>
                                <?php if(!empty($allGodown)){ foreach($allGodown as $row){ ?>
                                <option value="<?php echo $row->code; ?>" <?php echo ($this->data['branch'] == $row->code) ? 'selected' : ''; ?>>
                                    <?php echo filter($row->name)." ( ".$row->address." ) "; ?>
                                </option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                <?php } else { ?>
                        <input type="hidden" name="godown_code" ng-init="godown_code='<?php echo $this->data["branch"]; ?>'" ng-model="godown_code"  ng-value="godown_code" required>
                <?php } ?>

                <div class="form-group">
                    <label class="col-md-3 control-label">Type<span class="req">&nbsp;*</span></label>
                    <div class="col-md-5">
                        <select name="type" class="form-control" required readonly>
                            <option value="" selected>-- Select --</option>
                            <option value="client">Client</option>
                            <option value="supplier">Supplier </option>
                            <option value="both" selected>Supplier/Client</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Name<span class="req">&nbsp;*</span></label>
                    <div class="col-md-5">
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
                
                <!--<div class="form-group">-->
                <!--    <label class="col-md-3 control-label">Client Category  <span class="req">&nbsp;*</span></label>-->
                <!--    <div class="col-md-5">-->
                <!--        <select name="category" class="form-control" required>-->
                <!--            <option value="" selected>-- Select --</option>-->
                <!--            <option value="a">A</option>-->
                <!--            <option value="b">B</option>-->
                <!--            <option value="c">C</option>-->
                            
                <!--        </select>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="form-group">
                    <label class="col-md-3 control-label">Father Name </label>
                    <div class="col-md-5">
                        <input type="text" name="father_name" class="form-control">
                    </div>
                </div>


                <!--<div class="form-group">-->
                <!--    <label class="col-md-3 control-label">Customer Type<span class="req">&nbsp;*</span></label>-->
                <!--    <div class="col-md-5">-->
                <!--        <select name="customer_type" class="form-control" required>-->
                <!--            <option value="" selected disabled>-- Select --</option>-->
                <!--            <option value="sub_dealer" >Sub Dealer</option>-->
                <!--             <option value="hire" >Hire</option>-->
                <!--            <option value="user" >User</option>-->
                <!--        </select>-->
                <!--    </div>-->
                <!--</div>-->

                <!--<div class="form-group hide_column2">
                    <label class="col-md-3 control-label">Dealer Type </label>
                    <div class="col-md-5">
                        <select name="dealer_type" class="form-control">
                            <option value="">-- Select --</option>
                            <?php
                            $dealer_type = config_item('dealer_type');
                            if(!empty($dealer_type)){
                                foreach($dealer_type as $item){ ?>
                                    <option value="<?= $item ?>" ><?= $item ?></option>
                                <?php } } ?>
                        </select>
                    </div>
                </div>-->

                <div class="form-group">
                    <label class="col-md-3 control-label">Shop Name <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <input type="text" name="shop_name" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label"> Zone </label>
                    <div class="col-md-5">
                        <select ui-select2="{ allowClear: true}" class="form-control"  name="zone" ng-model="zone"
                                data-placeholder="-- Select --">
                            <option value="" selected></option>
                            <?php if(!empty($allZone)){ foreach($allZone as $row){ ?>
                                <option value="<?php echo $row->zone; ?>">
                                    <?php echo filter($row->zone); ?>
                                </option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>                   

                <div class="form-group">
                    <label class="col-md-3 control-label">NID <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <input type="text" name="id_card" class="form-control">
                    </div>
                </div>


                <div class="form-group hide_column">
                    <label class="col-md-3 control-label">Contact Person </label>
                    <div class="col-md-5">
                        <input type="text" name="contact_person" class="form-control">
                    </div>
                </div>

                <div class="form-group hide_column">
                    <label class="col-md-3 control-label">Mobile<span class="req"></span></label>
                    <div class="col-md-5">
                        <input type="text" name="mobile" class="form-control">
                    </div>
                </div>

                <div class="form-group hide_column">
                    <label class="col-md-3 control-label">Address</label>
                    <div class="col-md-5">
                        <textarea name="address" class="form-control"></textarea>
                    </div>
                </div>

				<div class="form-group">
                    <label class="col-md-3 control-label">Initial Balance <span class="req">&nbsp;*</span></label>
                    <div class="col-md-3">
                        <input type="number" name="balance" class="form-control" step="any" value="0.00" required>
                    </div>

                    <div class="col-md-2">
                        <select name="status" class="form-control">
                            <option value="receivable" selected>Receivable</option>
                            <option value="payable">Payable</option>
                        </select>
                    </div>
                </div>
                
                
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Credit Limit <span class="req"></span></label>
                    <div class="col-md-5">
                        <input type="number" name="credit_limit" class="form-control" value="0">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Image <span class="req"></span></label>
                    <div class="col-md-5">
                        <input id="input-test" type="file" name="attachFile" class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="btn-group pull-right">
                        <input type="submit" name="save" value="Save" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="panel-footer">&nbsp;</div>
    </div>
</div>

<script>
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD',
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script>
    app.controller('addPartyCtrl', function ($scope, $http){

        $scope.allZone = [];

        $scope.$watch('godown_code', function (godown_code){

            if (typeof godown_code !== 'undefined' && godown_code != ''){

                $http({
                    method: 'post',
                    url   : url + 'result',
                    data  : {
                        table: 'zone',
                        cond : {godown_code: godown_code}
                    }
                }).success(function (zoneInfo){

                    $scope.allZone = [];

                    if (zoneInfo.length > 0){
                        $scope.allZone = zoneInfo;
                    }
                })
            }
        })
    })
</script>
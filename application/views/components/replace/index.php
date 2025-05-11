<?php
if (isset($meta->header)) {
    $header_info = json_decode($meta->header, true);
}
if (isset($meta->footer)) {
    $footer_info = json_decode($meta->footer, true);
}
$logo_data = json_decode($meta->logo, true);
?>

<style type="text/css">
    @media print {
        aside, nav, .none, .panel-heading, .panel-footer {
            display: none !important;
        }

        .panel {
            border: 1px solid transparent;
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
        }

        .hide {
            display: block !important;
        }
    }
</style>
<div class="container-fluid" ng-controller="appController" ng-cloak>
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Replace Stock</h1>
                </div>
            </div>

            <div class="panel-body" style="padding-bottom: 0px;">
                <?php echo form_open(); ?>
                <div class="row">
                    <?php if (checkAuth('super')) { ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="godown_code" ng-init="godownCode=''"
                                        ng-model="godownCode" class="form-control">
                                    <option value="" selected disabled>Select Showroom</option>
                                    <option value="all"> All Showroom</option>
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
                        <input type="hidden" name="godown_code"
                               ng-init="godownCode='<?php echo $this->data["branch"]; ?>'" ng-model="godownCode"
                               ng-value="godownCode">
                    <?php } ?>

                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="product_code" ui-select2="{ allowClear: true}" class="form-control" ng-model="productCode">
                                <option value="" selected disable>Select Product</option>
                                <option ng-repeat="row in productList" value="{{row.code}}">
                                    {{ row.code }} - {{ row.product_model }}
                                </option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="search[product_cat]" ui-select2="{ allowClear: true}" class="form-control" ng-model="category">
                                <option value="" selected disable>Select Category</option>
                                <?php 
                                if(!empty($categoryList)){
                                    foreach($categoryList as $item){
                                        echo '<option value="'. $item->category .'">'. filter($item->category) .'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="search[subcategory]" ui-select2="{ allowClear: true}" class="form-control" ng-model="subcategory">
                                <option value="" selected disable>Select Subategory</option>
                                <?php 
                                if(!empty($subcategoryList)){
                                    foreach($subcategoryList as $item){
                                        echo '<option value="'. $item->subcategory .'">'. filter($item->subcategory) .'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="search[brand]" ui-select2="{ allowClear: true}" class="form-control" ng-model="brand">
                                <option value="" selected disable>Select Brand</option>
                                <?php 
                                if(!empty($brandList)){
                                    foreach($brandList as $item){
                                        echo '<option value="'. $item->brand .'">'. filter($item->brand) .'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <div class="form-group">
                            <input type="submit" name="show" value="Search" class="btn btn-primary">
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <hr class="none" style="margin-top: 0px;">

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30">SL</th>
                        <th>Product Name</th>
                        <th>Model</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Brand</th>
                        <th width="120">Quantity</th>
                    </tr>
                    <?php
                    $totalQuantity = 0;
                    if (!empty($results)) {
                        foreach ($results as $key => $row) {
                            $totalQuantity += $row->quantity;
                            ?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td><?php echo $row->product_name; ?></td>
                                <td><?php echo $row->product_model; ?> </td>
                                <td><?php echo filter($row->product_cat); ?></td>
                                <td><?php echo filter($row->subcategory); ?></td>
                                <td><?php echo filter($row->brand); ?></td>
                                <td class="text-right"><?php echo $row->quantity; ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <th colspan="7" class="text-center">No record found....!</th>
                        </tr>
                    <?php } ?>

                    <tr>
                        <th colspan="6" class="text-right">Total</th>
                        <th  class="text-right"><?php echo $totalQuantity; ?></th>
                    </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

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

    $("#datetimepickerFrom").on("dp.change", function (e) {
        $('#datetimepickerTo').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepickerTo").on("dp.change", function (e) {
        $('#datetimepickerFrom').data("DateTimePicker").maxDate(e.date);
    });


    app.controller('appController', function ($scope, $http) {

        $scope.productList = [];

        $scope.$watch('godownCode', function (godownCode) {

            var where = {
                tableFrom: 'replace_stock',
                tableTo  : 'stock',
                joinCond : 'replace_stock.product_code=stock.code AND replace_stock.godown_code=stock.godown_code',
                cond     : {'replace_stock.trash': '0'},
                select   : ['stock.code', 'stock.name', 'stock.product_model'],
                groupBy  : 'replace_stock.product_code'
            }

            if (typeof godownCode !== 'undefined' && godownCode != 'all' && godownCode != '') {
                where.cond['replace_stock.godown_code'] = godownCode;
            }

            // get replace stock product list
            $http({
                method: 'POST',
                url: url + 'join',
                data: where
            }).success(function (productList) {
                if (productList.length > 0) {
                    $scope.productList = productList;
                }
            });
        });
    });
</script>

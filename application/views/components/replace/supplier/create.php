<style>
    .table2 tr td input {
        border: 1px solid transparent;
    }

    .table2 tr td {
        padding: 0 !important;
    }

    .new-row-1 .col-md-4 {
        margin-bottom: 8px;
    }

    .red, .red:focus {
        border-color: red;
    }

    .green, .green:focus {
        border-color: green;
    }
</style>
<div class="container-fluid" ng-controller="appController" ng-cloak>
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
                <?php echo form_open('replace/supplier/store'); ?>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">Date <span class="req">*</span></label>
                            <div class="input-group date" id="datetimepicker">
                                <input type="text" name="created_at" value="<?php echo date('Y-m-d'); ?>"
                                       class="form-control"
                                       placeholder="Date" <?php echo(checkAuth('user') ? 'readonly' : ''); ?> required>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            </div>
                        </div>
                    </div>

                    <?php if (checkAuth('super')) { ?>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Showroom <span class="req">*</span></label>
                                <select class="form-control" name="godown_code"
                                        ng-init="godown_code = '<?php echo $this->data["branch"]; ?>'"
                                        ng-model="godown_code" required>
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
                        </div>
                    <?php } else { ?>
                        <input type="hidden" name="godown_code" ng-init="godown_code = '<?php echo $this->data["branch"]; ?>'"
                               ng-model="godown_code" ng-value="godown_code" required>
                    <?php } ?>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">Status <span class="req">*</span></label>
                            <select name="status" ng-init="status='supplier_delivery'" ng-model="status" class="form-control">
                                <option value="" selected>Select Status</option>
                                <option value="supplier_receive">Supplier Replace Receive</option>
                                <option value="supplier_delivery">Supplier Replace Delivery</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3" ng-show="status=='supplier_receive'">
                        <div class="form-group">
                            <label class="control-label"> {{(status=='client_receive' ? 'Product' : 'Stock')}} <span
                                        class="req">*</span></label>
                            <select ui-select2="{ allowClear: true}" class="form-control" ng-model="productCode"
                                    ng-change="addNewProductFn(productCode, 'receive')">
                                <option value="" selected disable>Select Product</option>
                                <option ng-repeat="row in stockList" value="{{row.code}}">{{ row.code }} - {{
                                    row.product_model }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3" ng-show="status=='supplier_delivery'">
                        <div class="form-group">
                            <label class="control-label">Replace Stock <span class="req">*</span></label>
                            <select ui-select2="{ allowClear: true}" class="form-control" ng-model="repProductCode"
                                    ng-change="addNewProductFn(repProductCode, 'delivery')">
                                <option value="" selected disable>Select Product</option>
                                <option ng-repeat="row in replaceStockList" value="{{row.product_code}}">{{ row.product_code }} - {{
                                    row.product_model }} - Qty: {{ row.quantity }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <!--<div class="col-md-1">
                        <div class="form-group">
                            <label for="" class="control-label">&nbsp;</label>
                            <div class="">
                                <a class="btn btn-success" ng-click="addNewProductFn()">
                                    <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>-->
                </div>
                <hr style="margin-top: 0px;">
                <table class="table table-bordered table2">
                    <tr>
                        <th width="45px">SL</th>
                        <th>Product Name</th>
                        <th>Model</th>
                        <th>Stock</th>
                        <th ng-show="status=='supplier_delivery'">Serial</th>
                        <th width="150">Qty</th>
                        <th width="60">Action</th>
                    </tr>
                    <tr ng-repeat="item in cart">
                        <input type="hidden" name="product_code[]" ng-value="item.code">
                        <input type="hidden" name="stock_type[]" ng-value="item.stock_type">

                        <td style="padding: 6px 8px !important;">{{ $index + 1 }}</td>
                        <td style="padding: 6px 8px !important; background-color: #eee;">
                            {{item.category | textBeautify}}
                        </td>
                        <td style="padding: 6px 8px !important; background-color: #eee;">
                            {{item.product_model}}
                        </td>
                        <td style="padding: 6px 8px !important; background-color: #eee;">
                            {{item.stock_qty}}
                        </td>

                        <td ng-show="status=='supplier_delivery'">
                            <input type="text" name="product_serial[]" ng-model="item.product_serial" autocomplete="off" class="form-control">
                        </td>
                        <td>
                            <input type="number" name="quantity[]" ng-model="item.quantity" class="form-control" step="any">
                        </td>
                        <td class="text-center">
                            <a title="Delete" class="btn btn-danger" ng-click="deleteItemFn($index)">
                                <i class="fa fa-times fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="5" class="text-right">Total</th>
                        <th>
                            {{getTotalQtyFn()}}
                            <input type="hidden" name="total_quantity" ng-value="getTotalQtyFn()" step="any">
                        </th>
                    </tr>
                </table>

                <!-- replace saction -->
                <div ng-show="status=='supplier_receive'">
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="" class="control-label">Replace Type <span class="req">*</span></label>
                                <select name="replace_type" ng-init="replaceType=''" ng-model="replaceType" class="form-control">
                                    <option value="">Select Replace Type</option>
                                    <option value="product">Product</option>
                                    <option value="amount">Amount</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3" ng-show="replaceType=='product'">
                            <div class="form-group">
                                <label for="" class="control-label">Product <span class="req">*</span></label>
                                <select ui-select2="{ allowClear: true}" class="form-control"
                                        ng-model="replaceProductCode"
                                        ng-change="addReplaceProductFn(replaceProductCode)">
                                    <option value="" selected disable>Select Product</option>
                                    <option ng-repeat="row in stockList" value="{{row.code}}">{{ row.code }} - {{
                                        row.product_model }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3" ng-show="replaceType=='amount'">
                            <div class="form-group">
                                <label for="" class="control-label">Amount <span class="req">*</span></label>
                                <input type="number" name="replace_amount" ng-model="replaceAmount" class="form-control" step="any">
                            </div>
                        </div>
                    </div>


                    <table class="table table-bordered table2" ng-show="replaceType=='product'">
                        <tr>
                            <th width="45px">SL</th>
                            <th>Product Name</th>
                            <th>Model</th>
                            <th width="150">Qty</th>
                            <th width="60">Action</th>
                        </tr>
                        <tr ng-repeat="item in replaceCart">
                            <input type="hidden" name="replace_product_code[]" ng-value="item.code">
                            <input type="hidden" name="replace_stock_type[]" ng-value="item.stock_type">

                            <td style="padding: 6px 8px !important;">{{ $index + 1 }}</td>
                            <td style="padding: 6px 8px !important; background-color: #eee;">
                                {{item.category | textBeautify}}
                            </td>
                            <td style="padding: 6px 8px !important; background-color: #eee;">
                                {{item.product_model}}
                            </td>
                            <td>
                                <input type="number" name="replace_quantity[]" ng-model="item.quantity" class="form-control" step="any">
                            </td>
                            <td class="text-center">
                                <a title="Delete" class="btn btn-danger" ng-click="deleteReplaceItemFn($index)">
                                    <i class="fa fa-times fa-lg"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-right">Total</th>
                            <th>
                                {{getReplaceTotalQtyFn()}}
                                <input type="hidden" name="" ng-value="getReplaceTotalQtyFn()">
                            </th>
                        </tr>
                    </table>
                    <hr>
                </div>

                <div class="row form-horizontal">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Client <span class="req">*</span></label>
                            <div class="col-md-8">
                                <select ui-select2="{ allowClear: true}" class="form-control" name="party_code"
                                        ng-init="partyCode=''"
                                        ng-model="partyCode" ng-change="setPartyfn(partyCode)" required>
                                    <option value="" selected>Select Supplier</option>
                                    <option ng-repeat="row in supplierList" value="{{row.code}}">{{row.code}} - {{ row.name }} -
                                        {{row.address}}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Mobile</label>
                            <div class="col-md-8">
                                <input type="text" ng-value="partyInfo.mobile" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Address</label>
                            <div class="col-md-8">
                                <textarea class="form-control" ng-model="partyInfo.address" readonly></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Remarks</label>
                            <div class="col-md-8">
                                <textarea name="remarks" rows="2" class="form-control"
                                          placeholder="Remarks...."></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Delivery Date</label>
                            <div class="col-md-8">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" name="delivery_date" class="form-control"
                                           placeholder="YYYY-MM-DD">
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
    app.controller('appController', function ($scope, $http) {
        // unset stock type status
        $scope.cart = [];
        $scope.replaceCart = [];
        $scope.$watch('status', function (status) {
            $scope.cart = [];
            $scope.replaceCart = [];
        });

        $scope.replaceAmount = 0;
        $scope.$watch('replaceType', function (replaceType) {
            $scope.replaceCart = [];
            $scope.replaceAmount = 0;
        });

        // get product list
        $scope.cart = [];
        $scope.stockList = [];
        $scope.replaceStockList = [];
        $scope.$watch('godown_code', function (godownCode) {

            $scope.cart = [];
            $scope.replaceCart = [];
            $scope.supplierList = [];
            $scope.stockList = [];
            $scope.replaceStockList = [];

            if (typeof godownCode !== 'undefined' && godownCode != '') {

                // get stock product list
                $http({
                    method: 'POST',
                    url: url + 'result',
                    data: {
                        table: 'stock',
                        cond: {'godown_code': godownCode},
                        select: ['code', 'name', 'product_model']
                    }
                }).success(function (stockList) {
                    if (stockList.length > 0) {
                        $scope.stockList = stockList;
                    }
                });

                // get replace stock product list
                $http({
                    method: 'POST',
                    url: url + 'join',
                    data: {
                        tableFrom: 'replace_stock',
                        tableTo: 'stock',
                        joinCond: 'replace_stock.product_code=stock.code AND replace_stock.godown_code=stock.godown_code',
                        cond: {'replace_stock.godown_code': godownCode, 'replace_stock.quantity >': '0'},
                        select: ['replace_stock.*', 'stock.name', 'stock.product_model']
                    }
                }).success(function (replaceStockList) {
                    if (replaceStockList.length > 0) {
                        $scope.replaceStockList = replaceStockList;
                    }
                });

                // get supplier list
                $http({
                    method: 'POST',
                    url: url + 'result',
                    data: {
                        table: 'parties',
                        cond: {
                            'godown_code': godownCode,
                            'status': 'active',
                            //'type': 'supplier',
                            'trash': 0
                        },
                        select: ['code', 'name', 'godown_code', 'mobile', 'address']
                    }
                }).success(function (partyList) {
                    if (partyList.length > 0) {
                        $scope.supplierList = partyList;
                    }
                });
            }
        });


        $scope.partyInfo = {};
        // Get Party Info
        $scope.setPartyfn = function (partyCode) {

            $scope.partyInfo = {};

            if (typeof partyCode !== 'undefined' && partyCode != '') {

                $http({
                    method: 'POST',
                    url: url + 'result',
                    data: {
                        table: "parties",
                        cond: {code: partyCode},
                        select: ['code', 'name', 'mobile', 'address']
                    }
                }).success(function (partyInfo) {

                    if (partyInfo.length > 0) {

                        $scope.partyInfo = {
                            name: partyInfo[0].name,
                            mobile: partyInfo[0].mobile,
                            address: partyInfo[0].address
                        };
                    }
                });
            }
        };


        // add new product in cart
        $scope.addNewProductFn = function (code, type) {

            var code = (typeof code !== 'undefined' && code != '' ? code : '');
            var type = (typeof type !== 'undefined' && type != '' ? type : '');

            // add replace product
            if (typeof $scope.godown_code !== 'undefined' && $scope.godown_code != '' && code != '' && type != '') {

                if (type == 'delivery') {
                    $http({
                        method: 'POST',
                        url: url + 'join',
                        data: {
                            tableFrom: 'replace_stock',
                            tableTo: 'stock',
                            joinCond: 'replace_stock.product_code=stock.code AND replace_stock.godown_code=stock.godown_code',
                            cond: {
                                'replace_stock.godown_code': $scope.godown_code,
                                'replace_stock.product_code': code,
                                'replace_stock.quantity >': '0'
                            },
                            select: ['replace_stock.*', 'stock.name', 'stock.product_model', 'stock.category']
                        }
                    }).success(function (response) {

                        if (response.length > 0) {

                            var item = {
                                code: response[0].product_code,
                                name: response[0].name,
                                product_model: response[0].product_model,
                                product_serial: '',
                                category: response[0].category,
                                stock_qty: response[0].quantity,
                                quantity: 1,
                                stock_type: 'replace_stock',
                            };

                            $scope.cart.push(item);
                        }
                    });
                }

                if (type == 'receive') {
                    $http({
                        method: 'POST',
                        url: url + 'result',
                        data: {
                            table: 'stock',
                            cond: {
                                code: code,
                                godown_code: $scope.godown_code
                            },
                            select: ['code', 'name', 'quantity', 'product_model', 'category']
                        }
                    }).success(function (response) {

                        if (response.length > 0) {

                            var item = {
                                code: response[0].code,
                                name: response[0].name,
                                product_model: response[0].product_model,
                                product_serial: '',
                                category: response[0].category,
                                stock_qty: response[0].quantity,
                                quantity: 1,
                                stock_type: 'replace_stock',
                            };

                            $scope.cart.push(item);
                        }
                    });
                }
            }
        };

        // add new product in cart
        $scope.addReplaceProductFn = function (code) {

            var code = (typeof code !== 'undefined' && code != '' ? code : '');

            // add replace product
            if (typeof $scope.godown_code !== 'undefined' && $scope.godown_code != '' && code != '') {

                $http({
                    method: 'POST',
                    url: url + 'result',
                    data: {
                        table: 'stock',
                        cond: {
                            code: code,
                            godown_code: $scope.godown_code
                        },
                        select: ['code', 'name', 'product_model', 'category']
                    }
                }).success(function (response) {

                    if (response.length > 0) {

                        var item = {
                            stock_id: '',
                            code: response[0].code,
                            name: response[0].name,
                            product_model: response[0].product_model,
                            product_serial: '',
                            category: response[0].category,
                            quantity: 1,
                            stock_type: 'stock',
                        };

                        $scope.replaceCart.push(item);
                    }
                });
            }
        };

        // calculate total
        $scope.isDisabled = true;
        $scope.getTotalQtyFn = function () {

            var totalQuantity = 0;
            angular.forEach($scope.cart, function (item) {
                totalQuantity += parseFloat(item.quantity);
            });

            $scope.isDisabled = (totalQuantity > 0 ? false : true);

            return totalQuantity;
        };

        // replace total
        $scope.getReplaceTotalQtyFn = function () {

            var totalQuantity = 0;
            angular.forEach($scope.replaceCart, function (item) {
                totalQuantity += parseFloat(item.quantity);
            });

            return totalQuantity;
        };

        // remove cart item
        $scope.deleteItemFn = function (index) {
            $scope.cart.splice(index, 1);
        };

        // remove repalce cart item
        $scope.deleteReplaceItemFn = function (index) {
            $scope.replaceCart.splice(index, 1);
        };
    });
</script>
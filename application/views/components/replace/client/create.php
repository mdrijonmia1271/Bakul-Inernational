<style>
    .table2 tr td input {border: 1px solid transparent;}
    .table2 tr td {padding: 0 !important;}
    .new-row-1 .col-md-4 {margin-bottom: 8px;}
    .red, .red:focus {border-color: red;}
    .green, .green:focus {border-color: green;}
</style>
<div class="container-fluid" ng-controller="appController" ng-cloak>
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
                <?php echo form_open('replace/client/store'); ?>

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
                        <input type="hidden" name="godown_code"
                               ng-init="godown_code = '<?php echo $this->data["branch"]; ?>'"
                               ng-model="godown_code" ng-value="godown_code" required>
                    <?php } ?>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">Status <span class="req">*</span></label>
                            <select name="status" ng-init="status='client_receive'" ng-model="status" class="form-control">
                                <option value="" selected>Select Status</option>
                                <option value="client_receive">Client Replace Receive</option>
                                <option value="client_delivery">Client Replace Delivery</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2" ng-show="status=='client_delivery'">
                        <div class="form-group">
                            <label class="control-label">Stock Type <span class="req">*</span></label>
                            <select ng-model="stockType" class="form-control">
                                <option value="" selected>Select Stock</option>
                                <option value="stock">Stock</option>
                                <option value="replace_stock">Replace Stock</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3" ng-show="stockType=='stock' || status=='client_receive'">
                        <div class="form-group">
                            <label class="control-label">
                                {{ (status=='client_receive' ? 'Product' : 'Stock') }}
                                <span class="req">*</span>
                            </label>
                            <select ui-select2="{ allowClear: true}" class="form-control" ng-model="productCode"
                                    ng-change="addNewProductFn()">
                                <option value="" selected disable>Select Product</option>
                                <option ng-repeat="row in stockList" value="{{row.code}}">
                                    {{ row.code }} - {{ row.product_model }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3" ng-show="stockType=='replace_stock'">
                        <div class="form-group">
                            <label class="control-label">Replace Stock <span class="req">*</span></label>
                            <select ui-select2="{ allowClear: true}" class="form-control" ng-model="repProductCode"
                                    ng-change="addNewProductFn()">
                                <option value="" selected disable>Select Product</option>
                                <option ng-repeat="row in replaceStockList" value="{{row.product_code}}">
                                    {{ row.product_code }} - {{ row.product_model }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr style="margin-top: 0px;">
                <table class="table table-bordered table2">
                    <tr>
                        <th width="45px">SL</th>
                        <th>Product Name</th>
                        <th>Model</th>
                        <th ng-if="status=='client_delivery'">Stock Qty</th>
                        <th ng-if="status=='client_delivery'">Stock Type</th>
                        <th>Serial</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Sub Total</th>
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
                        
                        <td ng-if="status=='client_delivery'" style="padding: 6px 8px !important; background-color: #eee;">
                            {{item.stock_qty}}
                        </td>
                        
                        <td ng-if="status=='client_delivery'" style="padding: 6px 8px !important; background-color: #eee;">
                            {{item.stock_type | textBeautify}}
                        </td>

                        <td>
                            <input type="text" name="product_serial[]" ng-model="item.product_serial" autocomplete="off"
                                   class="form-control">
                        </td>
                        
                        <td>
                            <input ng-if="status=='client_receive'" type="number" name="quantity[]" ng-model="item.quantity"
                                class="form-control" autocomplete="off" step="any">
                            <input ng-if="status=='client_delivery'" type="number" name="quantity[]" ng-model="item.quantity"
                                max="{{item.stock_qty}}" class="form-control" autocomplete="off" step="any">
                        </td>
                        
                        <td>
                            <input type="number" name="price[]" ng-model="item.price" class="form-control" step="any">
                        </td>
                        
                        <td>
                            <input type="number" name="sub_total[]" ng-value="getSubTotalFn($index)" class="form-control" step="any">
                        </td>
                        
                        <td class="text-center">
                            <a title="Delete" class="btn btn-danger" ng-click="deleteItemFn($index)">
                                <i class="fa fa-times fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    <!--<tr>
                        <th colspan="{{(status == 'client_receive' ? 4 : 6)}}" class="text-right">Total</th>
                        <th>
                            {{getTotalQtyFn()}}
                            <input type="hidden" name="total_quantity" ng-value="getTotalQtyFn()">
                        </th>
                    </tr>-->
                </table>

                <div class="row form-horizontal">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Client Type</label>
                            <div class="col-md-8">
                                <span class="btn" ng-class="cashButton" ng-click="setpartyTypeFn('cash')">Cash</span>
                                <span class="btn" ng-class="clientButton" ng-click="setpartyTypeFn('client')">Credit</span>
                            </div>
                        </div>

                        <input type="hidden" name="party_type" ng-value="partyType">

                        <div ng-show="partyType=='client'">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Client</label>
                                <div class="col-md-8">
                                    <select ui-select2="{ allowClear: true}" class="form-control" name="party_code"
                                            ng-init="partyCode=''" ng-model="partyCode" ng-change="setPartyfn(partyCode)">
                                        <option value="" selected>Select Client</option>
                                        <option ng-repeat="row in clientList" value="{{row.code}}">
                                             {{ row.code }} - {{ row.name }} - {{row.address}}
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

                        <div ng-show="partyType=='cash'">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="party_name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Mobile</label>
                                <div class="col-md-8">
                                    <input type="text" name="partyInfo[mobile]" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Address</label>
                                <div class="col-md-8">
                                    <textarea name="partyInfo[address]" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Send SMS</label>
                            <div class="col-md-2">
                                <input type="checkbox" name="send_sms" class="form-control" checked>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Total Quantity</label>
                            <div class="col-md-8">
                                <input type="number" name="total_quantity" ng-value="getTotalQtyFn()" class="form-control" placeholder="0"
                                       step="any" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Total Amount</label>
                            <div class="col-md-8">
                                <input type="number" name="total_amount" ng-value="getTotalFn()" class="form-control" placeholder="0"
                                       step="any" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Replace Amount</label>
                            <div class="col-md-8">
                                <input type="number" name="replace_amount" class="form-control" placeholder="0"
                                       step="any">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Remarks</label>
                            <div class="col-md-8">
                                <textarea name="remarks" rows="2" class="form-control" placeholder="Remarks...."></textarea>
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
        $scope.cart = [];
        // unset stock type status
        $scope.stockType = '';
        $scope.$watch('status', function (status) {
            $scope.cart = [];
            if (typeof status !== 'undefined' && status != '' && status == 'client_receive') {
                $scope.stockType = '';
            }
        });
        // get product list
        $scope.clientList = [];
        $scope.stockList = [];
        $scope.replaceStockList = [];
        $scope.$watch('godown_code', function (godownCode) {
            
            $scope.cart = [];
            $scope.clientList = [];
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
                // get client list
                $http({
                    method: 'POST',
                    url: url + 'result',
                    data: {
                        table: 'parties',
                        cond: {
                            'godown_code': godownCode,
                            'status': 'active',
                            // 'type': 'client',
                            'trash': 0
                        },
                        select: ['code', 'name', 'godown_code', 'mobile', 'address']
                    }
                }).success(function (partyList) {
                    console.log(partyList);
                    if (partyList.length > 0) {
                        $scope.clientList = partyList;
                    }
                });
            }
        });
        $scope.partyInfo = {};
        $scope.partyType = 'client';
        $scope.cashButton = 'btn-default';
        $scope.clientButton = 'btn-success';
        $scope.setpartyTypeFn = function (type) {
            $scope.partyInfo = {};
            $scope.partyCode = '';
            if (type == 'client') {
                $scope.cashButton = 'btn-default';
                $scope.clientButton = 'btn-success';
            } else {
                $scope.cashButton = 'btn-success';
                $scope.clientButton = 'btn-default';
            }
            $scope.partyType = (typeof type !== 'undefined' && type != '' ? type : 'client');
        }
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
        $scope.addNewProductFn = function () {
            var productCode = (typeof $scope.productCode !== 'undefined' && $scope.productCode != '' ? $scope.productCode : '');
            var repProductCode = (typeof $scope.repProductCode !== 'undefined' && $scope.repProductCode != '' ? $scope.repProductCode : '');
            var status = (typeof $scope.status !== 'undefined' && $scope.status != '' ? $scope.status : '');
            if (typeof $scope.godown_code !== 'undefined' && $scope.godown_code != '') {
                // add stock product
                if (status != '' && status == 'client_receive' || $scope.stockType == 'stock') {
                    $http({
                        method: 'POST',
                        url: url + 'read',
                        data: {
                            table: 'stock',
                            cond: {
                                code: productCode,
                                godown_code: $scope.godown_code,
                            },
                            select: ['code', 'name', 'quantity', 'product_model', 'category']
                        }
                    }).success(function (response) {
                        if (response.length > 0) {
                            var item = {
                                code          : response[0].code,
                                name          : response[0].name,
                                stock_qty     : response[0].quantity,
                                product_model : response[0].product_model,
                                product_serial: '',
                                category      : response[0].category,
                                quantity      : 1,
                                price         : 0,
                                stock_type    : $scope.stockType,
                            };
                            $scope.cart.push(item);
                        }
                    });
                }
                // add replace product
                if (status != '' && status == 'client_delivery' && $scope.stockType == 'replace_stock') {
                    $http({
                        method: 'POST',
                        url: url + 'join',
                        data: {
                            tableFrom: 'replace_stock',
                            tableTo: 'stock',
                            joinCond: 'replace_stock.product_code=stock.code AND replace_stock.godown_code=stock.godown_code',
                            cond: {
                                'replace_stock.godown_code': $scope.godown_code,
                                'replace_stock.product_code': repProductCode,
                                'replace_stock.quantity >': '0'
                            },
                            select: ['replace_stock.*', 'stock.name', 'stock.product_model', 'stock.category']
                        }
                    }).success(function (response) {
                        if (response.length > 0) {
                            var item = {
                                code: response[0].product_code,
                                name: response[0].name,
                                stock_qty: response[0].quantity,
                                product_model: response[0].product_model,
                                product_serial: '',
                                category: response[0].category,
                                quantity: 1,
                                stock_type: $scope.stockType,
                            };
                            $scope.cart.push(item);
                        }
                    });
                }
            }
        };
        
        // calculate sub total
        $scope.getSubTotalFn = function (index) {
            var total = 0;
            total = parseFloat($scope.cart[index].quantity) * parseFloat($scope.cart[index].price);
            $scope.cart[index].sub_toatl = total;
            return total;
        };
        
        // calculate total qty
        $scope.isDisabled = true;
        $scope.getTotalQtyFn = function () {
            var totalQuantity = 0;
            angular.forEach($scope.cart, function (item) {
                totalQuantity += parseFloat(item.quantity);
            });
            $scope.isDisabled = (totalQuantity > 0 ? false : true);
            return totalQuantity;
        };
        
        // calculate total
        $scope.getTotalFn = function () {
            var total = 0;
            angular.forEach($scope.cart, function (item) {
                total += parseFloat(item.sub_toatl);
            });
            return total;
        };
        
        // remove cart item
        $scope.deleteItemFn = function (index) {
            $scope.cart.splice(index, 1);
        };
    });
</script>
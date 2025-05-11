<script src="<?php echo site_url('private/js/ngscript/PurchaseEntry.js?').time(); ?>"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
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
<div class="container-fluid" ng-controller="PurchaseEntry" ng-cloak>
    <div class="row">
        <?php echo $this->session->flashdata("confirmation"); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Purchase</h1>
                </div>
            </div>
            <div class="panel-body">
                <!-- horizontal form -->
                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open('', $attr);
                
                if($this->data['privilege'] == 'super') {
                    $godown = 'yes';
                    $column = '2';
                }else{
                    $godown = 'no';
                    $column = '3';
                }
                ?>


                <div class="row new-row-1">
                    <div class="col-md-2">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" value="<?php echo date('Y-m-d');?>"
                                placeholder="Date" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <?php if (checkAuth('super')) { ?>
                        <div class="col-md-2">
                            <select class="form-control" name="godown_code" ng-init="godown_code = '<?php echo $this->data['branch']; ?>'" ng-model="godown_code" required>
                                <option value="" selected disabled>-- Select Showroom --</option>
                                <?php if (!empty($allGodowns)) {
                                    foreach ($allGodowns as $row) { ?>
                                        <option value="<?php echo $row->code; ?>">
                                            <?php echo filter($row->name) . " ( " . $row->address . " ) "; ?>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                    <?php } else { ?>
                        <input type="hidden" name="godown_code" ng-init="godown_code = '<?php echo $this->data['branch']; ?>'"
                               ng-model="godown_code" ng-value="godown_code"
                               required>
                    <?php } ?>

                    <div class="col-md-2">
                        <input type="text" name="voucher_no" placeholder="Voucher No" class="form-control" required
                            ng-class="{'red': validation}" ng-model="voucherNo" ng-change="exists()">
                    </div>

                                   
                       


                    <div class="col-md-<?php echo 3 //$column; ?>">
                        <select ng-model="product_code" class="selectpicker form-control" data-show-subtext="true"
                            data-live-search="true" ng-change="addNewProductFn(product_code)" required>
                            <option value="" selected disabled>-- Select Product --</option>
                            <?php if(!empty($allProducts)){ foreach($allProducts as $key => $row){ ?>
                            <option value="<?php echo $row->product_code; ?>">
                                <?php echo filter($row->product_model).' - '.$row->brand; ?>
                            </option>
                            <?php }} ?>
                        </select>
                    </div>

                </div>
                <hr>
                <table class="table table-bordered table2">
                    <tr>
                        <th width="45px">SL</th>
                        <th>Model</th>
                        <th width="130">Price</th>
                        <th width="100">Comm.(%)</th>
                        <th width="100">Qty</th>
                        <th width="130">P.Price</th>
                        <th width="130">Total</th>
                        <th width="60">Action</th>
                    </tr>
                    <tr ng-repeat="item in cart">
                        <td style="padding: 6px 8px !important;">{{ $index + 1 }}</td>
                        <td>
                            <input type="text" name="product_model[]" class="form-control" ng-model="item.product_model"
                                readonly>
                            <input type="hidden" name="product[]" class="form-control" ng-value="item.product" readonly>
                            <input type="hidden" name="product_code[]" ng-value="item.product_code">
                            <input type="hidden" name="product_cat[]" ng-value="item.product_cat">
                            <input type="hidden" name="product_subcat[]" ng-value="item.product_subcat">
                            <input type="hidden" name="unit[]" class="form-control" ng-value="item.unit">
                            <input type="hidden" name="sale_price[]" class="form-control" ng-value="item.sale_price" step="any">
                            <input type="hidden" name="retail_sale_price[]" class="form-control" ng-value="item.retail_sale_price">
                            <input type="hidden" name="dealer_sale_price[]" class="form-control" ng-value="item.dealer_sale_price">
                            <input type="hidden" name="dealer_a_price[]" class="form-control" ng-value="item.dealer_a_price">
                            <input type="hidden" name="dealer_b_price[]" class="form-control" ng-value="item.dealer_b_price">
                            <input type="hidden" name="dealer_c_price[]" class="form-control" ng-value="item.dealer_c_price">
                        </td>
                        
                        <td>
                            <input type="number" class="form-control" ng-model="item.sale_price" step="any">
                        </td>
                        
                        <td>
                            <input type="number" step="any" name="commission[]" class="form-control"
                                   ng-model="item.commission" ng-change="setPurchasePrice($index)">
                        </td>
                        
                        <td>
                            <input type="number" name="quantity[]" class="form-control" min="1"
                                   ng-model="item.quantity" ng-change="setPurchasePrice($index)">
                        </td>
                        
                        <td>
                            <input type="number" name="purchase_price[]" class="form-control" min="0"
                                   ng-model="item.purchase_price" step="any"
                                   ng-change="setPurchasePrice($index)">
                        </td>
                        
                        <td>
                            <input type="text" name="subtotal[]" class="form-control" ng-model="item.subtotal"
                                 ng-value="setSubtotalFn($index)"  readonly>
                        </td>

                        <!--<td>-->
                        <!--    <input type="number" class="form-control" ng-model="item.price" step="any">-->
                        <!--</td>-->
                        <!--<td>-->
                        <!--    <input type="number" step="any" name="commission[]" class="form-control" ng-model="item.commission">-->
                        <!--</td>-->

                        <!--<td>-->
                        <!--    <input type="text" name="quantity[]" class="form-control" min="1"-->
                        <!--        ng-model="item.quantity">-->
                        <!--</td>-->

                        <!--<td>-->
                        <!--    <input type="number" name="purchase_price[]" class="form-control" min="0"-->
                        <!--        ng-value="setPurchasePrice($index)" step="any">-->
                        <!--</td>-->

                        <!--<td>-->
                        <!--    <input type="text" name="subtotal[]" class="form-control" ng-model="item.subtotal"-->
                        <!--        ng-value="setSubtotalFn($index)" readonly>-->
                        <!--</td>-->
                        <td class="text-center">
                            <a title="Delete" class="btn btn-danger" ng-click="deleteItemFn($index)">
                                <i class="fa fa-times fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                </table>
                <hr>
                
        
                   <!-- AngularJS লাইব্রেরি অবশ্যই যোগ করুন -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

<div ng-app="" ng-init='
    supplierList=[
        {code:"S001", name:"Mehedi Traders", address:"Dhaka", mobile:"01711111111"},
        {code:"S002", name:"Al Amin Store", address:"Chittagong", mobile:"01822222222"},
        {code:"S003", name:"Super Mart", address:"Rajshahi", mobile:"01933333333"}
    ];
    selectedSupplier={};
'>
    <div class="container-fluid">
        <div class="row">
            <!-- Left Section -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Select Supplier</label>
                    <div class="col-sm-8">
                        <select class="form-control"
                                ng-model="selectedSupplier"
                                ng-options="supplier as (supplier.name + ' - ' + supplier.address) for supplier in supplierList"
                                required>
                            <option value="">--Select Supplier--</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="party_code" ng-value="selectedSupplier.code">

                <div class="form-group row" ng-if="selectedSupplier.code">
                    <label class="col-sm-4 col-form-label">Mobile</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" ng-model="selectedSupplier.mobile" readonly>
                    </div>
                </div>

                <div class="form-group row" ng-if="selectedSupplier.code">
                    <label class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="3" readonly>{{ selectedSupplier.address }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="col-md-6 col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Total Quantity</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" ng-value="getTotalQtyFn()" step="any" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Total</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" ng-value="getTotalFn()" step="any" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Total Discount</label>
                    <div class="col-sm-7">
                        <input type="number" name="total_discount" class="form-control" ng-model="amount.totalDiscount" step="any" placeholder="0" max="{{ getTotalFn() }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Transport Cost</label>
                    <div class="col-sm-7">
                        <input type="number" name="transport_cost" class="form-control" ng-model="amount.transport_cost" step="any" placeholder="0">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Grand Total</label>
                    <div class="col-sm-7">
                        <input type="number" name="grand_total" class="form-control" ng-value="getGrandTotalFn()" step="any" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Previous Balance</label>
                    <div class="col-sm-4">
                        <input type="number" name="previous_balance" class="form-control" ng-model="partyInfo.balance" step="any" readonly>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="previous_sign" class="form-control" ng-value="partyInfo.sign" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Paid</label>
                    <div class="col-sm-4">
                        <input type="number" name="paid" class="form-control" ng-model="amount.paid" step="any" placeholder="0">
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control" name="method">
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                            <option value="bKash">bKash</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Current Balance</label>
                    <div class="col-sm-4">
                        <input type="number" name="current_balance" class="form-control" ng-value="getCurrentTotalFn()" step="any" readonly>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="current_sign" class="form-control" ng-value="partyInfo.csign" readonly>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" name="save" class="btn btn-primary" ng-disabled="validation">Save</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script>
    // linking between two date
    let privilege ='<?= $this->data['privilege']; ?>';
   /* if(privilege=='user'){
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            minDate:new Date()
        });
    }else{*/
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
        }); 
    
</script>
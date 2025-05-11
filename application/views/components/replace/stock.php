<?php if (isset($meta->header)) {
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
        .hide {display: block !important;}
    }
    @page {margin: 0;}
</style>

<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Replace Stock</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
                       onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body none" style="padding-bottom: 0px;">
                <?php echo form_open(); ?>
                <div class="row">
                    <?php if (checkAuth('super')) { ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="godown_code" ng-init="godown_code='<?php echo $this->data["branch"]; ?>'" ng-model="godown_code" ng-change="getPartyFn(partyType)" class="form-control">
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
                    <?php }else{ ?>
                        <input type="hidden" name="godown_code" ng-init="godown_code='<?php echo $this->data["branch"]; ?>'" ng-model="godownCode" ng-value="godownCode" required>
                    <?php } ?>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <select ui-select2="{ allowClear: true}" class="form-control" name="search[product_code]" ng-model="productCode">
                                <option value="" selected disable>Select Product</option>
                                <?php
                                if (!empty($productList)){
                                    foreach ($productList as $option) {
                                        echo '<option value="'. $option->product_code .'">' . $option->product_code .' - '. $option->product_model . '</option>';
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

            <hr class="none" style="margin-top: 0">

            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php $this->load->view('print', $this->data); ?>
                <!-- Print banner End Here -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30">SL</th>
                            <th>Product Model</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Brand</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                        </tr>
    
<?php
$totalQty = 0;
if (!empty($results)) {
    foreach ($results as $key => $row) {

        // Purchase Quantity Calculation
        $purchaseQty = custom_query("SELECT IFNULL(SUM(quantity), 0) AS quantity FROM `replace` WHERE godown_code='$row->godown_code' AND product_code='$row->product_code' AND party_type='supplier' AND trash=0", true)->quantity;

        // Actual Quantity Calculation
        $quantity = $row->quantity - $purchaseQty;

        // Debugging: Output calculated quantity
        echo "Calculated Quantity for product code: ".$row->product_code." => ".$quantity."<br>";

        // Add to total
        $totalQty += $quantity;

        // Style negative quantity in red
        $quantityStyle = ($quantity < 0) ? 'color: red;' : '';

        ?>
        <tr>
            <td><?php echo ++$key; ?></td>
            <td><?php echo filter($row->product_model); ?></td>
            <td><?php echo filter($row->product_cat); ?></td>
            <td><?php echo filter($row->subcategory); ?></td>
            <td><?php echo filter($row->brand); ?></td>
            <td><?php echo filter($row->unit); ?></td>
            <td style="<?php echo $quantityStyle; ?>"><?php echo number_format($quantity, 2); ?></td>
        </tr>
    <?php }
} else { ?>
    <tr>
        <th colspan="7" class="text-center">No record found....!</th>
    </tr>
<?php }
?>

<tr>
    <th colspan="6" class="text-right">Total</th>
    <th><?php echo number_format($totalQty, 2); ?></th>
</tr>

                        <tr>
                            <th colspan="6" class="text-right">Total</th>
                            <th><?php echo $totalQty; ?></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
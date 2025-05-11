<!-- Select Option 2 Stylesheet -->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"/>
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
    }

    .wid-100 {
        width: 100px;
    }

    #loading {
        text-align: center;
    }

    #loading img {
        display: inline-block;
    }

    .tableHeader {
        /*text-align: center;*/
        padding-left: 10px;
        padding-right: 10px;
        font-weight: bold;
        color: #333;
        background: #ddd;
        border: 1px solid #ddd;
        border-bottom: 1px solid transparent;
        font-size: 18px;
    }

</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class=" pull-left">Product Ledger</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
                       onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body none">
                <?php echo form_open(); ?>
                <div class="row">
                    <?php if (checkAuth('super')) { ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="godown_code" id="godownCode" class="form-control" required="">
                                    <option value="" selected disabled>-- Select Showroom --</option>
                                    <?php if (!empty($allGodowns)) {
                                        foreach ($allGodowns as $row) { ?>
                                            <option value="<?php echo $row->code; ?>" <?php echo (!empty($_POST['godown_code']) && $_POST['godown_code'] == $row->code ? 'selected' : ''); ?>>
                                                <?php echo filter($row->name) . " ( " . $row->address . " ) "; ?>
                                            </option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                    <?php } else { ?>
                        <input type="hidden" id="godownCode" value="<?php echo $this->data['branch']; ?>">
                    <?php } ?>

                    <div class="col-md-3">
                        <div class="form-group">
                            <input name="product_code" id="products" style="width:100%;" class="form-control"
                                   placeholder="Select Product" autocomplete="off" required=""/>

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepickerFrom">
                                <input type="text" name="dateFrom" class="form-control" placeholder="From">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepickerTo">
                                <input type="text" name="dateTo" class="form-control" placeholder="To">
                                <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <div class="form-group">
                            <input type="submit" name="show" value="Show" class="btn btn-primary">
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <hr style="margin-top: 0px;" class="none">


            <div class="panel-body">
                <!-- Print banner -->
                <?php $this->load->view('print', $this->data); ?>

                <h4 class="hide text-center" style="margin-top: 0px;">
                    Product Ledger
                    
                </h4>
                <div class="table-responsive">
                <?php
$allData = [];
$sl = 1;
$purchase = $purchase_return = $sale = $sale_return = $client_replace_rcv = $supplier_replace_rcv = 0;

// Collect purchase data
if (!empty($results->purchaseInfo)) {
    foreach ($results->purchaseInfo as $row) {
        $allData[] = [
            'date' => $row->sap_at,
            'status' => 'Purchase',
            'voucher_no' => $row->voucher_no,
            'quantity' => $row->quantity,
            'type' => 'purchase'
        ];
    }
}

// Collect purchase return
if (!empty($results->purchaseReturnInfo)) {
    foreach ($results->purchaseReturnInfo as $row) {
        $allData[] = [
            'date' => $row->date,
            'status' => 'Purchase Return',
            'voucher_no' => $row->voucher_no,
            'quantity' => $row->quantity,
            'type' => 'purchase_return'
        ];
    }
}

// Collect sale data
if (!empty($results->saleInfo)) {  // Change: Corrected the source data for sale
    foreach ($results->saleInfo as $row) {
        $allData[] = [
            'date' => $row->sap_at,
            'status' => 'Sale',
            'voucher_no' => $row->voucher_no,
            'quantity' => $row->quantity,
            'type' => 'sale'
        ];
    }
}

// Collect sale return
if (!empty($results->saleReturnInfo)) {
    foreach ($results->saleReturnInfo as $row) {
        $allData[] = [
            'date' => $row->date,
            'status' => 'Sale Return',
            'voucher_no' => $row->voucher_no,
            'quantity' => $row->quantity,
            'type' => 'sale_return'
        ];
    }
}

// Client replace delivery
if (!empty($results->clientReplaceDelivery)) {
    foreach ($results->clientReplaceDelivery as $row) {
        $allData[] = [
            'date' => $row->created_at,
            'status' => 'Client Replace Delivery',
            'voucher_no' => $row->voucher_no,
            'quantity' => $row->quantity,
            'type' => 'client_replace_delivery'
        ];
    }
}

// Supplier replace receive
if (!empty($results->supplierReplaceRcv)) {
    foreach ($results->supplierReplaceRcv as $row) {
        $allData[] = [
            'date' => $row->created_at,
            'status' => 'Supplier Replace Receive',
            'voucher_no' => $row->voucher_no,
            'quantity' => $row->quantity,
            'type' => 'supplier_replace_receive'
        ];
    }
}

// Sort by date
usort($allData, function($a, $b) {
    return strtotime($a['date']) - strtotime($b['date']);
});

$currentStock = 0;
?>

<table class="table table-bordered">
    <caption class="tableHeader">
        Stock Status : 
        <?php if (!empty($_POST['product_code'])) {
            echo get_name('products','product_model',['product_code' => $_POST['product_code']]);
        } ?>
    </caption>
    <tr>
        <th>SL</th>
        <th>Date</th>
        <th>Status</th>
        <th>Voucher No</th>
        <th>Quantity</th>
        <th>Balance</th>
    </tr>

    <?php foreach ($allData as $row): ?>
        <tr>
            <td><?php echo $sl++; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td style="text-align:center;font-weight:bold;"><?php echo $row['status']; ?></td>
            <td><?php echo $row['voucher_no']; ?></td>
            <td class="text-right"><?php echo $row['quantity']; ?></td>
            <td style="text-align:center;font-weight:bold;">
                <?php
                    switch ($row['type']) {
                        case 'purchase': 
                            $purchase += $row['quantity']; 
                            break;
                        case 'purchase_return': 
                            $purchase_return += $row['quantity']; 
                            break;
                        case 'sale': 
                            $sale += $row['quantity']; 
                            break;
                        case 'sale_return': 
                            $sale_return += $row['quantity']; 
                            break;
                        case 'client_replace_delivery': 
                            $client_replace_rcv += $row['quantity']; 
                            break;
                        case 'supplier_replace_receive': 
                            $supplier_replace_rcv += $row['quantity']; 
                            break;
                    }

                    $currentStock = $purchase + $sale_return + $supplier_replace_rcv - $sale - $purchase_return - $client_replace_rcv;
                    echo $currentStock;
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<p style="text-align:right;font-weight:bold;">Purchase: <?php echo $purchase; ?></p>
<p style="text-align:right;font-weight:bold;">Purchase Return: <?php echo $purchase_return; ?></p>
<p style="text-align:right;font-weight:bold;">Sale: <?php echo $sale; ?></p>
<p style="text-align:right;font-weight:bold;">Sale Return: <?php echo $sale_return; ?></p>
<p style="text-align:right;font-weight:bold;">Client Replace Delivery: <?php echo $client_replace_rcv; ?></p>
<p style="text-align:right;font-weight:bold;">Supplier Replace Receive: <?php echo $supplier_replace_rcv; ?></p>
<p style="text-align:right;font-weight:bold;">Current Stock: <?php echo $currentStock; ?></p>

                  
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<!-- Select Option 2 Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.15.0/lodash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.4/select2.min.js"></script>

<script>
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerSMSFrom").on("dp.change", function (e) {
        $('#datetimepickerSMSTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerSMSTo").on("dp.change", function (e) {
        $('#datetimepickerSMSFrom').data("DateTimePicker").maxDate(e.date);
    });

    $('.js-example-basic-single').select2();
    (function () {
        // initialize select2 dropdown
        $('#products').select2({
            data: dropdown_data(),
            placeholder: 'search',
            multiple: false,
            query: function (data) {
                var pageSize,
                    dataset,
                    that = this;
                pageSize = 20; // Number of the option loads at a time
                results = [];
                if (data.term && data.term !== '') {
                    // HEADS UP; for the _.filter function I use underscore (actually lo-dash) here
                    results = _.filter(that.data, function (e) {
                        return e.text.toUpperCase().indexOf(data.term.toUpperCase()) >= 0;
                    });
                } else if (data.term === '') {
                    results = that.data;
                }
                data.callback({
                    results: results.slice((data.page - 1) * pageSize, data.page * pageSize),
                    more: results.length >= data.page * pageSize,
                });
            },
        });
    })();

    function dropdown_data() {
        var id_arr = new Array();
        var text_arr = new Array();
        <?php
        $sl = 1;
        if(!empty($allProduct)){
        foreach($allProduct as $row){
        ?>
        id_arr['<?php echo $sl; ?>'] = '<?php echo $row->code; ?>';
        text_arr['<?php echo $sl; ?>'] = '<?php echo filter($row->code) . ' - ' . filter($row->product_model); ?>';

        <?php $sl++;  } } ?>
        return _.map(_.range(1,<?php echo count($allProduct) + 1; ?>), function (i) {
            return {
                id: id_arr[i],
                text: text_arr[i],
            };
        });
    }
</script>


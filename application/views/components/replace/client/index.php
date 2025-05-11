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
        aside, nav, .none, .panel-heading, .panel-footer {display: none !important;}
        .panel {
            border: 1px solid transparent;
            position: absolute;
            left: 0px;
            top: 0px;
            width: 100%;
        }
        .hide {display: block !important;}
    }
    .client_receive {color: red;font-weight: bold;}
    .client_delivery {color: green;font-weight: bold;}
</style>
<div class="container-fluid" ng-controller="appController" ng-cloak>
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>All Client Replace</h1>
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
                            <select ui-select2="{ allowClear: true}" class="form-control" name="search[party_type]"
                                    ng-model="partyType">
                                <option value="" selected disable>Select Client Type</option>
                                <option value="cash">Cash</option>
                                <option value="client">Client</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select ui-select2="{ allowClear: true}" class="form-control" name="search[party_code]"
                                    ng-model="partyCode">
                                <option value="" selected disable>Select Party</option>
                                <option ng-repeat="row in partyList" value="{{row.code}}">
                                    {{ row.code }} - {{ row.name }} - {{ row.address }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="search[status]" class="form-control">
                                <option value="" selected>Select Status</option>
                                <option value="client_receive">Client Replace Receive</option>
                                <option value="client_delivery">Client Replace Delivery</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="search[voucher_no]" class="form-control" placeholder="Voucher No">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepickerFrom">
                                <input type="text" name="dateFrom" class="form-control"
                                value="" <?php echo(checkAuth('user') ? 'readonly' : ''); ?> placeholder="From">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepickerTo">
                                <input type="text" name="dateTo" class="form-control"
                                value="" <?php echo(checkAuth('user') ? 'readonly' : ''); ?> placeholder="To">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            </div>
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
                <table class="table table-bordered">
                    <tr>
                        <th width="30">SL</th>
                        <th>Date</th>
                        <th>Delivery Date</th>
                        <th>Voucher No</th>
                        <th>Party Name</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Replace Amount</th>
                        <th>Status</th>
                        <th width="125">Action</th>
                    </tr>
                    <?php
                    $totalReceive  = $totalDelivery = 0;
                    $totalQuantity = 0;
                    if (!empty($results)) {
                        foreach ($results as $key => $row) {
                            $code = $name = $mobile = $address = '';
                            if ($row->party_type == 'cash') {
                                $cInfo   = json_decode($row->client_info);
                                $name    = filter($row->party_code);
                                $mobile  = $cInfo->mobile;
                                $address = $cInfo->address;
                            } else {
                                $pInfo   = get_row('parties', ['code' => $row->party_code], ['name', 'mobile', 'address']);
                                $code    = $row->party_code;
                                
                                if(!empty($pInfo->name)){
                                  $name    = $pInfo->name;  
                                }
                                
                                if(!empty($pInfo->mobile)){
                                   $mobile  = $pInfo->mobile; 
                                }
                                
                                if(!empty($pInfo->address)){
                                    $address = $pInfo->address;
                                }
                                
                                
                            }
                            $totalReceive  += ($row->status == 'client_receive' ? $row->total_quantity : 0);
                            $totalDelivery += ($row->status == 'client_delivery' ? $row->total_quantity : 0);
                            $totalQuantity += $row->total_quantity;
                    ?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td><?php echo $row->created_at; ?></td>
                                <td><?php echo $row->delivery_date; ?> </td>
                                <td><?php echo $row->voucher_no; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $mobile; ?></td>
                                <td><?php echo $address; ?></td>
                                <td class="<?php echo $row->status; ?>"><?php echo $row->total_quantity; ?></td>
                                <td><?php echo $row->total_amount; ?></td>
                                <td><?php echo $row->replace_amount; ?></td>
                                <td><?php echo filter($row->status); ?></td>
                                <td>
                                    <a  title="View" class="btn btn-primary"
                                        href="<?php echo site_url('replace/client/show?vno='.$row->voucher_no); ?>" >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    
                                    <!--<a  title="Edit"
                                        href="<?php /*echo site_url('replace/replace/edit?vno=' . $row->voucher_no); */ ?>"
                                        class="btn btn-warning">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>-->
                                    
                                    <?php if(!checkAuth('user')) { ?>
                                    <a  title="Delete" class="btn btn-danger"
                                        href="<?php echo site_url('replace/client/delete?vno=' . $row->voucher_no); ?>"
                                        onclick="return confirm('Do you want to delete this data?')" >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <th colspan="8" class="text-center">No record found....!</th>
                        </tr>
                    <?php }
                    ?>
                    <tr>
                        <th colspan="7" class="text-right">Total Receive</th>
                        <th><?php echo $totalReceive; ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th colspan="7" class="text-right">Total Deliver</th>
                        <th><?php echo $totalDelivery; ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th colspan="7" class="text-right">Total Pending</th>
                        <th><?php echo ($totalReceive - $totalDelivery); ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
        $scope.partyList = [];
        $scope.$watch('godownCode', function (godownCode) {
            var where = {
                table: 'parties',
                cond: { trash: '0'},
                select: ['code', 'name', 'mobile', 'address']
            }
            if (godownCode != 'all' && godownCode != '') {
                where.cond.godown_code = godownCode;
            }
            $http({
                method: 'post',
                url: url + 'result',
                data: where
            }).success(function (partyInfo) {
                if (partyInfo.length > 0) {
                    $scope.partyList = partyInfo;
                }
            })
        });
    });
</script>
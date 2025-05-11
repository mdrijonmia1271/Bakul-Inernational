<?php if (isset($meta->header)) {
    $header_info = json_decode($meta->header, true);
}
if (isset($meta->footer)) {
    $footer_info = json_decode($meta->footer, true);
}
$logo_data = json_decode($meta->logo, true); ?>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"/>
<style>
    @media print {
        .table-print tr th:last-child,
        .table-print tr td:last-child {
            display: none;
        }

        .print_banner_logo {
            width: 19%;
            float: left;
        }

        .print_banner_logo img {
            margin-top: 10px;
        }

        .print_banner_text {
            width: 80%;
            float: right;
            text-align: center;
        }

        .print_banner_text h2 {
            margin: 0;
            line-height: 38px;
            text-transform: uppercase !important;
        }

        .print_banner_text p {
            margin-bottom: 5px !important;
        }

        .print_banner_text p:last-child {
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
        }
    }

    .mt-3 {
        margin-top: 15px;
    }
</style>
<div class="container-fluid" ng-controller="allTransactionCtrl">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">All Transaction</h1>
                </div>
            </div>
            <div class="panel-body none">
                <?php $attr = array('class' => 'form-horizontal');
                echo form_open('', $attr); ?>
                <div class="form-group">
                    <?php if (checkAuth('super')) { ?>
                        <div class="col-md-3 mb_3">
                            <select name="godown_code" ng-init="godown_code='<?php echo $this->data['branch']; ?>'"
                                    ng-model="godown_code" class="form-control">
                                <option value="" selected>-- শোরুম নির্বাচন করুন --</option>
                                <option value="all">সকল শোরুম</option>
                                <?php
                                if (!empty($allGodown)) {
                                    foreach ($allGodown as $row) { ?>
                                        <option value="<?php echo $row->code; ?>">
                                            <?php echo filter($row->name) . " ( " . $row->address . " ) "; ?>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                    <?php } else { ?>
                        <input type="hidden" name="godown_code"
                               ng-init="godown_code='<?php echo $this->data['branch']; ?>'" ng-model="godown_code"
                               ng-value="godown_code">
                    <?php } ?>

                    <div class="col-md-3 mb_3">
                        <select name="type" ng-model="type" class="form-control">
                            <option value="" selected>-- Select Type --</option>
                            <option value="client">Client</option>
                            <option value="hire">Hire</option>
                            <option value="supplier">Supplier</option>
                            <option value="both">Supplier/Client</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb_3">
                        <select ui-select2="{ allowClear: true}" class="form-control" name="search[party_code]"
                                ng-model='party_code'
                                data-placeholder="-- Select Client --">
                            <option value="" selected></option>
                            <option ng-repeat="row in partyList" value="{{row.code}}">{{ row.code }}-{{ row.name
                                }}-{{ row.address }}-{{ row.mobile }}
                            </option>
                        </select>
                    </div>

                    <div class="col-md-3 mb_3">
                        <input type='text' name='search[inc_code]' class='form-control' placeholder='Chalan No.'>
                    </div>

                    <div class="col-md-3 mb_3">
                        <div class="input-group date" id="datetimepickerFrom">
                            <input type="text" name="date[from]" class="form-control" placeholder="From">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-3 mb_3">
                        <div class="input-group date" id="datetimepickerTo">
                            <input type="text" name="date[to]" class="form-control" placeholder="To">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <div class="btn-group">
                            <input type="submit" name="show" value="Save" class="btn btn-primary">
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php if (!empty($results)) { ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panal-header-title">
                        <h1 class="pull-left">Show Results</h1>
                        <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
                           onclick="window.print()">
                            <i class="fa fa-print"></i> Print
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <!-- Print banner Start Here -->
                    <?php $this->load->view('print', $this->data); ?>
                    <!-- Print banner End Here -->
                    <h4 class="text-center hide" style="margin-top: 0px;">All Transaction</h4>

                    <table class="table table-bordered table-print">
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Date</th>
                            <th>Voucher No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Payment Method</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            <th>Remission</th>
                            <th>Commission</th>
                            <th class="none">Action</th>
                        </tr>
                        <?php
                        $totalCredit = $totalDebit = $totalRemission = $totalComission = 0;
                        foreach ($results as $key => $row) {

                            $totalCredit    += $row->credit;
                            $totalDebit     += $row->debit;
                            $totalRemission += $row->remission;
                            $totalComission += $row->comission;
                            ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo d_formate($row->transaction_at); ?></td>
                                <td><?php echo $row->inc_code; ?></td>
                                <td><?php echo $row->party_code; ?></td>
                                <td><?php echo filter($row->name); ?></td>
                                <td><?php echo filter($row->transaction_via); ?></td>
                                <td><?php echo f_number($row->credit); ?></td>
                                <td><?php echo f_number($row->debit); ?></td>
                                <td><?php echo f_number($row->remission); ?></td>
                                <td><?php echo f_number($row->comission); ?></td>
                                <td class="none" width="160px">
                                    <a class="btn btn-info"
                                       href="<?php echo site_url('party/transaction/show/' . $row->id); ?>">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>

                                    <?php
                                    if (!checkAuth('user')) { ?>
                                        <a class="btn btn-warning" title="Edit"
                                           href="<?php echo site_url('party/transaction/edit/' . $row->id); ?>">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?php echo site_url('party/transaction/delete/' . $row->id); ?>"
                                           class="btn btn-danger"
                                           onclick="return confirm('Are you sure to delete this ?')">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="6" class="text-right"><strong>Total</strong></td>
                            <td><strong><?php echo f_number($totalCredit); ?> ৳</strong></td>
                            <td><strong><?php echo f_number($totalDebit); ?> ৳</strong></td>
                            <td><strong><?php echo f_number($totalRemission); ?> ৳</strong></td>
                            <td><strong><?php echo f_number($totalComission); ?> ৳</strong></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="panel-footer">&nbsp;</div>
            </div>
        <?php } ?>
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
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<script>
    app.controller('allTransactionCtrl', function ($scope, $http) {

        $scope.partyList = [];

        $scope.$watchGroup(['godown_code', 'type'], function (searchInfo) {

            var godown_code = searchInfo[0];
            var type = searchInfo[1];

            var partyWhere = {
                table: 'parties',
                cond: {trash: '0'}
            };

            if (typeof type !== 'undefined' && type != '') {
                if(type=='hire'){
                    partyWhere.cond['type'] = 'client';
                    partyWhere.cond['customer_type'] = 'hire';
                }else{
                    partyWhere.cond['type'] = type;
                }    
            }

            if (typeof godown_code !== 'undefined' && godown_code !== 'all' && godown_code != '') {
                partyWhere.cond['godown_code'] = godown_code;
            }

            $http({
                method: 'post',
                url: url + 'result',
                data: partyWhere
            }).success(function (partyInfo) {

                $scope.partyList = [];

                if (partyInfo.length > 0) {
                    $scope.partyList = partyInfo;
                }
            });
        });

    })
</script>
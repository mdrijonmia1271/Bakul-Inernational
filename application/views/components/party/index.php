<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"/>
<style>
    @media print {
        table tr th, table tr td {
            font-size: 12px;
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

    .action-btn a {
        margin-right: 0;
        margin: 3px 0;
    }
</style>
<div class="container-fluid" ng-controller="allPartyCtrl" ng-cloak>
    <div class="row">

        <?php echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default" id="data">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">View All</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;"
                       onclick="window.print()">
                        <i class="fa fa-print"></i> প্রিন্ট
                    </a>
                </div>
            </div>

            <div class="panel-body">

                <!-- Print banner Start Here -->
                <?php $this->load->view('print', $this->data); ?>
                <!-- Print banner End Here -->

                <!--<h4 class="text-center hide" style="margin-top: 0px;">All Customers</h4>-->
                <div class="col-md-12 text-center hide">
                    <h3>All Supplier/Client</h3>
                </div>

                <?php echo form_open('', ['class' => 'form-horizontal']); ?>

                <div class="row none">
                    <?php if (checkAuth('super')) { ?>
                        <div class="col-md-3">
                            <select name="godown_code" ng-init="godown_code='<?php echo $this->data["branch"]; ?>'"
                                    ng-model="godown_code" class="form-control" required>
                                <option value="" selected disabled>-- Select Showroom --</option>
                                <option value="all">All</option>
                                <?php if (!empty($allGodown)) {
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
                               ng-init="godown_code='<?php echo $this->data["branch"]; ?>'" ng-model="godown_code" ng-value="godown_code" required>
                    <?php } ?>


                    <div class="col-md-3">
                        <select ui-select2="{ allowClear: true}" class="form-control"  name="code" ng-model="code"
                                data-placeholder="-- Select Client --">
                            <option value="" selected></option>
                            <option ng-repeat="row in partyList" value="{{row.code}}">{{row.code}} - {{row.name}} - {{row.address}}</option>
                        </select>
                    </div>

                    <!--<div class="col-md-2">-->
                    <!--    <select name="type" class="form-control">-->
                    <!--        <option value="" selected>-- Select Type --</option>-->
                    <!--        <option value="client">Client</option>-->
                    <!--        <option value="supplier">Supplier </option>-->
                    <!--        <option value="both">Both</option>-->
                    <!--    </select>-->
                    <!--</div>-->

                    <div class="col-md-3">
                        <select ui-select2="{ allowClear: true}" class="form-control"  name="zone" ng-model="zone"
                                data-placeholder="-- Select Zone --">
                            <option value="" selected></option>
                            <?php if(!empty($allZone)){ foreach($allZone as $row){ ?>
                                <option value="<?php echo $row->zone; ?>">
                                    <?php echo filter($row->zone); ?>
                                </option>
                            <?php } } ?>
                        </select>
                    </div>

                    <div class="col-md-1">
                        <div class="btn-group mb15">
                            <input class="btn btn-primary" type="submit" name="find" value="Search">
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <p class="none">
                    <span style="color: green;font-weight: bold;">Green = Receivable</span>&nbsp;<span
                            style="color: red;font-weight: bold;">Red = Payable</span>
                </p>
                <table class="table table-bordered">
                    <tr>
                        <th width="50">#</th>
                        <th width="75">Code</th>
                        <th width="60">ছবি</th>
                        <th>Name</th>
                        <th>Type</th>
                        <!--<th>Dealer Type</th>-->
                        <th>Address</th>
                        <th width="120">Mobile</th>
                        <th width="115">Balance</th>
                        <th width="115">Credit Limit</th>
                        <th>Showroom</th>
                        <th class="none" style="width: 160px;">Action</th>
                    </tr>
                    <tbody id="data_table"></tbody>
                </table>
                <div style="text-align: center;display:none;" id="onscroll_loader"><img
                            src="<?php echo site_url('public/images/loader.gif'); ?>" alt="" style="width: 30px;"></div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<!-- Select Option 2 Script -->
<script>
    $(document).ready(function () {
        var currentPageNumber = 0,
            _pageSize = 250;

        loadData(_pageSize, currentPageNumber);

        $(window).scroll(function () {
            if ($(window).scrollTop() == ($(document).height() - $(window).height())) {
                currentPageNumber += 1;
                loadData(_pageSize, currentPageNumber);
            }
        });

        function loadData(_pageSize, currentPage) {
            var data_row = '',
                total_installment_price = 0;

            $.post("<?php echo site_url('party/party/onscroll_load_all_data'); ?>",
                {
                    pageNumber: currentPage,
                    pageSize: _pageSize,
                    find: "<?php echo (!empty($_POST['find']) ? $_POST['find'] : '') ?>",
                    godown_code: "<?php echo (!empty($_POST['godown_code']) ? $_POST['godown_code'] : $this->data['branch']); ?>",
                    code: "<?php echo (!empty($_POST['code']) ? $_POST['code'] : '') ?>",
                    type: "<?php echo (!empty($_POST['type']) ? $_POST['type'] : '') ?>",
                    zone: "<?php echo (!empty($_POST['zone']) ? $_POST['zone'] : '') ?>"
                },
                function (data, success) {
                    //alert(data);
                    if (data != 0) {
                        var respons = JSON.parse(data);

                        if (respons.length >= _pageSize) {
                            onscroll_loader.style.cssText = "display:block;text-align:center;";
                        }

                        for (key in respons) {

                            var single_record = respons[key];
                            data_row += '<tr>';
                            data_row += `
                              <td >${single_record['sl']}</td>
                              <td>${single_record['code']}</td>
                              <td>${single_record['photo']}</td>
                              <td>${single_record['name']}</td>
                              <td>${single_record['type']}</td>
                            //   <td>${single_record['dealer_type']}</td>
                              <td>${single_record['address']}</td>
                              <td>${single_record['mobile']}</td>
                              <td class="total_balance">${single_record['balance']}</td>
                              <td class="total_balance">${single_record['credit_limit']}</td>
                              <td>${single_record['showroom']}</td>
                              <td class='none'>
                                <a title="View" class="btn btn-info"  href="<?php echo site_url('party/party/show'); ?>/${single_record['id']}"><i class="fa fa-eye" aria-hidden="true"></i></a>

                              <?php if(!checkAuth('user')){ ?>
                                <a title="Edit" class="btn btn-warning"  href="<?php echo site_url('party/party/edit'); ?>/${single_record['id']}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a title="Delete" class="btn btn-danger" onclick="return confirm('Do you want to delete this Party Record ?');" href="<?php echo site_url('party/party/delete'); ?>/${single_record['id']}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                              <?php  } ?>
                          </td>
                        `;
                            data_row += '</tr>';
                        }
                        data_table.innerHTML += data_row;

                        var allBalance = document.querySelectorAll('.total_balance');

                        // calculate total sale price start
                        var balance = 0;
                        Object.values(allBalance).forEach((value, index) => {
                            balance += parseFloat(value.innerText);
                        });

                        var grandTotal = balance.toFixed(2);

                        // calculate total low level price end
                        if (document.querySelector('#totalValusRow')) {
                            data_table.removeChild(totalValusRow);
                        }
                        data_table.innerHTML += `
                                    <tr id="totalValusRow">
                                      <th colspan="8" style="text-align: right;">Total</th>
                                      <th>${grandTotal} ৳.</th>
                                      <th colspan="2"></th>
                                    </tr>
                                  `;
                        //----------------------------------------------------------------
                    }
                    if (data == '') {
                        onscroll_loader.style.cssText = "display:none;text-align:center;";
                    }
                });
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script>
    app.controller('allPartyCtrl', function ($scope, $http){

        $scope.partyList = [];

        $scope.$watch('godown_code', function (godown_code){

            if (typeof godown_code !== "undefined" && godown_code != ''){

                // set party cond
                var partyWhere = {
                    table: 'parties',
                    cond : {trash: '0'},
                    select: ['code', 'name', 'mobile', 'address']
                };


                // set party and zone godown wise
                if (godown_code !== 'all'){
                    partyWhere.cond['godown_code'] = godown_code;
                }

                // get all party
                $http({
                    method: 'post',
                    url   : url + 'result',
                    data  : partyWhere
                }).success(function (partyInfo){

                    $scope.partyList = [];
                    if (partyInfo.length > 0){
                        $scope.partyList = partyInfo;
                    }
                });
            }
        });
    });
</script>
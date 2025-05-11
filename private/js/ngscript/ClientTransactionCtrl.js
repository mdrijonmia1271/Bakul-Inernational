// Client transaction controller 
app.controller('ClientTransactionCtrl', ['$scope', '$http', function($scope, $http) {
    
    $scope.sign = 'Receivable';
    $scope.csign = 'Receivable';
    $scope.transactionType = 'false';
    $scope.voucherList = [];
    $scope.installment_type = '';
    

    $scope.minBalance = 0;
    $scope.balance = 0;
    $scope.godown_code = '';
    $scope.clientList = [];
    
    
    // Get Cleient List Showroom Wise 
    $scope.getAllPartiesFn = function() {
        
        // hide and active 
        if($scope.customer_type !== 'dealer'){
            $scope.transactionType = true;
        }else{
            $scope.transactionType = false;
        }
        
        // Get Cleient List Showroom Wise 
        var clientWhere = {
            table: 'parties',
            cond: {
                'godown_code': $scope.godown_code,
                'customer_type': $scope.customer_type,
                'status': 'active',
                'type': 'client',
                'trash': 0
            },
            select: ['code', 'name', 'godown_code', 'mobile']
        }
        $http({
            method: 'POST',
            url: url + 'result',
            data: clientWhere
        }).success(function(clients) {
            if (clients.length > 0) {
                $scope.clientList = clients;
            } else {
                $scope.clientList = [];
            }
        });
    }
    
    
    $scope.getMobileFn = function(){
        // Get Cleient Mobile Number 
        var clientMobile = {
            table: 'parties',
            cond: {
                'code': $scope.code,
                'godown_code': $scope.godown_code,
                'status': 'active',
                'type': 'client',
                'trash': 0
            },
            select: ['mobile']
        }
        $http({
            method: 'POST',
            url: url + 'result',
            data: clientMobile
        }).success(function(mobile) {
            if (mobile.length > 0) {
                $scope.mobile = mobile[0].mobile;
            } else {
                 $scope.mobile = '';
            }
        });
    }
    
    
    // get all voucher and client initial balance
    $scope.getAllVoucherFn = function() {
        
        if(typeof $scope.code !== 'undefined'){
        
            var voucherWhere = {
                table : 'saprecords',
                cond  : { 
                    'party_code': $scope.code,
					'godown_code': $scope.godown_code,
                    'due >'     : 0,
                    'trash'     : 0},
                select   : 'voucher_no',
                groupBy : 'voucher_no'
            };
            $http({
                method: 'POST',
                url: url + 'result',
                data: voucherWhere
            }).success(function(voucherRes) {
                if (voucherRes.length > 0) {

                    angular.forEach(voucherRes, function(row, i) {

                        $http({
                            method: 'POST',
                            url: url + 'voucher_due',
                            data: {voucher_no : row.voucher_no}
                        }).success(function(dueResult) {

                            if(parseFloat(dueResult.due) > 0){
                                $scope.voucherList.push({voucher_no: row.voucher_no, due : dueResult.due});
                            }

                        });
                    });
                }else{
                    $scope.voucherList = [];
                }
            });
            
            
            // get current balance and status
            var partyWhere = {
                table   : 'parties',
                cond    : { 
                    'code': $scope.code,
					'godown_code': $scope.godown_code,
                    'trash'     : 0 },
                select   : ['code', 'initial_balance']
            }

            $http({
                method: "POST",
                url: url + "result",
                data: partyWhere
            }).success(function(partyResponse) {
                
                var transaction = {
                    debit: 0,
                    credit: 0,
                    remission: 0,
                    currentBalance: 0,
                };

                if (partyResponse.length > 0) {
                    
                    var tranWhere = {
                        table : 'partytransaction',
                        cond  : { 
                            'party_code': partyResponse[0].code,
							'godown_code': $scope.godown_code,
                            'trash'     : 0
						},
                        select   : ['debit', 'credit', 'remission']
                    };
                    $http({
                        method: "POST",
                        url: url + "result",
                        data: tranWhere
                    }).success(function(tranResponse) {
                        
                        if(tranResponse.length > 0){
                                angular.forEach(tranResponse, function(row, i) {
                                transaction.debit += parseFloat(row.debit);
                                transaction.credit += parseFloat(row.credit);
                                transaction.remission += parseFloat(row.remission);
                            });
        
                            if (parseFloat(partyResponse[0].initial_balance) >= 0) {
                                transaction.currentBalance = (parseFloat(partyResponse[0].initial_balance) + parseFloat(transaction.debit)) - (parseFloat(transaction.credit) + parseFloat(transaction.remission));
                                $scope.balance = Math.abs(transaction.currentBalance.toFixed(2));
                                $scope.minBalance = transaction.currentBalance.toFixed(2);
                            } else {
                                transaction.currentBalance = parseFloat(transaction.debit) - (parseFloat(transaction.credit) + Math.abs(parseFloat(partyResponse[0].initial_balance))  + parseFloat(transaction.remission));
                                $scope.balance = Math.abs(transaction.currentBalance.toFixed(2));
                                $scope.minBalance = transaction.currentBalance.toFixed(2);
                            }
                            
                            $scope.sign = (parseFloat(transaction.currentBalance) < 0) ? 'Payable' : 'Receivable';
        
                        } else {
                            $scope.balance = Math.abs(parseFloat(partyResponse[0].initial_balance).toFixed(2));
                            $scope.minBalance = parseFloat(partyResponse[0].initial_balance);
                            $scope.sign = (parseFloat(partyResponse[0].initial_balance) < 0) ? 'Payable' : 'Receivable';
                        }
                        
                    });
                }
            });
        }else{
            $scope.balance = 0;
            $scope.sign = '';
        }
    };
    
    
    
    // get voucher info
    $scope.getVoucherInfo = function() {
        
        if(typeof $scope.voucher_no !== 'undefined'){
           
            var vouInfoWhere = {
                table : 'saprecords',
                cond  : { 
                    'voucher_no': $scope.voucher_no,
					'godown_code': $scope.godown_code,
                    'due >'     : 0,
                    'trash'     : 0
                },
                select   : ['voucher_no', 'party_code', 'due', 'installment_type', 'installment_no', 'installment_amount']
            };
            $http({
                method: 'POST',
                url: url + 'result',
                data: vouInfoWhere
            }).success(function(voucherInfoRes) {
                if (voucherInfoRes.length > 0) {
                    $scope.due_amount         = parseFloat(voucherInfoRes[0].due);
                    $scope.installment_amount = parseFloat(voucherInfoRes[0].installment_amount);
                    $scope.installment_type   = voucherInfoRes[0].installment_type;
                }else{
                    $scope.due_amount         = 0;
                    $scope.installment_amount = 0;
                    $scope.installment_type   = '';
                }
            });
            
        }else{
            // reset value
            $scope.due_amount         = 0;
            $scope.installment_amount = 0;
            $scope.installment_type   = '';
        }
    };
   


    $scope.getTotalFn = function() {
        if(typeof $scope.code != 'undefined'){
            var payment = (typeof $scope.payment !== 'undefined' && $scope.payment !== '') ? parseFloat($scope.payment) : 0;
            var remission = (typeof $scope.remission !== 'undefined' &&  $scope.remission !== '') ? parseFloat($scope.remission) : 0;
            
            var total = $scope.minBalance - (payment + remission);
            $scope.csign = (total < 0) ? "Payable" : "Receivable";
            
        }else{
            total = 0;
            $scope.csign = '';
            $scope.payment = '';
            $scope.remission = '';
        }

        return Math.abs(total.toFixed(2));
    }

}]);
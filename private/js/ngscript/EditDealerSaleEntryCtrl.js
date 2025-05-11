//  Edit Sale Ctrl
app.controller('EditDealerSaleEntryCtrl', ['$scope', '$http', function($scope, $http){
    $scope.info = {};
    $scope.records = [];
    $scope.oldLabourCost = 0.00;
    $scope.newDiscount = 0.00;

    $scope.amount = {
        labour: 0.00,
        oldTotal: 0.00,
        discount: 0.00,
        newTotal: 0.00,
        totalqty: 0.00,
        oldTotalDiscount: 0.00,
        newTotalDiscount: 0.00,
        oldGrandTotal: 0.00,
        newGrandTotal: 0.00,
        paid: 0.00,
        prevoiusPaid: 0.00,
        truck_rent: 0.00
    };

    // get commission total
    $scope.commission = {
        quantity: 0,
        amount: 0,
        total: 0.0
    };

    // get Truck total
    $scope.truck = {
        quantity: 0,
        amount: 0,
        total: 0.00
    };

    $scope.$watch('voucher_no', function(voucher_no) {
		
        // get sale record
        var transmit = {
            from: 'saprecords',
            join: 'sapitems',
            cond: 'saprecords.voucher_no=sapitems.voucher_no',
            where: {
                'saprecords.voucher_no': voucher_no,
                'saprecords.godown_code': $scope.godown_code,
                'saprecords.trash': '0',
                'sapitems.trash': '0',
                'sapitems.status': 'sale'
            }
        };


        // take action
        $http({
            method: 'POST',
            url: url + 'readJoinData',
            data: transmit
        }).success(function(response) {
			
            if (response.length > 0) {
                
                var discount = 0;
                
                angular.forEach(response, function(row, index) {
                    
                    
                    discount += parseFloat(row.discount);
                    
                    response[index].discount = parseFloat(row.discount);
                    response[index].paid = parseFloat(row.paid);
                    response[index].oldQuantity = parseFloat(row.quantity);
                    response[index].newQuantity = parseFloat(row.quantity);
                    response[index].purchase_price = parseFloat(row.purchase_price);
                    response[index].newSalePrice = parseFloat(row.sale_price);
                    response[index].oldSalePrice = parseFloat(row.sale_price);
                    response[index].oldSubtotal = 0.00;
                    response[index].newSubtotal = 0.00;
                    response[index].godown = row.godown_code;
                    response[index].discount_percentage = parseFloat(row.discount_percentage);
                    response[index].commission = 0.00;
                    response[index].oldcommission = parseFloat(row.discount);

                    var where = {
                        table: "stock",
                        cond: {
                            code: row.product_code,
                            godown_code: row.godown_code
                        }
                    };

                    $http({
                        method: "POST",
                        url: url + "read",
                        data: where
                    }).success(function(product) {
                        if (product.length > 0) {
                            response[index].product = product[0].name;
                            response[index].category = product[0].category;
                            response[index].pro_model = product[0].product_model;
                        }
                    });
                });
                
                
                $scope.total_discount = parseFloat(response[0].total_discount) - discount;
                $scope.total_old_return = parseFloat(response[0].total_return);

                //get party information
                var party_where = {
                    table: 'parties',
                    cond: {
                        code: response[0].party_code,
                        godown_code: response[0].godown_code,
						trash: 0
                    }
                }
				
                $http({
                    method: 'POST',
                    url: url + 'read',
                    data: party_where
                }).success(function(info) {
					
                    if (info.length > 0) {

                        $scope.info.partyName = info[0].name;
                        $scope.info.partyCode = info[0].code;
                        $scope.info.partyMobile = info[0].mobile;
                        $scope.info.partyAddress = info[0].address;

                        // get party balance
                        $http({
                            method: 'POST',
                            url: url + 'party_balance',
                            data: {party_code: info[0].code}
                        }).success(function(balanceInfo) {
                            $scope.info.previousBalance = Math.abs(parseFloat(balanceInfo.balance));
                            $scope.info.sign = balanceInfo.status;
                        });


                    } else {

                        $scope.initial_balance = 0.00;

                        $scope.info.partyName = response[0].party_code;
                        $scope.info.partyCode = response[0].party_code;

                        var jsonObj = JSON.parse(response[0].address);

                        $scope.info.partyMobile = jsonObj.mobile;
                        $scope.info.partyAddress = jsonObj.address;
                    }
                });
				

                $scope.info.date = response[0].sap_at;
                $scope.info.sapType = response[0].sap_type;
                $scope.info.voucher = response[0].voucher_no;
                $scope.info.partyCode = response[0].party_code;
                $scope.amount.previousPaid = response[0].paid;

                $scope.total_commission_amount = parseFloat(response[0].total_discount);

                $scope.amount.oldTotal = parseFloat(response[0].total_bill) + parseFloat(response[0].total_discount);
                $scope.amount.oldTotalDiscount = parseFloat(response[0].total_discount);
                $scope.amount.newTotalDiscount = parseFloat(response[0].total_discount);
                $scope.amount.oldGrandTotal = parseFloat(response[0].total_bill);
                $scope.amount.oldPaid = parseFloat(response[0].paid);

                $scope.records = response;
            }
        });
        
        
        
            $scope.return_cart = [];
            // get return record
            var saprecordWhereReturn = {
                tableFrom: 'saprecords',
                tableTo: ['sapitems', 'stock'],
                joinCond: ['saprecords.voucher_no=sapitems.voucher_no AND saprecords.godown_code=sapitems.godown_code', 'sapitems.product_code=stock.code AND sapitems.godown_code=stock.godown_code'],
                cond: {'saprecords.voucher_no': voucher_no, 'saprecords.godown_code': $scope.godown_code, 'saprecords.trash': '0', 'sapitems.trash': '0','sapitems.status': 'sale_purchase'},
                select: ['sapitems.*', 'sapitems.id AS item_id', 'saprecords.*', 'stock.name', 'stock.quantity AS stock_quantity', 'stock.category', 'stock.subcategory']
            };

            $http({
                method: 'POST',
                url: url + 'join',
                data: saprecordWhereReturn
            }).success(function(response_return){
                
                var itemWiseTotalDiscount = 0;

                if(response_return.length > 0) {
                   
                    angular.forEach(response_return, function(row, index){

                        itemWiseTotalDiscount += parseFloat(row.discount);

                        response_return[index].product = row.name;
                        response_return[index].category = row.category;
                        response_return[index].item_id =row.item_id;
                        response_return[index].godown = row.godown_code;
                        response_return[index].discount = parseFloat(row.discount_percentage);
                        response_return[index].discount_amount = 0;
                        response_return[index].paid = parseFloat(row.paid);
                        response_return[index].stock_qty = parseFloat(row.stock_quantity);
                        response_return[index].old_quantity = parseFloat(row.quantity);
                        response_return[index].quantity = parseFloat(row.quantity);
                        response_return[index].return_quantity_kg = parseFloat(row.return_quantity_kg);
                        response_return[index].sale_price = parseFloat(row.sale_price);
                        response_return[index].purchase_price = parseFloat(row.purchase_price);
                        response_return[index].old_subtotal = 0;
                        response_return[index].subtotal = 0;
                    });

                    $scope.return_cart = response_return;
                }
            });        
        
        

    });


    // return item wise  sub total
    $scope.setOldReturnSubtotalFn = function(index){
        var total = 0;
        total = ($scope.return_cart[index].purchase_price * $scope.return_cart[index].old_quantity);
        $scope.return_cart[index].sub_total = total;
        return total;
    };

    //return item wise sub total
    $scope.setReturnSubtotalFn = function(index){
        var total = 0;
        total = ($scope.return_cart[index].purchase_price * $scope.return_cart[index].quantity);
        $scope.return_cart[index].sub_total = total;
        return total;
    };

    $scope.getTotalNewReturnFn= function() {
        var total_new_return = 0;
        angular.forEach($scope.return_cart, function(item) {
            total_new_return += parseFloat(item.sub_total);
        });

        return Math.abs(total_new_return.toFixed(2));
    }

    $scope.getOldSubtotalFn = function(index) {
        var total = 0.00;
        total = parseFloat($scope.records[index].oldSalePrice * $scope.records[index].oldQuantity) - $scope.records[index].oldcommission;
        $scope.records[index].oldSubtotal = total;
        return $scope.records[index].oldSubtotal;
    }


    $scope.getCommissionFn = function(index) {

        var total = 0.00;
        total = parseFloat($scope.records[index].newSalePrice * $scope.records[index].newQuantity) * parseFloat($scope.records[index].discount_percentage / 100);
        $scope.records[index].commission = total;
        return total.toFixed(2);
    }


    $scope.getNewSubtotalFn = function(index) {
        var total = 0.00;
        total = parseFloat($scope.records[index].newSalePrice * $scope.records[index].newQuantity - $scope.records[index].commission);
        $scope.records[index].newSubtotal = total;
        return $scope.records[index].newSubtotal;
    }

    $scope.getTotalQtyFn = function() {
        var total = 0;
        angular.forEach($scope.records, function(item) {
            total += parseFloat(item.newQuantity);
        });

        $scope.amount.totalqty = total;
        return $scope.amount.totalqty;
    }

    $scope.getTotalDiscountFn = function() {
        var total = 0;
        angular.forEach($scope.records, function(value) {
            total += parseFloat(value.commission);
        });
        total = $scope.total_discount+total;
        $scope.amount.newTotalDiscount = total.toFixed(2);
        return $scope.amount.newTotalDiscount;
    }

    $scope.getTotalFn = function() {
        var total = 0;
        angular.forEach($scope.records, function(item) {
            total += (item.newSubtotal);
        });

        $scope.amount.newTotal = total;
        return $scope.amount.newTotal;
    }

    $scope.getNewGrandTotalFn = function() {
        
        var total_discount = (!isNaN(parseFloat($scope.total_discount)) ? parseFloat($scope.total_discount) : 0);
        var total_new_return = 0;
        //console.log('or='+$scope.total_old_return);
        angular.forEach($scope.return_cart, function(item) {
            total_new_return += parseFloat(item.sub_total);
        });
        
        //console.log('onr='+total_new_return);
        $scope.amount.newGrandTotal = parseFloat($scope.amount.newTotal) - total_discount - total_new_return;
        //console.log('na='+$scope.amount.newGrandTotal);
        return $scope.amount.newGrandTotal;

    }

    $scope.getGrandTotalDifferenceFn = function() {
        var total = 0.00;
        //console.log($scope.amount.newGrandTotal);

        total = ($scope.amount.newGrandTotal - $scope.amount.oldGrandTotal);
        $scope.amount.sign = (total >= 0) ? 'Receivable' : 'Payable';
        $scope.amount.difference = Math.abs(total);

        return $scope.amount.difference;
    }


    $scope.currentBalance = 0.0;
    $scope.getCurrentTotalFn = function(){
        var total = 0.00;

        if ($scope.amount.sign == 'Receivable' && $scope.info.sign == 'Receivable') {
            total = ($scope.amount.difference + $scope.info.previousBalance) - $scope.amount.paid;
            $scope.info.csign = 'Receivable';
        }else if($scope.amount.sign == 'Receivable' && $scope.info.sign == 'Payable') {
            total = $scope.amount.difference - ($scope.info.previousBalance + $scope.amount.paid);
            if (total >= 0) {
                $scope.info.csign = 'Receivable';
            } else {
                $scope.info.csign = 'Payable';
            }
        }else if($scope.amount.sign == 'Payable' && $scope.info.sign == 'Receivable') {
            total = ($scope.amount.difference + $scope.amount.paid) - $scope.info.previousBalance;
            if (total <= 0) {
                $scope.info.csign = 'Receivable';
            }else{
                $scope.info.csign = 'Payable';
            }
        }else{
            total = $scope.amount.difference + ($scope.info.previousBalance + $scope.amount.paid);
            if (total > 0) {
                $scope.info.csign = 'Payable';
            } else {
                $scope.info.csign = 'Receivable';
            }
        }
       
        $scope.currentBalance = total;

        return Math.abs(total);
    }


    $scope.getTotalPaidFn = function() {
        var total = 0.00;

        total = $scope.amount.oldPaid + parseFloat($scope.amount.paid);
        return total.toFixed(2);
    }


    $scope.totalQuantityFn = function() {
        var total = 0;

        angular.forEach($scope.records, function(item, index) {
            total += item.newQuantity;
        });

        $scope.truck.quantity = total;
        $scope.commission.quantity = total;

        return $scope.truck.quantity;
    }


}]);
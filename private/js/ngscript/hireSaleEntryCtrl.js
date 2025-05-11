// sale controller
app.controller('hireSaleEntryCtrl', function ($scope, $http) {

    $scope.active = true;
    $scope.active1 = false;
    $scope.card = [];
    $scope.return_cart = [];

    $scope.payment_label = 'Paid';

    $scope.stype = "cash";
    $scope.presentBalance = 0.00;
    $scope.voucher_due = 0;


    $scope.isDisabled = false;

    $scope.remaining_commission = 0;
    $scope.total_commission_amount = 0.00;

    $scope.amount = {
        labour: 0,
        total: 0,
        totalqty: 0,
        totalDiscount: 0,
        itemWiseTotalDiscount: 0,
        added_percentage: 0,
        totalAddedAmount: 0,
        truck_rent: 0,
        grandTotal: 0,
        paid: 0,
        due: 0
    };

    $scope.$watch('godown_code', function (godown_code) {

        if (typeof $scope.godown_code != 'undefined') {

            // Get all products initial godown wise
            $scope.allProducts = [];
            var productWhere = {
                table: 'stock',
                cond: {
                    'godown_code': godown_code,
                    'quantity >': 0,
                },
                select: ['code', 'name', 'product_model','category','subcategory']
            }
            $http({
                method: 'POST',
                url: url + 'result',
                data: productWhere
            }).success(function (products) {
                if (products.length > 0) {
                    $scope.allProducts = products;
                } else {
                    $scope.allProducts = [];
                }
            });


            // Get Cleient List Showroom Wise 
            $scope.clientList = [];
            var clientWhere = {
                table: 'parties',
                cond: {
                    'godown_code': godown_code,
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
            }).success(function (clients) {
                if (clients.length > 0) {
                    $scope.clientList = clients;
                } else {
                    $scope.clientList = [];
                }
            });
        }
    });


    $scope.addNewProductFn = function () {

        if (typeof $scope.product_code !== 'undefined') {
            var condition = {
                table: 'stock',
                cond: {
                    code: $scope.product_code.trim(),
                    godown_code: $scope.godown_code
                }
            };

            $http({
                method: 'POST',
                url: url + 'read',
                data: condition
            }).success(function (response) {
                if (response.length > 0) {
                    var newItem = {
                        product: response[0].name,
                        category: response[0].category,
                        product_code: response[0].code,
                        product_model: response[0].product_model,
                        product_category: response[0].category,
                        product_subcategory: response[0].subcategory,
                        product_serial: response[0].product_serial,
                        unit: response[0].unit,
                        godown_code: response[0].godown_code,
                        maxQuantity: parseInt(response[0].quantity),
                        stock_qty: parseInt(response[0].quantity),
                        quantity: 1.00,
                        bags: 0.00,
                        subtotal: 0.00,
                        discount: 0.00,
                        discount_amount: 0.00,
                        purchase_price: parseFloat(response[0].purchase_price),
                        sale_price: parseFloat(response[0].sell_price),
                    };

                    $scope.card.push(newItem);
                    $scope.product_serial = '';
                }
            });
        }
    }


   // Get all  Rturn products
    
    $scope.$watchGroup(['godown_code', 'dealer_category'], function(input_value) {
        
        $scope.godownCode = input_value[0];
        $scope.dealerCategory = input_value[1];
        
        if (typeof $scope.godownCode !== 'undefined' && $scope.godownCode != '') {

            $scope.allReturnProducts = [];

            var ReturnproductWhere = {
                table: 'products',
                cond: {
                    'status': 'available',
                },
                select: ['product_code','product_model','product_cat','subcategory']
            }

            $http({
                method: 'POST',
                url: url + 'result',
                data: ReturnproductWhere
            }).success(function(Returnproducts) {
                if (Returnproducts.length > 0) {
                    $scope.allReturnProducts = Returnproducts;
                } else {
                    $scope.allReturnProducts = [];
                }
            });
        }
    });
    
    
   // add Return product in cart
    $scope.addNewReturnProductFn = function() {
        if (typeof $scope.return_product_code  !== 'undefined' && typeof $scope.godown_code !== 'undefined') {

            var condition = {
                table: 'products',
                cond: {
                    product_code: $scope.return_product_code.trim(),
                }
            };

            $http({
                method: 'POST',
                url: url + 'result',
                data: condition
            }).success(function(returnresponse) {
                //alert(returnresponse);
                
                if(returnresponse.length > 0){
                    var newReturnItem = {
                        return_product: returnresponse[0].product_name,
                        return_product_model: returnresponse[0].product_model,
                        return_product_code: returnresponse[0].product_code,
                        return_category: returnresponse[0].product_cat,
                        return_subcategory: returnresponse[0].subcategory,
                        return_unit: returnresponse[0].unit,
                        return_godown_code: $scope.godown_code,
                        return_purchase_price: parseFloat(returnresponse[0].purchase_price),
                        return_sale_price: parseFloat(returnresponse[0].retail_sale_price),
                        return_quantity: 1,
                        category:returnresponse[0].product_cat,
                        subcategory:returnresponse[0].subcategory,
                        brand:returnresponse[0].brand,
                    };
                    
                        newReturnItem.return_sale_price = parseFloat(returnresponse[0].sale_price);

                    $scope.return_cart.push(newReturnItem);
                }
            });
        }
    }




    
    
    // item wise sub total
    $scope.setSubtotalFn = function (index) {
        var total = 0;
        var discount = (typeof $scope.card[index].discount !== 'undefined') ? parseFloat($scope.card[index].discount) : 0;
        total = ($scope.card[index].sale_price * $scope.card[index].quantity) - discount;
        $scope.card[index].subtotal = Math.abs(total.toFixed(2));
        return $scope.card[index].subtotal;
    }

    // item wise discount
    $scope.setDiscountFn = function (index) {
        var total = 0;
        total = (($scope.card[index].sale_price * $scope.card[index].quantity) * $scope.card[index].discount) / 100;
        $scope.card[index].discount_amount = Math.abs(total.toFixed(2));
        return $scope.card[index].discount_amount;
    }


    $scope.getItemWiseTotalDiscountFn = function () {
        var total = 0;
        angular.forEach($scope.card, function (item) {
            total += parseFloat(item.discount_amount);
        });
        $scope.amount.itemWiseTotalDiscount = Math.abs(total.toFixed(2));
        return $scope.amount.itemWiseTotalDiscount;
    }


    //calculate Bags no
    $scope.calculateBags = function (i, size) {
        var bag_no = 0.00;
        bag_no = parseFloat($scope.card[i].quantity) / parseFloat(size);
        $scope.card[i].bags = bag_no.toFixed(2);
        return $scope.card[i].bags;
    };


    //calculate commission
    $scope.calculateTotalCommission = function () {
        var total = parseFloat($scope.amount.total),
            totalCommission = 0.00,
            remainingCommission = 0;

        remainingCommission = parseInt(6 - $scope.commission);
        $scope.remaining_commission = remainingCommission;

        totalCommission = parseFloat(total * (parseFloat($scope.commission) / 100));
        $scope.total_commission_amount = totalCommission.toFixed(2);

        return $scope.total_commission_amount;
    };

    $scope.purchaseSubtotalFn = function (index) {
        $scope.card[index].purchase_subtotal = $scope.card[index].purchase_price * $scope.card[index].quantity;
        return $scope.card[index].purchase_subtotal.toFixed();
    }

  // get total return amount
    $scope.getTotalReurnFn = function() {
        var total = 0;
        angular.forEach($scope.return_cart, function(item) {
            total += parseFloat(item.subtotal);
        });
        $scope.total_new_return = total;
        return Math.abs(total.toFixed(2));
    }

    $scope.getTotalFn = function () {
        var total = 0;
        angular.forEach($scope.card, function (item) {
            total += parseFloat(item.subtotal);
        });
        
        var total_return = 0;
        angular.forEach($scope.return_cart, function(item) {
            total_return += parseFloat(item.subtotal);
        });

        $scope.amount.total = total.toFixed()-total_return.toFixed();
        return $scope.amount.total;
    }

    $scope.getTotalQtyFn = function () {
        var total = 0;
        angular.forEach($scope.card, function (item) {
            total += parseFloat(item.quantity);
        });

        $scope.amount.totalqty = total;
        return $scope.amount.totalqty;
    }


    $scope.getPurchaseTotalFn = function () {
        var total = 0;
        angular.forEach($scope.card, function (item) {
            total += parseFloat(item.purchase_subtotal);
        });

        $scope.amount.purchase_total = total.toFixed();
        return $scope.amount.purchase_total;
    }


    $scope.calculateHirePrice = function () {
        var total = 0;
        total = parseFloat($scope.amount.total) + parseFloat($scope.amount.totalAddedAmount);
        return total.toFixed(2);
   
    }    

    $scope.getCurrentTotalFn = function () {
        var total = 0.00;

        if ($scope.partyInfo.sign == 'Receivable') {
            $scope.voucher_due = $scope.amount.total - $scope.amount.paid;
            total = (parseFloat($scope.partyInfo.balance) + parseFloat($scope.amount.total)) - $scope.amount.paid;
            if (total > 0) {
                $scope.partyInfo.csign = "Receivable";
            } else if (total < 0) {
                $scope.partyInfo.csign = "Payable";
            } else {
                $scope.partyInfo.csign = "Receivable";
            }
        } else {
            $scope.voucher_due = $scope.amount.total - ($scope.amount.paid + parseFloat($scope.partyInfo.balance));
            total = (parseFloat($scope.partyInfo.balance) + $scope.amount.paid) - parseFloat($scope.amount.total);

            if (total > 0) {
                $scope.partyInfo.csign = "Payable";
            } else if (total < 0) {
                $scope.partyInfo.csign = "Receivable";
            } else {
                $scope.partyInfo.csign = "Receivable";
            }
        }

        //total due amount
        $scope.amount.due = Math.abs(total.toFixed(2));
        $scope.presentBalance = Math.abs(total.toFixed(2));
        return $scope.presentBalance;
    }

    // calculate added value
    $scope.calculateAddedValueFn = function () {
        var vou_total = $scope.voucher_due * ($scope.amount.added_percentage / 100);
        $scope.amount.totalAddedAmount = Math.abs(vou_total.toFixed(2));
    }


    //Here Commission Will Plus with total
    $scope.getGrandTotalFn = function () {
        var grand_total = 0.0;
        grand_total = parseFloat($scope.amount.due) + parseFloat($scope.amount.totalAddedAmount);
        return $scope.amount.grandTotal = Math.abs(grand_total.toFixed(2));
    }


    $scope.getInstallAmountFn = function (installment_number) {
        var total = 0.00;
        total = ($scope.voucher_due + parseFloat($scope.amount.totalAddedAmount)) / installment_number;
        $scope.installment_amount = Math.abs(total.toFixed(2));

        return $scope.installment_amount;
    };


    // get party previous balance
    $scope.partyInfo = {
        code: '',
        name: '',
        contact: '',
        address: '',
        balance: 0,
        payment: 0,
        cl: 0,
        sign: '',
        csign: ''
    };
    $scope.findPartyFn = function () {
        if (typeof $scope.party_code != 'undefined') {
            var condition = {
                table: "parties",
                cond: {
                    code: $scope.party_code,
                    godown_code: $scope.godown_code
                },
                select: ['code', 'name', 'mobile', 'godown_code', 'address', 'initial_balance', 'credit_limit']
            };

            $http({
                method: 'POST',
                url: url + 'result',
                data: condition
            }).success(function (partyResponse) {

                if (partyResponse.length > 0) {

                    $scope.partyInfo.code = partyResponse[0].code;
                    $scope.partyInfo.name = partyResponse[0].name;
                    $scope.partyInfo.contact = partyResponse[0].mobile;
                    $scope.partyInfo.address = partyResponse[0].address;
                    $scope.partyInfo.cl = parseFloat(partyResponse[0].credit_limit);

                    // get all current balance and status
                    var condition = {
                        table: "partytransaction",
                        cond: {
                            party_code: partyResponse[0].code,
                            godown_code: partyResponse[0].godown_code,
                            trash: 0
                        },
                        select: ['credit', 'debit', 'remission']
                    };

                    $http({
                        method: "POST",
                        url: url + "result",
                        data: condition
                    }).success(function (tranResponse) {

                        var transaction = {
                            debit: 0,
                            credit: 0,
                            remission: 0,
                            currentBalance: 0,
                        };

                        if (tranResponse.length > 0) {

                            angular.forEach(tranResponse, function (row, i) {
                                transaction.debit += parseFloat(row.debit);
                                transaction.credit += parseFloat(row.credit);
                                transaction.remission += parseFloat(row.remission);
                            });

                            if (parseFloat(partyResponse[0].initial_balance) >= 0) {
                                transaction.currentBalance = (parseFloat(partyResponse[0].initial_balance) + parseFloat(transaction.debit)) - (parseFloat(transaction.credit) + parseFloat(transaction.remission));
                                $scope.partyInfo.balance = Math.abs(transaction.currentBalance.toFixed(2));
                            } else {
                                transaction.currentBalance = parseFloat(transaction.debit) - (parseFloat(transaction.credit) + Math.abs(parseFloat(partyResponse[0].initial_balance)) + parseFloat(transaction.remission));
                                $scope.partyInfo.balance = Math.abs(transaction.currentBalance.toFixed(2));
                            }

                            $scope.partyInfo.sign = (parseFloat(transaction.currentBalance) < 0) ? 'Payable' : 'Receivable';

                        } else {
                            $scope.partyInfo.balance = Math.abs(parseFloat(partyResponse[0].initial_balance).toFixed(2));
                            $scope.partyInfo.sign = (parseFloat(partyResponse[0].initial_balance) < 0) ? 'Payable' : 'Receivable';
                        }

                    });
                }
            });
        }
    }

    $scope.deleteReturnItemFn = function(index) {
        $scope.return_cart.splice(index, 1);
    }
    $scope.deleteItemFn = function (index) {
        $scope.card.splice(index, 1);
    }
     // item wise Return sub total
    $scope.setReturnSubtotalFn = function(index){
        var total = 0;
        total = ($scope.return_cart[index].return_purchase_price * $scope.return_cart[index].return_quantity);
        $scope.return_cart[index].subtotal = total;
        return total;
    }
    
});
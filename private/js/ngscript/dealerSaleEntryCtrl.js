// sale controller
app.controller('dealerSaleEntryCtrl', function($scope, $http) {

    $scope.active = true;
    $scope.active1 = false;
    $scope.cart = [];
    $scope.return_cart = [];

    $scope.payment_label = 'Paid';

    $scope.stype = "cash";
    $scope.presentBalance = 0.00;
    $scope.isDisabled = false;

    $scope.remaining_commission = 0;
    $scope.total_commission_amount = 0.00;

    $scope.amount = {
        labour: 0,
        total: 0,
        totalqty: 0,
        totalDiscount: 0,
        discount_percentage: 0,
        truck_rent: 0,
        grandTotal: 0,
        paid: 0,
        due: 0
    };
    
    $scope.godownCode = '';
    $scope.dealerCategory = '';
    
    
    $scope.$watchGroup(['godown_code', 'dealer_category'], function(input_value) {
        
        $scope.godownCode = input_value[0];
        $scope.dealerCategory = input_value[1];
        
        if (typeof $scope.godownCode !== 'undefined') {

            
			
            // Get all products initial godown wise
            $scope.allProducts = [];
            var productWhere = {
                table: 'stock',
                cond: {
                    'godown_code': $scope.godownCode,
                    'quantity >': 0,
                },
                select: ['code', 'name', 'product_model','category','subcategory']
            };

            $http({
                method: 'POST',
                url: url + 'result',
                data: productWhere
            }).success(function(products) {
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
                    'godown_code': $scope.godownCode,
                    'status': 'active',
                    'type !=': 'supplier',
                    'category': $scope.dealerCategory,
                    'trash': 0
                },
                select: ['code', 'name', 'godown_code', 'mobile']
            };

            $http({
                method: 'POST',
                url: url + 'result',
                data: clientWhere
            }).success(function(response) {
                if (response.length > 0) {
                    $scope.clientList = response;
                } else {
                    $scope.clientList = [];
                }
            });
        }
    });
    
 
    // Get all  Rturn products
    
    $scope.$watchGroup(['godown_code', 'dealer_category'], function(input_value) {
        
        $scope.godownCode = input_value[0];
        $scope.dealerCategory = input_value[1];
        
        
        if (typeof $scope.godownCode !== 'undefined') {

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


    $scope.addNewProductFn = function() {

        if (typeof $scope.product_code !== 'undefined') {
            var condition = {
                table: 'stock',
                cond: {
                    code: $scope.product_code,
                    godown_code: (typeof $scope.godown_code != 'undefined') ? $scope.godown_code : $scope.select_godown_code
                }
            };
            //console.log(condition);

            $http({
                method: 'POST',
                url: url + 'read',
                data: condition
            }).success(function(response) {
                //console.log(response);
                if (response.length > 0) {
                    
                    var existingItem = $scope.cart.find(item => item.product_code === response[0].code);
                
                    if (existingItem) {
                            existingItem.quantity += 1;
                        } else {
                            var newItem = {
                            product: response[0].name,
                            category: response[0].category,
                            product_code: response[0].code,
                            product_serial: '',
                            product_model: response[0].product_model,
                            unit: response[0].unit,
                            godown_code: response[0].godown_code,
                            maxQuantity: parseInt(response[0].quantity),
                            stock_qty: parseInt(response[0].quantity),
                            quantity: 1.00,
                            bags: 0.00,
                            subtotal: 0.00,
                            discount: 0.00,
                            com_per: 0.00,
                            subcommission: 0.00,
                            purchase_price: parseFloat(response[0].purchase_price),
                            sale_price: 0,
                            category:'',
                            subcategory:'',
                            brand:'',
                        };
                        //parseFloat(response[0].dealer_sale_price)
                        if($scope.dealer_category=='a'){
                            newItem.sale_price = parseFloat(response[0].dealer_a_price);
                        }
                        if($scope.dealer_category=='b'){
                            newItem.sale_price = parseFloat(response[0].dealer_b_price);
                        }
                        if($scope.dealer_category=='c'){
                            newItem.sale_price = parseFloat(response[0].dealer_c_price);
                        }
    
                        $http({
                            method: 'POST',
                            url: url + 'result',
                            data: {
                                table: 'products',
                                cond : {
                                    'product_code' : response[0].code
                                }
                            }
                        }).success(function(item) {
                            newItem.category    = item[0].product_cat;
                            newItem.subcategory = item[0].subcategory;
                            newItem.brand       = item[0].brand;
                        });
                       
                        $scope.cart.push(newItem);
                        $scope.product_serial = '';
                    }
                }
            });
        }
    }



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
                //console.log(returnresponse);
                
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
                        return_sale_price: parseFloat(returnresponse[0].sale_price),
                        return_quantity: 1,
                        category:returnresponse[0].product_cat,
                        subcategory:returnresponse[0].subcategory,
                        brand:returnresponse[0].brand,
                    };
                    
                    if($scope.dealer_category=='a'){
                        newReturnItem.return_sale_price = parseFloat(returnresponse[0].sale_price);
                    }
                    if($scope.dealer_category=='b'){
                        newReturnItem.return_sale_price = parseFloat(returnresponse[0].sale_price);
                    }

                    $scope.return_cart.push(newReturnItem);
                }
            });
        }
    }



    //calculate Bags no
    $scope.calculateBags = function(i, size) {
        var bag_no = 0.00;
        bag_no = parseFloat($scope.cart[i].quantity) / parseFloat(size);
        $scope.cart[i].bags = bag_no.toFixed(2);
        return $scope.cart[i].bags;
    };


    //calculate commission
    $scope.calculateTotalCommission = function() {
        var total = parseFloat($scope.amount.total),
            totalCommission = 0.00,
            remainingCommission = 0;

        remainingCommission = parseInt(6 - $scope.commission);
        $scope.remaining_commission = remainingCommission;

        totalCommission = parseFloat(total * (parseFloat($scope.commission) / 100));
        $scope.total_commission_amount = totalCommission.toFixed(2);

        return $scope.total_commission_amount;
    };


    $scope.subCommissionFn = function(index) {
        var total = 0.0;
        $scope.cart[index].subcommission = $scope.cart[index].quantity * $scope.cart[index].sale_price * parseFloat($scope.cart[index].com_per / 100);
        return $scope.cart[index].subcommission.toFixed(2);
    }

    $scope.setSubtotalFn = function(index) {
        var total = 0.0;
        total = parseFloat($scope.cart[index].sale_price * $scope.cart[index].quantity);
        $scope.cart[index].subtotal = total - $scope.cart[index].subcommission;
        return $scope.cart[index].subtotal.toFixed(2);
    }

    $scope.purchaseSubtotalFn = function(index) {
        $scope.cart[index].purchase_subtotal = $scope.cart[index].purchase_price * $scope.cart[index].quantity;
        return $scope.cart[index].purchase_subtotal.toFixed();
    }


    $scope.getTotalFn = function() {
        var total = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.subtotal);
        });

        $scope.amount.total = total.toFixed();
        return $scope.amount.total;
    }


    $scope.calculateDiscountFn = function() {
        var total = 0.00;
        total = $scope.amount.total * ($scope.amount.discount_percentage / 100);
        $scope.amount.totalDiscount = total;
        return total.toFixed(2);
    }
    
    
    // item wise Return sub total
    $scope.setReturnSubtotalFn = function(index){
        var total = 0;
        total = ($scope.return_cart[index].return_purchase_price * $scope.return_cart[index].return_quantity);
        $scope.return_cart[index].subtotal = total;
        return total;
    }


    $scope.getTotalQtyFn = function() {
        var total = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.quantity);
        });

        $scope.amount.totalqty = total;
        return $scope.amount.totalqty;
    }


    $scope.getPurchaseTotalFn = function() {
        var total = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.purchase_subtotal);
        });

        $scope.amount.purchase_total = total.toFixed();
        return $scope.amount.purchase_total;
    }


    $scope.getTotalCommissionFn = function() {
        var total = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.subcommission);
        });
        $scope.amount.totalCommission = total.toFixed(2);
        return $scope.amount.totalCommission;
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


    //Here Commission Will Minus from total
    $scope.getGrandTotalFn = function() {
        var grand_total = 0;
        var total_return = 0;
        
        var total_discount = (!isNaN(parseFloat($scope.total_discount)) ? parseFloat($scope.total_discount) : 0);

        angular.forEach($scope.return_cart, function(item) {
            total_return += parseFloat(item.subtotal);
        });
        
        //grand_total = parseFloat($scope.amount.total) - parseFloat($scope.amount.totalDiscount);
        grand_total = parseFloat($scope.amount.total) - total_discount -total_return;
        return $scope.amount.grandTotal = grand_total.toFixed(2);
    }


    $scope.getCurrentTotalFn = function() {
        var total = 0.00;

        if ($scope.partyInfo.sign == 'Receivable') {
            total = (parseFloat($scope.partyInfo.balance) + parseFloat($scope.amount.grandTotal)) - $scope.amount.paid;

            if (total > 0) {
                $scope.partyInfo.csign = "Receivable";
            } else if (total < 0) {
                $scope.partyInfo.csign = "Payable";
            } else {
                $scope.partyInfo.csign = "Receivable";
            }
        } else {
            total = (parseFloat($scope.partyInfo.balance) + $scope.amount.paid) - parseFloat($scope.amount.grandTotal);

            if (total > 0) {
                $scope.partyInfo.csign = "Payable";
            } else if (total < 0) {
                $scope.partyInfo.csign = "Receivable";
            } else {
                $scope.partyInfo.csign = "Receivable";
            }
        }

        $scope.amount.due = total.toFixed(2);
        $scope.presentBalance = Math.abs(total.toFixed(2));
        
        if($scope.partyInfo.cl > 0){
            if ($scope.partyInfo.csign == "Receivable" && $scope.presentBalance <= $scope.partyInfo.cl) {
                $scope.isDisabled = false;
                $scope.message = "";
            } else if ($scope.partyInfo.csign == "Payable") {
                $scope.isDisabled = false;
                $scope.message = "";
            } else {
                $scope.isDisabled = true;
                $scope.message = "Total is being crossed the Credit Limit!";
            }
        }else{
            $scope.isDisabled = false;
            $scope.message = "";
        }
        
        return $scope.presentBalance;
    }



    // calculate_installment_amount
    $scope.calculate_installment_amount = function(installment_number) {
        var total = 0.00;
        if ($scope.partyInfo.csign == "Receivable") {
            //total = (installment_number > 0) ? ($scope.amount.grandTotal - $scope.amount.paid)/installment_number:0.00;
            total = (installment_number > 0) ? ($scope.presentBalance / installment_number) : 0.00;
            $scope.installment_amount = total.toFixed(2);
        } else {
            $scope.installment_amount = 0.00;
        }
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
    $scope.findPartyFn = function(party_code) {

        if (typeof party_code !== 'undefined' && party_code != '') {

            $http({
                method: 'POST',
                url: url + 'result',
                data: {
                    table: "parties",
                    cond: {
                        code: party_code,
                        godown_code: $scope.godown_code
                    },
                    select: ['code', 'name', 'mobile', 'address', 'initial_balance', 'credit_limit']
                }
            }).success(function(partyResponse) {
				
                if (partyResponse.length > 0) {
                    
                    $scope.partyInfo.code = partyResponse[0].code;
                    $scope.partyInfo.name = partyResponse[0].name;
                    $scope.partyInfo.contact = partyResponse[0].mobile;
                    $scope.partyInfo.address = partyResponse[0].address;
                    $scope.partyInfo.cl = parseFloat(partyResponse[0].credit_limit);


                    $http({
                        method: 'POST',
                        url: url + 'party_balance',
                        data: {party_code: party_code}
                    }).success(function(balanceInfo) {

                        $scope.partyInfo.balance = Math.abs(parseFloat(balanceInfo.balance));
                        $scope.partyInfo.sign = balanceInfo.status;
                    });
                }
            });
        }
    }


    $scope.deleteReturnItemFn = function(index) {
        $scope.return_cart.splice(index, 1);
    }

    $scope.deleteItemFn = function(index) {
        $scope.cart.splice(index, 1);
    }
});
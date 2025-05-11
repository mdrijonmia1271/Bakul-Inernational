// add purchase entry
app.controller('PurchaseEntry', function($scope, $http) {
    $scope.supplierList = [];
    $scope.active = true;
    $scope.cart = [];

    $scope.amount = {
        total: 0,
        totalDiscount: '',
        transport_cost: '',
        grandTotal: 0,
        paid: '',
        due: 0
    };
    $scope.validation = false;

    $scope.$watch('godown_code', function (godown_code) {
        
        if (typeof $scope.godown_code != 'undefined') {

            //Get Supplier List Showroom Wise
            $http({
                method: 'POST',
                url: url + 'result',
                data: {
                    table: 'parties',
                    cond: {
                        'godown_code': godown_code,
                        'status': 'active',
                        'type !=': 'client',
                        'trash': 0
                    },
                    select: ['code', 'name', 'godown_code', 'mobile', 'address']
                }
            }).success(function (supplier) {

                $scope.supplierList = [];

                if (supplier.length > 0) {
                    $scope.supplierList = supplier;
                }
            });
        }
    });

    $scope.exists = function() {
        var where = {
            table: "saprecords",
            cond: {
                voucher_no: $scope.voucherNo,
                trash: '0'
            }
        };

        $http({
            method: "POST",
            url: url + "read",
            data: where
        }).success(function(response) {
            if (response.length > 0) {
                $scope.validation = true;
            } else {
                $scope.validation = false;
            }
        });
    };

    $scope.partyInfo = {
        balance: 0,
        previous_balance: 0,
        sign: 'Receivable',
        csign: 'Receivable'
    };

    // Get Party Info then Create New Methode setPartyfn()
    $scope.getPartyBalanceFn = function(party_code) {
        
        if (typeof party_code !== 'undefined' && party_code != '') {

            $http({
                method: 'POST',
                url: url + 'party_balance',
                data: {party_code: party_code}
            }).success(function(balanceInfo) {
                $scope.partyInfo.balance = Math.abs(parseFloat(balanceInfo.balance));
                $scope.partyInfo.previous_balance = parseFloat(balanceInfo.balance);
                $scope.partyInfo.sign = balanceInfo.status;
            });
        }
    };


    // add product in to cart
    $scope.addNewProductFn = function(product_code) {
        if (typeof product_code !== 'undefined' && product_code != '') {
            $scope.active = false;
            
            $http({
                method: 'POST',
                url: url + 'result',
                data: {
                    table: 'products',
                    cond: {
                        product_code: product_code,
                        status: "available"
                    }
                }
            }).success(function(response) {

                if (response.length > 0) {
                    //console.log(response);
                    var item = {
                        product: response[0].product_name,
                        product_serial: '',
                        commission: 0.0,
                        product_code: response[0].product_code,
                        product_model: response[0].product_model,
                        product_cat: response[0].product_cat,
                        product_subcat: response[0].subcategory,
                        unit: response[0].unit,
                        sale_price: parseFloat(response[0].sale_price),
                        price: parseFloat(response[0].purchase_price),
                        purchase_price: parseFloat(response[0].purchase_price),
                        retail_sale_price: parseFloat(response[0].retail_sale_price),
                        dealer_sale_price: parseFloat(response[0].dealer_sale_price),
                        dealer_a_price: parseFloat(response[0].dealer_a_price),
                        dealer_b_price: parseFloat(response[0].dealer_b_price),
                        dealer_c_price: parseFloat(response[0].dealer_c_price),
                        quantity: 1,
                        discount: 0,
                        subtotal: 0,
                    };
                    $scope.cart.push(item);
                } else {
                    $scope.cart = [];
                }
            });
        }
    };

    $scope.setPurchasePrice = function(index) {
        var item = $scope.cart[index];
    
        var p_price = parseFloat(item.purchase_price) || 0;
        var commission = parseFloat(item.commission) || 0;
    
        var purchase_price = 0;
    
        // Calculate price after applying commission % on purchase_price
        if (commission > 0) {
            purchase_price = p_price - (p_price * commission / 100);
        } else {
            purchase_price = p_price;
        }
    
        // Set final price (after commission)
        item.price = parseFloat(purchase_price.toFixed(2));
        console.log('item.price = ',item.price)
    
        // Now calculate subtotal
        $scope.setSubtotalFn(index);
    };
    
    $scope.setSubtotalFn = function(index) {
        var item = $scope.cart[index];
        var quantity = parseFloat(item.quantity) || 0;
        var price = parseFloat(item.price) || 0;
        console.log('item.subtotal = ',item.subtotal)
            item.subtotal = parseFloat((price * quantity).toFixed(2));
    
        return item.subtotal;
    };

    // calculate purchase price
    // $scope.setPurchasePrice = function(index) {
    //     var total = 0.0;
    //     total = $scope.cart[index].price - parseFloat($scope.cart[index].commission);
    //     $scope.cart[index].purchase_price = total;
    //     return total.toFixed(2);
    // };


    // $scope.setSubtotalFn = function(index) {
    //     $scope.cart[index].subtotal = $scope.cart[index].purchase_price * $scope.cart[index].quantity;
    //     return $scope.cart[index].subtotal.toFixed(2);
    // };

    $scope.getTotalFn = function() {
        var total = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.subtotal);
        });

        $scope.amount.total = total.toFixed(2);
        return $scope.amount.total;
    };


    $scope.getGrandTotalFn = function() {

        var transport_cost = (!isNaN(parseFloat($scope.amount.transport_cost)) ? parseFloat($scope.amount.transport_cost) : 0);
        var total_discount = (!isNaN(parseFloat($scope.amount.totalDiscount)) ? parseFloat($scope.amount.totalDiscount) : 0);

        $scope.amount.grandTotal = parseFloat($scope.getTotalFn()) + transport_cost - total_discount;
        return $scope.amount.grandTotal.toFixed(2);
    };



    // get total quantity
        $scope.getTotalQtyFn = function() {
            var total = 0;
            angular.forEach($scope.cart, function(item) {
                total += parseFloat(item.quantity);
            });
    
            return Math.abs(total.toFixed(2));
        }





    $scope.getCurrentTotalFn = function() {

        var payment = (!isNaN(parseFloat($scope.amount.paid)) ? parseFloat($scope.amount.paid) : 0);

        var balance = $scope.partyInfo.previous_balance - parseFloat($scope.getGrandTotalFn()) + payment;

        $scope.partyInfo.csign = (balance < 0 ? 'Payable' : 'Receivable');

        return Math.abs(balance.toFixed(2));
    };

    $scope.deleteItemFn = function(index) {
        $scope.cart.splice(index, 1);
    };
});
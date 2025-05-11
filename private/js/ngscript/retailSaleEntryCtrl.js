// sale controller
app.controller('retailSaleEntryCtrl', function($scope, $http) {

    $scope.cart = [];
    $scope.return_cart = [];
    $scope.godown_code = '';
    $scope.allProducts = [];
    $scope.allReturnProducts = [];

    //$scope.isDisabled = false;


    // Get all products
    $scope.$watch('godown_code', function(godown_code) {

        if (typeof godown_code !== 'undefined') {

            $scope.allProducts = [];

            var productWhere = {
                table: 'stock',
                cond: {
                    'godown_code': godown_code,
                    'quantity >': 0,
                },
                select: ['code', 'name', 'godown_code', 'product_model','category','subcategory']
            }

            $http({
                method: 'POST',
                url: url + 'result',
                data: productWhere
            }).success(function(products) {
                
                console.log('products=>', products);
                if (products.length > 0) {
                    $scope.allProducts = products;
                } else {
                    $scope.allProducts = [];
                }
            });
        }
    });



  // Get all  Rturn products
    $scope.$watch('godown_code', function(godown_code) {

        if (typeof godown_code !== 'undefined') {

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




    // add product in card
    $scope.addNewProductFn = function() {
        if (typeof $scope.product_code !== 'undefined' && typeof $scope.godown_code !== 'undefined') {

            var condition = {
                table: 'stock',
                cond: {
                    code: $scope.product_code.trim(),
                    godown_code: $scope.godown_code
                }
            };

            $http({
                method: 'POST',
                url: url + 'result',
                data: condition
            }).success(function(response) {
                
                if (response.length > 0) {
                    var existingItem = $scope.cart.find(item => item.product_code === response[0].code);
                
                    if (existingItem) {
                            existingItem.quantity += 1;
                            
                        } else {
                            var newItem = {
                            product: response[0].name,
                            category: response[0].category,
                            product_code: response[0].code,
                            product_model: response[0].product_model,
                            unit: response[0].unit,
                            godown_code: response[0].godown_code,
                            maxQuantity: parseInt(response[0].quantity),
                            stock_qty: parseInt(response[0].quantity),
                            purchase_price: parseFloat(response[0].purchase_price),
                            sale_price: parseFloat(response[0].retail_sale_price),
                            quantity: 1,
                            subtotal: 0,
                            discount: 0,
                            category:'',
                            subcategory:'',
                            brand:'',
                        };
                        
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
                console.log(newReturnItem);
                if (returnresponse.length > 0) {
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
                    $scope.return_cart.push(newReturnItem);
                }
            });
        }
    }






    // item wise discount
    $scope.setDiscountFn = function(index) {
        var total = 0;
        total = (($scope.cart[index].sale_price * $scope.cart[index].quantity) * $scope.cart[index].discount) / 100;
        $scope.cart[index].discount_amount = Math.abs(total.toFixed(2));
        return $scope.cart[index].discount_amount;
    }

    // item wise sub total
    $scope.setSubtotalFn = function(index) {
        var total = 0;
        total = (parseFloat($scope.cart[index].sale_price) * parseFloat($scope.cart[index].quantity));
        $scope.cart[index].subtotal = parseFloat(total) - parseFloat($scope.cart[index].discount_amount);
        return $scope.cart[index].subtotal.toFixed(2);
    }
    
    
     // item wise Return sub total
    $scope.setReturnSubtotalFn = function(index) {
        var total = 0;
        total = ($scope.return_cart[index].return_purchase_price * $scope.return_cart[index].return_quantity);
        $scope.return_cart[index].subtotal = total;
        return total;
    }


    // item wise total discount
    $scope.getItemWiseTotalDiscountFn = function() {

        var total = 0;
        var flat_discount = (!isNaN(parseFloat($scope.flat_discount)) ? parseFloat($scope.flat_discount) : 0);

        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.discount_amount);
        });
        return Math.abs((total + flat_discount).toFixed(2));
    }


    // get total amount
    $scope.getTotalFn = function() {
        var total = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.subtotal);
        });
    
        return Math.abs(total.toFixed(2));
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






    // get total quantity
    $scope.getTotalQtyFn = function() {
        var total = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.quantity);
        });

        return Math.abs(total.toFixed(2));
    }


    // calculate total disocunt
    $scope.getTotalDiscountFn = function() {
        var total = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.discount);
        });
        $scope.amount.totalDiscount = total.toFixed(2);
        return $scope.amount.totalDiscount;
    }



    // get grand total
    $scope.getGrandTotalFn = function() {

        var grand_total = 0;
        var total_return = 0;
         
        var flat_discount = (!isNaN(parseFloat($scope.flat_discount)) ? parseFloat($scope.flat_discount) : 0);

  
        angular.forEach($scope.return_cart, function(item) {
            total_return += parseFloat(item.subtotal);
        });
        
        
        grand_total = parseFloat($scope.getTotalFn()) - flat_discount - total_return;

        return Math.abs(grand_total.toFixed(2));
    }


    // get full paid fn
    $scope.getFullPaidFn = function(){
        $scope.paid = $scope.getGrandTotalFn();
    }


    // get paid fn
    $scope.getPaidFn = function(){
        var paid = 0;

        var paidAmount = (!isNaN(parseFloat($scope.paid)) ? parseFloat($scope.paid) : 0);

        if (paidAmount > 0 && paidAmount <= $scope.getGrandTotalFn()){
            paid = paidAmount;
        }else if(paidAmount > 0 && paidAmount >= $scope.getGrandTotalFn()){
            paid = $scope.getGrandTotalFn();
        }else {
            paid = 0;
        }

        return Math.abs(parseFloat(paid).toFixed(2));
    }


    $scope.labelName = 'Due';

    // calculate current balance
    $scope.getCurrentTotalFn = function() {

        var total = 0;

        var paidAmount = (!isNaN(parseFloat($scope.paid)) ? parseFloat($scope.paid) : 0);

        total = $scope.getGrandTotalFn() - paidAmount;

        $scope.labelName = (total < 0 ? 'Return' : 'Due');

        return Math.abs(total.toFixed(2));
    }



    $scope.deleteItemFn = function(index) {
        $scope.cart.splice(index, 1);
    }
    
    $scope.deleteReturnItemFn = function(index) {
        $scope.return_cart.splice(index, 1);
    }
    
    
    
});
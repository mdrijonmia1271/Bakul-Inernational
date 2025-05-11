//  Edit Sale Ctrl

app.controller('editRetailSaleCtrl', function($scope, $http) {

    $scope.cart = [];

    $scope.partyInfo = {
        partyCode: '',
        previousBalance: 0,
        currentBalance: 0,
        sign: 'Receivable',
        csign: 'Payable'
    };

    $scope.godown_code = '';

    $scope.flat_discount = 0;
    $scope.total_discount = 0;
    $scope.previous_paid = 0;
    $scope.paid = 0;


    // Get all products and sap records
    $scope.$watchGroup(['voucher_no', 'godown_code'], function(watchInfo) {

        var voucher_no = watchInfo[0];
        var godown_code = watchInfo[1];

        if (typeof voucher_no !== 'undefined' && typeof godown_code !== 'undefined') {

            // get all product
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
                if (products.length > 0) {
                    $scope.allProducts = products;
                } else {
                    $scope.allProducts = [];
                }
            });


            $scope.cart = [];

            // get purchase record
            var saprecordWhere = {
                tableFrom: 'saprecords',
                tableTo: ['sapitems', 'stock'],
                joinCond: ['saprecords.voucher_no=sapitems.voucher_no AND saprecords.godown_code=sapitems.godown_code', 'sapitems.product_code=stock.code AND sapitems.godown_code=stock.godown_code'],
                cond: {'saprecords.voucher_no': voucher_no, 'saprecords.godown_code': godown_code, 'saprecords.trash': '0', 'sapitems.trash': '0','sapitems.status': 'sale'},
                select: ['sapitems.*', 'sapitems.id AS item_id', 'saprecords.*', 'stock.name', 'stock.quantity AS stock_quantity', 'stock.category', 'stock.subcategory','stock.subcategory']
            };

            $http({
                method: 'POST',
                url: url + 'join',
                data: saprecordWhere
            }).success(function(response){

                var itemWiseTotalDiscount = 0;

                if(response.length > 0) {

                    angular.forEach(response, function(row, index){

                        itemWiseTotalDiscount += parseFloat(row.discount);

                        response[index].product = row.name;
                        response[index].category = row.category;
                        response[index].godown = row.godown_code;
                        response[index].discount = parseFloat(row.discount_percentage);
                        response[index].discount_amount = 0;
                        response[index].paid = parseFloat(row.paid);
                        response[index].stock_qty = parseFloat(row.stock_quantity);
                        response[index].old_quantity = parseFloat(row.quantity);
                        response[index].quantity = parseFloat(row.quantity);
                        response[index].sale_price = parseFloat(row.sale_price);
                        response[index].purchase_price = parseFloat(row.purchase_price);
                        response[index].old_subtotal = 0;
                        response[index].subtotal = 0;
                    });

                    var flat_discountd = (parseFloat(response[0].total_discount) - itemWiseTotalDiscount);
                    $scope.total_return = parseFloat(response[0].total_return);
                    $scope.flat_discount = Math.abs(parseFloat(flat_discountd).toFixed(2));
                    $scope.total_discount = parseFloat(response[0].total_discount);
                    $scope.previous_paid = parseFloat(response[0].paid);
                    $scope.commitment_date = response[0].commitment_date;

                    $scope.cart = response;
                }
            });
            
            
            
            $scope.return_cart = [];

            // get return record
            var saprecordWhereReturn = {
                tableFrom: 'saprecords',
                tableTo: ['sapitems', 'stock'],
                joinCond: ['saprecords.voucher_no=sapitems.voucher_no AND saprecords.godown_code=sapitems.godown_code', 'sapitems.product_code=stock.code AND sapitems.godown_code=stock.godown_code'],
                cond: {'saprecords.voucher_no': voucher_no, 'saprecords.godown_code': godown_code, 'saprecords.trash': '0', 'sapitems.trash': '0','sapitems.status': 'sale_purchase'},
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

                    var newItem = {
                        item_id: '',
                        product: response[0].name,
                        category: response[0].category,
                        product_code: response[0].code,
                        product_model: response[0].product_model,
                        unit: response[0].unit,
                        godown_code: response[0].godown_code,
                        stock_qty: parseFloat(response[0].quantity),
                        old_quantity: 0,
                        purchase_price: parseFloat(response[0].purchase_price),
                        sale_price: parseFloat(response[0].sell_price),
                        quantity: 1,
                        old_subtotal: 0,
                        subtotal: 0,
                        discount: 0,
                        discount_amount: 0,
                    };

                    $scope.cart.push(newItem);
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
    $scope.setOldSubtotalFn = function(index) {
        var total = 0;
        total = ($scope.cart[index].sale_price * $scope.cart[index].old_quantity);
        $scope.cart[index].old_subtotal = total - $scope.cart[index].discount_amount;
        return $scope.cart[index].old_subtotal.toFixed(2);
    }
    
    
    // return item wise  sub total
    $scope.setOldReturnSubtotalFn = function(index) {
        var total = 0;
        total = ($scope.return_cart[index].purchase_price * $scope.return_cart[index].old_quantity);
        $scope.return_cart[index].sub_total = total;
        return total;
    }    
    

    // item wise sub total
    $scope.setSubtotalFn = function(index) {
        var total = 0;
        total = ($scope.cart[index].sale_price * $scope.cart[index].quantity);
        $scope.cart[index].subtotal = total - $scope.cart[index].discount_amount;
        return $scope.cart[index].subtotal.toFixed(2);
    }

 //return item wise sub total
    $scope.setReturnSubtotalFn = function(index) {
        var total = 0;
        total = ($scope.return_cart[index].purchase_price * $scope.return_cart[index].quantity);
        $scope.return_cart[index].sub_total = total;
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
        var total_return = 0;
        angular.forEach($scope.cart, function(item) {
            total += parseFloat(item.subtotal);
        });

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


    $scope.getTotalNewReturnFn= function() {
        var total_new_return = 0;
        angular.forEach($scope.return_cart, function(item) {
            total_new_return += parseFloat(item.sub_total);
        });

        return Math.abs(total_new_return.toFixed(2));
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

        angular.forEach($scope.return_cart, function(item) {
            total_return += parseFloat(item.sub_total);
        });

        var flat_discount = (!isNaN(parseFloat($scope.flat_discount)) ? parseFloat($scope.flat_discount) : 0);

        grand_total = parseFloat($scope.getTotalFn()) - flat_discount - total_return;

        return Math.abs(grand_total.toFixed(2));
    }


    // get full paid fn
    $scope.getFullPaidFn = function(){
        $scope.paid = $scope.getGrandTotalFn() - $scope.previous_paid;
    }


    // get paid fn
    $scope.getPaidFn = function(){

        var paid = 0;

        var paidAmount = (!isNaN(parseFloat($scope.paid)) ? parseFloat($scope.paid) : 0) + $scope.previous_paid;

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
            
        var paidAmount = (!isNaN(parseFloat($scope.paid)) ? parseFloat($scope.paid) : 0) + $scope.previous_paid;
        
        total = $scope.getGrandTotalFn() - paidAmount;

        $scope.labelName = (total < 0 ? 'Return' : 'Due');

        return Math.abs(total.toFixed(2));
    }


    $scope.deleteReturnItemFn = function(index) {
         $scope.return_cart.splice(index, 1);
    }

    // delete items
    $scope.deleteItemFn = function(index) {




        if ($scope.cart[index].item_id !== ''){

            var alartInfo =  confirm("Are you sure you want to delete this data!");

            if (alartInfo){

                var stockWhere = {
                    table: 'stock',
                    cond: {
                        code: $scope.cart[index].product_code,
                        godown_code: $scope.cart[index].godown_code
                    },
                    select: ['quantity']
                };

                // get stock data
                $http({
                    method : 'POST',
                    url    : url + 'result',
                    data   : stockWhere
                }).success(function(stockInfo){

                    if (stockInfo.length > 0){

                        // calculate quantity
                        var quantity = parseFloat(stockInfo[0].quantity) + parseFloat($scope.cart[index].old_quantity);

                        // update stock
                        $http({
                            method : 'POST',
                            url    : url + 'save',
                            data   : {
                                table: 'stock',
                                cond: {
                                    code: $scope.cart[index].product_code,
                                    godown_code: $scope.cart[index].godown_code
                                },
                                data: { quantity: quantity }
                            }
                        }).success(function(updateStock){

                            if (updateStock == 'success'){

                                // delete sapitems
                                $http({
                                    method : 'POST',
                                    url    : url + 'delete',
                                    data   : {
                                        table: 'sapitems',
                                        cond: { id: $scope.cart[index].item_id }
                                    }
                                }).success(function(deleteSapitems){
                                    if (deleteSapitems == 'danger'){
                                        $scope.cart.splice(index, 1);
                                    }
                                });
                            }
                        });
                    }
                });
            }
        }else{
            $scope.cart.splice(index, 1);
        }
    }

});
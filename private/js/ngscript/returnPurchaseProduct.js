// add purchase entry
app.controller('returnPurchaseProduct', function($scope, $http){
	$scope.active = true;
	$scope.godown_code = '';
	$scope.cart = [];
	$scope.amount = {
		total: 0,
		totalDiscount: 0,
		transport_cost: 0,
		grandTotal: 0,
		paid: 0,
		due: 0
	};
	
	$scope.validation = false;

	$scope.partyInfo = {
		balance: 0,
		payment: 0,
		sign: 'Receivable',
		csign: 'Receivable'
	};
	
	$scope.$watch('godown_code', function (godown_code) {
        
        if(typeof godown_code !== 'undefined' && godown_code != ''){

            // Get all products initial godown wise
            $scope.allProducts = [];
    		var productWhere = {
    			table : 'stock',
    			cond  :{
    				'godown_code': godown_code,
    				'quantity >': 0,
    			},
    			select: ['code', 'name', 'product_model']
    		};

    		$http({
    			method : 'POST',
    			url    : url + 'result',
    			data   : productWhere
    		}).success(function(products){
    		    //console.log(products);
    			if (products != 'false') {
    				$scope.allProducts = products;
    			}else{
    				$scope.allProducts = [];
    			}
    		});
        }
    });

	$scope.setPartyfn = function(party_code) {

		if (typeof party_code !== 'undefined' && party_code != ''){
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


	$scope.getCurrentTotalFn = function() {
		var total = 0;

		if($scope.partyInfo.sign == 'Receivable'){
			total = ($scope.partyInfo.balance + $scope.amount.paid) + parseFloat($scope.amount.grandTotal);

			if(total >= 0) {
				$scope.partyInfo.csign = "Receivable";
			} else {
				$scope.partyInfo.csign = "Payable";
			}
		} else {
			total = ($scope.partyInfo.balance - parseFloat($scope.amount.grandTotal));

			if(total > 0) {
				$scope.partyInfo.csign = "Payable";
			} else {
				$scope.partyInfo.csign = "Receivable";
			}
		}

		return Math.abs(total.toFixed(2));
	}

	$scope.addNewProductFn = function(){
	    
	    
		if(typeof $scope.product_code !== 'undefined' && typeof $scope.godown_code !== 'undefined'){
			$scope.active = false;
			
			var condition = {
				table: 'stock',
				cond: {
				    code   : $scope.product_code,
				    godown_code : (typeof $scope.g_code != 'undefined') ? $scope.g_code : $scope.select_godown_code
				}
			};
			
			console.log(condition);

			$http({
				method: 'POST',
				url: url + 'read',
				data: condition
			}).success(function(response){
			    
				if(response.length > 0){
					var item = {
						product        : response[0].name,
						product_code   : response[0].code,
						product_model  : response[0].product_model,
						category       : response[0].category,
						product_serial : response[0].product_serial,
						godown_code    : response[0].godown_code,
						unit 		   : response[0].unit,
						maxQuantity    : response[0].quantity,
						price          : parseFloat(response[0].purchase_price),
						quantity       : (typeof $scope.quantity === 'undefined') ? 0 : $scope.quantity,
						discount       : 0,
						subtotal       : 0,
					};
					$scope.cart.push(item);
					console.log($scope.cart);
				}else{
					$scope.cart = [];
				}
			});
		}
	}


	$scope.setSubtotalFn = function(index){
		$scope.cart[index].subtotal = $scope.cart[index].price * $scope.cart[index].quantity;
		return $scope.cart[index].subtotal.toFixed(2);
	}

	$scope.getTotalFn = function(){
		var total = 0;
		angular.forEach($scope.cart, function(item){
			total += parseFloat(item.subtotal);
		});

		$scope.amount.total = total.toFixed(2);
		return $scope.amount.total;
	}

	/*
	$scope.getTotalDiscountFn = function() {
		var total = 0;
		angular.forEach($scope.cart, function(item){
			total += parseFloat(item.discount);
		});

		$scope.amount.totalDiscount = total.toFixed(2);
		return $scope.amount.totalDiscount;
	}*/

	$scope.getGrandTotalFn = function(){
		$scope.amount.grandTotal = parseFloat($scope.amount.total - $scope.amount.totalDiscount + $scope.amount.transport_cost) ;
		return $scope.amount.grandTotal.toFixed(2);
	}

	$scope.getTotalDueFn = function() {
		$scope.amount.due = $scope.amount.grandTotal - $scope.amount.paid;
		return $scope.amount.due.toFixed(2);
	}

	$scope.deleteItemFn = function(index){
		$scope.cart.splice(index, 1);
	}

});
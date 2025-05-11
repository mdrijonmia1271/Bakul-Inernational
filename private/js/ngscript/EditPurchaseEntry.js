// Edit Purchase Entry
app.controller('EditPurchaseEntry', function($scope, $http) {
	$scope.partyInfo = {
		partyCode: '',
		balance: 0,
		previous_balance: 0,
		currentBalance: 0,
		sign: 'Receivable',
		csign: 'Payable'
	};

	$scope.godown_code = '';

	$scope.amount = {
		total_discount: 0,
		transport_cost: 0,
		previous_paid: 0,
		paid: 0
	};

	$scope.$watch('vno', function(voucherNo) {

		$scope.records = [];

		// get purchase record
		var transmit = {
			tableFrom: 'saprecords',
			tableTo: 'sapitems',
			joinCond: 'saprecords.voucher_no=sapitems.voucher_no AND saprecords.godown_code=sapitems.godown_code',
			cond: {
			    'saprecords.voucher_no': voucherNo,
			    'saprecords.trash': '0',
			    'sapitems.trash': '0',
			},
			select: ['saprecords.*', 'sapitems.*', 'sapitems.id AS item_id']
		};

		$http({
			method: 'POST',
			url: url + 'join',
			data: transmit
		}).success(function(response){

			console.log(response);

			if(response.length > 0) {

				angular.forEach(response, function(row, index){

					var where = {
						table : "products",
						cond : { product_code : row.product_code}
					};

					$http({
						method : "POST",
						url    : url + "read",
						data   : where
					}).success(function(result){
						response[index].product_cat = result[0].product_cat;
						response[index].product_name = result[0].product_name;
						response[index].subcategory = result[0].subcategory;
					});

					response[index].purchase_commission = parseFloat(row.purchase_commission);
					response[index].paid = parseFloat(row.paid);
					response[index].old_quantity = parseFloat(row.quantity);
					response[index].quantity = parseFloat(row.quantity);
					response[index].sale_price = parseFloat(row.sale_price);
					response[index].price = parseFloat(row.purchase_price);
					response[index].purchase_price = parseFloat(row.purchase_price);
				// 	response[index].dealer_a_price = parseFloat(row.dealer_a_price);
				// 	response[index].dealer_b_price = parseFloat(row.dealer_b_price);
				// 	response[index].dealer_c_price = parseFloat(row.dealer_c_price);
					response[index].godown = row.godown_code;
					response[index].old_subtotal = 0;
					response[index].subtotal = 0;
				});
                
                

				// get party balance info
				$http({
					method: 'POST',
					url: url + 'party_balance',
					data: {party_code:response[0].party_code}
				}).success(function(balanceInfo) {

					var balance = parseFloat(balanceInfo.balance) + parseFloat(response[0].total_bill) - parseFloat(response[0].paid);

					$scope.partyInfo.balance = Math.abs(balance);
					$scope.partyInfo.previous_balance = balance;
					$scope.partyInfo.sign = (balance < 0 ? 'Payable' : 'Receivable');
				});


				$scope.godown_code = response[0].godown_code;
				
				$scope.amount.previous_paid  = parseFloat(response[0].paid);
				$scope.amount.total_discount = parseFloat(response[0].total_discount);
				$scope.amount.transport_cost = parseFloat(response[0].transport_cost);

				$scope.records = response;
			}
		});
	});


	// add new product
	$scope.addNewProductFn = function(product_code){

		var where = {
			table: 'products',
			cond: {
				product_code: product_code,
				status: "available"
			}
		};

		$http({
			method: 'POST',
			url: url + 'result',
			data: where
		}).success(function(response) {
			if (response.length > 0) {

				var item = {
					item_id: '',
					product_name: response[0].product_name,
					product_cat: response[0].product_cat,
					subcategory: response[0].subcategory,
					purchase_commission: 0,
					product_code: response[0].product_code,
					product_model: response[0].product_model,
					unit: response[0].unit,
					sale_price: parseFloat(response[0].sale_price),
					price: parseFloat(response[0].purchase_price),
				// 	purchase_price: parseFloat(response[0].purchase_price),
				// 	dealer_a_price: parseFloat(response[0].dealer_a_price),
				// 	dealer_b_price: parseFloat(response[0].dealer_b_price),
				// 	dealer_c_price: parseFloat(response[0].dealer_c_price),
					godown: $scope.godown_code,
					old_quantity: 0,
					quantity: 1,
					old_subtotal: 0,
					subtotal: 0,
				};
				$scope.records.push(item);
			}
		});
	};

	// set purchase price
	$scope.setPurchasePriceFn = function(index) {

		var p_price =  $scope.records[index].price - 0;
		$scope.records[index].purchase_price = p_price.toFixed(2);
		return $scope.records[index].purchase_price;
	};


	// get new subtotal
	$scope.getSubtotalFn = function(index){

		var subtotal = $scope.records[index].purchase_price * $scope.records[index].quantity;

		$scope.records[index].subtotal = subtotal.toFixed(2);

		return $scope.records[index].subtotal;
	};

	// get total amount
	$scope.getTotalFn = function(){

		var total = 0;
		angular.forEach($scope.records, function(item) {
			total += parseFloat(item.subtotal);
		});

		return Math.abs(parseFloat(total).toFixed(2));
	};


	$scope.getGrandTotalFn = function() {
		var grand_total = 0;
		grand_total = (parseFloat($scope.getTotalFn()) + parseFloat($scope.amount.transport_cost)) - parseFloat($scope.amount.total_discount);

		return Math.abs(parseFloat(grand_total).toFixed(2));
	};

	$scope.getTotalPaidFn = function(){
		var total = 0;
		total = $scope.amount.previous_paid + parseFloat($scope.amount.paid);

		return Math.abs(parseFloat(total).toFixed(2));
	};


    // get total quantity
    $scope.getTotalQtyFn = function(){
        var total = 0;
        angular.forEach($scope.records, function(item){
            total += parseFloat(item.quantity);
        });

        return Math.abs(total.toFixed(2));
    }






	$scope.getCurrentTotalFn = function() {

		var balance = $scope.partyInfo.previous_balance - parseFloat($scope.getGrandTotalFn()) + parseFloat($scope.getTotalPaidFn());

		$scope.partyInfo.csign = (balance < 0 ? 'Payable' : 'Receivable');

		return Math.abs(balance.toFixed(2));
	};

	// delete items
	$scope.deleteItemFn = function(index) {

		if ($scope.records[index].item_id !== ''){

			var stockWhere = {
				table: 'stock',
				cond: {
					code: $scope.records[index].product_code,
					godown_code: $scope.records[index].godown
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
					var quantity = parseFloat(stockInfo[0].quantity) - parseFloat($scope.records[index].old_quantity);

					// update stock
					$http({
						method : 'POST',
						url    : url + 'save',
						data   : {
							table: 'stock',
							cond: {
								code: $scope.records[index].product_code,
								godown_code: $scope.records[index].godown
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
									cond: { id: $scope.records[index].item_id }
								}
							}).success(function(deleteSapitems){
								if (deleteSapitems == 'danger'){
									$scope.records.splice(index, 1);
								}
							});
						}
					});

				}
			});
		}else{
			$scope.records.splice(index, 1);
		}
	};
});



// sale controller
app.controller('complainSaleTypeCtrl', function($scope, $http) {

	$scope.active = true;
	$scope.active1 = false;

	$scope.stype = "cash";
    
    $scope.partyInfo = {
        code    : '',
		name    : '',
		contact : '',
		address : ''
    };

	$scope.active = 'cash';

	//get sale type
	$scope.getsaleType = function(type){
		$scope.active = type;
	};
	
	$scope.findPartyFn = function(party_code) {

		$scope.partyInfo.name    = '';
		$scope.partyInfo.contact = '';
		$scope.partyInfo.address = '';

		if(typeof party_code !== 'undefined' && party_code != ''){

		   	$http({
		   		method : 'post',
		   		url    : url + 'result',
		   		data   : {
					table : 'parties',
					cond :{ code : party_code }
				}
		   	}).success(function(response){

		   		if (response.length > 0) {
					//$scope.partyInfo.code    = response[0].code;
					$scope.partyInfo.name    = response[0].name;
					$scope.partyInfo.contact = response[0].mobile;
					$scope.partyInfo.address = response[0].address;
		   		}
		   	});
		}
	}

});
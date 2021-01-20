const app = angular.module('napanam', []);

app.controller('napanamCtrl', function($scope,$http) {
	
	const prod_url = "http://napanam.launion.gov.ph"
	const local_url = "http://localhost:8000"

	const api_url = local_url
	
	$scope.napanam_id = null;
	
	// const napanam_id = 263000

	$scope.proceed = function() {
		
		const napanam_id = $scope.napanam_id
        
		$http({
			method: 'GET',
			url: `${api_url}/api/napanam/check/registration/${napanam_id}`
		}).then(function mySucces(response) {
			
			window.location = `http://localhost:8000/survey/${napanam_id}`;

		}, function myError(response) {
			
			if (response.status == 404) {
				
				//Sweetalert2
				Swal.fire({
				  title: 'Awan ti Napanam?',
				  text: 'Agregister ka pay gamin',
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonText: 'Confirm',
				}).then((result) => {
				  if (result.value) {
					 window.location = "https://npnm.launion.gov.ph/#/regqrpass";
				  }
				})				
				
			}
			
		});
		
    };

});
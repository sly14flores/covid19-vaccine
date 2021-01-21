const app = angular.module('app', []);

app.controller('appCtrl', function($scope,$http) {
	
	const prod_url = "https://napanam.launion.gov.ph/lucovacs"
	const local_url = "http://localhost:8000"

	const api_url = prod_url
	
	$scope.napanam_id = null;
	
	// const napanam_id = 263000
	
	$scope.napanam = function() {
		
		//Sweetalert2
		Swal.fire({
		  title: 'Notice',
		  text: "You're about to be redirected to the Napanam Registration",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonText: 'Confirm',
		}).then((result) => {
		  if (result.value) {
			 window.location = "https://npnm.launion.gov.ph/#/regqrpass";
		  }
		})
		
	}

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
				  title: '<b class="text-danger">NOT FOUND!</b>',
				  icon: 'warning',
				  html: "Are you sure that you're registered to the NAPANAM? ",
				  showCancelButton: true,
				  focusConfirm: false,
				  confirmButtonText: 'Yes, Try Again!',
				  cancelButtonText: 'No, I want to register.',
				}).then((result) => {
				  if (result.value) {
					// Close
				  } else if (result.dismiss === Swal.DismissReason.cancel) {
					
					window.location = "https://npnm.launion.gov.ph/#/regqrpass";
					
				  }
				})			
				
			}
			
		});
    };

});
const app = angular.module('app', []);

app.controller('appCtrl', function($scope,$http) {

	const prod_url = "https://napanam.launion.gov.ph/lucovacs"
	const local_url = "http://vaccines.local"

	const ENV = process.env.MIX_ENV	
	const api_url = (ENV==='local')?local_url:prod_url	
	
	$scope.napanam_id = null;
	$scope.month = null;
	$scope.day = null;
	$scope.year = null;

	$scope.privacyNotice = function() {
		
		//Sweetalert2 Privacy Notice
		Swal.fire({
		  title: '<p style="color: #ffab5d">PRIVACY NOTICE!</p>',
		  icon: 'info',
		  iconColor: '#ffab5d',
		  html: '<p style="text-align: justify;">The Provincial Government of La Union (PGLU) respects and values your right to privacy. Rest assured your responses shall be treated with utmost confidentiality in compliance with the Data Privacy Act of 2012 (RA10173).</p>',
		  focusConfirm: false,
		  confirmButtonText: 'Proceed',
		  confirmButtonColor: '#68bca4',
		  showCancelButton: false,
		  allowOutsideClick: false,
		  allowEscapeKey: false,
		  allowEnterKey: false,
		})
		
	}
	
	$scope.napanam = function() {
		
		//Sweetalert2
		Swal.fire({
		  title: '<p style="color: #ffab5d">Here we go!</p>',
		  text: "You are about to be redirected to the NAPANAM Registration page.",
		  icon: 'info',
		  iconColor: '#ffab5d',
		  showCancelButton: true,
		  confirmButtonColor: '#68bca4',
		  cancelButtonColor: '#ffab5d',
		  confirmButtonText: 'Confirm',
		}).then((result) => {
		  if (result.value) {
			 window.location = "https://npnm.launion.gov.ph/#/regqrpass";
		  }
		})
		
	}
	
	$scope.checkBirthdate = function() {
		
		const napanam_id = $scope.napanam_id
		
		$scope.birthdate = ""+$scope.year+"-"+$scope.month+"-"+$scope.day;

		$http({
			method: 'GET',
			url: `${api_url}/api/napanam/check/registration/${napanam_id}`
		}).then(function mySucces(response) {
			
			$scope.status = response.status;

			console.log($scope.birthdate)
			
			if($scope.birthdate==response.data.data.dob){
				
				window.location = `${api_url}/survey/${napanam_id}`;

			} else {
				
				//Sweetalert2
				Swal.fire({
				  title: '<p style="color: #ffab5d">NOTICE!</p>',
				  icon: 'info',
				  iconColor: '#ffab5d',
				  html: "The Napanam ID and Birthdate you entered did not match. Please try again.",
				  showCancelButton: false,
				  focusConfirm: true,
				  confirmButtonColor: '#68bca4',
				  confirmButtonText: 'Ok',
				}).then((result) => {
				  if (result.value) {
					// Close
				  }
				})	
				
			}
			
		}, function myError(response) {
			
			// error
			
		});
		
	}

	$scope.proceed = function() {
		
		const napanam_id = $scope.napanam_id
		
		$http({
			method: 'GET',
			url: `${api_url}/api/napanam/check/registration/${napanam_id}`
		}).then(function mySucces(response) {
			
			$scope.status = response.status;
			
		}, function myError(response) {
			
			if (response.status == 404) {
				
				//Sweetalert2
				Swal.fire({
				  title: '<p class="text-danger">NOT FOUND!</p>',
				  icon: 'error',
				  html: "Are you sure that you're registered to the NAPANAM? ",
				  showCancelButton: true,
				  focusConfirm: false,
				  confirmButtonColor: '#68bca4',
				  cancelButtonColor: '#ffab5d',
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
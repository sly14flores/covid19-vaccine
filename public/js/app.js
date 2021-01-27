/******/ (() => { // webpackBootstrap
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
var app = angular.module('app', []);
app.controller('appCtrl', function ($scope, $http) {
  var prod_url = "https://napanam.launion.gov.ph/lucovacs";
  var local_url = "http://vaccines.local";
  var api_url = prod_url;
  $scope.napanam_id = null;
  $scope.birthdate = null;

  $scope.privacyNotice = function () {
    //Sweetalert2 Privacy Notice
    Swal.fire({
      title: '<p class="text-danger">PRIVACY NOTICE!</p>',
      icon: 'warning',
      html: '<p style="text-align: justify;">PGLU respects and values your right to privacy with utmost importance. Rest assured your responses will be treated with confidentiality in compliance with the Data Privacy Act of 2012 (RA10173).</p>',
      focusConfirm: false,
      confirmButtonText: 'Proceed',
      showCancelButton: false,
      allowOutsideClick: false,
      allowEscapeKey: false,
      allowEnterKey: false
    });
  };

  $scope.napanam = function () {
    //Sweetalert2
    Swal.fire({
      title: 'Notice',
      text: "You're about to be redirected to the Napanam Registration",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Confirm'
    }).then(function (result) {
      if (result.value) {
        window.location = "https://npnm.launion.gov.ph/#/regqrpass";
      }
    });
  };

  $scope.checkBirthdate = function () {
    var napanam_id = $scope.napanam_id;
    var date = new Date($scope.birthdate); // birthdate convert

    $scope.getBirthdate = new Date(date.getTime() - date.getTimezoneOffset() * 60000).toISOString().split("T")[0];
    $http({
      method: 'GET',
      url: "".concat(api_url, "/api/napanam/check/registration/").concat(napanam_id)
    }).then(function mySucces(response) {
      $scope.status = response.status;

      if ($scope.getBirthdate == response.data.data.dob) {
        window.location = "".concat(api_url, "/survey/").concat(napanam_id);
      } else {
        //Sweetalert2
        Swal.fire({
          title: '<p class="text-danger">NOTICE!</p>',
          icon: 'warning',
          html: "The Napanam ID and Birthdate you entered did not match. Please try again.",
          showCancelButton: false,
          focusConfirm: true,
          confirmButtonText: 'Ok'
        }).then(function (result) {
          if (result.value) {// Close
          }
        });
      }
    }, function myError(response) {// error
    });
  };

  $scope.proceed = function () {
    var napanam_id = $scope.napanam_id;
    $http({
      method: 'GET',
      url: "".concat(api_url, "/api/napanam/check/registration/").concat(napanam_id)
    }).then(function mySucces(response) {
      $scope.status = response.status;
    }, function myError(response) {
      if (response.status == 404) {
        //Sweetalert2
        Swal.fire({
          title: '<p class="text-danger">NOT FOUND!</p>',
          icon: 'warning',
          html: "Are you sure that you're registered to the NAPANAM? ",
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText: 'Yes, Try Again!',
          cancelButtonText: 'No, I want to register.'
        }).then(function (result) {
          if (result.value) {// Close
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            window.location = "https://npnm.launion.gov.ph/#/regqrpass";
          }
        });
      }
    });
  };
});
/******/ })()
;
/******/ (() => { // webpackBootstrap
/*!*********************************!*\
  !*** ./resources/js/napanam.js ***!
  \*********************************/
var app = angular.module('napanam', []);
app.controller('napanamCtrl', function ($scope, $http) {
  var prod_url = "napanam.launion.gov.ph";
  var local_url = "http://localhost:8000";
  var api_url = local_url;
  $scope.napanam_id = null; // const napanam_id = 263000

  $scope.proceed = function () {
    var napanam_id = $scope.napanam_id;
    $http({
      method: 'GET',
      url: "".concat(api_url, "/api/napanam/check/registration/").concat(napanam_id)
    }).then(function mySucces(response) {
      window.location = "http://localhost:8000/survey/".concat(napanam_id);
    }, function myError(response) {
      if (response.status == 404) {
        //Sweetalert2
        Swal.fire({
          title: 'Awan ti Napanam?',
          text: 'Agregister ka pay gamin',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (result) {
          if (result.value) {
            window.location = "https://npnm.launion.gov.ph/#/regqrpass";
          }
        });
      }
    });
  };
});
/******/ })()
;
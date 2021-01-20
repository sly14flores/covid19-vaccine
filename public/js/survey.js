/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/survey.js ***!
  \********************************/
var app = angular.module('survey', []);
app.controller('surveyCtrl', function ($scope, $http) {
  var queryString = window.location.href;
  var queryStringSplit = queryString.split("/");
  var napanam_id = queryStringSplit[queryStringSplit.length - 1];
});
/******/ })()
;
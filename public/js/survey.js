/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/survey.js ***!
  \********************************/
var app = angular.module('survey', []);
app.controller('surveyCtrl', function ($scope, $http) {
  var queryString = window.location.href;
  var queryStringSplit = queryString.split("/");
  var napanam_id = queryStringSplit[queryStringSplit.length - 1];
  var prod_url = "http://napanam.launion.gov.ph";
  var local_url = "http://localhost:8000";
  var api_url = local_url;
  var survey = {
    qr_pass_id: null,
    last_name: null,
    first_name: null,
    middle_name: null,
    birthdate: null,
    gender: null,
    province: null,
    town_city: null,
    barangay: null,
    frontline_health_workers: false,
    senior_citizens: false,
    uniformed_personnel: false,
    teachers: false,
    social_workers: false,
    government_employees: false,
    agriculture_group: false,
    food_industry: false,
    tranportation: false,
    tourism: false,
    persons_deprived_of_liberty: false,
    persons_with_disability: false,
    ofw: false,
    others_population_group: false,
    lung_disease: false,
    heart_disease: false,
    kidney_disease: false,
    diabetes: false,
    high_blood_pressure: false,
    cancer: false,
    leukemia: false,
    hiv: false,
    mental_problem: false,
    others_health_condition: false,
    none_of_the_above: false,
    yes_pregnant_baby: false,
    // Pregnant?
    no_pregnant_baby: false,
    // Pregnant?
    not_sure_pregnant_baby: false,
    // Pregnant?
    yes_vaccine: false,
    // Vaccine?
    no_vaccine: false,
    // Vaccine?
    yes_contribute: false,
    // Contribute?
    no_contribute: false,
    // Contribute?
    efficacy_rate_reason: false,
    vaccine_cost_reason: false,
    side_effects_reason: false,
    lack_of_information_reason: false,
    others_reason: false,
    one_hundred_percent_fee: false,
    seventy_five_percent_fee: false,
    fifty_percent_fee: false,
    twenty_five_percent_fee: false
  };
  $scope.survey = survey;
  var populationGroup = {
    frontline_health_workers: "Frontline health workers",
    senior_citizens: "Senior citizens",
    uniformed_personnel: "Uniformed personnel (PNP, AFP, PCG, BFP, BJMP, ETC)",
    teachers: "Teachers",
    social_workers: "Social Workers",
    government_employees: "Government Employees",
    agriculture_group: "Agriculture Group",
    food_industry: "Food Industry",
    tranportation: "Transportation",
    tourism: "Tourism",
    persons_deprived_of_liberty: "Persons Deprived of Liberty",
    persons_with_disability: "Persons With Disability",
    ofw: "OFW",
    others_population_group: "Others"
  };
  $scope.populationGroup = populationGroup;
  var healthConditions = {
    lung_disease: "Lung Disease such as Asthma, pulmonary tuberculosis, etc",
    heart_disease: "Heart Disease",
    kidney_disease: "Kidney Disease",
    diabetes: "Diabetes",
    high_blood_pressure: "High Blood Pressure",
    cancer: "Cancer",
    leukemia: "Leukemia",
    hiv: "HIV",
    mental_problem: "Mental Problem/Seizure disorder",
    others_health_condition: "Others",
    none_of_the_above: "None of the above"
  };
  $scope.healthConditions = healthConditions;
  var contributions = {
    one_hundred_percent_fee: "100% of the vaccine fee",
    seventy_five_percent_fee: "75% of the vaccine fee",
    fifty_percent_fee: "50% of the vaccine fee",
    twenty_five_percent_fee: "25% of the vaccine fee"
  };
  $scope.contributions = contributions;
  var reasons = {
    efficacy_rate_reason: "Efficacy rate",
    vaccine_cost_reason: "Vaccine cost",
    side_effects_reason: "Possible side effects",
    lack_of_information_reason: "Lack of information",
    others_reason: "Others"
  };
  $scope.reasons = reasons;
  $http({
    method: 'GET',
    url: "".concat(api_url, "/api/napanam/check/registration/").concat(napanam_id)
  }).then(function mySucces(response) {
    $scope.survey.qr_pass_id = response.data.data.id;
    $scope.survey.last_name = response.data.data.lastname;
    $scope.survey.first_name = response.data.data.firstname;
    $scope.survey.middle_name = response.data.data.middlename;
    $scope.survey.birthdate = response.data.data.dob;
    $scope.survey.gender = response.data.data.gender;
    $scope.survey.province = response.data.data.province;
    $scope.survey.town_city = response.data.data.cityMun;
    $scope.survey.barangay = response.data.data.barangay;
    console.log($scope.survey);
  }, function myError(response) {});

  $scope.submit = function () {
    $http({
      method: 'POST',
      url: "".concat(api_url, "/api/survey"),
      data: $scope.survey
    }).then(function mySucces(response) {}, function myError(response) {});
  };
});
/******/ })()
;
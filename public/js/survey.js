/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/process/browser.js":
/*!*****************************************!*\
  !*** ./node_modules/process/browser.js ***!
  \*****************************************/
/***/ ((module) => {

// shim for using process in browser
var process = module.exports = {};

// cached from whatever global is present so that test runners that stub it
// don't break things.  But we need to wrap it in a try catch in case it is
// wrapped in strict mode code which doesn't define any globals.  It's inside a
// function because try/catches deoptimize in certain engines.

var cachedSetTimeout;
var cachedClearTimeout;

function defaultSetTimout() {
    throw new Error('setTimeout has not been defined');
}
function defaultClearTimeout () {
    throw new Error('clearTimeout has not been defined');
}
(function () {
    try {
        if (typeof setTimeout === 'function') {
            cachedSetTimeout = setTimeout;
        } else {
            cachedSetTimeout = defaultSetTimout;
        }
    } catch (e) {
        cachedSetTimeout = defaultSetTimout;
    }
    try {
        if (typeof clearTimeout === 'function') {
            cachedClearTimeout = clearTimeout;
        } else {
            cachedClearTimeout = defaultClearTimeout;
        }
    } catch (e) {
        cachedClearTimeout = defaultClearTimeout;
    }
} ())
function runTimeout(fun) {
    if (cachedSetTimeout === setTimeout) {
        //normal enviroments in sane situations
        return setTimeout(fun, 0);
    }
    // if setTimeout wasn't available but was latter defined
    if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
        cachedSetTimeout = setTimeout;
        return setTimeout(fun, 0);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedSetTimeout(fun, 0);
    } catch(e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
            return cachedSetTimeout.call(null, fun, 0);
        } catch(e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
            return cachedSetTimeout.call(this, fun, 0);
        }
    }


}
function runClearTimeout(marker) {
    if (cachedClearTimeout === clearTimeout) {
        //normal enviroments in sane situations
        return clearTimeout(marker);
    }
    // if clearTimeout wasn't available but was latter defined
    if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
        cachedClearTimeout = clearTimeout;
        return clearTimeout(marker);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedClearTimeout(marker);
    } catch (e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
            return cachedClearTimeout.call(null, marker);
        } catch (e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
            // Some versions of I.E. have different rules for clearTimeout vs setTimeout
            return cachedClearTimeout.call(this, marker);
        }
    }



}
var queue = [];
var draining = false;
var currentQueue;
var queueIndex = -1;

function cleanUpNextTick() {
    if (!draining || !currentQueue) {
        return;
    }
    draining = false;
    if (currentQueue.length) {
        queue = currentQueue.concat(queue);
    } else {
        queueIndex = -1;
    }
    if (queue.length) {
        drainQueue();
    }
}

function drainQueue() {
    if (draining) {
        return;
    }
    var timeout = runTimeout(cleanUpNextTick);
    draining = true;

    var len = queue.length;
    while(len) {
        currentQueue = queue;
        queue = [];
        while (++queueIndex < len) {
            if (currentQueue) {
                currentQueue[queueIndex].run();
            }
        }
        queueIndex = -1;
        len = queue.length;
    }
    currentQueue = null;
    draining = false;
    runClearTimeout(timeout);
}

process.nextTick = function (fun) {
    var args = new Array(arguments.length - 1);
    if (arguments.length > 1) {
        for (var i = 1; i < arguments.length; i++) {
            args[i - 1] = arguments[i];
        }
    }
    queue.push(new Item(fun, args));
    if (queue.length === 1 && !draining) {
        runTimeout(drainQueue);
    }
};

// v8 likes predictible objects
function Item(fun, array) {
    this.fun = fun;
    this.array = array;
}
Item.prototype.run = function () {
    this.fun.apply(null, this.array);
};
process.title = 'browser';
process.browser = true;
process.env = {};
process.argv = [];
process.version = ''; // empty string to avoid regexp issues
process.versions = {};

function noop() {}

process.on = noop;
process.addListener = noop;
process.once = noop;
process.off = noop;
process.removeListener = noop;
process.removeAllListeners = noop;
process.emit = noop;
process.prependListener = noop;
process.prependOnceListener = noop;

process.listeners = function (name) { return [] }

process.binding = function (name) {
    throw new Error('process.binding is not supported');
};

process.cwd = function () { return '/' };
process.chdir = function (dir) {
    throw new Error('process.chdir is not supported');
};
process.umask = function() { return 0; };


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
(() => {
/*!********************************!*\
  !*** ./resources/js/survey.js ***!
  \********************************/
/* provided dependency */ var process = __webpack_require__(/*! process/browser */ "./node_modules/process/browser.js");
var app = angular.module('survey', []);
app.controller('surveyCtrl', function ($scope, $http) {
  console.log(process.env);
  var queryString = window.location.href;
  var queryStringSplit = queryString.split("/");
  var napanam_id = queryStringSplit[queryStringSplit.length - 1];
  var prod_url = "https://napanam.launion.gov.ph/lucovacs";
  var local_url = "http://localhost:8000";
  var api_url = prod_url;
  var survey = {
    qr_pass_id: "",
    last_name: "",
    first_name: "",
    middle_name: "",
    birthdate: "",
    gender: "",
    province: "",
    town_city: "",
    barangay: "",
    population_group: "",
    // frontline_health_workers | senior_citizens | population_group_other
    population_group_other: "",
    // if population_group_other is selected this will be the value
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
    health_condition_other: "",
    // if others_health_condition is checked this will be the value
    none_of_the_above: false,
    pregnancy: "",
    // yes_pregnant_baby | no_pregnant_baby | not_sure_pregnant_baby
    vaccine: "",
    // yes_vaccine | no_vaccine
    reason: "",
    // if no_vaccine this will be efficacy_rate_reason | vaccine_cost_reason | ... | others_reason
    reason_other: "",
    // if others_reason is selected this will be the value
    contribute: "",
    // yes_contribute | no_contribute
    contribution: "" // 	one_hundred_percent_fee | ...

  };
  $scope.survey = survey; // Population Group

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
  var populationGroupValues = {
    frontline_health_workers: 'frontline_health_workers',
    senior_citizens: 'senior_citizens',
    uniformed_personnel: 'uniformed_personnel',
    teachers: 'teachers',
    social_workers: 'social_workers',
    government_employees: 'government_employees',
    agriculture_group: 'agriculture_group',
    food_industry: 'food_industry',
    tranportation: 'tranportation',
    tourism: 'tourism',
    persons_deprived_of_liberty: 'persons_deprived_of_liberty',
    persons_with_disability: 'persons_with_disability',
    ofw: 'ofw',
    others_population_group: 'others_population_group',
    lung_disease: 'lung_disease',
    heart_disease: 'heart_disease',
    kidney_disease: 'kidney_disease',
    diabetes: 'diabetes',
    high_blood_pressure: 'high_blood_pressure',
    cancer: 'cancer',
    leukemia: 'leukemia',
    hiv: 'hiv',
    mental_problem: 'mental_problem',
    others_health_condition: 'others_health_condition'
  };
  $scope.populationGroupValues = populationGroupValues; // Health Conditions

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
  $scope.healthConditions = healthConditions; // Pregnancy

  var pregnancyValues = {
    yes_pregnant_baby: 'yes_pregnant_baby',
    no_pregnant_baby: 'no_pregnant_baby',
    not_sure_pregnant_baby: 'not_sure_pregnant_baby'
  };
  $scope.pregnancyValues = pregnancyValues; // Vaccine

  var vaccineValues = {
    yes_vaccine: 'yes_vaccine',
    no_vaccine: 'no_vaccine'
  };
  $scope.vaccineValues = vaccineValues; // Contribute

  var contributeValues = {
    yes_contribute: 'yes_contribute',
    no_contribute: 'no_contribute'
  };
  $scope.contributeValues = contributeValues; // Reason

  var reason = {
    efficacy_rate_reason: "Efficacy rate",
    vaccine_cost_reason: "Vaccine cost",
    side_effects_reason: "Possible side effects",
    lack_of_information_reason: "Lack of information",
    others_reason: "Others"
  };
  $scope.reason = reason;
  var reasonValues = {
    efficacy_rate_reason: 'efficacy_rate_reason',
    vaccine_cost_reason: 'vaccine_cost_reason',
    side_effects_reason: 'side_effects_reason',
    lack_of_information_reason: 'lack_of_information_reason',
    others_reason: 'others_reason'
  };
  $scope.reasonValues = reasonValues; // Contributions

  var contribution = {
    one_hundred_percent_fee: "100% of the vaccine fee",
    seventy_five_percent_fee: "75% of the vaccine fee",
    fifty_percent_fee: "50% of the vaccine fee",
    twenty_five_percent_fee: "25% of the vaccine fee",
    none_fee: "None"
  };
  $scope.contribution = contribution;
  var contributionValues = {
    one_hundred_percent_fee: 'one_hundred_percent_fee',
    seventy_five_percent_fee: 'seventy_five_percent_fee',
    fifty_percent_fee: 'fifty_percent_fee',
    twenty_five_percent_fee: 'twenty_five_percent_fee',
    none_fee: 'none_fee'
  };
  $scope.contributionValues = contributionValues;
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
  }, function myError(response) {});

  $scope.submit = function () {
    var survey = $scope.survey; // Validation required field

    if (survey.population_group == "" || survey.pregnancy == "" || survey.vaccine == "") {
      //Sweetalert2
      Swal.fire({
        title: '<p class="text-danger">NOTICE!</p>',
        icon: 'warning',
        html: "Please complete required fields",
        showCancelButton: false,
        focusConfirm: false,
        showCloseButton: true,
        focusCloseButton: true,
        confirmButtonText: 'Close'
      }).then(function (result) {
        if (result.value) {// Close
        }
      });
      return;
    }

    $http({
      method: 'POST',
      url: "".concat(api_url, "/api/survey"),
      data: $scope.survey
    }).then(function mySucces(response) {
      Swal.fire({
        title: '<p class="text-success" style="font-size: 25px;">YOUR RESPONSE HAS BEEN SUBMITTED!</p>',
        icon: 'success',
        html: '<b>Thank you for your commitment in stopping the spread of Covid-19!!!! </b><br><br>' + '<b style="font-size: 15px;">For inquiries, please contact us at: </b> <br>' + '<b class="text-danger" style="font-size: 15px;">Tel. No. 607-2633 loc. 299</b>',
        showCancelButton: false,
        showCloseButton: true,
        focusCloseButton: true,
        focusConfirm: false,
        confirmButtonText: 'View Summary Report',
        cancelButtonText: 'Close'
      }).then(function (result) {
        if (result.value) {// Close (TBD)
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          window.location = api_url;
        }
      });
    }, function myError(response) {});
  };
});
})();

/******/ })()
;
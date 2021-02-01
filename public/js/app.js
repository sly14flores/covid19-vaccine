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
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/* provided dependency */ var process = __webpack_require__(/*! process/browser */ "./node_modules/process/browser.js");
var app = angular.module('app', []);
app.controller('appCtrl', function ($scope, $http) {
  var prod_url = "https://napanam.launion.gov.ph/lucovacs";
  var local_url = "http://vaccines.local";
  var ENV = process.env.MIX_ENV;
  var api_url = ENV === 'local' ? local_url : prod_url;
  $scope.napanam_id = null;
  $scope.birthdate = null;

  $scope.privacyNotice = function () {
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
      allowEnterKey: false
    });
  };

  $scope.napanam = function () {
    //Sweetalert2
    Swal.fire({
      title: '<p style="color: #ffab5d">Here we go!</p>',
      text: "You are about to be redirected to the NAPANAM Registration page.",
      icon: 'info',
      iconColor: '#ffab5d',
      showCancelButton: true,
      confirmButtonColor: '#68bca4',
      cancelButtonColor: '#ffab5d',
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
          title: '<p style="color: #ffab5d">NOTICE!</p>',
          icon: 'info',
          iconColor: '#ffab5d',
          html: "The Napanam ID and Birthdate you entered did not match. Please try again.",
          showCancelButton: false,
          focusConfirm: true,
          confirmButtonColor: '#68bca4',
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
          icon: 'error',
          html: "Are you sure that you're registered to the NAPANAM? ",
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonColor: '#68bca4',
          cancelButtonColor: '#ffab5d',
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
})();

/******/ })()
;
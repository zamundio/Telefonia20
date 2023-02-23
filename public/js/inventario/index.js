/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 18);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/inventario/index.js":
/*!*************************************************!*\
  !*** ./resources/assets/js/inventario/index.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  var user = "{{ Auth::user()->hasRole('administrator') }}";
  $table = new $(".yajra-datatable-inventario").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },
    ajax: {
      url: "InventarioDatatable",
      type: "get"
    },
    serverSide: false,
    processing: false,
    success: function success(result) {
      if (result.errors) {
        $.each(result.errors, function (key, value) {
          console.log(" errores") + value;
        });
      } else {
        console.log("sin errores");
      }
    },
    error: function error(data) {
      // Something went wrong
      // HERE you can handle asynchronously the response
      // Log in the console
      var errors = data.responseJSON;
      console.log(errors);
    },
    pageLength: 15,
    buttons: [],
    columnDefs: [{
      width: "1%",
      targets: [0]
    }, {
      width: "4%",
      targets: [1]
    }, {
      width: "1%",
      targets: [2]
    }, {
      width: "3%",
      targets: [3]
    }, {
      width: "1%",
      targets: [4]
    }, {
      width: "1%",
      targets: [5]
    }, {
      width: "6%",
      targets: [6]
    }, {
      className: "dt-center",
      width: "1%",
      targets: [7]
    }, {
      className: "dt-center",
      width: "1%",
      targets: [8]
    }, {
      "width": "1%",
      "targets": [9]
    }, {
      "width": "1%",
      "targets": [10]
    }],
    columns: [{
      data: "EMP_CODE",
      name: "EMP_CODE"
    }, {
      data: "LAST_NAME",
      name: "LAST_NAME"
    }, {
      data: "FIRST_NAME",
      name: "FIRST_NAME"
    }, {
      data: "COST_CENTER_DESC",
      name: "COST_CENTER_DESC"
    }, {
      data: "HIRE_DATE",
      name: "HIRE_DATE"
    }, {
      data: "ACTUAL_LEAVE_DATE",
      name: "ACTUAL_LEAVE_DATE"
    }, {
      data: "POSITION_TITLE",
      name: "POSITION_TITLE"
    }, {
      data: "num_movil",
      name: "NUM_MOVIL"
    }, {
      data: "terminal",
      name: "TERMINAL"
    }, {
      data: "Actual",
      name: "actual",
      render: function render(d) {
        if (d == 1) {
          return '<span class="badge badge-primary  center-block">SI</span>';
        } else {
          return '<span class="badge badge-danger  center-block">NO</span>';
        }
      }
    }, {
      data: 'action',
      name: 'action'
    }]
  });
});

/***/ }),

/***/ 18:
/*!*******************************************************!*\
  !*** multi ./resources/assets/js/inventario/index.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/vagrant/code/telefonia20/resources/assets/js/inventario/index.js */"./resources/assets/js/inventario/index.js");


/***/ })

/******/ });
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
/******/ 	return __webpack_require__(__webpack_require__.s = 20);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/cambios/index.js":
/*!**********************************************!*\
  !*** ./resources/assets/js/cambios/index.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $(document).popover({
    selector: '[data-toggle=hover]',
    html: true,
    trigger: 'hover'
  });
  var user = "{{ Auth::user()->hasRole('administrator') }}";
  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    language: 'es',
    todayBtn: true,
    todayHighlight: true,
    toggleActive: true,
    weekStart: 1
  });
  var table = $("#cambiosterminales").DataTable({
    /*   drawCallback: function () {
          $('#persona_estado_cambios').select2({
                      // Activamos la opcion "Tags" del plugin
                      width: '200px',
                      ajax: {
                          dataType: 'json',
                          url: '{{ url("GetSelectPersonal") }}',
                          delay: 250,
                          error: function (xhr, textStatus, errorThrown) {
                              console.log('Error en la petición AJAX:', textStatus, errorThrown);
                          },
                          success: function (data) {
                              console.log('La petición AJAX se completó correctamente');
                              // Código para actualizar otro elemento en la página
                          },
                          processResults: function (data) {
                               return {
                                  results: $.map(data, function (item) {
                                       return {
                                          text: item.text,
                                          id: item.id
                                      }
                                  })
                              };
                          },
                          cache: true
                        }
      })}, */
    language: {
      url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },
    ajax: {
      url: "CambioTerminalesDatatable",
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
    columnDefs: [
    /* {
    width: "1%",
    orderable: false,
    className: 'select-checkbox',
    targets: [0]
    }, */
    {
      className: "dt-center",
      width: "1%",
      targets: [1]
    }, {
      width: "1%",
      targets: [2]
    }, {
      width: "6%",
      targets: [3]
    }, {
      width: "1%",
      targets: [4]
    }, {
      width: "5%",
      targets: [5]
    }, {
      width: "5%",
      targets: [6]
    }, {
      width: "5%",
      targets: [7]
    }],
    select: {
      style: 'multi+shift',
      selector: 'td:first-child'
    },
    columns: [
    /* {
    data: 'checkbox',
    name: 'checkbox'
    }, */
    {
      data: "emp_code",
      name: "emp_code"
    }, {
      data: "motivo",
      name: "motivo"
    }, {
      data: "retorno_old",
      name: "retorno_old"
    }, {
      data: "form_out",
      name: "form_out"
    }, {
      data: "form_ok",
      name: "form_ok"
    }, {
      data: "fecha_peticion",
      name: "fecha_peticion"
    }, {
      data: "fecha_entrega",
      name: "fecha_entrega"
    }, {
      data: 'Observaciones',
      name: 'Observaciones'
    }]
  });
  $('.select2').select2({
    // Activamos la opcion "Tags" del plugin
    width: 'resolve',
    ajax: {
      dataType: 'json',
      url: 'GetEstadosTerminales',
      delay: 250,
      processResults: function processResults(data) {
        return {
          results: $.map(data, function (item) {
            return {
              text: item.Estado,
              id: item.Id
            };
          })
        };
      },
      cache: true // processResults: function (data, page) {
      // return {
      // results: data
      // };
      // },

    }
  });
});

/***/ }),

/***/ 20:
/*!****************************************************!*\
  !*** multi ./resources/assets/js/cambios/index.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/vagrant/code/telefonia20/resources/assets/js/cambios/index.js */"./resources/assets/js/cambios/index.js");


/***/ })

/******/ });
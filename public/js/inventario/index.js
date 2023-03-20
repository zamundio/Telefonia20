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
/******/ 	return __webpack_require__(__webpack_require__.s = 19);
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
  $(document).popover({
    selector: '[data-toggle=hover]',
    html: true,
    trigger: 'hover'
  });
  $('#SelectCC').multiselect({
    maxHeight: 300,
    includeSelectAllOption: true,
    selectAllText: 'Todos',
    enableFiltering: true,
    enableCaseInsensitiveFiltering: true,
    buttonWidth: '300px',
    dropUp: false,
    nSelectedText: 'seleccionados',
    nonSelectedText: 'Seleccione CC..'
  });
  $('#SelectModelo').multiselect({
    maxHeight: 300,
    includeSelectAllOption: true,
    selectAllText: 'Todos',
    enableFiltering: true,
    enableCaseInsensitiveFiltering: true,
    buttonWidth: '400px',
    dropUp: false,
    nSelectedText: 'seleccionados',
    nonSelectedText: 'Seleccione Modelo..'
  });
  $("#inventario_filter.dataTables_filter").append($("#SelectCC"));
  $("#inventario_filter.dataTables_filter").append($("#SelectModelo"));
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
  var table = $("#inventario").DataTable({
    "rowCallback": function rowCallback(row, data) {
      if (data.ACTUAL_LEAVE_DATE != null) {
        $(row).addClass('bg-baja');
      }
    },
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
    columnDefs: [{
      width: "1%",
      orderable: false,
      className: 'select-checkbox',
      targets: [0]
    }, {
      width: "1%",
      targets: [1]
    }, {
      className: "dt-center",
      width: "1%",
      targets: [2]
    }, {
      width: "1%",
      targets: [3]
    }, {
      width: "6%",
      targets: [4]
    }, {
      width: "1%",
      targets: [5]
    }, {
      width: "5%",
      targets: [6]
    }, {
      width: "1%",
      targets: [7]
    }, {
      width: "1%",
      targets: [8]
    }, {
      width: "8%",
      targets: [9]
    }, {
      className: "dt-center",
      width: "1%",
      targets: [10]
    }, {
      className: "dt-center",
      width: "1%",
      targets: [11]
    }, {
      className: "dt-center",
      width: "5%",
      targets: [12]
    }, {
      className: "dt-center",
      width: "5%",
      targets: [13]
    }, {
      "width": "1%",
      "targets": [14],
      className: "dt-center"
    }, {
      "width": "1%",
      "targets": [15],
      className: "dt-center"
    }],
    select: {
      style: 'multi+shift',
      selector: 'td:first-child'
    },
    columns: [{
      data: 'checkbox',
      name: 'checkbox'
    }, {
      "data": 'Observaciones',
      "render": function render(data, type, full, meta) {
        if (data != '' && data != null) {
          return "<a class='btn btn-primary btn-circle' data-toggle='hover'  title='" + 'Observaciones' + "' data-content='" + data + "'><i class='fas fa-info'></i></a>";
        } else {
          return "";
        }
      }
    }, {
      data: "Activo",
      name: "Activo"
    }, {
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
      data: "Abreviado",
      name: "Abreviado"
    }, {
      data: "terminal_movil_id",
      name: "terminal_movil_id",
      visible: false
    }, {
      data: "terminal",
      name: "TERMINAL"
    }, {
      data: "Actual",
      name: "actual",
      render: function render(d) {
        if (d == 1) {
          return '<span class="badge badge-success  center-block">SI</span>';
        } else if (d == null) {
          return '<span class="badge badge-secondary center-block">---</span>';
        } else {
          return '<span class="badge badge-danger  center-block">NO</span>';
        }
      }
    }, {
      data: 'action',
      name: 'action'
    }]
  });
  $(".selectAll").on("click", function (e) {
    if ($(this).is(":checked")) {
      table.rows().select();
    } else {
      table.rows().deselect();
    }
  });
  $("#SelectCC").on('change', function () {
    var groupNameFilterApplied = [];
    $('#SelectCC :selected').each(function () {
      groupNameFilterApplied.push($(this).text());
      console.log($(this).text());
    });
    $('#inventario').DataTable().column(5).search(groupNameFilterApplied.join('|'), true, false, true).draw();
  });
  $("#SelectModelo").on('change', function () {
    var groupNameFilterApplied = [];
    $('#SelectModelo :selected').each(function () {
      groupNameFilterApplied.push($(this).text());
      console.log($(this).text());
    });
    $('#inventario').DataTable().column(11).search(groupNameFilterApplied.join('|'), true, false, true).draw();
  });
});

/***/ }),

/***/ 19:
/*!*******************************************************!*\
  !*** multi ./resources/assets/js/inventario/index.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/vagrant/code/telefonia20/resources/assets/js/inventario/index.js */"./resources/assets/js/inventario/index.js");


/***/ })

/******/ });
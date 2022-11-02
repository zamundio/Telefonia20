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
/******/ 	return __webpack_require__(__webpack_require__.s = 15);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/home/index.js":
/*!*******************************************!*\
  !*** ./resources/assets/js/home/index.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var lat = 41.4469883;
  var _long = 2.2450325;
  weather(lat, _long);

  function weather(lat, _long2) {
    var URL = "https://fcc-weather-api.glitch.me/api/current?lat=".concat(lat, "&lon=").concat(_long2);
    $.getJSON(URL, function (data) {
      display(data);
    });
  }

  function display(data) {
    var city = data.name.toUpperCase();
    var temp = Math.round(data.main.temp_max) + "&deg; C | " + Math.round(Math.round(data.main.temp_max) * 1.8 + 32) + "&deg; F";
    var desc = data.weather[0].description;
    var date = new Date();
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var weekday = new Array(7);
    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";
    var font_color;
    var bg_color;

    if (Math.round(data.main.temp_max) > 25) {
      font_color = "#d36326";
      bg_color = "#f3f5d2";
    } else {
      font_color = "#44c3de";
      bg_color = "#eff3f9";
    }

    if (data.weather[0].main == "Sunny" || data.weather[0].main == "sunny") {
      $(".weathercon").html("<i class='fas fa-sun' style='color: #d36326;'></i>");
    } else {
      $(".weathercon").html("<i class='fas fa-cloud' style='color: #44c3de;'></i>");
    }

    var minutes = date.getMinutes() < 11 ? "0" + date.getMinutes() : date.getMinutes();
    var date = weekday[date.getDay()].toUpperCase() + " | " + months[date.getMonth()].toUpperCase().substring(0, 3) + " " + date.getDate() + " | " + date.getHours() + ":" + minutes;
    $(".location").html(city);
    $(".temp").html(temp);
    $(".date").html(date);
    $(".box").css("background", bg_color);
    $(".location").css("color", font_color);
    $(".temp").css("color", font_color);
  }

  $table = new $('.datatable-logultmovimientos').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },
    "ajax": {
      "url": 'ajaxloglastmov',
      "type": "get"
    },
    "serverSide": false,
    "processing": false,
    success: function success(result) {
      if (result.errors) {
        $.each(result.errors, function (key, value) {
          console.log(' errores') + value;
        });
      } else {
        console.log('sin errores');
      }
    },
    error: function error(data) {
      // Something went wrong
      // HERE you can handle asynchronously the response
      // Log in the console
      var errors = data.responseJSON;
      console.log(errors);
    },
    "pageLength": 15,
    columnDefs: [{
      width: 110,
      targets: 0,

      /*   render: function (value) {
            if (value === null) return "";
               return moment(value).format('DD-MM-YYYY hh:mm');
        } */
      render: function render(value) {
        return moment(value).format('DD-MM-YYYY hh:mm');
      }
    }, {
      className: "hide_me",
      targets: 1
    }, {
      width: 20,
      targets: 2
    }, {
      width: 30,
      targets: 3
    }, {
      width: 30,
      targets: 4
    }, {
      width: 30,
      targets: 5
    }, {
      width: 30,
      targets: 6
    }],
    columns: [{
      data: 'Fecha',
      name: 'Fecha'
    }, {
      data: 'Fecha',
      name: 'FechaHidden'
    }, {
      data: 'NS',
      name: 'NS'
    }, {
      data: 'Estado_Anterior',
      name: 'Estado_Anterior'
    }, {
      data: 'Estado_Actual',
      name: 'Estado_Actual'
    }, {
      data: 'DelegadoOld',
      name: 'DelegadoOld'
    }, {
      data: 'DelegadoNew',
      name: 'DelegadoNew'
    }]
  });
  $table.column(1).visible(false);
});

function ManageItemlist(it, metodo) {
  var fecha = Object.values(it)[3];
  var titulo = it.title;
  var descripcion = it.description;
  var userid = userlogged;
  var urlmetodo = null;
  var tipo = null;

  switch (metodo) {
    case "update":
      urlmetodo = itemlistupdate_url + "/" + it.id;
      tipo = "POST";
      break;

    case "add":
      urlmetodo = itemlistadd_url;
      tipo = "GET";
      break;

    case "delete":
      urlmetodo = itemlistdelete_url + "/" + it.id;
      tipo = "get";
      break;
  }

  $.ajax({
    type: tipo,
    url: urlmetodo,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      "userid": userid,
      "fecha": fecha,
      "descripcion": descripcion,
      "titulo": titulo
    },
    error: function error(data, _error) {// console.log(" Can't do because: " + data + error);
    },
    success: function success(data) {// console.log("Control:", data);
    }
  });
}

;
$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  $.ajax({
    type: "get",
    url: "",
    contentType: false,
    processData: false,
    error: function error(data, _error2) {
      console.log(data); // alert(" Can't do because: " + data);
    },
    success: function success(data) {
      console.log("Control:", data);
      Object.assign(data, {
        afterItemUpdate: function afterItemUpdate(list, object) {
          ManageItemlist(object, "update");
        }
      });
      Object.assign(data, {
        afterItemAdd: function afterItemAdd(list, object) {
          ManageItemlist(object, "add");
        }
      });
      Object.assign(data, {
        afterItemDelete: function afterItemDelete(list, object) {
          ManageItemlist(object, "delete");
        }
      });
      $('#todo-lists-basic-demo').lobiList(data);
      var $lobilist = $('#todo-lists-basic-demo').data('lobiList'); //$lobilist.$lists

      var $dueDateInput = $lobilist.$el.find('form [name=dueDate]');
      $dueDateInput[0]['autocomplete'] = "off";
      $dueDateInput.datepicker({
        format: "dd/mm/yyyy",
        language: "es"
      });
    }
  });
});

/***/ }),

/***/ 15:
/*!*************************************************!*\
  !*** multi ./resources/assets/js/home/index.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/vagrant/code/telefonia20/resources/assets/js/home/index.js */"./resources/assets/js/home/index.js");


/***/ })

/******/ });
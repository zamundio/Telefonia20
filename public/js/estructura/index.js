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
/******/ 	return __webpack_require__(__webpack_require__.s = 14);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/estructura/index.js":
/*!*************************************************!*\
  !*** ./resources/assets/js/estructura/index.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    language: 'es',
    todayBtn: true,
    todayHighlight: true,
    toggleActive: true,
    weekStart: 1
  });
  window.Parsley.addValidator('dni', {
    validateString: function validateString(value) {
      var numero, letr, letra;
      var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;
      dni = value.toUpperCase();

      if (expresion_regular_dni.test(dni) === true) {
        numero = dni.substr(0, dni.length - 1);
        numero = numero.replace('X', 0);
        numero = numero.replace('Y', 1);
        numero = numero.replace('Z', 2);
        letr = dni.substr(dni.length - 1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero + 1);

        if (letra != letr) {
          //alert('Dni erroneo, la letra del NIF no se corresponde');
          return false;
        } else {
          //alert('Dni correcto');
          return true;
        }
      } else {
        //alert('Dni erroneo, formato no válido');
        return false;
      }
    },
    messages: {
      es: 'DNI o NIE incorrecto'
    }
  });
  window.Parsley.addValidator('cc', {
    validateString: function validateString(value) {
      return $.ajax({
        "url": 'checkcc',
        "type": "get",
        "data": {
          "emp_cost_center": value
        },
        async: false,
        success: function success(response) {
          1;

          if (response.valid === true) {
            return true;
          } else {
            return false;
          }
        }
      });
    },
    messages: {
      es: 'El CC ya existe'
    }
  });
  window.Parsley.addValidator('pextra', {
    validateString: function validateString(value) {
      return $.ajax({
        "url": 'checkpe',
        "type": "get",
        "data": {
          "emp_code": value
        },
        async: false,
        success: function success(response) {
          1;

          if (response.valid === true) {
            return true;
          } else {
            return false;
          }
        }
      });
    },
    messages: {
      es: 'El codigo ya existe'
    }
  });
  document.getElementById('añadir').disabled = false;
  /** Carga del Datatable **/

  var table = $('#CentrosdeCoste').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },
    ajax: "CentrosdeCoste",
    "pageLength": 15,
    retrieve: true,
    paging: true,
    searching: true,
    bAutoWidth: false,
    fixedColumns: true,
    buttons: [],
    columnDefs: [{
      "width": "5px",
      "targets": [0]
    }, {
      "width": "50%",
      "targets": [1]
    }, {
      "width": "50%",
      "targets": [1]
    }],
    columns: [{
      data: 'EMP_COST_CENTER',
      name: 'EMP_COST_CENTER'
    }, {
      data: 'COST_CENTER_DESC',
      name: 'COST_CENTER_DESC'
    }, {
      data: 'action',
      name: 'action'
    }],
    "initComplete": function initComplete(settings, json) {
      $(".container").css("display", "block");
      table.columns.adjust();
      table.draw();
    }
  });
  var $cod = null;
  /** Plugin para la busqueda en el arbol **/

  $('#tree-container').jstree({
    plugins: ['search', 'changed', 'state'],
    'state': {
      'key': 'id',
      'events': 'activate_node.jstree',
      'opened': true
    },
    search: {
      "case_insensitive": true,
      "show_only_matches": true
    },
    'core': {
      'data': {
        type: "get",
        url: load_urlTree,
        contentType: "json",
        success: function success(data) {
          data.d;
          $(data).each(function () {
            return {
              "id": this.id
            };
          });
        }
      }
    }
  });
  $("#tree-container").jstree('open_all');
});
$('#AñadirpersonalCC').on('reset', function (e) {
  $("#selectDel").val('default').selectpicker("refresh");
  $('#AñadirpersonalCC_form').parsley().reset();
  $('#submit').attr('disabled', false);
  $('#submit').val('Enviar');
});
$('#AñadirpersonalCC').on('hidden.bs.modal', function (e) {
  // $(this)
  //     .find("input type='text'")
  //     .val('')
  //     .end()
  $("#selectDel").val('default').selectpicker("refresh");
}); // ! ||--------------------------------------------------------------------------------||
// ! ||                             // Funciones del Jstree                            ||
// ! ||--------------------------------------------------------------------------------||

var to = false; //funcion que busca en el arbol al introducir un caracter(es) en el textbox

$('#busqueda_tree').keyup(function () {
  $("#tree-container").jstree('close_all');

  if (event.keyCode == 13) {
    event.preventDefault();
  } else {
    if (to) {
      clearTimeout(to);
    }

    to = setTimeout(function () {
      var v = $('#busqueda_tree').val();
      $('#tree-container').jstree(true).search(v);
    }, 250);
  }
});
$('busqueda_tree').keypress(function (event) {
  if (event.keyCode == 13) {
    event.preventDefault();
  }
});
var isTreeOpen = true;
$("#shollallnodes").on("click", function () {
  if (isTreeOpen) {
    $("#tree-container").jstree('close_all');
    document.getElementById('shollallnodes').innerHTML = "Abrir";
  } else {
    $("#tree-container").jstree('open_all');
    document.getElementById('shollallnodes').innerHTML = "Cerrar";
  }

  isTreeOpen = !isTreeOpen;
});
$("#formdatos").toggle(true);
$('#tree-container').slimScroll({
  height: '800px'
});
$('#refrescar').on('click', function (event) {
  event.preventDefault(); // To prevent following the link (optional)

  $("#tree-container").jstree('refresh');
});
$('#tree-container').on('ready.jstree', function () {
  $("#tree-container").jstree('open_all');
});
$("#tree-container").on("click.jstree", function (e, data) {
  event.preventDefault();
  $CurrentNode = $("#tree-container").jstree("get_selected");
  /**recupera la informacion de la ficha del delegado **/

  $cod = $CurrentNode[0];
  $.ajax({
    url: "ajaxGetNodeInfoStructTree",
    type: "GET",
    dataType: "json",
    data: {
      "id": $cod
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function success(data) {
      $('#content2').html(data).fadeIn();
    },
    error: function error(xhr, status, _error) {
      var err = eval("(" + xhr.responseText + ")");
      $('#content2').html(data).fadeOut();
    }
  });
}); // ! ||--------------------------------------------------------------------------------||
// ! ||                              Fin Funciones JStree                              ||
// ! ||--------------------------------------------------------------------------------||

$('#añadir').on('click', function () {
  document.getElementById('añadir').disabled = true;
  $("#CentrosdeCoste").append('<tr><td><input type="text" name="EMP_CODE" id="cc_codigo" autocomplete="off" class="form-control" data-parsley-pattern="[0-9]{4}" data-parsley-pattern-message="El CC son 4 digitos" required data-parsley-type="digits" data-parsley-trigger="change" data-parsley-cc=""/></td><td><input type="text" id="cc_desc" autocomplete="off" name="COST_CENTER_DESC" data-parsley-trigger="change" data-parsley-pattern="^[a-zA-Z ]+$" class="form-control"/></td><td><input type="submit" id="submit_crea_cc" class="btn btn-default btn btn-default validate" addProduct"></button></td></tr>');
  $("añadir").attr("disabled", true).delay(2000).attr("disabled", false);
});
$("#CrearCC").on("hide.bs.modal", function () {
  document.getElementById('añadir').disabled = false;
});
$('#AñadirpersonalCC_form').on('submit', function (e) {
  if ($('#AñadirpersonalCC_form').parsley().isValid()) {
    $emp_code = document.getElementById("EMP_CODE").value; // $hire_date = moment(document.getElementById("HIRE_DATE").value).format('YYYYMMDD');

    e.preventDefault(); // console.log(HIRE_DATE);

    var datastring = $("#AñadirpersonalCC_form").serialize();
    $.ajax({
      url: "submit_form_añadirpersonal",
      type: "POST",
      data: datastring,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function beforeSend() {
        $('#submit').attr('disabled', 'disabled');
        $('#submit').val('Enviando...');
      },
      success: function success(data) {
        // $('#CrearCC')[0].reset();
        $('#AñadirpersonalCC_form').parsley().reset();
        $('#submit').attr('disabled', false);
        $('#submit').val('Enviar');

        if ($.isEmptyObject(data.error)) {
          // $('#CrearCC')[0].reset();
          $('#tree-container').jstree("destroy");
          $('#tree-container').jstree({
            plugins: ['search', 'changed', 'state'],
            'state': {
              'key': 'id',
              'events': 'activate_node.jstree',
              'opened': true
            },
            search: {
              "case_insensitive": true,
              "show_only_matches": true
            },
            'core': {
              'data': {
                type: "get",
                url: load_urlTree,
                contentType: "json",
                success: function success(data) {
                  data.d;
                  $(data).each(function () {
                    return {
                      "id": this.id
                    };
                  });
                }
              }
            }
          }).bind("loaded.jstree", function (event, data) {
            $(this).jstree("open_all");
          });
          ; // $('.jstree').jstree(true).select_node($emp_code);

          $('#AñadirpersonalCC_form').parsley().reset();
          $('#AñadirpersonalCC').modal('hide');
          Helper.notificaciones('Personal Agregado con Exito', 'Telefonia', 'success');
        } else {
          printErrorMsg(data.error);
        }
      },
      error: function error(data) {
        /*  $('#nameErrorMsg').text(response.responseJSON.errors.name);
         $('#emailErrorMsg').text(response.responseJSON.errors.email);
         $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
         $('#messageErrorMsg').text(response.responseJSON.errors.message); */
      }
    });
  }
});
$('#CrearCC_form').submit(function (event) {
  event.preventDefault();
  $desc = $('#cc_desc').val();
  $codigo = $('#cc_codigo').val();

  if ($('#CrearCC_form').parsley().isValid()) {
    $cc_codigo = document.getElementById("cc_codigo").value;
    $cc_desc = document.getElementById("cc_desc").value;
    $.ajax({
      url: 'guardarcc',
      type: 'POST',
      data: {
        EMP_CODE: 'CC_' + $cc_codigo,
        EMP_COST_CENTER: $cc_codigo,
        COST_CENTER_DESC: $cc_desc
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function beforeSend() {
        $('#submit_crea_cc').attr('disabled', 'disabled');
        $('#submit_crea_cc').val('Enviando...');
      },
      success: function success(data) {
        // $('#CrearCC')[0].reset();
        $('#CrearCC').parsley().reset();
        $('#submit_crea_cc').attr('disabled', false);
        $('#submit_crea_cc').val('Enviar');

        if ($.isEmptyObject(data.error)) {
          // $('#CrearCC')[0].reset();
          $('#tree-container').jstree("destroy");
          $('#tree-container').jstree({
            plugins: ['search', 'changed', 'state'],
            'state': {
              'key': 'id',
              'events': 'activate_node.jstree',
              'opened': true
            },
            search: {
              "case_insensitive": true,
              "show_only_matches": true
            },
            'core': {
              'data': {
                type: "get",
                url: load_urlTree,
                contentType: "json",
                success: function success(data) {
                  data.d;
                  $(data).each(function () {
                    return {
                      "id": this.id
                    };
                  });
                }
              }
            }
          }).bind("loaded.jstree", function (event, data) {
            $(this).jstree("open_all");
          });
          ;
          $('.jstree').jstree(true).select_node(cc_codigo);
          $('#CrearCC').parsley().reset();
          $('#CrearCC').modal('hide');
          Helper.notificaciones('Cenro de Coste Agregado con Exito', 'Telefonia', 'success');
        } else {
          printErrorMsg(data.error);
        }
      }
    });
  } else {
    console.log('mal');
  }
});

/***/ }),

/***/ 14:
/*!*******************************************************!*\
  !*** multi ./resources/assets/js/estructura/index.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/vagrant/code/telefonia20/resources/assets/js/estructura/index.js */"./resources/assets/js/estructura/index.js");


/***/ })

/******/ });
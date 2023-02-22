$(document).ready(function () {
  var lat = 41.4469883;
  var long = 2.2450325;
  weather(lat, long);

  function weather(lat, long) {
    var URL = `https://fcc-weather-api.glitch.me/api/current?lat=${lat}&lon=${long}`;
    $.getJSON(URL, function (data) {
      display(data);
    });
  }

  function display(data) {
    var city = data.name.toUpperCase();
    var temp =
      Math.round(data.main.temp_max) +
      "&deg; C | " +
      Math.round(Math.round(data.main.temp_max) * 1.8 + 32) +
      "&deg; F";
    var desc = data.weather[0].description;
    var date = new Date();

    var months = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];

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
      $(".weathercon").html(
        "<i class='fas fa-sun' style='color: #d36326;'></i>"
      );
    } else {
      $(".weathercon").html(
        "<i class='fas fa-cloud' style='color: #44c3de;'></i>"
      );
    }

    var minutes =
      date.getMinutes() < 11 ? "0" + date.getMinutes() : date.getMinutes();
    var date =
      weekday[date.getDay()].toUpperCase() +
      " | " +
      months[date.getMonth()].toUpperCase().substring(0, 3) +
      " " +
      date.getDate() +
      " | " +
      date.getHours() +
      ":" +
      minutes;
    $(".location").html(city);
    $(".temp").html(temp);
    $(".date").html(date);
    $(".box").css("background", bg_color);
    $(".location").css("color", font_color);
    $(".temp").css("color", font_color);
  }

  $table = new $(".yajra-datatable-nuevasaltas").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
    },

    ajax: {
      url: "nuevasaltas",
      type: "get",
    },
    serverSide: false,
    processing: false,
    success: function (result) {
      if (result.errors) {
        $.each(result.errors, function (key, value) {
          console.log(" errores") + value;
        });
      } else {
        console.log("sin errores");
      }
    },
    error: function (data) {
      // Something went wrong
      // HERE you can handle asynchronously the response

      // Log in the console
      var errors = data.responseJSON;
      console.log(errors);
    },
    pageLength: 15,
    buttons: [],
    columnDefs: [
      {
        width: "1%",
        targets: [0],
      },
      {
        width: "8%",
        targets: [1],
      },
      {
        width: "1%",
        targets: [2],
      },
      {
        width: "10%",
        targets: [3],
      },
      {
        width: "2%",
        targets: [4],
        render: function (d) {
          moment.locale("es-ES");
          if (d != null) {
            return moment(d).format("DD/MM/YYYY", "es");
          }
        },
      },
      {
        width: "2%",
        targets: [5],
      },
      {
        width: "7%",
        targets: [6],
      },
      {
        className:"dt-center",
        width: "1%",
        targets: [7],
        render: function (d) {
          if (d == "SI") {
            return '<span class="badge badge-primary  center-block">SI</span>';
          } else {
            return '<span class="badge badge-danger  center-block">NO</span>';
          }
        },

      },
         {
              className: "dt-center",
             width: "1%",
             targets: [8],
             render: function (d) {
                 if (d == "SI") {
                     return '<span class="badge badge-primary  center-block">SI</span>';
                 } else {
                     return '<span class="badge badge-danger  center-block">NO</span>';
                 }
             },

          },
         {
              "width": "1%",
              "targets": [9]
          },
    ],
    columns: [
      {
        data: "EMP_CODE",
        name: "EMP_CODE",
      },
      {
        data: "LAST_NAME",
        name: "LAST_NAME",
      },
      {
        data: "FIRST_NAME",
        name: "FIRST_NAME",
      },
      {
        data: "COST_CENTER_DESC",
        name: "COST_CENTER_DESC",
      },
      {
        data: "HIRE_DATE",
        name: "HIRE_DATE",
      },
      {
        data: "EMAIL",
        name: "EMAIL",
      },
      {
        data: "POSITION_TITLE",
        name: "POSITION_TITLE",
      },
      {
        data: "LINEA",
        name: "LINEA",
      },
      {
          data: "TERMINAL",
          name: "TERMINAL",
      },
       {
          data: 'action',
          name: 'action',

      },
    ],
  });
$("#TablaNuevasAltas").on('submit', '.form-eliminar', function () {
  event.preventDefault();
  const form = $(this);
  swal({
    title: '¿ Está seguro que desea eliminar el registro ?',
    text: "Esta acción no se puede deshacer!",
    icon: 'warning',
    buttons: {
      cancel: "Cancelar",
      confirm: "Aceptar"
    },
  }).then((value) => {
    if (value) {

      ajaxRequest(form);
    }
  });
});
  // $table.column(1).visible(false);
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
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: {
      userid: userid,
      fecha: fecha,
      descripcion: descripcion,
      titulo: titulo,
    },
    error: function (data, error) {
      // console.log(" Can't do because: " + data + error);
    },
    success: function (data) {
      // console.log("Control:", data);
    },
  });
}

$(function () {
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
    },
  });

  $.ajax({
    type: "get",
    url: "",
    contentType: false,
    processData: false,

    error: function (data, error) {
      console.log(data);
      // alert(" Can't do because: " + data);
    },
    success: function (data) {
      console.log("Control:", data);
      Object.assign(data, {
        afterItemUpdate: function (list, object) {
          ManageItemlist(object, "update");
        },
      });
      Object.assign(data, {
        afterItemAdd: function (list, object) {
          ManageItemlist(object, "add");
        },
      });
      Object.assign(data, {
        afterItemDelete: function (list, object) {
          ManageItemlist(object, "delete");
        },
      });
      /* $('#todo-lists-basic-demo').lobiList(data);
                  var $lobilist = $('#todo-lists-basic-demo').data('lobiList');
                  //$lobilist.$lists
                  var $dueDateInput = $lobilist.$el.find('form [name=dueDate]');
                  $dueDateInput[0]['autocomplete'] = "off"; */

      /*     $dueDateInput.datepicker({
                          format: "dd/mm/yyyy",
                          language: "es"
                      }); */
    },
  });
});
function ajaxRequest(form) {
  $check = "";
  return $.ajax({
    url: form.attr('action'),
    type: 'POST',
    data: form.serialize(),
    success: function (respuesta) {
      if (respuesta.mensaje == "ok") {
        form.parents('tr').remove();
        $('#count-emp-code').text(respuesta.cuenta);
        HelperNotificaciones.notificaciones('El registro fue eliminado correctamente', 'Telefonia', 'success');

      /*   setTimeout(function () {
          location.reload();
        }, 1000); */

      } else {
        ;
        HelperNotificaciones.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Telefonia', 'error');

      }


    },
    error: function () {

    }

  });
}

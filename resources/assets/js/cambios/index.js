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

        columnDefs: [/* {
                width: "1%",
                orderable: false,
                className: 'select-checkbox',
                targets: [0]
            }, */

            {
                 className: "dt-center",
                width: "1%",
                targets: [1]
            },
            {
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
            },
            {
                width: "5%",
                targets: [6]
            },
            {
                width: "5%",
                targets: [7]
            },
        ],


        select: {
            style: 'multi+shift',
            selector: 'td:first-child'
        },


        columns: [/* {
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
            },
            {
                data: 'Observaciones',
                name: 'Observaciones'
            }
        ]
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
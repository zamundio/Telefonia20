@extends('layouts.admin')




@section('content')
@can('estructura_show')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script>
        function editFunc($terminal) {

            $('#terminales_estado_inv_form').parsley().reset();
            $('#submit_estado_term').val('Enviar')
            $('#submit_estado_term').attr('disabled', false);
            $('#HiddenFieldsEstado').hide();
           document.querySelector('#terminalId').value=$terminal;

            $('#estado').empty();
            $('#persona_estado').empty();
            $('#linea_estado').empty()
            $('#estado').select2({
                // Activamos la opcion "Tags" del plugin
                width: 'resolve',
                ajax: {
                    dataType: 'json',
                    url: 'GetEstadosTerminales',
                    delay: 250,
                    processResults: function (data) {

                        return {
                            results: $.map(data, function (item) {

                                return {
                                    text: item.Estado,
                                    id: item.Id
                                }
                            })
                        };
                    },
                    cache: true
                    // processResults: function (data, page) {

                    // return {
                    // results: data
                    // };
                    // },
                }
            });


            $('#TerminalModal_Estado_inv').modal("show");
            $.ajax({
                "url": 'terminalesusuarios/' + $terminal + '/editar',
                type: 'get',

                success: function (data) {

                    document.querySelector('#ns_terminal_estado').innerHTML = data.f_cambio_alta;
                    document.querySelector('#linea_original').value = data.linea_usuario_id;
                    console.log(document.querySelector('#linea_original').value);
                    // console.log(data.Devuelve_Anterior);
                    if (typeof data.term['Nserie'] === 'undefined' ||
                        data.term['Nserie'] === null) {

                        document.querySelector('#ns_terminal_estado').innerHTML = "";
                    } else {
                        document.querySelector('#ns_terminal_estado').innerHTML = "N Serie: " + data.term['Nserie'];

                    }
                    if (typeof data.term.IMEI === 'undefined' ||
                        data.term.IMEI === null) {
                        document.querySelector('#imei_terminal_estado').innerHTML = "";
                    } else {
                        document.querySelector('#imei_terminal_estado').innerHTML = "IMEI: " + data.term.IMEI
                    }
                    document.querySelector('#modelo_terminal_estado').innerHTML = data.term.modelo.Terminal;



                    document.querySelector('#Observ_term_estado').value = data.Observaciones;
                    // document.querySelector('#Observ_term_editar_original_text').value = data.Observaciones;
                    // document.querySelector('#toggle-termactual_editar_original_text').value = data.Actual;

                    if (data.Actual == "1") {
                        $('#termactual_estado').bootstrapToggle('on');
                    } else {
                        $('#termactual_estado').bootstrapToggle('off')
                    }




                    $('#TerminalModal_Estad_inv').modal("show");
                },
                error: function () {

                }
            });
        };

    </script>
    <form id="estructura">
        <div class="container-fluid">
            <div class="row">

                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Inventario</h3>

                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="inventario">
                            <div class="card-body">
                                <div class="col-lg-10">
                                    <label for="SelectCC">Centro de Coste</label>
                                    <select class="form-control multiselect" multiple title="CC" data-style="form-control" name="SelectCC" id="SelectCC" name="cc[]" data-live-search=" true">

                                        <?php
                                foreach ($comboCC as $key => $value) {
                                    echo '<option data-tokens=' . $value["EMP_COST_CENTER"] . ' value=' . $value["EMP_COST_CENTER"] . '>' . $value["COST_CENTER_DESC"] . '</option>';
                                }
                                ?>
                                    </select>

                                    <span tyle="margin-right: 500px;" class="label  label-default">Modelos</span>

                                    <select class="form-control multiselect" multiple title="Modelos" data-style="form-control" id="SelectModelo" name="SelectModelo" data-live-search=" true">
                                        <?php
                                foreach ($comboModelos as $key => $value) {
                                    echo '<option data-tokens=' . $value["id"] . ' value=' . $value["id"] . '>' . $value["Terminal"] . '</option>';
                                }
                                ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <form class="form" id="formnuevasaltas" name="formnuevasaltas">
                                    <table id="inventario" class="table table-bordered table-striped table-hover datatable display select">
                                        <thead>
                                            <tr>
                                                <th class="col-xs-1">
                                                    <input type="checkbox" class=" selectAll" value="1" id="example-select-all">
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.Obs') }}
                                                </th>
                                                <th>

                                                </th>
                                                <th>

                                                    {{ trans('global.telefonia.fields.EMP_CODE') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.LAST_NAME') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.FIRST_NAME') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.COST_CENTER_DESC') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.HIRE_DATE') }}
                                                </th>
                                                <th>

                                                    {{ trans('global.telefonia.fields.ACTUAL_LEAVE_DATE') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.POSITION_TITLE') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.Linea') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.Abreviado') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.Abreviado') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.Terminal') }}

                                                </th>
                                                <th data-toggle="tooltip" title="" data-placement="top" data-original-title="Principal" width="10px">PR</th>
                                                <th>

                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                        </tbody>
                                    </table>
                                </form>
                            </div>


                    </div>

                    <div class="card-footer text-center">

                    </div>
                </div>
            </div>


    </form>
@include('inventario.Estado')
@endcan
@endsection

@role('administrator')

@else

@endrole

@section('scripts')
@parent



<script>

    $(document).ready(function () {

  $('#fecha_estado_term_editar_inv').inputmask();
        $('#terminales_estado_inv_form').parsley().on('field:error', function () {
            console.log('Validation failed for: ', this.$element);
            var element = '#' + this.$element[0].id;
            console.log(element);
            $(this.$element[0].id).css("border: 1px solid red !important;");
        });




        function ActualizarEstado_Personal() {
            event.preventDefault();
            $TermActual = document.getElementById("termactual_estado").value;
            if ($TermActual == "true") {
                $Actual = "1";
            } else {
                $Actual = "0";

            }


            var $obs = document.getElementById("Observ_term_estado").value;

            var $estado = $('#estado').val();
            var $linea = $('#linea_estado').select2('data');
            console.log("Obs: " + $obs + "Motivo:" + $motivo);

            $.ajax({
                url: 'terminalesusuariosEstado/' + $estado,
                type: 'PUT',
                data: {
                    linea_usuario_id: $linea[0].text,
                    terminal_movil_id: $terminal,

                    Observaciones: $obs,
                    Actual: $Actual,

                    f_baja: $fecha_reasig
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                beforeSend: function () {
                    $('#submit_editar_term').attr('disabled', 'disabled');
                    $('#submit_editar_term').val('Enviando...');
                },
                success: function (data) {

                    $('#terminales_estado_form')[0].reset();
                    $('#terminales_estado_form').parsley().reset();
                    $('#submit_estado_term').attr('disabled', false);
                    $('#submit_estado_term').val('Enviar');
                    if ($.isEmptyObject(data.error)) {

                        $('#terminales_estado_form')[0].reset();
                        $('#terminales_estado_form').parsley().reset();
                        $('#TerminalModal_Estado').modal('hide')

                        Biblioteca.notificaciones('Terminal Actualizado con exito', 'Telefonia', 'success');
                        DatatableHistoricoTerminales(nummovil);
                        DatatableTerminales(nummovil);

                    } else {
                        printErrorMsg(data.error);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        };

        function ActualizarEstado_Pool() {
            event.preventDefault();
            $Estado = document.getElementById('estado').value;
            $EstadoAnt = "1"
            $lin = document.getElementById('linea_original').value;

            $fechaalta = moment($("#fecha_alta").value).format('YYYY/MM/DD', 'es');
            $obs = document.getElementById("Observ_term_estado").value;
 $terminal=document.getElementById("terminalId").value;
            $.ajax({
                url: 'terminalesusuarios/' + $terminal + '/' + $lin + '/ActEstado/',
                type: 'put',
                data: {
                    id_terminal: $terminal,
                    id_linea: $lin,
                    fecha_asignacion: $fechaalta,
                    fecha_cambio: $fecha_reasig,
                    Observaciones: $obs,
                    estado_act: $Estado,
                    estado_ant: $EstadoAnt
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                beforeSend: function () {
                    $('#submit_estado_term').attr('disabled', 'disabled');
                    $('#submit_estado_term').val('Enviando...');
                },
                success: function (data) {
                    $('#terminales_estado_form')[0].reset();
                    $('#terminales_estado_form').parsley().reset();
                    $('#submit_editar_term').attr('disabled', false);
                    $('#submit_editar_term').val('Enviar');
                    if ($.isEmptyObject(data.error)) {
                        $('#terminales_estado_form')[0].reset();
                        $('#terminales_estado_form').parsley().reset();
                        $('#TerminalModal_Estado').modal('hide')

                        HelperNotificaciones.notificaciones('Terminal Actualizado con exito', 'Telefonia', 'success');
                        $table_terminales.ajax.reload();
                        $table_historico.ajax.reload();
                        // DatatableHistoricoTerminales(nummovil);
                        // DatatableTerminales(nummovil);

                    } else {
                        HelperPrintMsg.printErrorMsg(data.error);
                    }
                }
            });

        };



        $('.btn-cancel-estado-terminal').click(function (event) {

            // }
            $('#estado').empty();
            $('#persona_estado').empty();
            $('#linea_estado').empty()
            $('#terminales_estado_inv_form').parsley().reset();

        });


        $('#toggle-termactual_editar').change(function () {

            // $('#toggle-termactual_hide').html( $(this).prop('checked'))
            $("input[id=termactual_editar]").val($(this).prop('checked'));

        })

        $('#toggle-devant_editar').change(function () {

            // $('#toggle-devant_hide').html( $(this).prop('checked'))
            $("input[id=devant_editar]").val($(this).prop('checked'));

        })


        var Select2Cascade = (function (window, $) {

            function Select2Cascade(parent, child, url, select2Options) {
                var afterActions = [];
                var options = select2Options || {};

                // Register functions to be called after cascading data loading done
                this.then = function (callback) {
                    afterActions.push(callback);
                    return this;
                };

                parent.select2(select2Options).on("change", function (e) {

                    child.prop("disabled", true);

                    var _this = this;


                    $.getJSON(url.replace(':parentId:', $(this).val()), function (items) {

                        var newOptions = '<option value="">-- Seleccionar --</option>';

                        if (Object.keys(items) != "debug") {
                            for (var id in items) {



                                newOptions += '<option value="' + items[id][" id"] + '">' + items[id]["text"] + '</option>';
                            }
                            child.select2('destroy').html(newOptions).prop("disabled", false).select2(options);
                        } else {
                            child.select2('destroy').html(newOptions).prop("disabled", true).select2(options);
                        }
                        afterActions.forEach(function (callback) {
                            callback(parent, child, items);
                        });
                    });
                });
            }
            return Select2Cascade;
        })(window, $);
        $("#TerminalModal_Estad_inv").submit(function (e) {
            console.log('en el submit');
            event.preventDefault();
            $fecha_reasig = moment($("#fecha_estado_term_editar").datepicker("getDate")).format('YYYY/MM/DD', 'es');
            console.log($fecha_reasig);
            TermActual = document.getElementById("termactual_estado").value;
            if (TermActual == "true") {
                Actual = "1";
            } else {
                Actual = "0";
            }
            var obs = document.getElementById("Observ_term_estado").value;
            console.log('en el segundo paso');
            if ($('#terminales_estado_inv_form').parsley().isValid()) {
                console.log('en el parsley valido');
                if ($('#HiddenFieldsEstado').is(':visible')) {
                    ActualizarEstado_Personal();
                } else {
                    ActualizarEstado_Pool();
                }
            }
        });
        $('#HiddenFieldsEstado').hide();
        // console.log($('#row').val());
        var select2Options = {
            width: 'resolve'
        };
        // Loading raw JSON files of a secret gist - https://gist.github.com/ajaxray/32c5a57fafc3f6bc4c430153d66a55f5
        var apiUrl = 'GetSelectLineas/:parentId:';

        $('#linea_estado').select2(select2Options);

        var cascadLoading = new Select2Cascade($('#persona_estado'), $('#linea_estado'), apiUrl, select2Options);
        cascadLoading.then(function (parent, child, items) {});

        // $('#terminales_editar_form').parsley();
        window.ParsleyConfig = {
            excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden], [disabled], :hidden"
        };

        $('#terminales_editar_form').parsley();


        $('#persona_estado').select2({
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

                // processResults: function (data, page) {

                // return {
                // results: data
                // };
                // },
            }
        });
        $('#estado').select2({
            // Activamos la opcion "Tags" del plugin
            width: '100px',
            ajax: {
                dataType: 'json',
                url: '{{ url("GetEstadosTerminales") }}',
                delay: 250,
                processResults: function (data) {

                    return {
                        results: $.map(data, function (item) {

                            return {
                                text: item.Estado,
                                id: item.Id
                            }
                        })
                    };
                },
                cache: true
                // processResults: function (data, page) {

                // return {
                // results: data
                // };
                // },
            }
        });




        var term = $('#estado');
        console.log('en el term');
        $(term).change(function () {
            console.log('en el change del estado');

            var ids = $('#estado').val();
            console.log('Selected IDs: ' + $("#fecha_estado_term_editar").datepicker("getDate"));
            if (ids == 1 || ids == 4) {
                $('#persona_estado').attr('data-parsley-required', 'true');

                $('#linea_estado').attr('data-parsley-required', 'true');
                $('#HiddenFieldsEstado').show();

            } else {
                $('#persona_estado').attr('data-parsley-required', 'false');

                $('#linea_estado').attr('data-parsley-required', 'false');
                $('#HiddenFieldsEstado').hide();
            }

        });
        linea = $('#linea_estado');
        $(linea).change(function () {

            var data = $('#linea_estado').select2('data')




        });
    });

</script>


<script src="{{ asset('js/inventario/index.js') }}"></script>

@endsection


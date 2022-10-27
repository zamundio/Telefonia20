<div id="TerminalModal_Estado" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reasignar Terminal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @include('includes.form-error')

                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>


                <form id="terminales_estado_form" data-parsley-validate>
                    @csrf
                    <div class="form-group col-sm-9">
                        <label name="modelo_terminal_estado" class="col-sm-6 control-label font-weight-bold" id="modelo_terminal_estado">Modelo:</label>
                        <input type="hidden" id="fecha_alta" name="fecha_alta">
                        <input type="hidden" id="linea_original" name="linea_original">
                    </div>
                    <div class="form-group col-sm-9">
                        <label name="ns_terminal_estado" class="col-sm-6 control-label font-weight-bold" id="ns_terminal_estado">NS:</label>

                    </div>
                    <div class="form-group col-sm-9">
                        <label name="imei_terminal_estado" class="col-sm-6 control-label font-weight-bold" id="imei_terminal_estado">IMEI:</label>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-sm-3-fecha">
                            <label for="fechaalta">Fecha</label>

                            <input id="fecha_estado_term_editar" data-inputmask="'mask':  '99/99/9999'" name="fecha_estado_term_editar" type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" autocomplete="off" value="" data-parsley-required="true" data-parsley-trigger="change">
                        </div>
                    </div>
                    <div class="form-group col-sm-9">
                        <label for="type" class="col-sm-3 control-label">Estado</label>
                        <div class="col-sm-6">

                            <select class="form-control select2-hidden-accessible" name="estado" id="estado" data-width="120%" data-parsley-required="true" required data-parsley-trigger="change"> </select>
                            <div class="col-sm-6">

                            </div>
                        </div>
                    </div>

                    <div class="form-group col-sm-12" id="HiddenFieldsEstado">
                        <div class="form-group col-sm-9">
                            <label for="type" class="col-sm-3 control-label">Persona</label>
                            <div class="col-sm-6">
                                <select name="persona_estado" id="persona_estado" class="form-control select2-hidden-accessible" data-width="160%" data-parsley-required="true" data-parsley-trigger="change"></select>
                            </div>
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="subtype" class="col-sm-3 control-label">Linea Asignada</label>
                            <div class="col-sm-6">
                                <select name="linea_estado" id="linea_estado" class="form-control select2-hidden-accessible" data-width="120%" data-parsley-required="true" data-parsley-trigger="change">
                                    <option>-- Seleccione Linea --</option>
                                </select>
                            </div>
                        </div>






                        <div class="form-group col-sm-9">
                            <div class="col-sm-5">
                                <label for="termact">Terminal Actual ?</label>
                                <input type="checkbox" id="termactual_estado" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">

                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Observaciones:</label>
                        <textarea class="form-control" name="Observ_term_estado" id="Observ_term_estado" cols="40" rows="3"></textarea>
                    </div>


                    <div class="form-group">
                        @include('includes.botones_crear_modales')
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<script>
    $('#terminales_estado_form').parsley().on('field:error', function () {
        console.log('Validation failed for: ', this.$element);
        var element = '#' + this.$element[0].id;
        console.log(element);
        $(this.$element[0].id).css("border: 1px solid red !important;");
    });

    $("#TerminalModal_Estado").submit(function (e) {
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


        if ($('#terminales_estado_form').parsley().isValid()) {

            if ($('#HiddenFieldsEstado').is(':visible')) {

                ActualizarEstado_Personal();

            } else {

                ActualizarEstado_Pool();
            }
        }
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

        $.ajax({
            url: 'terminalesusuarios/' + $terminal + '/ActEstado/',
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
        $('#terminales_estado_form').parsley().reset();

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

    $(document).ready(function () {

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

        //    $('#terminales_editar_form').parsley();
        window.ParsleyConfig = {
            excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden], [disabled], :hidden"
        };

        $('#terminales_editar_form').parsley();

    });

    $('#estado').select2({
        // Activamos la opcion "Tags" del plugin
        width: 'resolve',
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

    $('#persona_estado').select2({
        // Activamos la opcion "Tags" del plugin
        width: 'resolve',
        ajax: {
            dataType: 'json',
            url: '{{ url("GetSelectPersonal") }}',
            delay: 250,
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

    var term = $('#estado');
    $(term).change(function () {


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

</script>

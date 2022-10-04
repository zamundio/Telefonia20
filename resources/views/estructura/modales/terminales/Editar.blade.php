<div id="TerminalModal_Editar" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Terminal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @include('includes.form-error')

                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>


                <form id="terminales_editar_form" data-parsley-validate="">
                    @csrf
                    <input type="hidden" id="termactual_editar" name="termactual_editar">
                    <input type="hidden" id="devant_editar" name="devant_editar">
                    <div class="form-group ">
                        <label class="col-sm-6 control-label font-weight-bold" name="modelo_terminal" id="modelo_terminal">Modelo:</label>

                    </div>
                    <div class="form-group ">
                        <label name="ns_terminal" class="col-sm-6 control-label font-weight-bold" id="ns_terminal">NS:</label>

                    </div>
                    <div class="form-group ">
                        <label name="imei_terminal" class="col-sm-6 control-label font-weight-bold" id="imei_terminal">IMEI:</label>

                    </div>



                    <div class="form-group">
                        <label>Observaciones:</label>
                        <textarea class="form-control" name="Observ_term_editar" id="Observ_term_editar" cols="40" rows="3"></textarea>
                        <input type="hidden" name="Observ_term_editar_original_text" id="Observ_term_editar_original_text" data-parsley-ui-enabled="false">
                    </div>


                    <div class="form-group col-sm-9" id="HiddenFields2">
                        <div class="col-sm-6">
                            <label for="termact">Terminal Actual ?</label>
                            <input type="checkbox" id="toggle-termactual_editar" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">
                            <input type="hidden" name="toggle-termactual_editar_original_text" id="toggle-termactual_editar_original_text" data-parsley-ui-enabled="false">

                        </div>

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
    $(document).ready(function () {
        $('#terminales_editar_form').parsley();
    });


    /********Boton Submit del Modal Editar Terminal **************/
    $('#TerminalModal_Editar').submit(function (e) {

        event.preventDefault();
        TermActual = document.getElementById("termactual_editar").value;
        if (TermActual == "true") {
            Actual = "1";
        } else {
            Actual = "0";

        }

        var obs = document.getElementById("Observ_term_editar").value;



        if ($('#terminales_editar_form').parsley().isValid()) {



            $.ajax({
                url: 'terminalesusuarios/' + $terminal,
                type: 'PUT',
                data: {
                    terminal_movil_id: $terminal,
                    Observaciones: obs,
                    Actual: Actual

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
                    $('#terminales_editar_form')[0].reset();
                    $('#terminales_editar_form').parsley().reset();
                    $('#submit_editar_term').attr('disabled', false);
                    $('#submit_editar_term').val('Enviar');
                    if ($.isEmptyObject(data.error)) {
                        $('#terminales_editar_form')[0].reset();
                        $('#terminales_editar_form').parsley().reset();
                        $('#TerminalModal_Editar').modal('hide')
                        $table_terminales.ajax.reload();
                        HelperNotificaciones.notificaciones('Terminal Actualizado con exito', 'Telefonia', 'success');

                        // DatatableTerminales(nummovil);

                    } else {
                        HelperPrintMsg.printErrorMsg(data.error);
                    }
                }
            });
        }
    });


     $(' .btn-cancel').click(function (event) {
        document.querySelector('#motivo_editar').value = document.querySelector('#motivo_editar_original_text').value;

        document.querySelector('#Observ_term_editar').value = document.querySelector('#Observ_term_editar_original_text').value;

        Actual = document.querySelector('#toggle-termactual_editar_original_text').value;

        Devuelve_Anterior = document.querySelector('#toggle-devant_editar_original_text').value;

        if (Actual == "1") {
            $('#toggle-termactual_editar').bootstrapToggle('on');
        } else {
            $('#toggle-termactual_editar').bootstrapToggle('off')
        }



    });


    $('#toggle-termactual_editar').change(function () {

        // $('#toggle-termactual_hide').html( $(this).prop('checked'))
        $("input[id=termactual_editar]").val($(this).prop('checked'));

    })



</script>

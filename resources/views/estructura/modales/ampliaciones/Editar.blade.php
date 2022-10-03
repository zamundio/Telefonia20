<style>
    .bootstrap-select .status {
        background: #f0f0f0;
        clear: both;
        color: #999;
        font-size: 11px;
        font-style: italic;
        font-weight: 500;
        line-height: 1;
        margin-bottom: -5px;
        padding: 10px 20px;
    }

</style>





<div id="Ampliaciones_Editar" class="modal" role="dialog">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Ampliacion GB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @include('includes.form-error')

                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>


                <form id="ampliaciones_editar_form" data-parsley-validate>
                    @csrf
                    <div class="form-group col-sm-9">
                        <label class="col-sm-3 control-label">Numero:</label>
                        <label class="col-sm-4 control-label font-weight-bold" id="numeromovil_editar" name="numeromovil_editar">Numero:</label>

                    </div>
                    <div class="form-row">

                        <div class="form-group col-sm-3-fecha">
                            <label for="fechaalta">Fecha</label>

                            <input id="fecha_amp_editar" data-inputmask="'mask':  '99/99/9999'" name="fecha_amp_editar" type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" autocomplete="off" value="" data-parsley-required="true" data-parsley-trigger="change">
                             <input type="hidden" name="fecha_amp_editar_original" id="fecha_amp_editar_original" data-parsley-ui-enabled="false">
                        </div>
                    </div>
                    <div class="form-group col-sm-9">
                        <label for="type" class="col-sm-3 control-label">GB</label>
                        <div class="col-sm-4">

                            <select name="plangb_editar" id="plangb_editar" data-width="120%" data-parsley-required="true" data-parsley-trigger="change"> </select>
                            <input type="hidden" name="plangb_editar_original" id="plangb_editar_original" data-parsley-ui-enabled="false">
                            <input type="hidden" name="plangb_editar_original_text" id="plangb_editar_original_text" data-parsley-ui-enabled="false">

                        </div>
                    </div>

                    <div class="form-group col-sm-12" id="HiddenFields">
                        <div class="row">

                            <div class="col-12">
                                <label for="obs_ampl">Observaciones</label>
                                <textarea type="text" class="form-control" rows="2" name="obs_amp_editar" id="obs_amp_editar"></textarea>
                                <input type="hidden" name="obs_amp_editar_original" id="obs_amp_editar_original" data-parsley-ui-enabled="false">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-sm-9">
                        @include('includes.botones_crear_modales')
                    </div>

                </form>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function () {


            $('#ampliaciones_editar_form').parsley();
        });
        $('.btn-submit-editar-ampGB').click(function (event) {

            event.preventDefault();
            fecha = moment($('#fecha_amp_editar').val(), 'DD-MM-YYYY').format('YYYY-MM-DD');
            obs = $('#obs_amp_editar').val();
            idplangb = $("#plangb_editar").val();
            if ($('#ampliaciones_editar_form').parsley().isValid()) {
                $.ajax({
                    url: 'ampliaciongb/' + $ampliaciones_id,
                    type: 'PUT',
                    data: {
                        linea_usuario_id: nummovil,
                        FECHA: fecha,
                        Observaciones: obs,
                        GB_AMPLIADOS: idplangb

                    },
                    dataType: "json",
                    beforeSend: function () {
                        $('#submit_editar_ampgb').attr('disabled', 'disabled');
                        $('#submit_editar_ampgb').val('Enviando...');
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {

                        $('#ampliaciones_editar_form').parsley().reset();
                        $('#submit_editar_ampgb').val('Enviar')
                        $('#submit_editar_ampgb').attr('disabled', false);

                        if ($.isEmptyObject(data.error)) {

                            $('#Ampliaciones_Editar').modal('hide')
                            Biblioteca.notificaciones('Ampliación Actualizada con Exito', 'Telefonia', 'success');
                            DatatableAmpliaciones(nummovil);

                        } else {
                            HelperPrintMsg.printErrorMsg(data.error);
                        }
                    }
                });
            }
        });



        $('.btn-cancel-editar-ampGB').click(function (event) {



            fechaamp_ori = $('#fecha_amp_editar_original').val();

            obs_amp_ori = $('#obs_amp_editar_original').val();
             $('#obs_amp_editar').val($('#obs_amp_editar_original').val());
            plangb_amp_ori = $("#plangb_editar_original").val();
            plangb_amp_text_ori = $("#plangb_editar_original_text").val();

            $('#plangb_editar')
                .empty()
                .append('<option selected value="' + plangb_amp_ori + '">' + plangb_amp_text_ori + '</option>');
            $('#plangb_editar').select2('data', {
                id: plangb_amp_ori,
                label: plangb_amp_text_ori
            });
            $('#plangb_editar').trigger('change');

            document.querySelector('#fecha_amp_editar').value = fechaamp_ori


        });





        $plangb = $('#plangb_editar').select2({
            placeholder: 'Selecciona un plan',
            ajax: {
                url: '{{ url("GetPlanGB") }}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {

                    return {
                        results: $.map(data, function (item) {

                            return {
                                text: item.GB,
                                id: item.Id
                            }
                        })
                    };
                },
                cache: true
            }
        });

    </script>

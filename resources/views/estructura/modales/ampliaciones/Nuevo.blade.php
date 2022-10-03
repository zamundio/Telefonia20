<div id="Ampliaciones_Nuevo" class="modal" role="dialog">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Añadir Ampliacion GB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">

                @include('includes.form-error')

                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>


                <form id="ampliaciones_nuevo_form" data-parsley-validate>
                    @csrf

                    <div class="form-group col-sm-9">
                        <label class="col-sm-3 control-label">Numero:</label>
                        <label class="col-sm-4 control-label font-weight-bold" id="numeromovil" name="numeromovil">Numero:</label>

                    </div>
                    <div class="form-row">

                        <div class="form-group col-sm-3-fecha">
                            <label for="fechaalta">Fecha</label>

                            <input id="fecha_amp" data-inputmask="'mask':  '99/99/9999'" name="fecha_amp" type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" autocomplete="off" value="" data-parsley-required="true" data-parsley-trigger="change">
                        </div>
                    </div>
                    <div class="form-group col-sm-9">
                        <label for="type" class="col-sm-3 control-label">GB</label>
                        <div class="col-sm-6">

                            <select class="form-control select2-hidden-accessible" name="plangb" id="plangb" data-width="1250%" data-parsley-required="true" required data-parsley-trigger="change"> </select>
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-sm-12" id="HiddenFields">
                        <div class="row">

                            <div class="col-12">
                                <label for="obs_ampl">Observaciones</label>
                                <textarea type="text" class="form-control" rows="2" name="obs_amp" id="obs_amp"></textarea>
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
</div>
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            language: 'es',
            todayBtn: true,
            todayHighlight: true,
            toggleActive: false,
            weekStart: 1

        });

        $('#ampliaciones_nuevo_form').parsley();
    });

    $("#Ampliaciones_Nuevo").submit(function (e) {

        e.preventDefault();


       fecha = moment($('#fecha_amp').val(), 'DD-MM-YYYY').format('YYYY-MM-DD');

        obs = $('#obs_amp').val();
        idplangb = $("#plangb").val();
        if ($('#ampliaciones_nuevo_form').parsley().isValid()) {

            $.ajax({
                url: 'ampliaciongb/crear',
                method: "GET",
                data: {
                    linea_usuario_id: nummovil,
                    FECHA: fecha,
                    GB_AMPLIADOS: idplangb,
                    Observaciones: obs
                },
                dataType: "json",
                beforeSend: function () {
                    $('#submit').attr('disabled', 'disabled');
                    $('#submit').val('Enviando...');
                },
                success: function (data) {
                    $('#ampliaciones_nuevo_form')[0].reset();
                    $('#ampliaciones_nuevo_form').parsley().reset();
                    $('#submit').attr('disabled', false);
                    $('#submit').val('Enviar');
                    if ($.isEmptyObject(data.error)) {
                        $('#ampliaciones_nuevo_form')[0].reset();
                        $('#ampliaciones_nuevo_form').parsley().reset();
                        $('#Ampliaciones_Nuevo').modal('hide')
                        HelperNotificaciones.notificaciones('Ampliacion Agregada con Exito', 'Telefonia', 'success');
                        // DatatableAmpliaciones(nummovil);
                        $table.ajax.reload();
                    } else {
                        HelperPrintMsg.printErrorMsg(data.error);
                    }
                }
            });
        }

    });



    $(' .btn-cancel-ampGB').click(function (event) {
        $('#ampliaciones_nuevo_form')[0].reset();
        $('#ampliaciones_nuevo_form').parsley().reset();
    });

    $('#plangb').select2({
        // Activamos la opcion "Tags" del plugin
        width: '200px',
        ajax: {
            dataType: 'json',
            url: '{{ url("GetPlanGB") }}',
            delay: 250,
            processResults: function (data) {
                // console.log(data);
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
            // processResults: function (data, page) {

            // return {
            // results: data
            // };
            // },
        }
    });

</script>

<div id="LineaModal_Nuevo" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Linea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @include('includes.form-error')

                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>


                <form id="linea_nuevo_form" data-parsley-validate>
                    @csrf
                    <div class="form-group  col-sm-6-Email">
                        <label>Numero movil:</label>
                        <input type="text" name="num_mo_nuevo" id="num_mo_nuevo" autocomplete="off" class="form-control" data-parsley-pattern="^(\d\d\d\d\d\d\d\d\d)$" data-parsley-pattern-message="El telefono debe ser de 9 digitos, sin espacios" required data-parsley-type="digits" data-parsley-trigger="change" data-parsley-minlength="9" data-parsley-maxlength="9" value="">
                    </div>
                    <div class="form-group col-sm-3-abrev">
                        <label for="abrev_nuevo"> Abreviado </label>
                        <input type="text" class="form-control" name="abrev_nuevo" id="abrev_nuevo" autocomplete="off" data-parsley-type="digits" data-parsley-pattern="\d{4}" data-parsley-trigger="change">
                    </div>
                    {{-- <p class="errorContent text-center alert alert-danger hidden"></p> --}}
                    <div class="form-group col-sm-9">
                        <label for="type" class="col-sm-6 control-label">Plan Datos</label>
                        <div class="col-sm-5">

                            <select class="form-control select2" name="plandatos" id="plandatos" data-width="1250%" data-parsley-required="true" required data-parsley-trigger="change"> </select>
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div>
                    <div class="form-group  ml-2">
                        <label>Observaciones:</label>
                        <textarea class="form-control" name="Observ_nuevo" id="Observ_nuevo" cols="40" rows="3"></textarea>
                    </div>

                    <div class="form-check  ml-2">
                        <input type="checkbox" id="toggle-princ_nuevo" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">
                        <label class="form-check-label ml-2" for="toggle-princ_nuevo"><strong> Telefono Principal </strong></label>
                        <input type="hidden" name="toggle-princ_nuevo_text" id="Ptoggle-princ_nuevo_text" data-parsley-ui-enabled="false">
                    </div>
                    <div class="form-group"></div>
                    <div class="form-check  ml-2">
                        <input type="checkbox" id="toggle-LXLS_nuevo" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">
                        <label class="form-check-label ml-2" for="toggle-LXLS_nuevo"><strong> XLS </strong></label>
                        <input type="hidden" name="LXLS_nuevo_original_text" id="LXLS_nuevo_original_text" data-parsley-ui-enabled="false">
                    </div>
                    <p class="errorContent text-center alert alert-danger invisible"></p>
                    <div class="modal-footer">

                        @include('includes.botones_crear_modales')


                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {

        $('#linea_nuevo_form').parsley();
    });



    /********Boton Submit del Modal Agregar Linea **************/
    $('#linea_nuevo_form').submit(function (e) {
        event.preventDefault();

        console.log('en el submit0');




        abrev = $("input[name='abrev_nuevo']").val();
 idplangbdatos = $("#plandatos").val();

        var num_movil = $("input[name='num_mo_nuevo']").val();
        var obs = document.getElementById("Observ_nuevo").value;

        if (document.getElementById("toggle-princ_nuevo").checked) {
            principal = 1;

        } else {
            principal = 0;

        }


        console.log('en el submit0');



        if (document.getElementById("toggle-LXLS_nuevo").checked) {
            XLS = 1;

        } else {
            XLS = 0;

        }

        if ($('#linea_nuevo_form').parsley().isValid()) {
            event.preventDefault();

            $.ajax({
                url: 'lineas',
                type: 'POST',
                data: {
                    cod_emp: $cod,
                    id: num_movil,
                    Observaciones: obs,
                    Abreviado: abrev,
                    ListadoXLS: XLS,
                    Plan:idplangbdatos,
                    Principal: principal
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    $('#submit').attr('disabled', 'disabled');
                    $('#submit').val('Enviando...');
                },
                success: function (data) {
                    // $('#linea_nuevo_form')[0].reset();
                    $('#linea_nuevo_form').parsley().reset();
                    $('#submit_crea_linea').attr('disabled', false);
                    $('#submit_crea_linea').val('Enviar');

                    if ($.isEmptyObject(data.error)) {
                        // $('#linea_nuevo_form')[0].reset();
                        $('#linea_nuevo_form').parsley().reset();
                        $('#LineaModal_Nuevo').modal('hide')
                        $table.ajax.reload();
                        HelperNotificaciones.notificaciones('Linea Agregada con Exito', 'Telefonia', 'success');

                    } else {
                        HelperPrintMsg.printErrorMsg(data.error);
                    }
                }
            });
        };

    });
    $('#plandatos').select2({
        // Activamos la opcion "Tags" del plugin
        width: '100px',
        ajax: {
            dataType: 'json',
            url: '{{ url("GetPlanDatos") }}',
            delay: 250,
            processResults: function (data) {
                // console.log(data);
                return {
                    results: $.map(data, function (item) {

                        return {
                            text: item.Plan,
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
    $(".btn-cancel-crea_linea").click(function (e) {
        $('#linea_nuevo_form')[0].reset();
        $('#linea_nuevo_form').parsley().reset();


    });

</script>

<div id="LineaModal_Editar" class="modal" class="modal" role="dialog">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Linea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @include('includes.form-error')

                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>


                <form id="linea_editar_form" data-parsley-validate="">
                    @csrf
                    <div class="form-group  col-sm-6-Email">
                        <label>Numero movil:</label>
                        <input type="tel" name="num_mo_editar" id="num_mo_editar" disabled class="form-control" disabledvalue="">
                        <input type="hidden" name="num_mo_editar_original_text" id="num_mo_editar_original_text" data-parsley-ui-enabled="false">
                    </div>
                    <div class="form-group  col-sm-3-abrev">
                        <label for="abrev_nuevo"> Abreviado </label>
                        <input type="text" class="form-control" name="abrev_editar" id="abrev_editar" autocomplete="off" data-parsley-type="digits" data-parsley-pattern="\d{4}" data-parsley-trigger="change">
                        <input type="hidden" name="abrev_editar_original_text" id="abrev_editar_original_text" data-parsley-ui-enabled="false">
                    </div>

                    <div class="form-group  ml-2">
                        <label>Observaciones:</label>
                        <textarea class="form-control" name="Observ_editar" id="Observ_editar" cols="40" rows="3"></textarea>
                        <input type="hidden" name="Observ_editar_original_text" id="Observ_editar_original_text" data-parsley-ui-enabled="false">
                    </div>
                    <div class="form-check  ml-2">
                        <input type="checkbox" id="toggle-principal_editar" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">
                        <label class="form-check-label ml-2" for="toggle-principal_editar"><strong> Telefono Principal </strong></label>
                           <input type="hidden" name="Princ_editar_original_text" id="Princ_editar_original_text" data-parsley-ui-enabled="false">
                    </div>
                        <div class="form-group"></div>
                    <div class="form-check  ml-2">
                        <input type="checkbox" id="toggle-LXLS_editar" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">
                        <label class="form-check-label ml-2" for="toggle-LXLS_editar"><strong> XLS </strong></label>
                        <input type="hidden" name="LXLS_editar_original_text" id="LXLS_editar_original_text" data-parsley-ui-enabled="false">
                    </div>

                    <div class="mt-md-4">
                    </div>
                    <div class="form-group">
                        @include('includes.boton-form-editar-modal-linea')
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<script>
    $("#LineaModal_Editar").submit(function (e) {

        $table = $('.yajra-datatable-Lineas').DataTable();

        abrev = document.getElementById("abrev_editar").value;

      abrevAnt= document.getElementById("abrev_editar_original_text").value;



        var num_movil = $("input[name='num_mo_editar']").val();
        var obs = document.getElementById("Observ_editar").value;

         if (document.getElementById("toggle-principal_editar").checked) {
         principal = 1;

         } else {
         principal = 0;

         }

         fecha_Act = $('#fecha_tarj').val();




         if (document.getElementById("toggle-LXLS_editar").checked) {
         XLS = 1;

         } else {
         XLS = 0;

         }

        if ($('#linea_editar_form').parsley().isValid()) {
            event.preventDefault();

            $.ajax({
                url: 'lineas/'+abrevAnt,
                type: 'PUT',
                data: {
                    cod_emp: $cod,
                    id: nummovil,
                    Observaciones: obs,
                    Abreviado: abrev,
                    ListadoXLS: XLS,
                    Principal:principal
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    $('#submit_editar_linea').attr('disabled', 'disabled');
                    $('#submit_editar_linea').val('Enviando...');
                },
                success: function (data) {
                    $('#linea_editar_form')[0].reset();
                    $('#linea_editar_form').parsley().reset();
                    $('#submit_editar_linea').attr('disabled', false);
                    $('#submit_editar_linea').val('Enviar');

                    if ($.isEmptyObject(data.error)) {
                        $('#linea_editar_form')[0].reset();
                        $('#linea_editar_form').parsley().reset();
                        $('#LineaModal_Editar').modal('hide')
                        $table.ajax.reload();
                        HelperNotificaciones.notificaciones('Linea Actualizada con Exito', 'Telefonia', 'success');

                    } else {
                        HelperPrintMsg.printErrorMsg(data.error);
                    }
                }
            });
        };

    });

    $(".btn-cancel-editar-linea").click(function (e) {

        $('#linea_nuevo_form')[0].reset();
        $('#linea_nuevo_form').parsley().reset();
        nummovil_linea_editar_ori = $('#num_mo_editar_original_text').val();
        obs_linea_editar_ori = $('#Observ_editar_original_text').val();
        xls_linea_editar_ori = $("#LXLS_editar_original_text").val();
        document.querySelector('#num_mo_editar').value = nummovil_linea_editar_ori;
        document.querySelector('#Observ_editar').value = obs_linea_editar_ori;
        if (xls_linea_editar_ori == "SI") {
            document.querySelector('#LXLS_editar').checked = true;
        } else {
            document.querySelector('#LXLS_editar').checked = false;
        }


    });
     $('#toggle-principal_tarj').change(function () {
     // $('#toggle-termactual_hide').html( $(this).prop('checked'))
     $("input[id=principal]").val($(this).prop('checked'));
     });

</script>

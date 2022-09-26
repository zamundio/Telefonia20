
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
                    <div class="form-group  ml-2">
                        <label>Numero movil:</label>
                        <input type="tel" name="num_mo_nuevo" id="num_mo_nuevo" autocomplete="off" class="form-control" data-parsley-pattern="^(\d\d\d\d\d\d\d\d\d)$" data-parsley-pattern-message="El telefono debe ser de 9 digitos, sin espacios" required data-parsley-type="digits" data-parsley-trigger="change" data-parsley-minlength="9" data-parsley-maxlength="9" value="">
                    </div>
                    {{-- <p class="errorContent text-center alert alert-danger hidden"></p> --}}

                    <div class="form-group  ml-2">
                        <label>Observaciones:</label>
                        <textarea class="form-control" name="Observ_nuevo" id="Observ_nuevo" cols="40" rows="3"></textarea>
                    </div>
                    <div class="form-check  ml-2">
                        <input type="checkbox" class="form-check-input" id="LXLS_nuevo">
                        <label class="form-check-label ml-2" for="LXLS_nuevo"><strong> XLS </strong></label>
                    </div>
                     <div class="form-check  ml-2">
                         <input type="checkbox" class="form-check-input" id="Princ_nuevo">
                         <label class="form-check-label ml-2" for="Princ_nuevo"><strong> Telefono Principal </strong></label>
                     </div>

                    {{-- <div class="form-group">
                        <strong>XLS:</strong>
                        <input class="form-check-input" name="LXLS_nuevo" id="LXLS_nuevo" checked type="checkbox">
                    </div> --}}
                    <div class="mt-md-4">
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



        $('#linea_nuevo_form').parsley();
    });



    /********Boton Submit del Modal Agregar Linea **************/
    $('#LineaModal_Nuevo').submit(function (e) {


        $table = $('.yajra-datatable-Lineas').DataTable();
        Check = document.getElementById("LXLS_nuevo").checked;


        var num_movil = $("input[name='num_mo_nuevo']").val();
        var obs = document.getElementById("Observ_nuevo").value;

        if (document.getElementById("LXLS_nuevo").checked) {
            XLS = "SI";

        } else {
            XLS = "NO";

        }

if ( document.getElementById("Princ_nuevo").checked) {
Principal =1;

} else {
Principal =0;

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
                    ListadoXLS: XLS,
                    Check: Check,
                    Principal:Principal
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    $('#submit_crea_linea').attr('disabled', 'disabled');
                    $('#submit_crea_linea').val('Enviando...');
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

    $(".btn-cancel-crea_linea").click(function (e) {
        $('#linea_nuevo_form')[0].reset();
        $('#linea_nuevo_form').parsley().reset();


    });

</script>

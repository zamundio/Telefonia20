<style>
    .form-group,
    .form-row>.col,
    .form-row>[class*="col-"] {
        padding-left: 3;
        padding-right: 3;
    }

    .form-row {
        margin: 0;
    }

</style>

<div id="TarjetaLineaModal_Nuevo" class="modal" role="dialog">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Añadir Tarjeta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @include('includes.form-error')

                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>


                <form id="tarjetas_nuevo_form" data-parsley-validate="">
                    @csrf
                    <input type="hidden" id="principal" name="principal">
                    <input type="hidden" id="solodatos" name="solodatos">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="abrev_tarj"> Abreviado </label>
                            <input type="text" class="form-control" id="abrev_tarj" autocomplete="off" data-parsley-type="digits" data-parsley-pattern="\d{4}" data-parsley-trigger="change">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="imei_tarj"> Num SIM </label>
                            <input type="text" class="form-control" id="imei_tarj" autocomplete="off" data-inputmask="'mask': '9999-999999999999-9'" data-parsley-pattern="^([0-9]+(-[0-9]+)+)$" data-inputmask-alias="numsim" data-inputmask-inputformat="9999-999999999999-9" data-inputmask-placeholder="____-____________-_" data-parsley-required="true" data-parsley-trigger="change">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="pin_tarj"> PIN </label>
                            <input type="text" class="form-control" id="pin_tarj" autocomplete="off" data-parsley-type="digits" data-parsley-pattern="\d{4}" data-parsley-trigger="change">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="puk_tarj"> PUK </label>
                            <input type="text" class="form-control" id="puk_tarj" autocomplete="off" data-parsley-type="digits" data-parsley-pattern="\d{8}" data-parsley-trigger="change">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="toggle-principal_tarj"> Principal ? </label>
                            <input type="checkbox" id="toggle-principal_tarj" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="toggle-principal_tarj"> Solo Datos ? </label>
                            <input type="checkbox" id="toggle-solodatos_tarj" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-sm-3-fecha">
                            <label for="fechaalta">Fecha</label>

                            <input id="fecha" data-inputmask="'mask':  '99/99/9999'" name="fecha" type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" autocomplete="off" value="" data-parsley-required="true" data-parsley-trigger="change">
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="row">

                            <div class="col-12">
                                <label for="obs_ampl">Observaciones</label>
                                <textarea type="text" autocomplete="off" class="form-control" rows="2" name="obs_tarj" id="obs_tarj"></textarea>
                            </div>
                        </div>
                    </div>



                    <p class="errorContent text-center alert alert-danger invisible"></p>
<div class="modal-footer">

    @include('includes.botones_crear_modales')
    {{-- <input type="submit" class="btn btn-default"></button> --}}

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
  toggleActive: true,
  weekStart: 1

  });
        $('input').inputmask();

        $('#tarjetas_nuevo_form').parsley();
    });


    window.Parsley.on('field:error', function () {
        // This global callback will be called for any field
        // that fails validation.
        console.log('Validation failed for: ',
            this.$element.attr('name'));
    });
    /********Boton Submit del Modal Agregar Trjeta **************/

    $('#TarjetaLineaModal_Nuevo').submit(function (e) {


        abrev = $('#abrev_tarj').val();

        numsim = $('#imei_tarj').val();
        pin = $('#pin_tarj').val();
        puk = $('#puk_tarj').val();
        if (document.getElementById("toggle-principal_tarj").checked) {
            principal = 1;

        } else {
            principal = 0;

        }

        fecha_Act = $('#fecha_asig_tarj').val();

        obs = $('#obs_tarj').val();


        if (document.getElementById("toggle-solodatos_tarj").checked) {
            solodatos = 1;

        } else {
            solodatos = 0;

        }

        if ($('#tarjetas_nuevo_form').parsley().isValid()) {
            event.preventDefault();

            $.ajax({
                url: 'tarjetasusuarios/' + numsim,
                type: 'POST',
                data: {
                    linea_usuario_id: nummovil,
                    Abrev: abrev,
                    id: numsim,
                    Observaciones: obs,
                    PIN: pin,
                    PUK: puk,
                    Principal: principal,
                    Datos: solodatos,
                    Fecha_Activacion: fecha_Act

                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                beforeSend: function () {
                    $('#submit_crear_tarj').attr('disabled', 'disabled');
                    $('#submit_crear_tarj').val('Enviando...');
                },
                success: function (data) {
                    // $('#tarjetas_nuevo_form')[0].reset();
                    $('#tarjetas_nuevo_form').parsley().reset();
                    $('#submit_crear_tarj').attr('disabled', false);
                    $('#submit_crear_tarj').val('Enviar');
                    if ($.isEmptyObject(data.error)) {
                        // $('#tarjetas_nuevo_form')[0].reset();
                        $('#tarjetas_nuevo_form').parsley().reset();

                        $('#TarjetaLineaModal_Nuevo').modal('hide');
                        HelperNotificaciones.notificaciones('Tarjeta Agregado con exito', 'Telefonia', 'success');
                        DatatableTarjetas(nummovil);

                    } else {
                        HelperPrintMsg.printErrorMsg(data.error);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    });
    $(' .btn-cancel-tarj').click(function (event) {
        console.log("cucu");
        // $('#tarjetas_nuevo_form')[0].reset();
        $('#tarjetas_nuevo_form').parsley().reset();

        $('#toggle-principal_tarj').bootstrapToggle('on');
        $('#toggle-solodatos_tarj').bootstrapToggle('on');

    });

    $('#toggle-principal_tarj').change(function () {
        // $('#toggle-termactual_hide').html( $(this).prop('checked'))
        $("input[id=principal]").val($(this).prop('checked'));

    })

    $('#toggle-solodatos_tarj').change(function () {
        // $('#toggle-devant_hide').html( $(this).prop('checked'))
        $("input[id=solodatos]").val($(this).prop('checked'));

    })

</script>

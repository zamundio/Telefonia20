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



<div id="TarjetaLineaModal_Editar" class="modal" role="dialog">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Tarjeta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @include('includes.form-error')

                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>


                <form id="tarjetas_editar_form" data-parsley-validate="">
                    @csrf
                    <input type="hidden" id="principal_editar" name="principal_editar">
                    <input type="hidden" id="solodatos_editar" name="solodatos_editar">
                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label for="imei_tarj_editar"> Num SIM </label>
                            <input type="text" class="form-control" id="imei_tarj_editar" autocomplete="off" data-inputmask="'mask': '9999-999999999999-9'" data-inputmask-alias="numsim" data-inputmask-inputformat="9999-999999999999-9" data-inputmask-placeholder="____-____________-_" data-parsley-pattern="^([0-9]+(-[0-9]+)+)$" data-parsley-required="true" data-parsley-trigger="change">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="pin_tarj_editar"> PIN </label>
                            <input type="text" class="form-control" id="pin_tarj_editar" autocomplete="off" data-parsley-type="digits" data-parsley-pattern="\d{4}" data-parsley-trigger="change">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="puk_tarj_editar"> PUK </label>

                            <input type="text" class="form-control" id="puk_tarj_editar" autocomplete="off" data-parsley-type="digits" data-parsley-pattern="\d{8}" data-parsley-trigger="change">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="toggle-principal_tarj_editar"> Principal ? </label>
                            <input type="checkbox" id="toggle-principal_tarj_editar" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="toggle-principal_tarj_editar"> Solo Datos ? </label>
                            <input type="checkbox" id="toggle-solodatos_tarj_editar" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">
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
                                <textarea type="text" autocomplete="off" class="form-control" rows="2" name="obs_tarj_editar" id="obs_tarj_editar"></textarea>
                            </div>
                        </div>
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

        $("#imei_tarj_editar").attr('disabled', 'disabled');

        $('#tarjetas_editar_form').parsley();
    });


    window.Parsley.on('field:error', function () {
        // This global callback will be called for any field
        // that fails validation.
        console.log('Validation failed for: ',
            this.$element.attr('name'));
    });
    /********Boton Submit del Modal Agregar Trjeta **************/

    $('#TarjetaLineaModal_Editar').submit(function (e) {


        abrev = $('#abrev_tarj_editar').val();
        numsim = $('#imei_tarj_editar').val();
        pin = $('#pin_tarj_editar').val();
        puk = $('#puk_tarj_editar').val();

        if (document.getElementById("toggle-principal_tarj_editar").checked) {
            principal = 1;

        } else {
            principal = 0;

        }

        fecha_Act = $('#fecha').val();

        obs = $('#obs_tarj_editar').val();


        if (document.getElementById("toggle-solodatos_tarj_editar").checked) {
            solodatos = 1;

        } else {
            solodatos = 0;

        }

        if ($('#tarjetas_editar_form').parsley().isValid()) {
            event.preventDefault();
            // console.log(pin);
            $.ajax({
                url: 'tarjetasusuarios/' + numsim,
                type: 'put',
                data: {
                    linea_usuario_id: nummovil,
                    // Abrev: abrev,
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
                    $('#submit').attr('disabled', 'disabled');
                    $('#submit').val('Enviando...');
                },
                success: function (data) {
                    $('#tarjetas_editar_form')[0].reset();
                    $('#tarjetas_editar_form').parsley().reset();
                    $('#submit').attr('disabled', false);
                    $('#submit').val('Enviar');
                    if ($.isEmptyObject(data.error)) {
                        $('#tarjetas_editar_form')[0].reset();
                        $('#tarjetas_editar_form').parsley().reset();
                        $table_tarjetas.ajax.reload();
                        $('#TarjetaLineaModal_Editar').modal('hide');
                        HelperNotificaciones.notificaciones('Tarjeta Actualizada con exito', 'Telefonia', 'success');

                        // DatatableTarjetas(nummovil);

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
    $(' .btn-cancel').click(function (event) {
        $('#tarjetas_editar_form')[0].reset();
        $('#tarjetas_editar_form').parsley().reset();

        $('#toggle-principal_tarj_editar').bootstrapToggle('on');
        $('#toggle-solodatos_tarj_editar').bootstrapToggle('on');

    });

    $('#toggle-principal_tarj_editar').change(function () {
        // $('#toggle-termactual_hide').html( $(this).prop('checked'))
        $("input[id=principal]").val($(this).prop('checked'));
         $("input[id=principal]").val($(this).prop('checked'));
         if ($(this).is(":checked")) {
         $("#toggle-solodatos_tarj_editar").bootstrapToggle('off');
         }

    })

    $('#toggle-solodatos_tarj_editar').change(function () {
        // $('#toggle-devant_hide').html( $(this).prop('checked'))
        $("input[id=solodatos]").val($(this).prop('checked'));
  if ($(this).is(":checked")) {
  $("#toggle-principal_tarj_editar").bootstrapToggle('off');
  }
    })

    // function CheckAbrev() {
    //     abrev = $('#abrev_tarj_editar').val();
    //     console.log(abrev);
    //     $.ajax({
    //         url: 'CheckAbrev',
    //         type: 'get',
    //         data: {
    //             Abrev: abrev
    //         },
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         dataType: "json",
    //         success: function (data) {
    //             // console.log(data);


    //         },
    //         error: function (xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status);
    //             alert(thrownError);
    //         }
    //     });
    // }

</script>

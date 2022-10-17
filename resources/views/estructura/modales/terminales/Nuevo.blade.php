<div id="TerminalUser_Nuevo" class="modal" role="dialog">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Asignar Terminal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">

                @include('includes.form-error')

                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>


                <form id="terminales_nuevo_form" data-parsley-validate="">
                    @csrf

                    <input type="hidden" id="termactual" name="termactual">
                    <input type="hidden" id="devant" name="devant">
                    <div class="form-group col-sm-9">
                        <label for="type" class="col-sm-3 control-label">Modelo</label>
                        <div class=" col-sm-6-select2">
                            <select name="type" id="type" class="form-control select2-hidden-accessible" data-width="160%" data-parsley-required="true" data-parsley-trigger="change">
                                <option>-- Modelo --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-sm-9">
                        <label for="subtype" class="col-sm-3 control-label">Terminal</label>
                        <div class=" col-sm-6-select2">
                            <select name="subtype" id="subtype" class="form-control col-sm-8-select2 select2-hidden-accessible" data-width="120%" data-parsley-required="true" data-parsley-trigger="change">
                                <option>-- Terminal --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-sm-12" id="HiddenFields">
                        <div class="row">

                            <div class="col-12">
                                <label for="obs">Observaciones</label>
                                <textarea type="text" class="form-control" rows="2" id="obs"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="form-group col-sm-9" id="HiddenFields2">
                        <div class="col-sm-6">
                            <label for="termact">Terminal Actual ?</label>
                            <input type="checkbox" id="toggle-termactual_nuevo" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">

                        </div>

                    </div>

                    <div class="form-group col-sm-9">
                        @include('includes.botones_crear_modales')
                        {{-- <input type="submit" class="btn btn-success  btn-submit-term" name="submit_crear_term" id="submit_crear_term" value="Enviar">
                        <input type="reset" name="reset_crear_term" id="reset_crear_term" class="btn btn-danger btn-cancel-term" data-validate="false" /> --}}
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>


<script>
    var Select2CascadeNuevo = (function (window, $) {

        function Select2CascadeNuevo(parent, child, url, select2Options) {
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



                            newOptions += '<option value="' + items[id]["id"] + '">' + items[id]["text"] + '</option>';
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
        return Select2CascadeNuevo;
    })(window, $);

    $(document).ready(function () {


        $('#terminales_nuevo_form').parsley();

        $('#HiddenFields').hide();
        $('#HiddenFields2').hide();

        $('#type').select2({
            placeholder: "Please select an skill",
            allowClear: true,
            // Activamos la opcion "Tags" del plugin
            width: 'resolve',
            language: "es",
            ajax: {
                dataType: 'json',
                url: '{{ url("GetPoolModelos") }}',
                delay: 100,
                processResults: function (data) {

                    return {
                        results: $.map(data, function (item) {

                            return {
                                text: item.Terminal,
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



        var select2Options = {
            width: 'resolve',

            allowClear: true,
            // Activamos la opcion "Tags" del plugin
            width: 'resolve',
            language: "es",
            placeholder: "Terminal"
        };
        // Loading raw JSON files of a secret gist - https://gist.github.com/ajaxray/32c5a57fafc3f6bc4c430153d66a55f5
        var apiUrl = 'GetPoolFilteredSel/:parentId:';

        $('#subtype').select2(select2Options);
        var cascadLoading = new Select2CascadeNuevo($('#type'), $('#subtype'), apiUrl, select2Options);
        cascadLoading.then(function (parent, child, items) {});




    });
    $('#subtype').select2().on("change", function (e) {

        console.log($(this).select2('data')[0]);


    });

    window.Parsley.on('field:error', function () {
        // This global callback will be called for any field
        // that fails validation.
        console.log('Validation failed for: ',
            this.$element.attr('name'));
    });
    /********Boton Submit del Modal Agregar Terminal **************/
    $("#TerminalUser_Nuevo").submit(function (e) {
        e.preventDefault();

        terminal_movil_id = $('#subtype').val();
        console.log(terminal_movil_id);

        obs = $('#obs').val();
        termactual = $("input[id=termactual]").val();
        if (termactual == "false") {
            term = 0;
        } else {
            term = 1;
        }



        if ($('#terminales_nuevo_form').parsley().isValid()) {
            // event.preventDefault();

            $.ajax({
                url: 'terminalesusuarios/asigncreated',
                type: 'POST',
                data: {
                    linea_usuario_id: nummovil,
                    terminal_movil_id: terminal_movil_id,

                    Observaciones: obs,
                    Actual: term,


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
                    $('#terminales_nuevo_form')[0].reset();
                    $('#terminales_nuevo_form').parsley().reset();
                    $('#submit').attr('disabled', false);
                    $('#submit').val('Enviar');
                    if ($.isEmptyObject(data.error)) {
                        $('#terminales_nuevo_form')[0].reset();
                        $('#terminales_nuevo_form').parsley().reset();
                        $('#TerminalUser_Nuevo').modal('hide')
                        HelperNotificaciones.notificaciones('Terminal Agregado con exito', 'Telefonia', 'success');
                        // DatatableTerminales(nummovil);
                        $('#TablaTerminales').DataTable().ajax.reload();
                    } else {
                        HelperPrintMsg.printErrorMsg(data.error);
                    }
                }
            });
        }
    });



    var term = $('#subtype');
    $(term).change(function () {


        $('#HiddenFields').show();
        $('#HiddenFields2').show();

    });


    $('#toggle-termactual_nuevo').change(function () {
        // $('#toggle-termactual_hide').html( $(this).prop('checked'))
        $("input[id=termactual]").val($(this).prop('checked'));

    })

    $('#toggle-devant_nuevo').change(function () {
        // $('#toggle-devant_hide').html( $(this).prop('checked'))
        $("input[id=devant]").val($(this).prop('checked'));

    });

    $('.btn-cancel-term').click(function (event) {
        console.log("en la brecha");
        $('#terminales_nuevo_form')[0].reset();
        $('#terminales_nuevo_form').parsley().reset();
        $('.select2-hidden-accessible').val(1).trigger('change.select2');
    });

</script>

<div id="TerminalModal_Estad_inv" class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

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


                <form id="terminales_estado_inv_form" data-parsley-validate>
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

                            <input type="text" id="fecha_estado_term_editar_inv" data-inputmask="'mask': '99/99/9999'" name="fecha_estado_term_editar_inv" class="form-control datepicker" data-date-format="dd/mm/yyyy" autocomplete="off" value="" data-parsley-required="true" data-parsley-trigger="change">
                        </div>
                    </div>
                    <div class="form-group col-sm-9">
                        <label for="type" class="col-sm-5 control-label">Estado</label>
                        <div class="col-sm-4-select2">

                            <select class="form-control select2-hidden-accessible" name="estado" id="estado" data-width="180%" data-parsley-required="true" required data-parsley-trigger="change"> </select>
                            <div class="col-sm-6">

                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="terminalId" name="terminalId">
                    <div class="form-group col-sm-12" id="HiddenFieldsEstado">
                        <div class="form-group col-sm-9">
                            <label for="type" class="col-sm-3 control-label">Persona</label>
                            <div class="col-sm-6-select2">
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

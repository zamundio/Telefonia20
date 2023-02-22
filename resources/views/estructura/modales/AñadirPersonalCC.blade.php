<!-- Modal -->

<div class="modal fade" id="AñadirpersonalCC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <form id="AñadirpersonalCC_form" data-parsley-validate>
        <div class="modal-dialog modal-xl" style="width:1480px" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Añadir Personal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @csrf

                    @include('partials.form-error')
                    <div class="col-lg-12">


                        <div class="form-row">
                            <div class="form-group col-md-1">
                                <label for="Codigo">Codigo</label>

                                <input type="text" class="form-control" id="EMP_CODE" name="EMP_CODE" autocomplete="off" placeholder="" data-parsley-pattern="[0-9]{4}" data-parsley-pattern-message="El CC son 4 digitos" required data-parsley-type="alphanum" data-parsley-trigger="change" data-parsley-pextra="">

                            </div>
                            <div class="form-group col-md-4">
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control" id="FIRST_NAME" name="FIRST_NAME" autocomplete="off" placeholder="" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="Apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="LAST_NAME" name="LAST_NAME" autocomplete="off" placeholder="" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-3-DNI">
                                <label for="fechaalta">Fecha Alta</label>

                                <input id="HIRE_DATE" data-inputmask="'mask':  '99/99/9999'" name="HIRE_DATE" type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" autocomplete="off" value="" data-parsley-required="true" data-parsley-trigger="change">
                            </div>

                            <div class="form-group col-sm-3-DNI">
                                <label for="fechaalta">Fecha Baja</label>
                                <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" autocomplete="off" name="ACTUAL_LEAVE_DATE" id="ACTUAL_LEAVE_DATE">
                            </div>

                            <div class="form-group col-sm-3-DNI">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" id="EMP_GLOBAL_CODE" data-parsley-type="alphanum" data-parsley-dni="" data-parsley-trigger="change" autocomplete="off" value="">
                            </div>
                            <div class="form-group  col-sm-3-Email">
                                <label for="direccion">Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="EMAIL" id="EMAIL" data-parsley-type="email" autocomplete="off" value="">
                                </div>
                            </div>

                            <div class="form-group  col-sm-3half">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" style="width: 100px;" id="PHONE" name="PHONE" autocomplete="off" value="">
                            </div>

                            <div class="form-group  col-sm-3-Email">
                                <label for="selectDel">CC</label>
                                <select id="selectDel" name="EMP_COST_CENTER" id="EMP_COST_CENTER" data-live-search="true" data-parsley-required="true" autocomplete="off" class="form-control selectpicker" title="Seleccione Centro de Coste..." data-width="240px">

                                    @foreach($comboCC as $cc)

                                        <option value="{{ $cc->EMP_COST_CENTER }}">{{ $cc->COST_CENTER_DESC }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row">





                            </div>



                        </div>

                    </div>

                    <div class="form-row">



                        <div class="form-group col-lg-3">
                            <label for="direccion">Dirección</label>
                            <div class="input-group">
                                <input type="text" class="form-control  " id="HOME_ADDRESS" name="HOME_ADDRESS" value="">

                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->

                        <div class="form-group col-md-2">
                            <label for="poblacion">Poblacion</label>
                            <input type="text" class="form-control" id="HOME_CITY" name="HOME_CITY" value="">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="cp">CP</label>
                            <input type="text" class="form-control" id="HOME_POSTAL_CODE" data-parsley-pattern='^(^([0-9]{5,5})|^)$' data-parsley-trigger="change" data-parsley-pattern-message="Cp Incorrecto" name="HOME_POSTAL_CODE" value="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="provincia">Provincia</label>
                            <input type="text" class="form-control" id="HOME_STATE_CODE" name="HOME_STATE_CODE" value="">
                        </div>


                        <div class="form-group col-md-2">
                            <label for="abrev">Linea</label>
                            <input type="text" class="form-control" id="POSITION_TITLE" name="POSITION_TITLE" value="">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="zona">Equipo</label>
                            <input type="text" class="form-control" id="SUBAREA2" name=" SUBAREA2" value="">
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="wp">Workplace</label>
                            <input type="text" class="form-control" style="width: 190px;" id="SUBAREA3" name=" SUBAREA3" value="">
                        </div>
                      <div class="form-group form-inline">
                          <label for="last-extra" class="ml-5 mr-4 mb-2 text-uppercase font-weight-bold" style="font-size: 18px;">Última Alta Creada:</label>

                          <span class="badge badge-primary badge-large align-middle" style="font-size: 18px;">{{ $lastExtra->EMP_CODE }} {{ $lastExtra->LAST_NAME }} , {{ $lastExtra->FIRST_NAME }}</span>
                      </div>







    </form>

</div>
<div class="modal-footer">

    @include('includes.botones_crear_modales')
    {{-- <input type="submit" class="btn btn-default"></button> --}}

</div>
</div>
</div>
</form>
</div>
<script type="text/javascript">
    $formname = 'AñadirPersonal';

</script>

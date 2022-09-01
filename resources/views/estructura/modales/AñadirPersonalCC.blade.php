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
                            <div class="form-group col-md-2">
                                <label for="Codigo">Codigo</label>

                                <input type="text" class="form-control" id="Codigo" name="Codigo" placeholder="">

                            </div>
                            <div class="form-group col-md-4">
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control" id="Nombre" placeholder="" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="Apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="Apellidos" name="Apellidos" placeholder="" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-3-DNI">
                                <label for="fechaalta">Fecha Alta</label>

                                <input id="fechaalta" data-inputmask="'mask':  '99/99/9999'" name="fechaalta" type="text"  class="form-control datepicker" data-date-format="dd/mm/yyyy" autocomplete="off" value="" data-parsley-required="true" data-parsley-trigger="change">
                            </div>

                            <div class="form-group col-sm-3-DNI">
                                <label for="fechaalta">Fecha Baja</label>
                                <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy"  autocomplete="off" name="fechabaja" id="fechabaja">
                            </div>

                            <div class="form-group col-sm-3-DNI">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" id="dni" value="">
                            </div>
                            <div class="form-group  col-sm-3-Email">
                                <label for="direccion">Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="Email" value="">
                                </div>
                            </div>

                            <div class="form-group  col-sm-3half">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" style="width: 100px;" id="telefono" value="">
                            </div>

                            <div class="form-group  col-sm-3-Email">
                                <label for="selectDel">CC</label>
                                <select id="selectDel" name="selectDel" data-live-search="true" class="form-control selectpicker" title="Seleccione Centro de Coste..." data-width="240px">

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
                                <input type="text" class="form-control  " id="direccion" value="">

                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->

                        <div class="form-group col-md-2">
                            <label for="poblacion">Poblacion</label>
                            <input type="text" class="form-control" id="poblacion" value="">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="cp">CP</label>
                            <input type="text" class="form-control" id="cp" value="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="provincia">Provincia</label>
                            <input type="text" class="form-control" id="provincia" value="">
                        </div>


                        <div class="form-group col-md-2">
                            <label for="abrev">Linea</label>
                            <input type="text" class="form-control" id="linea" value="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="zona">Equipo</label>
                            <input type="text" class="form-control" id="zona" value="">
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="wp">Workplace</label>
                            <input type="text" class="form-control" style="width: 190px;" id="wp" value="">
                        </div>




    </form>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    {{-- <input type="submit" class="btn btn-default"></button> --}}

</div>
</div>
</div>
</form>
</div>
<script type="text/javascript">

</script>

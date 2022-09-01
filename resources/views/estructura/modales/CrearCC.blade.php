<!-- Modal -->

<div class="modal fade" id="CrearCC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <form id="CrearCC_form" data-parsley-validate>
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Centros de Coste</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @csrf
                    <div class="col-md-12  text-right">

                        <button type="button" name="añadir" id="añadir" class="btn btn-warning">Añadir</button>
                    </div>
                    <div class="col-md-12 mb-3">


                    </div>
                    @include('partials.form-error')
                    <div class="col-md-12">
                        <table class="table  table-striped table-bordered  table-hover yajra-datatable-CC" style="width:100%" id="CentrosdeCoste">
                            <thead>

                                <tr>
                                    <th>Codigo Centro</th>
                                    <th width="350%">Descripción</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>


                    </div>





    </form>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    {{-- <input type="submit" class="btn btn-default"></button> --}}

</div>
</div>
</div>
</form>
</div>
<script>

</script>

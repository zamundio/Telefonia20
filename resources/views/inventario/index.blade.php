@extends('layouts.admin')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
@section('content')
@can('estructura_show')

    <form id="estructura">
        <div class="container-fluid">
            <div class="row">

                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Inventario</h3>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="inventario">
                            <div class="card-body">

 <div class="table-responsive">
     <form class="form" id="formnuevasaltas" name="formnuevasaltas">
         <table id="inventario" class=" table table-bordered table-striped table-hover yajra-datatable-inventario">
             <thead>
                 <tr>

                     <th>

                        {{ trans('global.telefonia.fields.EMP_CODE') }}
                     </th>
                     <th>
                         {{ trans('global.telefonia.fields.LAST_NAME') }}
                     </th>
                     <th>
                         {{ trans('global.telefonia.fields.FIRST_NAME') }}
                     </th>
                     <th>
                         {{ trans('global.telefonia.fields.COST_CENTER_DESC') }}
                     </th>
                     <th>
                         {{ trans('global.telefonia.fields.HIRE_DATE') }}
                     </th>
                     <th>

                     </th>
                     <th>
                         {{ trans('global.telefonia.fields.POSITION_TITLE') }}
                     </th>
                     <th>
                         {{ trans('global.telefonia.fields.Linea') }}
                     </th>
                     <th>
                         {{ trans('global.telefonia.fields.Terminal') }}
                     </th>
                      <th>
                          {{ trans('global.telefonia.fields.Actual') }}
                      </th>
                     <th>

                     </th>
                 </tr>
             </thead>


             </tbody>
         </table>
     </form>
 </div>


                            </div>
                        </form>
                        <div class="card-footer text-center">

                        </div>
                    </div>
                </div>


    </form>

@endcan
@endsection

@role('administrator')

@else

@endrole

@section('scripts')
@parent
<script src="{{ asset("js/jquery.min.js") }}"></script>
<script src="{{ asset("js/jquery-ui.min.js") }}"></script>
<script src="{{ asset("js/jquery.ui.touch-punch-improved.js") }}"></script>
<script src="{{ asset("js/bootstrap.min.js") }}"></script>

<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>


<script src="{{ asset('js/inventario/index.js') }}"></script>

@endsection
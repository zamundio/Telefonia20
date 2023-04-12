@extends('layouts.admin')


</head>
@section('content')
<div class="content">
    <div class="container-2">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title">


                    </div>
                </div>
            </div>

            <div class="row">
                {{--   <div class="col-lg-1 col-sm-3">
                    <div class="circle-tile">
                        <a href="#">
                            <div class="circle-tile-heading orange">
                                <i class="fa fa-bell fa-fw fa-3x"></i>
                            </div>
                        </a>
                        <div class="circle-tile-content orange">
                            <div class="circle-tile-description text-faded">
                                NUEVAS ALTAS
                            </div>
                            <div class="circle-tile-number text-faded">
                                <div id="count-emp-code">{{ $nuevasaltas->count('EMP_CODE') }}</div>

        </div>
        <a href="#" onclick="ShowNorecep()" class="circle-tile-footer">Mas Info <i class="fa fa-chevron-circle-right"></i></a>
    </div>
</div>
</div> --}}
<div class="page-content page-container col-lg-11" id="page-content">

    <div class="padding">
        <div class="row container col-lg-10 d-flex justify-content-center">
            <div class="col-lg-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="padding">
                            <div class="table-responsive">
                                <form class="form" id="formcambioterminales" name="formcambioterminales">
                                    <table id="cambiosterminales" class=" table table-bordered table-striped table-hover yajra-datatable-cambioterminales">
                                        <thead>
                                            <tr>

                                                <th>
                                                    {{ trans('global.telefonia.fields.EMP_CODE') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.motivo') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.retorno') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.form_out') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.form_ok') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.fecha_pet') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.fecha_ent') }}
                                                </th>
                                                <th>
                                                    {{ trans('global.telefonia.fields.Obs') }}
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(document).ready(function () {
        console.log('En el ready');
        $('.select2').select2({
            // Activamos la opcion "Tags" del plugin
            width: 'resolve',
            ajax: {
                dataType: 'json',
                url: '{{ url("GetEstadosTerminales")}}',
                delay: 250,
                processResults: function processResults(data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.Estado,
                                id: item.Id
                            };
                        })
                    };
                },
                cache: true // processResults: function (data, page) {
                // return {
                // results: data
                // };
                // },

            }
        });

    });

</script>
<script src="{{ asset('js/cambios/index.js') }}"></script>

@endsection

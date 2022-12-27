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
                            <h3 class="card-title">Estructura</h3>
                            @can('ver_botones')
                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#CrearCC">
                                    Crear CC
                                </button>
                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#AñadirpersonalCC">
                                    Añadir Personal
                                </button>
                            @endcan
                            <button class="btn btn-primary" name='refrescar' id='refrescar'><span class="glyphicon glyphicon-refresh"></span> Refrescar</button>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="estructura">
                            <div class="card-body">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="busqueda_tree" autocomplete="off" autoplaceholder="Buscar..">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                                <div id="tree-container" class="demo" style="max-width: 430px;">
                                </div>

                            </div>
                        </form>
                        <div class="card-footer text-center">
@can('ver_botones')

                            <a href="{{ URL::route('ExportFacturacion') }}" class="tn btn-primary btn-sm float-left mr-1"> XLS Facturación</a>
                            <a href="{{ URL::route('ExportListadoSede') }}" class="tn btn-success btn-sm float-left  mr-1"> XLS Sede</a>
                            <a href="{{ URL::route('ExportListadoRed') }}" class="tn btn-warning btn-sm float-left  mr-1"> XLS Red</a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->

                        <div id="content2">

                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->

                @include('estructura.modales.CrearCC')
                @include('estructura.modales.AñadirPersonalCC')

    </form>

@endcan
@endsection

@role('administrator')

@else

@endrole

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>

<script src="{{ asset('js/estructura/index.js') }}"></script>





<script>
    var load_urlTree = "{{ route('ajaxFillStructTree.get') }}";




    $('#estructura').submit(function (e) {
        e.preventDefault();
        //do something
    });

</script>
@endsection

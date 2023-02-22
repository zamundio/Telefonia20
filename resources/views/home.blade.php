@extends('layouts.admin')


<link rel="stylesheet" href="{{ asset("css/lobilist.css") }}">
<link rel="stylesheet" href="{{ asset("css/style2.css") }}">
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
                <div class="col-lg-1 col-sm-3">
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
                </div>
                <div class="page-content page-container col-lg-11" id="page-content">
                    <div class="padding">
                        <div class="row container col-lg-10 d-flex justify-content-center">
                            <div class="col-lg-10 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="padding">
                                            <div class="table-responsive">
                                                <form class="form" id="formnuevasaltas" name="formnuevasaltas">
                                                    <table id="TablaNuevasAltas" class=" table table-bordered table-striped table-hover yajra-datatable-nuevasaltas">
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
                                                                    {{ trans('global.telefonia.fields.EMAIL') }}
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
                    <script src="{{ asset("js/jquery.min.js") }}"></script>
                    <script src="{{ asset("js/jquery-ui.min.js") }}"></script>
                    <script src="{{ asset("js/jquery.ui.touch-punch-improved.js") }}"></script>
                    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
                    <script src="{{ asset("js/lobilist.js") }}"></script>
                    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
                    <script src="{{ asset("js/lobibox.min.js") }}"></script>
                    <script src="{{ asset("js/demo.js") }}"></script>
                    <script src="{{ asset('js/home/index.js') }}"></script>
                    <script>

                    {{-- <script src="{{ asset('js/estructura/form.js') }}"></script> --}}



                    {{-- <script src="{{ asset('js/home/index.js') }}"></script> --}}
                    @endsection

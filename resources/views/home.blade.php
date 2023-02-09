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
                <div class="col-lg-2 col-sm-6">
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
                                {{ $nuevasaltas->count('EMP_CODE') }}
                            </div>
                            <a href="#" onclick="ShowNorecep()" class="circle-tile-footer">Mas Info <i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="page-content page-container col-lg-9" id="page-content">
                    <div class="padding">
                        <div class="row container d-flex justify-content-center">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">


                                        <div class="padding">
                                            <div class="table-responsive">
                                                <table id="NuevasAltas" class=" table table-bordered table-striped table-hover yajra-datatable-nuevasaltas" id="TablaNuevasAltas">
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



                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  <div class="row">
        <div class="col-lg-12">
            Home

        </div>
        <div id="lobilist-examples">
            <h1>Examples</h1>
            <hr>
            <!--Basic example-->
            <div>
                <div class="bs-example">
                    <h4>Basic example</h4>
                    <div id="todo-lists-basic-demo"></div>
                </div>
            </div>
            <!--Custom datepicker-->
            <div>
                <div class="bs-example">
                    <h4>Custom datepicker</h4>
                    <p>This example uses <a target="_blank" href="https://github.com/eternicode/bootstrap-datepicker">Bootstrap datepicker</a></p>
                    <div id="todo-lists-demo-datepicker"></div>
                </div>
            </div>
            <!--Event handling-->

        </div>
        </div>
    </div>
 --}}

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


            {{-- <script src="{{ asset('js/estructura/form.js') }}"></script> --}}



            {{-- <script src="{{ asset('js/home/index.js') }}"></script> --}}
            @endsection

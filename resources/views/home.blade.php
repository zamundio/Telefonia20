@extends('layouts.admin')


<link rel="stylesheet" href="{{ asset("css/lobilist.css") }}">
<link rel="stylesheet" href="{{ asset("css/style2.css") }}">
     </head>
@section('content')
<div class="content">
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


  {{-- <script src="{{ asset('js/estructura/form.js') }}"></script> --}}



{{-- <script src="{{ asset('js/home/index.js') }}"></script> --}}
@endsection
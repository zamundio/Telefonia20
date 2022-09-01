
 @if(session('mensaje'))

<div class="alert alert-success alert-dismissible" data-auto-dissmiss="3000" id="msgs">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Mensaje Sistema</h5>

    <li>{{session('mensaje')}}</li>
</div>

@endif


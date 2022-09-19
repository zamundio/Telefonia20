@if($errors->any())

<div class="alert alert-danger alert-dismissible" data-auto-dissmiss="3000">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Alerta!</h5>
@foreach($errors->all() as $error)
   <li>{{$error}}</li>
@endforeach
</div>
$errors=null;
@endif

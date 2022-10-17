   <div id="Terminal_User_Modal_Crear" class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Crear Terminal</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">

                   @include('includes.form-error')

                   <div class="alert alert-danger print-error-msg" style="display:none">
                       <ul></ul>
                   </div>


                   <form id="terminales_users_crear_form" data-parsley-validate>
                       @csrf
                       <div class="form-group col-sm-9">
                           <label for="type" class="col-sm-3 control-label">Modelo</label>
                           <div class=" col-sm-6-select2">
                               <select name="modelo" id="modelo" class="form-control select2-hidden-accessible" data-width="160%" data-parsley-required="true" data-parsley-trigger="change">
                                   <option>-- Modelo --</option>
                               </select>
                           </div>
                       </div>
                       <div class="form-group col-md-6">
                           <label for="ns_crear"> NS: </label>
                           <input type="text" class="form-control" id="ns_crear" name="ns_crear" autocomplete="off" data-parsley-type="alphanum" data-parsley-trigger="change">
                       </div>
                       <div class="form-group col-md-6">
                           <label for="imei_crear"> IMEI </label>
                           <input type="text" class="form-control" id="imei_crear" name="imei_crear" autocomplete="off" data-parsley-type="digits" data-parsley-trigger="change">
                       </div>
                       <div class="form-group col-sm-9" id="HiddenFields1_crear">
                           <div class="col-sm-6">
                               <label for="usuarioact">Asignar a Seleccion?</label>
                               <input type="checkbox" id="toggle-usuarioctual_crear" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">

                           </div>

                       </div>
                       <div class="form-group col-sm-6" id="HiddenFields2_crear">
                           <div class="col-sm-6">
                               <label for="termact">Terminal Actual ?</label>
                               <input type="checkbox" id="toggle-termactual_crear" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Si" data-off="No">
                           </div>
                       </div>
                       <div class="form-group col-sm-12" id="HiddenFields3_crear">
                           <div class="col-sm-12">
                               <label for="obs">Observaciones</label>
                               <textarea type="text" class="form-control" rows="2" id="obs_crear"></textarea>
                           </div>

                       </div>

                       <div class="form-group col-sm-9">
                           @include('includes.botones_crear_modales')
                       </div>
                   </form>

               </div>
           </div>
       </div>

   </div>
   <script>
       $(document).ready(function () {
           $('#HiddenFields2_crear').hide();
           $('#HiddenFields3_crear').hide();
           $('#toggle-usuarioctual_crear').bootstrapToggle('off');
           $('#toggle-termactual_crear').bootstrapToggle('on');
           $('#terminales_users_crear_form').parsley();


           $('#modelo').select2({
               placeholder: "Seleccione Modelo",
               allowClear: false,
               // Activamos la opcion "Tags" del plugin
               width: 'resolve',
               language: "es",
               ajax: {
                   dataType: 'json',
                   url: '{{ url("GetPoolModelos") }}',
                   delay: 100,
                   processResults: function (data) {

                       return {
                           results: $.map(data, function (item) {

                               return {
                                   text: item.Terminal,
                                   id: item.id
                               }
                           })
                       };
                   },
                   cache: true
                   // processResults: function (data, page) {

                   // return {
                   // results: data
                   // };
                   // },
               }
           });
       });


       $('#toggle-usuarioctual_crear').change(function () {
           if ($(this).is(":checked")) {
               $('#HiddenFields2_crear').show();
               $('#HiddenFields3_crear').show();
               $('#HiddenFields3_crear').show();
               // $("#toggle-solodatos_tarj").bootstrapToggle('off');



           } else {
               $('#HiddenFields2_crear').hide();
               $('#HiddenFields3_crear').hide();
           }

           console.log($(this).is(":checked"));


       });

       $("#Terminal_User_Modal_Crear").submit(function (e) {
           e.preventDefault();
           terminal_movil_id = "";
           $obs=$('#obs_crear').val();
           $terminal = $('#modelo').val();
           $nserie = $('#ns_crear').val();
           $imei = $('#imei_crear').val();
           $asignar = $('#toggle-usuarioctual_crear').is(":checked");
           $actual = $('#toggle-termactual_crear').is(":checked");
             console.log($actual);
           if ($actual==true) {

               $CheckActual = "1"
           } else{
               $CheckActual = "0"
           }
           if ($asignar==true) {

               $estado = "1"
           }else {
               $estado = "2"
           }
           console.log('Antes de validate');
           console.log($CheckActual);
           if ($('#terminales_users_crear_form').parsley().isValid()) {

               // MaestraTerminales
               $.ajax({
                   url: 'CrearTerminal',
                   type: 'PUT',
                    async: false,
                   data: {
                       IdTerminal: $terminal,
                       Nserie: $nserie,
                       IMEI: $imei,
                       Estado: $estado
                   },
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   dataType: "json",
                   beforeSend: function () {
                       $('#submit_crear_term').attr('disabled', 'disabled');
                       $('#submit_crear_term').val('Enviando...');
                   },
                   success: function (data) {
                       terminal_movil_id = data.id;
                       $('#terminales_users_crear_form')[0].reset();
                       $('#terminales_users_crear_form').parsley().reset();
                       $('#submit_crear_term').removeAttr('disabled');
                       $('#submit_crear_term').val('Enviar');
                       if ($.isEmptyObject(data.error)) {

                           $('#terminales_users_crear_form')[0].reset();
                           $('#terminales_users_crear_form').parsley().reset();
                           $('#Terminal_User_Modal_Crear').modal('hide')

                      HelperNotificaciones.notificaciones('Terminal Creado con exito', 'Telefonia', 'success');

                        $table_terminales.ajax.reload();

                       } else {
                           HelperPrintMsg.printErrorMsg(data.error);
                       }
                   },
                   error: function (xhr, ajaxOptions, thrownError) {
                       alert(xhr.status);
                       alert(thrownError);
                   }
               });
               // TerminalesUsuarios_Actual

               if ($asignar) {

                console.log($asignar);
                 console.log(terminal_movil_id);
                   $.ajax({
                       url: 'terminalesusuarios/asigncreated',
                       type: 'POST',
                       data: {
                           linea_usuario_id: nummovil,
                           terminal_movil_id: terminal_movil_id,
                           Observaciones: $obs,
                           Actual: $CheckActual,


                       },
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                       dataType: "json",

                       success: function (data) {

                           if ($.isEmptyObject(data.error)) {
                               $('#Terminal_User_Modal_Crear').modal('hide')

                               HelperNotificaciones.notificaciones('Terminal Asignado con exito', 'Telefonia', 'warning');

                              $table_terminales.ajax.reload();

                           } {
                               HelperPrintMsg.printErrorMsg(data.error);
                           }
                       }
                   });

               }



           } else {


           };
       });

   </script>

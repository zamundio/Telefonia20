$(function () {



var user = "{{ Auth::user()->hasRole('administrator') }}";

$table = new $(".yajra-datatable-inventario").DataTable({
     language: {
         url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
     },
     ajax: {
         url: "InventarioDatatable",
         type: "get"
     },
     serverSide: false,
     processing: false,
     success: function success(result) {
         if (result.errors) {
             $.each(result.errors, function (key, value) {
                 console.log(" errores") + value;
             });
         } else {
             console.log("sin errores");
         }
     },
     error: function error(data) {
         // Something went wrong
         // HERE you can handle asynchronously the response
         // Log in the console
         var errors = data.responseJSON;
         console.log(errors);
     },
     pageLength: 15,
     buttons: [],
     columnDefs: [{
         width: "1%",
         targets: [0]
     }, {
         width: "4%",
         targets: [1]
     }, {
         width: "1%",
         targets: [2]
     }, {
         width: "3%",
         targets: [3]
     }, {
         width: "1%",
         targets: [4]

     }, {
         width: "1%",
         targets: [5]
     }, {
         width: "6%",
         targets: [6]
     }, {
         className: "dt-center",
         width: "1%",
         targets: [7],


     }, {
         className: "dt-center",
         width: "1%",
         targets: [8],

     }, {
         "width": "1%",
         "targets": [9]
     },
    {
        "width": "1%",
        "targets": [10]
    }],




     columns: [{
         data: "EMP_CODE",
         name: "EMP_CODE"
     }, {
         data: "LAST_NAME",
         name: "LAST_NAME"
     }, {
         data: "FIRST_NAME",
         name: "FIRST_NAME"
     }, {
         data: "COST_CENTER_DESC",
         name: "COST_CENTER_DESC"
     }, {
         data: "HIRE_DATE",
         name: "HIRE_DATE"
     }, {
         data: "ACTUAL_LEAVE_DATE",
         name: "ACTUAL_LEAVE_DATE"
     }, {
         data: "POSITION_TITLE",
         name: "POSITION_TITLE"
     }, {
         data: "num_movil",
         name: "NUM_MOVIL"
     }, {
         data: "terminal",
         name: "TERMINAL"
     },
     {
         data: "Actual",
         name: "actual",
         render: function (d) {
                 if (d == 1) {
                     return '<span class="badge badge-primary  center-block">SI</span>';
                 } else {
                     return '<span class="badge badge-danger  center-block">NO</span>';
                 }
                }
     },




     {
         data: 'action',
         name: 'action'
     }]
 });


});

<?php

use App\Http\Controllers\MaestrasController;

Route::redirect('/', 'admin/home');

Auth::routes(['register' => false]);

// Change Password Routes...
// Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('nuevasaltas', 'MaestrasController@NuevasAltasIndex')->name('nuevasaltas');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
});

Route::get('ajaxFillStructTree', 'AjaxController@ajaxFillStrucTree')->name('ajaxFillStructTree.get');
Route::get('ajaxGetNodeInfoStructTree', 'AjaxController@ajaxGetNodeInfoStructTree')->name('ajaxGetNodeInfoStructTree');
Route::get('estructura', 'TreeEstructuraController@index')->name('estructura.index');
Route::get('checkcc', 'MaestrasController@CheckCC')->name('checkcc');
Route::get('checkpe', 'PersonalExtraController@CheckPE')->name('checkpe');
Route::post('guardarcc', 'MaestrasController@GuardarCC')->name('guardarcc');

Route::get('estructura/printPreview/{id}', 'PrintController@PrintPreview');
/* Datatables*/
Route::get('LineasDatatable', 'EstructuraController@ShowLinea')->name('LineasDatatable');
Route::delete('lineas/{id}/eliminar', 'LineaUsuarioController@eliminar')->name('eliminar_linea');
Route::get('lineas/{id}/editar', 'LineaUsuarioController@editar')->name('editar_linea');
Route::post('lineas', 'LineaUsuarioController@guardar')->name('GuardarLinea');
Route::put('lineas/{abrev}', 'LineaUsuarioController@actualizar')->name('ActualizarLinea');
Route::delete('nuevasaltas/eliminar/{id}', 'MaestrasController@eliminar_nueva_alta')-> name('eliminar_nueva_alta');
Route::get('CentrosdeCoste', 'MaestrasController@DT_CentrosdeCoste')->name('CentrosdeCoste');
Route::post('submit_form_añadirpersonal', 'PersonalExtraController@store')->name('guardarpersonal');


Route::get('AmpliacionesDatatable', 'LineaUsuarioController@ShowAmpliaciones')->name('AmpliacionesDatatable');
Route::get('ampliaciongb/crear', 'AmpliacionesGBController@crear')->name('AñadirAmpliacion');
Route::delete('ampliaciongb/{id}/eliminar', 'AmpliacionesGBController@eliminar')->name('eliminar_ampliacion');
Route::get('ampliaciongb/{id}/editar', 'AmpliacionesGBController@editar')->name('editar_ampliacion');
Route::put('ampliaciongb/{id}', 'AmpliacionesGBController@actualizar')->name('actualizar_ampliacion');

Route::get('TerminalesDatatable', 'LineaUsuarioController@ShowTerminalesUser')->name('TerminalesDatatable');
Route::post('terminalesusuarios/asigncreated', 'TerminalesUserController@AsignarTerminal')->name('AsignExistTerminalesUsuarios');
Route::put('terminalesusuarios/{id}/ActEstado', 'TerminalesUserController@actestado')->name('ActEstado_terminalusuario');
Route::get('terminalesusuarios/{id}/editar', 'TerminalesUserController@editar')->name('editar_terminalusuario');
Route::put('terminalesusuariosEstado/{estado}', 'TerminalesUserController@actualizarEstado')->name('actualizar_terminalusuarioEstado');
Route::put('terminalesusuarios/{id}', 'TerminalesUserController@actualizar')->name('actualizar_terminalusuario');
Route::get('GetEstadosTerminales', 'MaestrasController@Estadoterminales')->name('GetEstadosTerminales');



Route::get('TerminalesHistDatatable', 'HistoricoTerminalesUserController@ShowHistTerminalesUser')->name('TerminalesHistDatatable');


/*RUTAS Estructura -Modal Terminales*/
Route::get('fillTerminalesPool', 'TerminalesMovilController@GetPoolterminales')->name('fillTerminalesPool');
Route::get('GetPoolFilteredSel/{id?}', 'TerminalesMovilController@GetPoolFilteredSel')->name('GetPoolFilteredSel');
Route::get('GetPoolModelos', 'TerminalesMovilController@GetPoolModelos')->name('GetPoolModelos');
/*RUTAS Terminales*/
route::get('modelosterminales', 'ModelosTerminalesController@index')->name('modelosterminales');
Route::get('terminales/crear', 'ModelosTerminalesController@crear')->name('crear_terminal');

Route::post('terminales', 'ModelosTerminalesController@guardar')->name('guardar_terminal');
Route::get('terminales/{id}/editar', 'ModelosTerminalesController@editar')->name('editar_terminal');
Route::put('terminales/{id}', 'ModelosTerminalesController@actualizar')->name('actualizar_terminal');
Route::get('terminales/resumen', 'ResumenTerminalesController@resumen')->name('resumen_terminales');
Route::get('ajax-sesion', 'ResumenTerminalesController@GetTablaEstado')->name('resumen_getEstado');
Route::get('inventarioterminalesuser/{id}', 'inventarioterminaluserController@index')->name('terminales-user-table');
route::get('terminales_user', 'TerminalesUsersDatatableController@index')->name('terminales_user');
Route::put('CrearTerminal', 'MaestrasController@CrearTerminal')->name('CrearTerminal');
Route::put('EditarTerminal/{id?}', 'MaestrasController@EditarTerminal')->name('EditarTerminal');

route::get('TarjetasDatatable', 'LineaUsuarioController@ShowTarjetas')->name('TarjetasDatatable');
Route::post('tarjetasusuarios/{id}', 'TarjetaLineaController@guardar')->name('crear_tarjetalinea');
Route::get('tarjetasusuarios/{id}/editar', 'TarjetaLineaController@editar')->name('editar_tarjeta');
Route::put('tarjetasusuarios/{id}', 'TarjetaLineaController@actualizar')->name('actualizar_tarjeta');
Route::delete('tarjetasusuarios/{id}/eliminar', 'TarjetaLineaController@eliminar')->name('eliminar_tarjeta');


/* Maestras*/
Route::get('GetPlanGB', 'MaestrasController@PlanGBindex')->name('GetPlanGB');
Route::get('GetPlanDatos', 'MaestrasController@PlanDatosindex')->name('GetPlanDatos');
Route::get('ExportFacturacion', 'ListadosController@exportfacturacion')->name('ExportFacturacion');
Route::get('ExportListadoSede', 'ListadosController@exportListadoSede')->name('ExportListadoSede');
Route::get('ExportListadoRed', 'ListadosController@exportListadoRed')->name('ExportListadoRed');

/* Send Notifications*/


Route::get('/send', '\App\Http\Controllers\HomeController@send')->name('home.send');

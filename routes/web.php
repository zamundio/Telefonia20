<?php

use App\Http\Controllers\MaestrasController;

Route::redirect('/', 'admin/home');

Auth::routes(['register' => false]);

// Change Password Routes...
// Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
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
/* Datatables*/
Route::get('LineasDatatable', 'EstructuraController@ShowLinea')->name('LineasDatatable');
Route::delete('lineas/{id}/eliminar', 'LineaUsuarioController@eliminar')->name('eliminar_linea');
Route::get('lineas/{id}/editar', 'LineaUsuarioController@editar')->name('editar_linea');
Route::post('lineas', 'LineaUsuarioController@guardar')->name('GuardarLinea');


route::get('TarjetasDatatable', 'LineaUsuarioController@ShowTarjetas')->name('TarjetasDatatable');



Route::get('CentrosdeCoste','MaestrasController@DT_CentrosdeCoste')->name('CentrosdeCoste');
Route::post('submit_form_añadirpersonal','PersonalExtraController@store')->name('guardarpersonal');

Route::post('tarjetasusuarios/{id}', 'TarjetaLineaController@guardar')->name('crear_tarjetalinea');
Route::delete('tarjetasusuarios/{id}/eliminar', 'TarjetaLineaController@eliminar')->name('eliminar_tarjeta');


Route::get('ExportFacturacion', 'ListadosController@exportfacturacion')->name('ExportFacturacion');
Route::get('ExportListadoSede', 'ListadosController@exportListadoSede')->name('ExportListadoSede');
Route::get('ExportListadoRed', 'ListadosController@exportListadoRed')->name('ExportListadoRed');
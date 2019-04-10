<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () 
{
    Route::get('listado', 'UserController@index')->name('users.index');
    Route::get('informeEstados', 'HomeController@informeEstados')->name('informeEstados');
    Route::get('informeLocalidades', 'HomeController@informeLocalidades')->name('informeLocalidades');
    Route::get('informeSectores', 'HomeController@informeSectores')->name('informeSectores');
    Route::get('informeDptos', 'HomeController@informeDptos')->name('informeDptos');
    Route::get('settings', 'UserController@settings')->name('settings');

    Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
    Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
    Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')->middleware('permission:roles.show');
    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');
    

    Route::resource('provincia','ProvinciaController');
    Route::resource('zona','ZonaController');

    Route::resource('departamento','DepartamentoController');
    Route::resource('banco','BancoController');
    Route::resource('estado','EstadoController');
    Route::resource('sector','SectorController');
    Route::resource('garantia','GarantiaController');
    Route::resource('estadoCivil','EstadoCivilController');
    Route::resource('destinoCredito','DestinoCreditoController');
    Route::resource('estadoInterno','EstadoInternoController');
    Route::resource('figuraLegal','FiguraLegalController');
    //Route::resource('lineaCredito','LineaCreditoController');
    Route::resource('periodicidad','PeriodicidadController');
    //Route::resource('sujetoCredito','SujetoCreditoController');

    


    Route::resource('auditoria','AuditoriaController');


    Route::group(['prefix' => 'movimiento'], function () {
        Route::get('listado', 'MovimientoController@index')->name('movimiento.index')->middleware('permission:movimiento.index');
        Route::get('nuevo', 'MovimientoController@create')->name('movimiento.create')->middleware('permission:movimiento.create');
        Route::post('nuevo', 'MovimientoController@store')->name('movimiento.store')->middleware('permission:movimiento.store');
        Route::get('editar/{movimiento}', 'MovimientoController@edit')->name('movimiento.edit')->middleware('permission:movimiento.edit');
        Route::get('ver/{movimiento}', 'MovimientoController@show')->name('movimiento.show')->middleware('permission:movimiento.show');
        Route::patch('editar/{movimiento}', 'MovimientoController@update')->name('movimiento.update')->middleware('permission:movimiento.update');
        Route::get('eliminar/{movimiento}', 'MovimientoController@destroy')->name('movimiento.delete')->middleware('permission:movimiento.delete');
        Route::post('anexoProyecto/export', 'MovimientoController@index')->name('movimiento.export')->middleware('permission:movimiento.export');
        Route::get('deleteAjax','MovimientoController@deleteAjax')->name('movimiento.deleteAjax')->middleware('permission:movimiento.deleteAjax');
        Route::get('removedata', 'MovimientoController@removedata')->name('movimiento.removedata')->middleware('permission:movimiento.removedata');
    });


    Route::group(['prefix' => 'anexoProyecto'], function () {
        Route::get('listado', 'AnexoProyectoController@index')->name('anexoProyecto.index')->middleware('permission:anexoProyecto.index');
        Route::get('nuevo', 'AnexoProyectoController@create')->name('anexoProyecto.create')->middleware('permission:anexoProyecto.create');
        Route::post('nuevo', 'AnexoProyectoController@store')->name('anexoProyecto.store')->middleware('permission:anexoProyecto.store');
        Route::get('editar/{anexoProyecto}', 'AnexoProyectoController@edit')->name('anexoProyecto.edit')->middleware('permission:anexoProyecto.edit');
        Route::get('ver/{anexoProyecto}', 'AnexoProyectoController@show')->name('anexoProyecto.show')->middleware('permission:anexoProyecto.show');
        Route::patch('editar/{anexoProyecto}', 'AnexoProyectoController@update')->name('anexoProyecto.update')->middleware('permission:anexoProyecto.update');
        Route::get('eliminar/{anexoProyecto}', 'AnexoProyectoController@destroy')->name('anexoProyecto.delete')->middleware('permission:anexoProyecto.delete');
        Route::post('anexoProyecto/export', 'AnexoProyectoController@index')->name('anexoProyecto.export')->middleware('permission:anexoProyecto.export');
        Route::get('deletefile/{slug}', 'AnexoProyectoController@deletefile')->name('anexoProyecto.deletefile')->middleware('permission:anexoProyecto.deletefile');

    });
    Route::group(['prefix' => 'sujetoCredito'], function () {
        Route::get('listado', 'SujetoCreditoController@index')->name('sujetoCredito.index')->middleware('permission:sujetoCredito.index');
        Route::get('nuevo', 'SujetoCreditoController@create')->name('sujetoCredito.create')->middleware('permission:sujetoCredito.create');
        Route::post('nuevo', 'SujetoCreditoController@store')->name('sujetoCredito.store')->middleware('permission:sujetoCredito.store');
        Route::get('editar/{sujetoCredito}', 'SujetoCreditoController@edit')->name('sujetoCredito.edit')->middleware('permission:sujetoCredito.edit');
        Route::get('ver/{sujetoCredito}', 'SujetoCreditoController@show')->name('sujetoCredito.show')->middleware('permission:sujetoCredito.show');
        Route::patch('editar/{sujetoCredito}', 'SujetoCreditoController@update')->name('sujetoCredito.update')->middleware('permission:sujetoCredito.update');
        Route::get('eliminar/{sujetoCredito}', 'SujetoCreditoController@destroy')->name('sujetoCredito.delete')->middleware('permission:sujetoCredito.delete');
        Route::post('anexoProyecto/export', 'SujetoCreditoController@index')->name('sujetoCredito.export')->middleware('permission:sujetoCredito.export');
        Route::post('updateAjax', 'SujetoCreditoController@updateAjax')->name('sujetoCredito.updateAjax')->middleware('permission:sujetoCredito.updateAjax');
        Route::post('search', 'SujetoCreditoController@search')->name('sujetoCredito.search')->middleware('permission:sujetoCredito.search');
        Route::get('removedata', 'SujetoCreditoController@removedata')->name('sujetoCredito.removedata')->middleware('permission:sujetoCredito.removedata');

    });
    Route::group(['prefix' => 'proyecto'], function () {
            Route::get('listado', 'ProyectoController@index')->name('proyecto.index')->middleware('permission:proyecto.index');
            Route::get('excel', 'ProyectoController@excel')->name('proyecto.excel');
            Route::get('nuevo', 'ProyectoController@create')->name('proyecto.create')->middleware('permission:proyecto.create');
            Route::post('nuevo', 'ProyectoController@store')->name('proyecto.store')->middleware('permission:proyecto.store');

            Route::post('search', 'ProyectoController@search')->name('proyecto.search')->middleware('permission:proyecto.search');

            Route::get('editar/{proyecto}', 'ProyectoController@edit')->name('proyecto.edit')->middleware('permission:proyecto.edit');
            Route::get('editar1/{id}', 'ProyectoController@editar')->name('proyecto.editar')->middleware('permission:proyecto.editar');
            Route::get('ver/{proyecto}', 'ProyectoController@show')->name('proyecto.show')->middleware('permission:proyecto.show');
            Route::get('filtrar/{estado}', 'ProyectoController@filtrar')->name('proyecto.filtrar')->middleware('permission:proyecto.filtrar');
            Route::patch('editar/{proyecto}', 'ProyectoController@update')->name('proyecto.update')->middleware('permission:proyecto.update');
            Route::get('eliminar/{proyecto}', 'ProyectoController@destroy')->name('proyecto.delete')->middleware('permission:proyecto.delete');
            // Display view
            Route::get('datatable', 'ProyectoController@datatable')->name('proyecto.datatable');
            // Get Data
            Route::get('getdata', 'ProyectoController@getPosts')->name('proyecto.getdata');
    });

    Route::group(['prefix' => 'refinanciacion'], function () {
            Route::get('listado', 'RefinanciacionController@index')->name('refinanciacion.index')->middleware('permission:refinanciacion.index');
            Route::get('nuevo', 'RefinanciacionController@create')->name('refinanciacion.create')->middleware('permission:refinanciacion.create');
            Route::get('nueva/{id}', 'RefinanciacionController@create1')->name('refinanciacion.create1')->middleware('permission:refinanciacion.create1');
            Route::post('nuevo', 'RefinanciacionController@store')->name('refinanciacion.store')->middleware('permission:refinanciacion.store');
            Route::get('editar/{refinanciacion}', 'RefinanciacionController@edit')->name('refinanciacion.edit')->middleware('permission:refinanciacion.edit');
            Route::get('editar1/{id}', 'RefinanciacionController@editar')->name('refinanciacion.editar')->middleware('permission:refinanciacion.editar');
            Route::get('ver/{refinanciacion}', 'RefinanciacionController@show')->name('refinanciacion.show')->middleware('permission:refinanciacion.show');
            Route::patch('editar/{refinanciacion}', 'RefinanciacionController@update')->name('refinanciacion.update')->middleware('permission:refinanciacion.update');
            Route::get('eliminar/{refinanciacion}', 'RefinanciacionController@destroy')->name('refinanciacion.delete')->middleware('permission:refinanciacion.delete');
    });




    Route::group(['prefix' => 'columnasexcel'], function () {
            Route::get('listado', 'ColumnasexcelController@index')->name('columnasexcel.index')->middleware('permission:columnasexcel.index');
            Route::get('nuevo', 'ColumnasexcelController@create')->name('columnasexcel.create')->middleware('permission:columnasexcel.create');
            Route::get('nueva/{id}', 'ColumnasexcelController@create1')->name('columnasexcel.create1')->middleware('permission:columnasexcel.create1');
            Route::post('nuevo', 'ColumnasexcelController@store')->name('columnasexcel.store')->middleware('permission:columnasexcel.store');
            Route::get('editar/{columnasexcel}', 'ColumnasexcelController@edit')->name('columnasexcel.edit')->middleware('permission:columnasexcel.edit');
            Route::get('editar1/{id}', 'ColumnasexcelController@editar')->name('columnasexcel.editar')->middleware('permission:columnasexcel.editar');
            Route::get('ver/{columnasexcel}', 'ColumnasexcelController@show')->name('columnasexcel.show')->middleware('permission:columnasexcel.show');
            Route::patch('editar/{columnasexcel}', 'ColumnasexcelController@update')->name('columnasexcel.update')->middleware('permission:columnasexcel.update');
            Route::get('eliminar/{columnasexcel}', 'ColumnasexcelController@destroy')->name('columnasexcel.delete')->middleware('permission:columnasexcel.delete');
    });


    Route::group(['prefix' => 'columnasview'], function () {
            Route::get('listado', 'ColumnasviewController@index')->name('columnasview.index')->middleware('permission:columnasview.index');
            Route::get('nuevo', 'ColumnasviewController@create')->name('columnasview.create')->middleware('permission:columnasview.create');
            Route::get('nueva/{id}', 'ColumnasviewController@create1')->name('columnasview.create1')->middleware('permission:columnasview.create1');
            Route::post('nuevo', 'ColumnasviewController@store')->name('columnasview.store')->middleware('permission:columnasview.store');
            Route::get('editar/{columnasview}', 'ColumnasviewController@edit')->name('columnasview.edit')->middleware('permission:columnasview.edit');
            Route::get('editar1/{id}', 'ColumnasviewController@editar')->name('columnasview.editar')->middleware('permission:columnasview.editar');
            Route::get('ver/{columnasview}', 'ColumnasviewController@show')->name('columnasview.show')->middleware('permission:columnasview.show');
            Route::patch('editar/{columnasview}', 'ColumnasviewController@update')->name('columnasview.update')->middleware('permission:columnasview.update');
            Route::get('eliminar/{columnasview}', 'ColumnasviewController@destroy')->name('columnasview.delete')->middleware('permission:columnasview.delete');
    });



    Route::group(['prefix' => 'titular'], function () {
            Route::get('listado', 'TitularController@index')->name('titular.index')->middleware('permission:titular.index');
            Route::get('nuevo', 'TitularController@create')->name('titular.create')->middleware('permission:titular.create');
            Route::get('nueva/{id}', 'TitularController@create1')->name('titular.create1')->middleware('permission:titular.create1');
            Route::post('nuevo', 'TitularController@store')->name('titular.store')->middleware('permission:titular.store');
            Route::get('editar/{titular}', 'TitularController@edit')->name('titular.edit')->middleware('permission:titular.edit');
            Route::get('editar1/{id}', 'TitularController@editar')->name('titular.editar')->middleware('permission:titular.editar');
            Route::get('ver/{titular}', 'TitularController@show')->name('titular.show')->middleware('permission:titular.show');
            Route::patch('editar/{titular}', 'TitularController@update')->name('titular.update')->middleware('permission:titular.update');
            Route::get('eliminar/{titular}', 'TitularController@destroy')->name('titular.delete')->middleware('permission:titular.delete');
            Route::get('removedata', 'TitularController@removedata')->name('titular.removedata')->middleware('permission:titular.removedata');
    });

    Route::group(['prefix' => 'alerta'], function () {
            Route::get('listado', 'AlertaController@index')->name('alerta.index')->middleware('permission:alerta.index');
            Route::get('nuevo', 'AlertaController@create')->name('alerta.create')->middleware('permission:alerta.create');
            Route::post('nuevo', 'AlertaController@store')->name('alerta.store')->middleware('permission:alerta.store');
            Route::get('editar/{alerta}', 'AlertaController@edit')->name('alerta.edit')->middleware('permission:alerta.edit');
            Route::get('ver/{alerta}', 'AlertaController@show')->name('alerta.show')->middleware('permission:alerta.show');
            Route::patch('editar/{alerta}', 'AlertaController@update')->name('alerta.update')->middleware('permission:alerta.update');
            Route::get('eliminar/{alerta}', 'AlertaController@destroy')->name('alerta.delete')->middleware('permission:alerta.delete');
    });

    Route::group(['prefix' => 'checklist'], function () {
            Route::get('listado', 'ChecklistController@index')->name('checklist.index');
            Route::get('nuevo', 'ChecklistController@create')->name('checklist.create');
            Route::post('nuevo', 'ChecklistController@store')->name('checklist.store');
            Route::get('editar/{checklist}', 'ChecklistController@edit')->name('checklist.edit');
            Route::get('ver/{checklist}', 'ChecklistController@show')->name('checklist.show');
            Route::patch('editar/{checklist}', 'ChecklistController@update')->name('checklist.update');
            Route::get('eliminar/{checklist}', 'ChecklistController@destroy')->name('checklist.delete');
    });

    Route::group(['prefix' => 'sucursal'], function () {
        Route::get('listado', 'SucursalController@index')->name('sucursal.index')->middleware('permission:sucursal.index');
        Route::get('nuevo', 'SucursalController@create')->name('sucursal.create')->middleware('permission:sucursal.create');
        Route::post('nuevo', 'SucursalController@store')->name('sucursal.store')->middleware('permission:sucursal.store');
        Route::get('editar/{sucursal}', 'SucursalController@edit')->name('sucursal.edit')->middleware('permission:sucursal.edit');
        Route::get('ver/{sucursal}', 'SucursalController@show')->name('sucursal.show')->middleware('permission:sucursal.show');
        Route::patch('editar/{sucursal}', 'SucursalController@update')->name('sucursal.update')->middleware('permission:sucursal.update');
        Route::get('eliminar/{sucursal}', 'SucursalController@destroy')->name('sucursal.delete')->middleware('permission:sucursal.delete');
    });

    Route::group(['prefix' => 'desembolso'], function () {
            Route::get('listado', 'DesembolsoController@index')->name('desembolso.index')->middleware('permission:desembolso.index');
            Route::get('nuevo', 'DesembolsoController@create')->name('desembolso.create')->middleware('permission:desembolso.create');
            Route::post('nuevo', 'DesembolsoController@store')->name('desembolso.store')->middleware('permission:desembolso.store');
            Route::get('editar/{desembolso}', 'DesembolsoController@edit')->name('desembolso.edit')->middleware('permission:desembolso.edit');
            Route::get('ver/{desembolso}', 'DesembolsoController@show')->name('desembolso.show')->middleware('permission:desembolso.show');
            Route::patch('editar/{desembolso}', 'DesembolsoController@update')->name('desembolso.update')->middleware('permission:desembolso.update');
            Route::post('updateAjax', 'DesembolsoController@updateAjax')->name('desembolso.updateAjax')->middleware('permission:desembolso.updateAjax');
            Route::get('eliminar/{desembolso}', 'DesembolsoController@destroy')->name('desembolso.delete')->middleware('permission:desembolso.delete');
            Route::post('search', 'DesembolsoController@search')->name('desembolso.search')->middleware('permission:desembolso.search');
            Route::get('removedata', 'DesembolsoController@removedata')->name('desembolso.removedata')->middleware('permission:desembolso.removedata');
    });
    Route::get('desembolso', 'DesembolsoController@desembolsoEdit');
    Route::resource('desembolso','DesembolsoController',['parameters'=> ['desembolso'=>'id']]);


    Route::group(['prefix' => 'localidad'], function () {
            Route::get('listado', 'LocalidadController@index')->name('localidad.index')->middleware('permission:localidad.index');
            Route::get('nuevo', 'LocalidadController@create')->name('localidad.create')->middleware('permission:localidad.create');
            Route::post('nuevo', 'LocalidadController@store')->name('localidad.store')->middleware('permission:localidad.store');
            Route::get('editar/{localidad}', 'LocalidadController@edit')->name('localidad.edit')->middleware('permission:localidad.edit');
            Route::get('ver/{localidad}', 'LocalidadController@show')->name('localidad.show')->middleware('permission:localidad.show');
            Route::patch('editar/{localidad}', 'LocalidadController@update')->name('localidad.update')->middleware('permission:localidad.update');
            Route::get('eliminar/{localidad}', 'LocalidadController@destroy')->name('localidad.delete')->middleware('permission:localidad.delete');
    });
    Route::group(['prefix' => 'lineacredito'], function () {
            Route::get('listado', 'LineaCreditoController@index')->name('lineacredito.index')->middleware('permission:lineacredito.index');
            Route::get('nuevo', 'LineaCreditoController@create')->name('lineacredito.create')->middleware('permission:lineacredito.create');
            Route::post('nuevo', 'LineaCreditoController@store')->name('lineacredito.store')->middleware('permission:lineacredito.store');
            Route::get('editar/{lineacredito}', 'LineaCreditoController@edit')->name('lineacredito.edit')->middleware('permission:lineacredito.edit');
            Route::get('ver/{lineacredito}', 'LineaCreditoController@show')->name('lineacredito.show')->middleware('permission:lineacredito.show');
            Route::patch('editar/{lineacredito}', 'LineaCreditoController@update')->name('lineacredito.update')->middleware('permission:lineacredito.update');
            Route::get('eliminar/{lineacredito}', 'LineaCreditoController@destroy')->name('lineacredito.delete')->middleware('permission:lineacredito.delete');
            Route::post('lineacredito/export', 'LineaCreditoController@index')->name('lineacredito.export')->middleware('permission:lineacredito.export');
    });
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');
	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('permission:users.edit');
	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('permission:users.show');
	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');
	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');
    // permisos
    Route::post('permisos/store', 'PermissionController@store')->name('permisos.store')->middleware('permission:permisos.create');
    Route::get('permisos', 'PermissionController@index')->name('permisos.index')->middleware('permission:permisos.index');
    Route::get('permisos/create', 'PermissionController@create')->name('permisos.create')->middleware('permission:permisos.create');
    Route::put('permisos/{permiso}', 'PermissionController@update')->name('permisos.update')->middleware('permission:permisos.edit');
    Route::get('permisos/{permiso}', 'PermissionController@show')->name('permisos.show')->middleware('permission:permisos.show');
    Route::delete('permisos/{permiso}', 'PermissionController@destroy')->name('permisos.destroy')->middleware('permission:permisos.destroy');
    Route::get('permisos/{permiso}', 'PermissionController@edit')->name('permisos.edit')->middleware('permission:permisos.edit');
    Route::patch('permisos/{permiso}', 'PermissionController@update')->name('permisos.update')->middleware('permission:permisos.update');

    /*
    Route::group(['prefix' => 'permiso'], function () {
        // Profiles
        Route::get('listado', 'PermissionController@index')->name('permiso.index');
        Route::get('nueva', 'PermissionController@create')->name('permiso.create');
        Route::post('nueva', 'PermissionController@store')->name('permiso.store');
        Route::get('editar/permiso}', 'PermissionController@edit')->name('permiso.edit');
        Route::get('ver/{permiso}', 'PermissionController@show')->name('permiso.show');
        Route::patch('editar/{permiso}', 'PermissionController@update')->name('permiso.update');
        Route::get('eliminar/{permiso}', 'PermissionController@destroy')->name('permiso.delete');
        Route::get('restaurar', 'PermissionController@eliminated')->name('permiso.eliminated');
        Route::get('restore/{permiso}', 'PermissionController@restore')->name('permiso.restore');
    });

    */

    Route::group(['prefix' => 'profile'], function () {
        // Profiles
        Route::get('listado', 'ProfileController@index')->name('profile.index');
        Route::get('nueva', 'ProfileController@create')->name('profile.create');
        Route::post('nueva', 'ProfileController@store')->name('profile.store');
        Route::get('editar/{profile}', 'ProfileController@edit')->name('profile.edit');
        Route::get('ver/{profile}', 'ProfileController@show')->name('profile.show');
        Route::patch('editar/{profile}', 'ProfileController@update')->name('profile.update');
        Route::get('eliminar/{profile}', 'ProfileController@destroy')->name('profile.delete');
//        Route::get('restaurar', 'ProfileController@eliminated')->name('profile.eliminated')->middleware('permission:profile.destroy');
//        Route::get('restore/{profile}', 'ProfileController@restore')->name('profile.restore')->middleware('permission:profile.restore');
    });

    Route::get('/admin_permissions', function()
    {
    $role = \Caffeinated\Shinobi\Models\Role::find(1);
        dd($role->getPermissions());
    });
     
    Route::get('/assign_permissions', function()
    {
        $role = \Caffeinated\Shinobi\Models\Role::find(1);
        $role->assignPermission(3);
        $role->save();
    });
     
    Route::get('/revoke_permission', function()
    {
        $role = \Caffeinated\Shinobi\Models\Role::find(1);
        $role->revokePermission(3);
        $role->save();
    });
     
    Route::get('/revoke_all_permission', function()
    {
        $role = \Caffeinated\Shinobi\Models\Role::find(1);
        $role->revokeAllPermissions();
        $role->save();
    });

});

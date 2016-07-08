<?php
// In Laravel 5.1, Route::get is the same get()
get('/', function () {
    return view('login');
});
post('/login', 'LoginController@store');
get('/logout', 'LoginController@logout');

// Grupo de rutas del Administrador
Route::group(['middleware' => 'administrador'], function () {
    // Módulo "Equiṕo de computo"
    get('/administrador', 'EquipoComputoController@index');
    	get('/administrador/equipocomputo/create', 'EquipoComputoController@create');
    	post('/administrador/equipocomputo/store', 'EquipoComputoController@store');
        get('/administrador/equipocomputo/detalle/{id}', 'EquipoComputoController@show');
        get('/administrador/equipocomputo/edit/{id}', 'EquipoComputoController@edit');
        post('/administrador/equipocomputo/update', 'EquipoComputoController@update');
        post('/administrador/equipocomputo/delete', 'EquipoComputoController@destroy');
    // Módulo de "Empleado"
    get('/administrador/empleado', 'EmpleadoController@index');
    	post('/administrador/empleado', 'EmpleadoController@store');
        post('/administrador/empleado/editar', 'EmpleadoController@update');
        post('/administrador/empleado/delete', 'EmpleadoController@destroy');
    // Módulo de "Departamento"
    get('/administrador/departamento', 'DepartamentoController@index');
    	post('/administrador/departamento', 'DepartamentoController@store');
        post('/administrador/departamento/delete', 'DepartamentoController@destroy');
    // Módulo de "Impresora"
    get('/administrador/impresora', 'ImpresoraController@index');
        get('/administrador/impresora/alta_impresora', 'ImpresoraController@create');
        post('/administrador/impresora', 'ImpresoraController@store');
        get('/administrador/impresora/detalle/{id}', 'ImpresoraController@show');
        get('/administrador/impresora/edit/{id}', 'ImpresoraController@edit');
        post('/administrador/impresora/update', 'ImpresoraController@update');
        post('/administrador/impresora/delete', 'ImpresoraController@destroy');
    // Módulo de "Accesorio"
    get('/administrador/accesorio', 'AccesoriosController@index');
        get('/administrador/accesorio/alta_accesorio', 'AccesoriosController@create');
        post('/administrador/accesorio', 'AccesoriosController@store');
        get('/administrador/accesorio/detalle/{id}', 'AccesoriosController@show');
        get('/administrador/accesorio/edit/{id}', 'AccesoriosController@edit');
        post('/administrador/accesorio/update', 'AccesoriosController@update');
        post('/administrador/accesorio/delete', 'AccesoriosController@destroy');
    // Módulo de "Mantenimiento"
    get('/administrador/mantenimiento_equipo', 'MantenimientoEquipoController@index');
        get('/administrador/mantenimiento_equipo/alta_mantenimiento_equipo', 'MantenimientoEquipoController@create');
        post('/administrador/mantenimiento_equipo', 'MantenimientoEquipoController@store');
        get('/administrador/mantenimiento_equipo/get_mantenimientos_equipo', 'MantenimientoEquipoController@getMantenimientosEquipo');
        get('/administrador/mantenimiento_equipo/editar/{id}', 'MantenimientoEquipoController@edit');
        post('/administrador/mantenimiento_equipo/update', 'MantenimientoEquipoController@update');
        post('/administrador/mantenimiento_equipo/delete', 'MantenimientoEquipoController@destroy');
    get('/administrador/mantenimiento_impresora', 'MantenimientoImpresoraController@index');
        get('/administrador/mantenimiento_impresora/alta_mantenimiento_impresora', 'MantenimientoImpresoraController@create');
        post('/administrador/mantenimiento_impresora', 'MantenimientoImpresoraController@store');
        get('/administrador/mantenimiento_equipo/get_mantenimientos_impresoras', 'MantenimientoImpresoraController@getMantenimientosImpresora');
        get('/administrador/mantenimiento_impresora/editar/{id}', 'MantenimientoImpresoraController@edit');
        post('/administrador/mantenimiento_impresora/update', 'MantenimientoImpresoraController@update');
        post('/administrador/mantenimiento_impresora/delete', 'MantenimientoImpresoraController@destroy');
    get('/administrador/mantenimiento_accesorio', 'MantenimientoAccesorioController@index');
        get('/administrador/mantenimiento_equipo/get_mantenimientos_accesorio', 'MantenimientoAccesorioController@getMantenimientosAccesorio');
        get('/administrador/mantenimiento_accesorio/alta_mantenimiento_accesorio', 'MantenimientoAccesorioController@create');
        post('/administrador/mantenimiento_accesorio', 'MantenimientoAccesorioController@store');
        get('/administrador/mantenimiento_accesorio/editar/{id}', 'MantenimientoAccesorioController@edit');
        post('/administrador/mantenimiento_accesorio/update', 'MantenimientoAccesorioController@update');
        post('/administrador/mantenimiento_accesorio/delete', 'MantenimientoAccesorioController@destroy');
});
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
    get('/administrador/mantenimiento_impresora', 'MantenimientoImpresoraController@index');
        get('/administrador/mantenimiento_impresora/alta_mantenimiento_impresora', 'MantenimientoImpresoraController@create');
        post('/administrador/mantenimiento_impresora', 'MantenimientoImpresoraController@store');
});
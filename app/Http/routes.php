<?php
// In Laravel 5.1, Route::get is the same get()
get('/', function () {
    return view('login');
});
post('/login', 'LoginController@store');
get('/logout', 'LoginController@logout');

// Grupo de rutas del Administrador
Route::group(['middleware' => 'administrador'], function () {
    get('/administrador', 'EquipoComputoController@index');
    	get('/administrador/equipocomputo/create', 'EquipoComputoController@create');
    	post('/administrador/equipocomputo/store', 'EquipoComputoController@store');
    get('/administrador/empleado', 'EmpleadoController@index');
    	post('/administrador/empleado', 'EmpleadoController@store');
    get('/administrador/departamento', 'DepartamentoController@index');
    	post('/administrador/departamento', 'DepartamentoController@store');
    get('/administrador/impresora', 'ImpresoraController@index');
        get('/administrador/impresora/alta_impresora', 'ImpresoraController@create');
        post('/administrador/impresora', 'ImpresoraController@store');
    get('/administrador/accesorio', 'AccesoriosController@index');
        get('/administrador/accesorio/alta_accesorio', 'AccesoriosController@create');
        post('/administrador/accesorio', 'AccesoriosController@store');

    get('/administrador/mantenimiento_equipo', 'MantenimientoEquipoController@index');
        get('/administrador/mantenimiento_equipo/alta_mantenimiento_equipo', 'MantenimientoEquipoController@create');
        post('/administrador/mantenimiento_equipo', 'MantenimientoEquipoController@store');

    get('/administrador/mantenimiento_impresora', 'MantenimientoImpresoraController@index');
        get('/administrador/mantenimiento_impresora/alta_mantenimiento_impresora', 'MantenimientoImpresoraController@create');
        post('/administrador/mantenimiento_impresora', 'MantenimientoImpresoraController@store');  

    // get();
    // get();
});
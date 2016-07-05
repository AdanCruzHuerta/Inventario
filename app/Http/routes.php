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
        get('/administrador/impresora/detalle/{id}', 'ImpresoraController@show');
    get('/administrador/accesorio', 'AccesoriosController@index');
        get('/administrador/accesorio/alta_accesorio', 'AccesoriosController@create');
        post('/administrador/accesorio', 'AccesoriosController@store');

    get('/administrador/mantenimientoe', 'MantenimientoeController@index');
        get('/administrador/mantenimientoe/alta_mantenimientoe', 'MantenimientoeController@create');
        post('/administrador/mantenimientoe', 'MantenimientoeController@store');

    get('/administrador/mantenimientoi', 'MantenimientoiController@index');
        get('/administrador/mantenimientoi/alta_mantenimientoi', 'MantenimientoiController@create');
        post('/administrador/mantenimientoi', 'MantenimientoiController@store');  

    // get();
    // get();
});
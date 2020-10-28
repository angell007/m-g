<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

if (Cache::get('user') != null) {
    Route::group(['middleware' => ['cors', 'json']], function () {

        Route::get('delete-img/{id}', 'ImagenController@destroy');

        Route::post('upload-portada-inmueble', 'InmuebleController@uploadPortada')->name('upload.portada');
        Route::get('imagenes/{id}', 'ImagenController@show');
        Route::post('imagenes', 'ImagenController@store')->name('imagenes.store');
        //Arrendatarios
        Route::resource('arrendatarios', 'ArrendatarioController', ['except' => 'update'])->names('arrendatarios');
        Route::patch('/arrendatarios/update', 'ArrendatarioController@update')->name('arrendatario.update');
        //Propietarios
        Route::resource('propietarios', 'PropietarioController', ['except' => 'update'])->names('propietarios');
        Route::patch('/propietarios/update', 'PropietarioController@update')->name('propietario.update');
        Route::post('/propietarios/filtrado', 'PropietarioController@filtrado');


        Route::post('/propietarios/search', 'PropietarioController@search');
        Route::post('/arrendatarios/search', 'ArrendatarioController@search');
        Route::post('/arrendatarios/filtrado', 'ArrendatarioController@filtrado');

        //Inmuebles
        Route::resource('inmuebles', 'InmuebleController', ['except' => ['update']])->names('inmuebles');
        Route::patch('/inmuebles/update', 'InmuebleController@update')->name('inmueble.update');
        Route::post('/inmuebles/filtrado', 'InmuebleController@filtrado');

        //Contratos
        Route::resource('contratos', 'ContratoController', ['except' => ['update']])->names('contratos');
        Route::patch('/contratos/update', 'ContratoController@update')->name('contrato.update');

        Route::get('contrato/myg/details/{id}', 'ContratoController@show');

        Route::get('descuentos/myg/details/{id}', 'DescuentoController@searchInContract');

        Route::get('descuentos/myg/details/{id}', 'DescuentoController@searchInContract');
        Route::get('recibidos/myg/details/{id}', 'PagoRecibidoController@searchInContract');
        Route::get('realizados/myg/details/{id}', 'PagoRealizadoController@searchInContract');
        Route::get('pendientes/myg/details/{id}', 'PendienteController@searchInContract');

        //Pagos
        Route::post('contrato/myg/getInfo', 'ContratoController@getDataForPago');
        Route::post('contrato/myg/getInfoDescuentos', 'ContratoController@getDataForDescuento');
        Route::resource('realizados', 'PagoRealizadoController')->names('realizados');
        Route::resource('recibidos', 'PagoRecibidoController')->names('recibidos');

        Route::resource('descuentos', 'DescuentoController')->names('descuentos');
        Route::patch('/pendientes/update', 'PendienteController@update')->name('pendiente.update');
    });
}

Route::get('inmueble/myg/details/{codigo}', 'GaleryController@show')->name('details');
Route::resource('pendientes', 'PendienteController')->names('pendientes');

Route::get('search/{codigo}', 'InmuebleController@search');



//Users
// Route::resource('/users', 'UserController', ['except' => 'update']);
// Route::get('/user/roles/{key}', 'UserController@show');
// Route::patch('/users/update', 'UserController@update')->name('users.update');
// Route::get('/users/perfil/{user}', 'UserController@perfil')->name('users.perfil');

// //Roles
// Route::resource('/rols', 'RoleController', ['except' => 'update']);
// Route::patch('/rols/update', 'RoleController@update')->name('rols.update');
// Route::post('/rols/asignar-rol', 'RoleController@asignarRole')->name('rols.asignarRole');
// Route::get('/user/roles/eliminar-rol/{rolkey}/{userkey}', 'RoleController@eliminarRole');
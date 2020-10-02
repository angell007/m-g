<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['cors', 'json']], function () {
    // Route::resource('inmuebles', 'InmuebleController')->names('inmuebles');
    Route::post('upload-portada-inmueble', 'InmuebleController@uploadPortada')->name('upload.portada');
    Route::get('imagenes/{id}', 'ImagenController@show');
    Route::post('imagenes', 'ImagenController@store')->name('imagenes.store');
    // Route::post('imagenes', 'InmuebleController@uploadPortada');
    //Arrendatarios
    Route::resource('arrendatarios', 'ArrendatarioController', ['except' => 'update'])->names('arrendatarios');
    Route::patch('/arrendatarios/update', 'ArrendatarioController@update')->name('arrendatario.update');
    //Propietarios
    Route::resource('propietarios', 'PropietarioController', ['except' => 'update'])->names('propietarios');
    Route::patch('/propietarios/update', 'PropietarioController@update')->name('propietario.update');
    //Inmuebles
    Route::resource('inmuebles', 'InmuebleController', ['except' =>[ 'update']])->names('inmuebles');
    Route::patch('/inmuebles/update', 'InmuebleController@update')->name('inmueble.update');
});

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
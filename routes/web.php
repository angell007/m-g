<?php

use App\Http\Controllers\HomeController;
use App\Inmueble;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', function () {
    $inmuebles = Inmueble::all();
    $nuevos = Inmueble::take(3)->get();
    return view('welcome', compact('inmuebles', 'nuevos'));
});

Route::get('arrendatarios', 'ArrendatarioController@index')->name('arrendatarios.index');
Route::get('propietarios', 'PropietarioController@index')->name('propietarios.index');
Route::get('inmuebles', 'InmuebleController@index')->name('inmuebles.index');
Route::get('inmuebles/{id}', 'InmuebleController@show')->name('inmuebles.show');

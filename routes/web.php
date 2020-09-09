<?php

use App\Inmueble;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', function () {
    return view('arrendatario.index');
});

Route::get('/home', function () {
    return view('arrendatario.index');
});

Auth::routes();

Route::middleware('auth')->resource('arrendatarios', 'ArrendatarioController')->names('arrendatarios');
Route::middleware('auth')->resource('propietarios', 'PropietarioController')->names('propietarios');
Route::middleware('auth')->resource('inmuebles', 'InmuebleController')->names('inmuebles');
Route::get('/test',  function () {
    return Inmueble::with('propietario:id,full_name')->get(['*']);
});

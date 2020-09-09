<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->resource('arrendatarios', 'ArrendatarioController')->names('arrendatarios');
Route::middleware('auth')->resource('propietarios', 'PropietarioController')->names('propietarios');
Route::middleware('auth')->resource('inmuebles', 'InmuebleController')->names('inmuebles');

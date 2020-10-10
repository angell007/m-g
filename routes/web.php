<?php

use App\Http\Controllers\HomeController;
use App\Inmueble;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', function () {
    $inmuebles = Inmueble::all();
    $nuevos = Inmueble::take(12)->get();
    return view('welcome', compact('inmuebles', 'nuevos'));
})->name('inicio');

Route::get('nosotros', function () {
    return view('layouts.nosotros');
})->name('nosotros');

Route::get('arrendatarios', 'ArrendatarioController@index')->name('arrendatarios.index');
Route::get('contratos', 'ContratoController@index')->name('contratos.index');
Route::get('propietarios', 'PropietarioController@index')->name('propietarios.index');
Route::get('inmuebles', 'InmuebleController@index')->name('inmuebles.index');
Route::get('inmuebles/{id}', 'InmuebleController@show')->name('inmuebles.show');


Route::get('categorias/{nombre}', 'GaleryController@index')->name('categorias');
Route::get('categorias/myg/filter', 'GaleryController@getCountCategory')->name('filter');
Route::post('categorias/myg/filter', 'GaleryController@getFiltered')->name('filter');
Route::get('inmueble/myg/details/{codigo}', 'GaleryController@show')->name('details');

//Informes
Route::get('informes/arrendatarios', 'InformeController@arrendatarios')->name('informes.arrendatarios');
//  Route::post('informes/arrendatarios', 'InformeController@getArrendatarios')->name('informes.arrendatarios');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

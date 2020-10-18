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
Route::get('contratos/myg/details/{id}', 'ContratoController@show');

Route::get('recibidos', 'PagoRecibidoController@index')->name('recibidos.index');
Route::get('recibidos/myg/details/{id}', 'PagoRecibidoController@show');

Route::get('realizados', 'PagoRealizadoController@index')->name('realizados.index');
Route::get('realizados/myg/details/{id}', 'PagoRealizadoController@show');

Route::get('descuentos', 'DescuentoController@index')->name('descuentos.index');
// Route::get('descuentos/myg/details/{id}', 'DescuentoController@show');


Route::get('propietarios', 'PropietarioController@index')->name('propietarios.index');


Route::get('inmuebles', 'InmuebleController@index')->name('inmuebles.index');
Route::get('inmuebles/{id}', 'InmuebleController@show')->name('inmuebles.show');
Route::get('inmueble/myg/details/{codigo}', 'GaleryController@show')->name('details');


Route::get('categorias/{nombre}', 'GaleryController@index')->name('categorias');
Route::get('categorias/myg/filter', 'GaleryController@getCountCategory')->name('filter');
Route::post('categorias/myg/filter', 'GaleryController@getFiltered')->name('filter');

//Informes
Route::get('informes/arrendatarios', 'InformeController@arrendatarios')->name('informes.arrendatarios');
Route::post('informes/arrendatarios', 'InformeController@descargarArrendatarios')->name('informes.arrendatarios');

//Informes
Route::get('informes/propietarios', 'InformeController@propietarios')->name('informes.propietarios');
Route::post('informes/propietarios', 'InformeController@descargarPropietarios')->name('informes.propietarios');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registro-pagos/realizados', 'RegistroPagosController@realizados')->name('registro.realizados');
Route::get('/registro-pagos/recibidos', 'RegistroPagosController@recibidos')->name('registro.recibidos');
Route::get('/registro/descuentos', 'RegistroPagosController@descuentos')->name('registro.descuentos');
Route::get('/registro/pendientes', 'RegistroPagosController@descuentos')->name('registro.descuentos');

Route::get('pendientes/register', 'PendienteController@index')->name('registro.pendientes');

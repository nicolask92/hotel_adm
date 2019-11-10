<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','ControladordeVistas@inicio')->name('inicio');

Route::get('cronograma', function () {
    return view('cronograma');
})->name('crono');

Route::get('empleados', function () {
    return view('empleados');
})->name('empleados');

Route::get('pago-servicios', function () {
    return view('pago-servicios');
})->name('pago-servicios');
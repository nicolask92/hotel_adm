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

Route::get('cronograma','ControladordeVistas@cronograma')->name('crono');

Route::get('empleados/{empleado?}','ControladordeVistas@empleados_generador')->name('empleados');

Route::get('pago_servicios', 'ControladordeVistas@pago_servicios')->name('pago_servicios');

Route::post('/', 'ControladordeVistas@add_empleado')->name('agregar_empleado');

Route::get('empleados/editar/{edit_empleado?}','ControladordeVistas@empleados_edit')->name('editar_empleados');

Route::get('empleados/bajar/{baja_empleado?}','ControladordeVistas@baja_empleado')->name('baja_empleados');  //Quedamos aca


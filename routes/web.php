<?php

Route::get('/','ControladordeVistas@inicio')->name('inicio');

Route::get('/cronograma','ControladordeVistas@cronograma')->name('crono');

Route::get('/empleados/{empleado?}','ControladordeVistas@empleados_generador')->name('empleados');

Route::get('/pago_servicios', 'ControladordeVistas@pago_servicios')->name('pago_servicios');

Route::post('/empleados', 'ControladordeVistas@add_empleado')->name('agregar_empleado');

Route::get('/empleado/bajar/{baja_empleado}','ControladordeVistas@baja_empleado')->name('empleados.bajar');

Route::put('/empleado/bajado/{id}','ControladordeVistas@bajado')->name('empleados.update');

Route::get('/empleado/editar/{id}','ControladordeVistas@editando')->name('empleados.editando');

Route::put('/empleado/editado/{id_baja}','ControladordeVistas@editado')->name('empleados.editado');

Route::resource('hitorial_empleados', 'HistorialEmpleados')->names([
    'index' => 'empleados.historial'
]);


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ControladordeVistas extends Controller
{
    public function inicio(){
        return view('index');
    }

    public function cronograma(){
        return view('cronograma');
    }

    public function empleados($empleado=null){

        $empleados = App\Empleados::all();

        return view('empleados',compact('empleados','empleado'));
    }

    public function pago_servicios(){
        return view('pago-servicios');
    }
}

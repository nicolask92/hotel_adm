<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ControladordeVistas extends Controller
{
    public function inicio (){
        return view('index');
    }

    public function cronograma (){
        return view('cronograma');
    }

    public function empleados_generador($empleado = null){

        $empleados_lista = App\Empleados::all();
        if($empleado != null){
            $empleado = App\Empleados::findOrFail($empleado);
        }
        

        return view('empleados',compact('empleados_lista','empleado'));
    }

    public function add_empleado(Request $request) {

        $request->validate([
            'nombre_add' => 'required',
            'apellido_add' => 'required',
            'dni_add' => 'required',
            'date' => 'required'
        ]);
        
        $nuevo_emp = new App\Empleados;
        $nuevo_emp->nombre = $request->nombre_add;
        $nuevo_emp->apellido = $request->apellido_add;
        $nuevo_emp->dni = $request->dni;


        $date = date_create($request->date);
        $date = date_format($date, 'Y-m-d H:i:s');

        $nuevo_emp->comienzo = $date;

        $nuevo_emp->save();

        return back()->with('mensaje_add','Empleado Agregado Correctamente');
    }

    public function baja_empleado($edit_empleado = null) {

        if($edit_empleado != null){
        $user_baja = App\Empleados::findOrFail($edit_empleado); 
        }
        
        return view('baja_empleados', compact('user_baja'));

    }

    public function pago_servicios()  {
        return view('pago_servicios');
    }

    public function empleados_edit()    {

    
    }  


}

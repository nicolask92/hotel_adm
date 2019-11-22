<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;

class ControladordeVistas extends Controller
{
    use UploadTrait;


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
        $nuevo_emp->dni = $request->dni_add;
        $nuevo_emp->activo = "Si";
        // $nuevo_emp->notas = null;



        $date = date_create($request->date);
        $date = Carbon::parse($date)->format('Y-m-d H:i:s');

        $nuevo_emp->comienzo = $date;

        $nuevo_emp->save();

        return back()->with('mensaje_add','Empleado Agregado Correctamente');
    }

    public function baja_empleado($baja_empleado) {

        if($baja_empleado != null){
        $user_baja = App\Empleados::findOrFail($baja_empleado); 
        }
        
        return view('empleados.bajar', compact('user_baja'));

    }

    public function bajado(Request $request , $id) {

        $empleado_a_actualizar = App\Empleados::find($id); 
        $empleado_a_actualizar->notas = $request->nota;
        $empleado_a_actualizar->activo = "No";

        $date = date_create($request->date_fin);
        $date = Carbon::parse($date)->format('Y-m-d H:i:s');
        //$date = date_format($date, 'Y-m-d H:i:s'); No funciona cuando se usa findorfail
        $empleado_a_actualizar->finalizo = $date;

        $empleado_a_actualizar->save();

        return back()->with('mensaje', 'Empleado dado de baja');

    }

    public function pago_servicios()  {
        return view('pago_servicios');
    }

    public function editando($id)    {
        
            $user_edit = App\Empleados::findOrFail($id);

            return view('empleados.editar', compact('user_edit'));
    
    }

    public function editado(Request $request ,$id_baja)    {

        request()->validate([

            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        
        $empleado_a_editar = App\Empleados::find($id_baja);

        $empleado_a_editar->nombre = $request->nombre;
        $empleado_a_editar->apellido = $request->apellido;

        $date_comienzo = date_create($request->date_comienzo);
        $date_comienzo = Carbon::parse($date_comienzo)->format('Y-m-d H:i:s');

        $date_fin = date_create($request->date_fin);
        $date_fin = Carbon::parse($date_fin)->format('Y-m-d H:i:s');

        $empleado_a_editar->comienzo = $request->date_comienzo;
        $empleado_a_editar->finalizo = $request->date_fin;
        $empleado_a_editar->notas = $request->notas;

        if ($empleado_a_editar->finalizo) {
            $empleado_a_editar->activo = "No";
        }
        else{
        $empleado_a_editar->activo = "Si";
        }

        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($empleado_a_editar->apellido).'_'.time();
            // Define folder path
            $folder = '/fotos_empleados';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $empleado_a_editar->foto = $filePath;
        }

        //$fileExtension->move(public_path('fotos_empleados'), $imageName);
        //$empleado_a_editar->foto = $imageName;

        $empleado_a_editar->save();

        return back()->with('mensaje', 'Empleado editado correctamente');
    
    }

}

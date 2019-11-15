@extends('plantilla')

@section('Bienvenida')


    <div class="container border p-3 mt-5">
        <h4>AGREGAR EMPLEADO</h4>
        <form method="POST" action="{{route('agregar_empleado')}}">
            @if($errors->has('nombre_add')|| $errors->has('apellido_add')||$errors->has('dni_add')||$errors->has('date'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Los campos son obligatorios
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            @csrf
                <div class="row ">
                        <div class="row p-2">
                                <div class="col">
                                <input type="text" value="{{ old('nombre_add') }}" name="nombre_add" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="col">
                                <input type="text" value="{{ old('apellido_add') }}" name="apellido_add" class="form-control" placeholder="Apellido">
                                </div>
                                <div class="col">
                                        <input type="number" value="{{ old('dni_add') }}" name="dni_add" class="form-control" placeholder="DNI">
                                </div>
                                <div class="col">
                                        <input class="form-control" id="date" name="date" value="{{ old('date') }}" placeholder="Comenzo: DD/MM/YYY" type="text"/>
                                </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>


    @if(session('mensaje_add'))
    <div class="container">
        <div class="alert-success alert border p-3 mt-2">
          {{session('mensaje_add')}}
        </div>
      </div>
    @endif

    <div class="container border mt-3 mb-3">
    <h4 class="p-3 mb-2 font-weight-bold ">Para mas informacion del empleado click en su nombre </h4>

    <div class="container mt-3">
            <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Fecha de Ingreso</th>
                        <th scope="col">¿Asegurado?</th>
                      </tr>
                    </thead>
                    <tbody>
                          @foreach ($empleados_lista as $item)
                            @if($item->activo == null || $item->activo == "Si")
                              <tr>
                              <th scope="row"><a href="{{ route('empleados',$item->id) }}">{{$item->nombre}}</a></th>
                              <td>{{$item->apellido}}</td>
                                <td>{{$item->edad}}</td>
                                <td>{{$item->comienzo}}</td>
                                <td>
                                  {{$item->asegurado ? 'Si' : 'No'}} 
                                </td>
                              </tr>
                              @endif    
                          @endforeach
                   </tbody>
                  </table>
    </div>
</div>



@if (!empty($empleado))

    <div class="container mt-3 mb-3">
        <div class="card text-center">
            <div class="card-header font-weight-bold text-uppercase">
              {{$empleado->nombre}} {{$empleado->apellido}}
            </div>
            <div class="card-body">
                <div class="container mb-3">
                    <div class="row">
                      <div class="col-sm">
                        <p class="font-weight-bold">Foto:</p>
                        <img src="{{ $empleado->foto ? $empleado->foto : "http://www.losprincipios.org/images/default.jpg"}}" class="card-img-top" alt="...">
                        
                      </div>
                      <div class="col-sm">
                          <p><span class="font-weight-bold">Nombre:</span> {{ $empleado->nombre}}</p>
                        <p><span class="font-weight-bold">Apellido:</span> {{ $empleado->apellido}}</p>
                        <p><span class="font-weight-bold">DNI:</span> {{ $empleado->dni}}</p>
                        <p><span class="font-weight-bold">Domicilio:</span> {{ $empleado->domicilio ? $empleado->domicilio : "Sin especificar"}}</p>
                        <p><span class="font-weight-bold">Seguro:</span> {{ $empleado->asegurado ? 'Si' : 'No'}}</p>
                      </div>
                      <div class="col-sm">
                        <p><span class="font-weight-bold">Edad:</span> {{ $empleado->edad}}</p>
                        <p><span class="font-weight-bold">Finalizo:</span> {{ $empleado->finalizo != null ? $empleado->finalizo : "Activo" }}</p></p>
                        <p><span class="font-weight-bold">Agregado el Dia:</span> {{ $empleado->created_at}}</p>
                        <p><span class="font-weight-bold">Activo:</span> {{ $empleado->finalizo != null ? $empleado->finalizo : "Si" }}</p>
                      </div>
                    </div>
                  </div>
                  <a href="#" class="btn btn-primary">Editar Empleado</a>
                  <a href="{{route('baja_empleados', $empleado->id)}}" class="btn btn-primary">Dejar Inactivo</a>
            </div>
            
            <div class="card-footer text-muted">
                Comenzo: {{ $empleado->comienzo }}
            </div>
          </div>
    </div>
    
@endif

@endsection


@section('scripts-fecha')

      <!-- Seleccionador de fechas -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

        <script>
        $(document).ready(function(){
          var date_input=$('input[name="date"]'); //our date input has the name "date"
          var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
          var options={
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
          };
          date_input.datepicker(options);
        })
        </script>


@endsection

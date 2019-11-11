@extends('plantilla')

@section('Bienvenida')


    <div class="container border p-3 mt-5">
        <h4>AGREGAR EMPLEADO</h4>
        <form method="POST" action="#">
                <div class="row ">
                        <div class="row p-2">
                                <div class="col">
                                <input type="text" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="col">
                                <input type="text" class="form-control" placeholder="Apellido">
                                </div>
                                <div class="col">
                                        <input type="number" class="form-control" placeholder="DNI">
                                </div>
                                <div class="col">
                                        <input class="form-control" id="date" name="date" placeholder="Comenzo: DD/MM/YYY" type="text"/>
                                </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>

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
                    @foreach ($empleados as $item)
                        <tr>
                        <th scope="row"><a href="{{ route('empleados',$item->nombre) }}">{{$item->nombre}}</a></th>
                        <td>{{$item->apellido}}</td>
                          <td>{{$item->edad}}</td>
                          <td>{{$item->comienzo}}</td>
                          <td>
                             {{$item->asegurado ? 'Si' : 'No'}} 
                          </td>
                        </tr>    
                    @endforeach
                   </tbody>
                  </table>
    </div>
</div>

@if (!empty($empleado))

<div class="container mt-3 mb-3">
    <div class="card text-center">
        <div class="card-header font-weight-bold text-uppercase">
          {{$empleado}}
        </div>
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Editar Empleado</a>
        </div>
        <div class="card-footer text-muted">
          ->Aca va la fecha que empezo<-
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

@extends('plantilla')

@section('Bienvenida')


<div class="container mt-3">
    <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">DNI</th>
                <th scope="col">Domicilio</th>
                <th scope="col">Edad</th>
                <th scope="col">Ingreso</th>
                <th scope="col">Finalizo</th>
                <th scope="col">¿Fue Asegurado?</th>
                <th scope="col">Creado el Dia</th>
                <th scope="col">Modificar</th>
              </tr>
            </thead>
            <tbody>
                  @foreach ($empleados_lista as $item)
            
                      <tr>
                      <th scope="row">{{$item->id}}</th>
                      <td>{{$item->nombre}}</td>
                      <td>{{$item->apellido}}</td>
                        <td>{{$item->dni}}</td>
                        <td>{{$item->domicilio}}</td>
                        <td>{{$item->edad}}</td>
                        <td>{{$item->comienzo}}</td>
                        <td>{{$item->finalizo}}</td>
                        <td>
                          {{$item->asegurado ? 'Si' : 'No'}} 
                        </td>
                        <td>{{$item->created_at}}</td>
                        <td>
                                <a href="{{route('empleados.editando', $item->id)}}">Editar</a>
                        </td>
                      </tr> 
                  @endforeach

                  {{ $empleados_lista->links() }}

           </tbody>
          </table>
</div>
</div>


@endsection
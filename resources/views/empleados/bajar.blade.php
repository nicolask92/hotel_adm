@extends('plantilla')


@section('Bienvenida')


        @if($user_baja->activo != "No")
        <div class="container mt-3">
            <h1>Dar de Baja</h1>
            @if (session('mensaje'))
                <div class="alert alert-success">
                    {{ session('mensaje') }}
                </div>
            @endif
                <form action="{{ route('empleados.update', $user_baja->id) }}" method="POST">
                @method('PUT')
                @csrf

                @error('date_fin')
                    <div class="alert alert-danger">
                        La fecha es obligatoria
                    </div>
                @enderror

                <input type="text" name="date_fin" id="date_fin" placeholder="¿Cuando Finalizo? DD/MM/YYY" class="form-control mb-2">
                <input type="text" name="nota" placeholder="¿Algo que dejar asentado sobre este empleado?" class="form-control mb-2" >
                <button class="btn btn-warning btn-block" type="submit">Dar de Baja</button>
                </form>

        </div>
        @endif

                <div class="container mt-4 mb-3">
                        <div class="card text-center">
                            <div class="card-header font-weight-bold text-uppercase">
                              {{$user_baja->nombre}} {{$user_baja->apellido}}
                            </div>
                            <div class="card-body">
                                <div class="container mb-3">
                                    <div class="row">
                                      <div class="col-sm">
                                        <p class="font-weight-bold">Foto:</p>
                                        <img src="{{ $user_baja->foto ? $user_baja->foto : "http://www.losprincipios.org/images/default.jpg"}}" class="card-img-top" alt="...">
                                        
                                      </div>
                                      <div class="col-sm">
                                          <p><span class="font-weight-bold">Nombre:</span> {{ $user_baja->nombre}}</p>
                                        <p><span class="font-weight-bold">Apellido:</span> {{ $user_baja->apellido}}</p>
                                        <p><span class="font-weight-bold">DNI:</span> {{ $user_baja->dni}}</p>
                                        <p><span class="font-weight-bold">Domicilio:</span> {{ $user_baja->domicilio ? $user_baja->domicilio : "Sin especificar"}}</p>
                                        <p><span class="font-weight-bold">Seguro:</span> {{ $user_baja->asegurado ? 'Si' : 'No'}}</p>
                                      </div>
                                      <div class="col-sm">
                                        <p><span class="font-weight-bold">Edad:</span> {{ $user_baja->edad}}</p>
                                        <p><span class="font-weight-bold">Finalizo:</span> {{ $user_baja->finalizo != null ? $user_baja->finalizo : "Activo" }}</p></p>
                                        <p><span class="font-weight-bold">Agregado el Dia:</span> {{ $user_baja->created_at}}</p>
                                        <p><span class="font-weight-bold">Activo:</span> {{ $user_baja->finalizo != null ? "No": "Si"  }}</p>
                                        <p><span class="font-weight-bold">Nota:</span> {{ $user_baja->notas }}</p>
                                    </div>
                                    </div>
                                  </div>
                            </div>
                            
                            <div class="card-footer text-muted">
                                Comenzo: {{ $user_baja->comienzo }}
                            </div>
                          </div>
                    </div>


@endsection

@section('scripts-fecha')

      <!-- Seleccionador de fechas -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

        <script>
        $(document).ready(function(){
          var date_input=$('input[name="date_fin"]'); //our date input has the name "date"
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
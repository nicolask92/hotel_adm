@extends('plantilla')

@section('Bienvenida')

        

        <div class="container border p-3 mt-5">
                @if (session('mensaje'))
                <div class="alert alert-success">
                    {{ session('mensaje') }}
                </div>
                @endif
            <h4 class="mb-5">EDITAR EMPLEADO:</h4>
            <h5>{{ $user_edit->nombre }} {{ $user_edit->apellido }}</h5>
            <form action="{{route('empleados.editado', $user_edit->id)}}" method="POST" >
                @method('PUT')
                @csrf
               
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Nombre</label>
                          <input type="text" name="nombre" value="{{ $user_edit->nombre }}" class="form-control"  placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Apellido</label>
                          <input type="text" name="apellido" value="{{ $user_edit->apellido }}" class="form-control" placeholder="Apellido">
                        </div>
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">DNI</label>
                              <input type="text" name="dni" value="{{ $user_edit->dni }}" class="form-control" placeholder="DNI">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Domicilio</label>
                              <input type="text" name="domicilio" value="{{ $user_edit->domicilio }}" class="form-control" placeholder="Domicilio">
                            </div>
                    </div>

                    <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Comenzo</label>
                                  <input type="text" name="date_comienzo" id="date" value="{{ $user_edit->comienzo }}" placeholder="Comenzo: DD/MM/YYY" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Finalizo</label>
                                  <input type="text" id="date" name="date_fin" value="{{ $user_edit->finalizo }}" placeholder="Termino: DD/MM/YYY" class="form-control">
                                </div>
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="inputPassword4">Foto</label>
                                    <img src="{{ $user_edit->foto ? $user_edit->foto : "http://www.losprincipios.org/images/default.jpg"}}" class="card-img-top" alt="...">
                                    <div class="custom-file  mt-3">
                                          <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                                          <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                    </div>
                                  </div>
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Notas</label>
                              <input type="text" name="notas" value="{{ $user_edit->notas }}"class="form-control" placeholder="Notas">
                            </div>
                            
                    </div>

                        <button type="submit" class="btn btn-primary">Editar</button>
            </form>
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
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
          };
          date_input.datepicker(options);
        })

        $(document).ready(function(){
          var date_input=$('input[name="date_comienzo"]'); //our date input has the name "date"
          var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
          var options={
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
          };
          date_input.datepicker(options);
        })
        </script>


@endsection
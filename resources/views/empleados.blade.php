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
    <h3 class="p-3 mb-2 text-center font-weight-bold    ">Para mas informacion del empleado cliquear en su nombre </h3>

    <div class="container mt-5">
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
                      <tr>
                        <th scope="row">Roberto</th>
                        <td>Juarez</td>
                        <td>23</td>
                        <td>23/02/2019</td>
                        <td>si</td>
                      </tr>
                      <tr>
                        <th scope="row">Mark</th>
                        <td>Jacob</td>
                        <td>24</td>
                        <td>24/02/2019</td>
                        <td>no</td>
                      </tr>
                      <tr>
                        <th scope="row">Otto</th>
                        <td>Thompson</td>
                        <td>28</td>
                        <td>05/09/2019</td>
                        <td>si</td>
                      </tr>
                    </tbody>
                  </table>
    </div>
</div>


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

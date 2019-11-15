<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Administrador Hotelero | {{    Request::path()    }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <!-- Navegador  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{    route('inicio')     }}">ADM-Hotel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item {{ Route::is('inicio') ? 'active' : "" }}">
            <a class="nav-link" href="{{    route('inicio')     }}">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Route::is('crono') ? 'active' : '' }}">
              <a class="nav-link" href="{{    route('crono')     }}">Cronograma</a>
            </li>
            <li class="nav-item dropdown {{ Route::is('empleados') ? 'active' : "" }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Empleados
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{    route('empleados')     }}">Empleados</a>
                  <a class="dropdown-item" href="#">Empleados Inactivos</a>
                </div>
              </li>
            <li class="nav-item {{ Route::is('pago_servicios') ? 'active' : "" }}">
                <a class="nav-link" href="{{    route('pago_servicios')     }}">Pago de Servicios</a>
              </li>
          </ul>
        </div>
      </nav>

      <!-- Barra lateral -->



    @yield('Bienvenida')

    <!-- Footer -->
    <div class="flex-container">
<footer class="page-footer font-small black bg-info">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 alert alert-info" role="alert">© 2019 Copyright -
          <a href="https://github.com/nicolask92/"> Nicolas Kloster</a>
        </div>
        <!-- Copyright -->
      
</footer>
</div>
      <!-- Footer -->

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        @yield('scripts-fecha')
      


      </body>
</html>
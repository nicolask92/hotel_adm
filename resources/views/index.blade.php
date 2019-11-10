@extends('plantilla')

@section('Bienvenida')
    <div class="container">
            <div class="container p-5">

                    <div class="row">
                        <div class="col-3">
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Novedades del Dia</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Historial de Actividades</a>
                          </div>
                        </div>
                        <div class="col-9">
                          <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                               
                                @yield('Novedades-dia')   
            
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                              
                                @yield('Historial-Actividades') 
            
                            </div>
                          </div>
                        </div>
                      </div>
    </div>
        </div>

@endsection

@section('Novedades-dia')
    
@endsection

@section('Historial-Actividades')
    
@endsection
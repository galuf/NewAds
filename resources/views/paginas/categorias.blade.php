@extends('layouts.app')

@section('content')

<div class="contenido container-fluid pt-2">
  <div class="container">
      <div class="row">
          <!-- lado izquierdo -->
          <div class="col-0 col-md-3 pl-0 pr-3 izquierdo"> 

              <button type="button" class="btn btn-primary btn_pon_aviso">Pon tu aviso</button>
              <div class="titulo_izq p-2">
                  Opciones
              </div>
              <!-- A vertical navbar -->
              <div class="navbar bg-light">
                  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Inicio</a>
                  <a href="#"><i class="fa fa-fw fa-search"></i> Buscar</a>
                  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contactos</a>
                  <a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
              </div>

              <div class="titulo_izq p-2">
                  Categorías
              </div>
              <!-- A vertical navbar -->
              <div class="navbar bg-light">
                  <a class="" href="#"><i class="fa fa-fw fa-file-alt"></i> Alquileres</a>
                  <a href="#"><i class="fab fa-fw fa-houzz"></i> Casas y lotes</a>
                  <a href="#"><i class="fa fa-fw fa-car"></i> Automóviles</a>
                  <a href="#"><i class="fa fa-fw fa-book-reader"></i> Necesito</a>
                  <a class="" href="#"><i class="fa fa-fw fa-search-location"></i> Busco empleo</a>
                  <a href="#"><i class="fa fa-fw fa-user-graduate"></i></i> Educación</a>
                  <a href="#"><i class="fa fa-fw fa-laptop-code"></i> Informática</a>
                  <a href="#"><i class="fa fa-fw fa-cat"></i> Mascotas</a>
                  <a href="#"><i class="fa fa-fw fa-couch"></i> Hogar</a>
                  <a href="#"><i class="fa fa-fw fa-volleyball-ball"></i> Deporte</a>
                  <a href="#"><i class="fa fa-fw fa-utensils"></i> Eventos</a>
                  <a href="#"><i class="fa fa-fw fa-palette"></i> Arte</a>
              </div>
              
          </div>
          <!-- lado centro derecho -->
          <div class="col-12 col-md-9 p-0 p-md-3"> 
            @foreach ($avisos as $aviso)                  
              <div class="p-0 py-1">
                <div class="cuadro_aviso_i p-2 pb-3 mr-0 mr-md-1">
                  <div class="row">
                    <div class="col-0 col-sm-3 img_aviso img-container d-flex align-items-center">
                        <img src=" {{$aviso->imagen}} " alt="" class="img-fluid">
                    </div>
                    
                    <div class="col-12 col-sm-9">
                        <div class="titulo_aviso"><a href=""> {{$aviso->titulo}} </a></div>
                        <div class="hora_aviso">Hace 1 hora</div>
                        
                        <p class="texto_aviso pt-1"> {{$aviso->contenido}} </p>
                        <a href=""><div class="ver_aviso">Ver más...</div></a>

                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <!-- fin lado centro derecho -->
      </div>
  </div>
</div>

@endsection
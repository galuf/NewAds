@extends('layouts.app')

@section('content')

<!-- CONTENIDO -->
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
          
    {{-- <aviso-ver-mas id={{$_GET['id']}} ></aviso-ver-mas> --}}
        {{-- <div>{{$_GET['ads']}}</div> --}}
        @guest
            <?php $user = 0; ?>
            
        @else
            <?php $user = auth()->user()->id; ?>
        @endguest
    
        <aviso-ver-mas ads="{{$_GET['ads']}}" user="{{$user}}" ></aviso-ver-mas>
    <!-- fin lado centro derecho -->
         
      </div>
  </div>
</div>


@endsection
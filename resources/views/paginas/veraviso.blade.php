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
          <div class="col-12 col-md-9 p-0 p-md-3">
                
            <!-- carga datos del aviso -->
        <div class="p-0 pb-2 cuadro_aviso_i mb-2">
            
            <div class="titulo_izq py-2 mb-2">Detalles del aviso </div>
            
            <div class="px-4 p-2 pr-3">
                <div class="row">
                    
                    <div class="col-12 col-sm-4">
                        
                        <img src="{{asset($aviso->imagen)}}" alt="" class="img-fluid img_aviso">
                    </div>
                    <div class="col-12 col-sm-8 ">
                        <div class="titulo_aviso"><a href="">{{$aviso->titulo}}</a></div>
                        <div class="lugar_aviso float-left font-weight-bold">{{$aviso->distrito->provincia->region->nombre}} </div><div class="hora_aviso">&nbsp;Hace 1 hora</div>
                        
                        <p class="texto_aviso pt-1">{{$aviso->contenido}}</p>

                    </div>
                </div>
                <hr class="line" style="border: .5px solid #ADD8E6">
                <div class="row">
                    <div class="col-12 col-sm-6 texto_aviso ">
                        <p><strong>Nombre:</strong> {{$aviso->usuario->nombre .' '. $aviso->usuario->apellido}}</p>
                        <p><strong>Correo electrónico:</strong> {{$aviso->email}} </p> 
                        <p><strong>Celular de contacto:</strong> {{$aviso->telefono}} </p> 
                    </div>
                    <div class="col-12 col-sm-6 texto_aviso  ">
                        <p><strong>Categoría:</strong> {{$aviso->categoria->nombre}} <p>
                        <p><strong>Lugar:</strong> {{$aviso->distrito->provincia->region->nombre .' - '. $aviso->distrito->provincia->nombre .' - '. $aviso->distrito->nombre}} </p>
                        <p><strong>Dirección:</strong> {{$aviso->direccion}} <p>
                    </div>
                </div>
             </div>
        </div>
        
        <!-- carga comentarios o preguntas -->
        
        <div class="p-0 pb-2 cuadro_aviso_i mb-2">    
            
            <div class="titulo_izq py-2 mb-2">Comentarios del aviso </div>

            <div class="px-4 p-2 pr-3">
                @foreach ($aviso->comentarios as $comentario)
                    
                    <div class="row pb-3">
                        <div class="col-2 col-sm-1 ">
                            <div class= "">
                                <a href=""><img class="avatar_aviso" src="{{asset('img/avatar1.png')}}" alt=" Avatar"></a>
                            </div>
                        </div>
                        
                        <div class="col-10 col-sm-11">
                            <div class=""><a href=""> {{$comentario->user->nombre}} {{$comentario->user->apellido}} </a></div>
                            <div class="lugar_aviso float-left font-weight-bold">Puno: </div><div class="hora_aviso">&nbsp;&nbsp;Hace 1 hora</div>
                        </div>
                    
                        <div class="col-12 ">
                            <p class="texto_aviso pt-1"> {{$comentario->contenido}} </p>
                            <a href=""><div class="ver_aviso float-left">Responder</div></a>
                        </div>
                    </div>
                    
                @endforeach
            </div>
        </div>

        <!-- carga poner comentario o consulta -->
        <div class="p-0 pb-2 cuadro_aviso_i mb-2">
            
            <div class="titulo_izq py-2 mb-2">Agregar comentario</div>
            
            <div class="px-4 p-2 pr-3">
                <div class="row">
                    <div class= "col-2 col-sm-1">
                        <a href=""><img class="avatar_aviso" src="{{asset('img/avatar1.png')}}" alt=" Avatar"></a>
                    </div>
                    <div class="col-10 col-sm-11 form-group">
                        <textarea class="form-control mb-2" rows="5" id="contenido_Aviso"></textarea>
                        <button class="btn btn-primary">Enviar comentario</button>
                        <a href=""><div class="ver_aviso float-right">Inicia sesión para comentar</div></a>
                    </div>
                   
                </div>

             </div>
        </div>

    

    </div>    
    <!-- fin lado centro derecho -->
         
      </div>
  </div>
</div>


@endsection
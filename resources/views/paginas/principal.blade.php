@extends('layouts.app')

@section('content')

  <!-- BANEER SLIDER swiper -->
  <div class="container-fluid p-0 banner">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="img/ban11.jpg" alt="img-1" class="img-1">
        </div>
        <div class="swiper-slide">
            <img src="img/ban22.jpg" alt="" class="img-1">
        </div>
        <div class="swiper-slide">
            <img src="img/ban11.jpg" alt="" class="img-1">
        </div>
        <div class="swiper-slide">
            <img src="img/ban22.jpg" alt="" class="img-1">
        </div>
        <div class="swiper-slide">
            <img src="img/ban11.jpg" alt="" class="img-1">
        </div>
      </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
  </div>

<!-- CONTENIDO -->

<div class="contenido container-fluid pt-2">
  <div class="container">
    <div class="row">
        <!-- lado izquierdo -->
      <div class="col-0 col-md-3 pl-0 pr-3 izquierdo"> 
        
          @guest   
          <a href="/registro?poneraviso" class="text-white"> <button type="button" class="btn btn-primary btn-block mb-2">Pon tu aviso</button></a>
          @else
           <a href="{{route('poneraviso')}}" class="text-white"><button type="button" class="btn btn-primary btn-block mb-2"> Pon tu aviso</button></a>
          @endguest
          
        
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
      <div class="col-12 col-md-9 p-0 p-md-3 derecho">
        <div class="grid-container pt-2 pt-lg-3">
          <div class="grid-item cuadros p-3">
            <div class="aviso">
              <a href="#"><img src="img/b2.svg" alt=""></a>
            </div>
            <div class="chinche">
              <a href="#"><img src="img/b1.png" alt=""></a>
            </div>
            <div class="texto">
              <a href="" class=""><span class="titulo">Alquileres</span></a>
              <p>Alquiler de departamentos, habitaciones, casas, locales comerciales.</p>
            </div>
          </div>
          <div class="grid-item cuadros p-3">
            <div class="aviso">
              <a href="#"><img src="img/b3.svg" alt=""></a>
            </div>
            <div class="chinche">
              <a href="#"><img src="img/b2.png" alt=""></a>
            </div>
            <div class="texto">
              <a href="" class=""><span class="titulo">Casas y lotes</span></a>
              <p>Venta de casas del propietario, departamentos, lotes, terrenos...</p>
            </div>
          </div>
          <div class="grid-item cuadros p-3">
            <div class="aviso">
              <a href="#"><img src="img/b4.svg" alt=""></a>
            </div>
            <div class="chinche">
              <a href="#"><img src="img/b3.png" alt=""></a>
            </div>
            <div class="texto">
              <a href="" class=""><span class="titulo">Automóviles</span></a>
              <p>Venta de automóviles de segunda mano: autos, camionetas, motos,  mototaxis...</p>
            </div>
          </div>  
          <div class="grid-item cuadros p-3">
            <div class="aviso">
              <a href="#"><img src="img/b5.svg" alt=""></a>
            </div>
            <div class="chinche">
              <a href="#"><img src="img/b4.png" alt=""></a>
            </div>
            <div class="texto">
              <a href="" class=""><span class="titulo">Necesito</span></a>
              <p>Mozos, cocineros, pintor, albañil, ayudante de cocina, electricista, gasfitero...</p>
            </div>
          </div>
          <div class="grid-item cuadros p-3">
            <div class="aviso">
              <a href="#"><img src="img/b4.svg" alt=""></a>
            </div>
            <div class="chinche">
              <a href="#"><img src="img/b5.png" alt=""></a>
            </div>
            <div class="texto">
              <a href="" class=""><span class="titulo">Empleo</span></a>
              <p>Diferentes ocupaciones y profesiones que se ofertan: electricista, gasfitero, peluquero...</p>
            </div>  
          </div>
          <div class="grid-item cuadros p-3">
            <div class="aviso">
              <a href="#"><img src="img/b5.svg" alt=""></a>
            </div>
            <div class="chinche">
              <a href="#"><img src="img/b6.png" alt=""></a>
            </div>
            <div class="texto">
              <a href="" class=""><span class="titulo">Educación</span></a>
              <p>Profesores de matemática, física, química, idiomas, tesis....</p>
            </div>
          </div>  
          <div class="grid-item cuadros p-3">
            <div class="aviso">
              <a href="#"><img src="img/b2.svg" alt=""></a>
            </div>
            <div class="chinche">
              <a href="#"><img src="img/b7.png" alt=""></a>
            </div>
            <div class="texto">
              <a href="" class=""><span class="titulo">Informática</span></a>
              <p>Venta de computadoras, laptop, impresoras, celulares, tablets...</p>
            </div>
          </div>
          <div class="grid-item cuadros p-3">
            <div class="aviso">
              <a href="#"><img src="img/b3.svg" alt=""></a>
            </div>
            <div class="chinche">
              <a href="#"><img src="img/b8.png" alt=""></a>
            </div>
            <div class="texto">
              <a href="" class=""><span class="titulo">Mascotas</span></a>
              <p>Venta de diferentes tipos de mascotas: perritos de raza, gatos, loros, conejos...</p>
            </div>
          </div>
          <div class="grid-item cuadros p-3">
            <div class="aviso">
              <a href="#"><img src="img/b3.svg" alt=""></a>
            </div>
            <div class="chinche">
              <a href="#"><img src="img/b9.png" alt=""></a>
            </div>
            <div class="texto">
              <a href="" class=""><span class="titulo">Hogar</span></a>
              <p>Muebles baratos, ropa, sofás, televisores, refrigerador, lavadoras,  armarios, microondas...</p>
            </div>
          </div> 
          <div class="grid-item cuadros p-3">
            <div class="aviso">
              <a href="#"><img src="img/b4.svg" alt=""></a>
            </div>
            <div class="chinche">
              <a href="#"><img src="img/b10.png" alt=""></a>
            </div>
            <div class="texto">
              <a href="" class=""><span class="titulo">Deporte</span></a>
              <p>Academias de deporte, tutores, implementos deportivos, canchas de grass sintético...</p>
            </div>
          </div>
          <div class="grid-item cuadros p-3">
            <div class="aviso">
              <a href="#"><img src="img/b5.svg" alt=""></a>
            </div>
            <div class="chinche">
              <a href="#"><img src="img/b11.png" alt=""></a>
            </div>
            <div class="texto">
              <a href="" class=""><span class="titulo">Eventos</span></a>
              <p>Organización de eventos, comidas, locales, quince años, promociones...</p>
            </div>
          </div>
          <div class="grid-item cuadros p-3">
            <div class="aviso">
              <a href="#"><img src="img/b2.svg" alt=""></a>
            </div>
            <div class="chinche">
              <a href="#"><img src="img/b12.png" alt=""></a>
            </div>
            <div class="texto">
              <a href="" class=""><span class="titulo">Arte</span></a>
              <p>Bandas de músicos, orquestas, folclóricos, equipos de sonido, elencos...</p>
            </div>
          </div>  
        </div>
        <!-- fin lado centro derecho -->
      </div>
    </div>
  </div>
    
</div>
<!-- AVISOS -->
<div class="avisos container-fluid ">
    <avisos-principal></avisos-principal>
</div>

<!-- boton ver mas -->
 <div class="container-fluid btn_ver_mas pt-2">
    <button type="button" class="btn btn-primary btn_mas">Ver más</button>
 </div>

@endsection
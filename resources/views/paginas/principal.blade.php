  <!-- BARRA DE CATEGORIAS -->
  <div class="container-fluid barra_categorias d-none d-sm-block">
    <div class="d-flex flex-row justify-content-center py-1">
        <div class="mx-2">
            <a href=""><img class="img-fluid" src="img/a1.svg" alt="" width="90"></a>
        </div>
        <div class="mx-2">
            <a href=""><img class="img-fluid" src="img/a2.svg" alt="" width="90"></a>
        </div>
        <div class="mx-2">
            <a href=""><img class="img-fluid" src="img/a3.svg" alt="" width="90"></a>
        </div>
        <div class="mx-2">
            <a href=""><img class="img-fluid" src="img/a4.svg" alt="" width="90"></a>
        </div>
        <div class="mx-2">
            <a href=""><img class="img-fluid" src="img/a5.svg" alt="" width="90"></a>
        </div>
        <div class="mx-2">
            <a href=""><img class="img-fluid" src="img/a6.svg" alt="" width="90"></a>
        </div>
        <div class="mx-2">
            <a href=""><img class="img-fluid" src="img/a7.svg" alt="" width="90"></a>
        </div>
        <div class="mx-2">
            <a href=""><img class="img-fluid" src="img/a8.svg" alt="" width="90"></a>
        </div>
        <div class="mx-2">
            <a href=""><img class="img-fluid" src="img/a9.svg" alt="" width="90"></a>
        </div>
        <div class="mx-2">
            <a href=""><img class="img-fluid" src="img/a10.svg" alt="" width="90"></a>
        </div>
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
      <listar-aviso :filtro="filtro" :busqueda="busqueda"></listar-aviso>
      <!-- fin lado centro derecho -->
      </div>
    </div>
  </div>
    
</div>


<!-- boton ver mas -->
 <div class="container-fluid btn_ver_mas pt-2">
    <button type="button" class="btn btn-primary btn_mas">Ver más</button>
 </div>
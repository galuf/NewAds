<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width initial-scale=1">
    <link rel="icon" href="">
    <title>NewAds</title>

    <!-- vinculo de css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/jquery.jdSlider.css">
    <link rel="stylesheet" href="css/swiper.min.css">

    <link rel="stylesheet" href="css/style.css">
    
    <!-- vinculo de js -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/all.min.js"></script>

    <script src="js/jquery.jdSlider-latest.js"></script>

    
</head>
<body>
    <!-- CABECERA -->
    <header class=" container-fluid p-0 cabecera">
        <div class="container ">
            <div class="row">
                 <!-- logo -->
                <div class="col-9 col-sm-2 col-md-3 col-lg-3 p-0 pt-1 pl-2 pt-sm-3 pt-md-3 pt-lg-1"> 
                    <a href="index.html" > <img src="img/logo.png" alt="newads" class="fluid logotipo"></a>
                </div>
                   <!-- buscador -->
                <div class="d-none d-sm-block col-9 col-md-8 col-lg-6  p-3">
                    <div class="input-group md-form form-sm form-2 pl-0">
                        <input class="form-control my-0 py-1 lime-border" type="text" placeholder="¿Qué buscas en Puno?" aria-label="Search">
                        <div class="input-group-append">
                          <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
                              aria-hidden="true"></i></span>
                        </div>
                      </div>
                </div>
                   <!-- redes -->
                <div class="d-none d-lg-block col-lg-2 redes1">
                    <ul class="d-flex justify-content-end pt-4 mr-0">
                        <li><a href="" class=""><i class="fab fa-facebook-f float-left lead ml-3"></i></a></li>
                        <li><a href="" class=""><i class="fab fa-instagram float-left lead ml-3"></i></a></li>
                        <li><a href="" class=""><i class="fab fa-twitter float-left lead ml-3"></i></a></li>
                        <li><a href="" class=""><i class="fab fa-youtube float-left lead ml-3"></i></a></li>
                    </ul>
                </div>
                   <!-- user -->
                
                <div class= "col-3 col-sm-1 col-md-1 col-lg-1 usuario pt-2 pt-sm-3">
                    <a href=""><img class="avatar" src="img/avatar1.png" alt=" Avatar"></a>
                </div>
                
            </div>

        </div>
        
    </header>
    <!-- buscador para movil -->
    <div class="container d-block d-sm-none py-2">
        <div class="input-group md-form form-sm form-2 pl-0">
            <input class="form-control my-0 py-1 lime-border" type="text" placeholder="¿Qué buscas en Puno?" aria-label="Search">
            <div class="input-group-append">
              <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
                  aria-hidden="true"></i></span>
            </div>
          </div>
    </div>


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
                
                <div class="p-0 py-1">
                <div class="cuadro_aviso_i p-2 pb-3 mr-0 mr-md-1">
                    <div class="row">
                        <div class="col-0 col-sm-3 img_aviso">
                            <img src="img/aviso1.jpg" alt="" class="img-fluid">
                        </div>
                        
                        <div class="col-12 col-sm-9">
                            <div class="titulo_aviso"><a href="">Se alquila casa</a></div>
                            <div class="hora_aviso">Hace 1 hora</div>
                            
                            <p class="texto_aviso pt-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint assumenda accusamus tempora
                                quibusdam similique fuga ad rem nupti impedit dolorem magnam ratione maxime? lor sit amet consectet</p>
                            <a href=""><div class="ver_aviso">Ver más...</div></a>

                        </div>
                    </div>
                </div>
                </div>


                <div class="p-0 py-1">
                <div class="cuadro_aviso_i p-2 mr-0 mr-md-1">
                    <div class="row">
                        <div class="col-0 col-sm-3 img_aviso">
                            <img src="img/aviso1.jpg" alt="" class="img-fluid">
                        </div>
                        
                        <div class="col-12 col-sm-9">
                            <div class="titulo_aviso"><a href="">Se alquila casa</a></div>
                            <div class="hora_aviso">Hace 1 hora</div>
                            
                            <p class="texto_aviso pt-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint assumenda accusamus tempora
                                quibusdam similique fuga ad rem nupti impedit dolorem magnam ratione maxime? lor sit amet consectet</p>
                            <a href=""><div class="ver_aviso">Ver más...</div></a>

                        </div>
                    </div>
                </div>
                </div>

                <div class="p-0 py-1">
                <div class="cuadro_aviso_i p-2 mr-0 mr-md-1">
                    <div class="row">
                        <div class="col-0 col-sm-3 img_aviso">
                            <img src="img/aviso1.jpg" alt="" class="img-fluid">
                        </div>
                        
                        <div class="col-12 col-sm-9">
                            <div class="titulo_aviso"><a href="">Se alquila casa</a></div>
                            <div class="hora_aviso">Hace 1 hora</div>
                            
                            <p class="texto_aviso pt-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint assumenda accusamus tempora
                                quibusdam similique fuga ad rem nupti impedit dolorem magnam ratione maxime? lor sit amet consectet</p>
                            <a href=""><div class="ver_aviso">Ver más...</div></a>

                        </div>
                    </div>
                </div>
            </div>
                
            <!-- fin lado centro derecho -->
        </div>
    </div>
</div>

</div>



<!-- boton ver mas -->
 <div class="container-fluid btn_ver_mas pt-2">
    <button type="button" class="btn btn-primary btn_mas">Ver más</button>
 </div>   
        
    
<!-- PIE -->
    <div class="pie container-fluid p-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="pl-1 pl-md-5">
                        <ul class="navbar-nav">
                            <li><a href="" class="">Acerca de NewAds</a></li>
                            <li><a href="" class="">Contáctenos</a></li>
                            <li><a href="" class="">Lo más buscado</a></li>
                            <li><a href="" class="">Busquedas recientes</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="pl-1 pl-md-5">
                        <ul class="navbar-nav">
                            <li><a href="" class="">Centro de ayuda</a></li>
                            <li><a href="" class="">Politicas de privacidad</a></li>
                            <li><a href="" class="">Terminos y condiciones</a></li>
                         </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="redes2">
                        <ul class="d-flex justify-content-center pt-4 mr-0">
                            <li><a href="" class=""><i class="fab fa-facebook-f float-left lead ml-3"></i></a></li>
                            <li><a href="" class=""><i class="fab fa-instagram float-left lead ml-3"></i></a></li>
                            <li><a href="" class=""><i class="fab fa-twitter float-left lead ml-3"></i></a></li>
                            <li><a href="" class=""><i class="fab fa-youtube float-left lead ml-3"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/swiper.min.js"></script>
    <script src="js/script.js"></Script>
    
</body>
</html>
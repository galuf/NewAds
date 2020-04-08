<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="user" content="{{Auth::user()}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="viewport" content="width=device-width initial-scale=1">
    <link rel="icon" href="">
    <title>NewAds</title>
    
    
    <!-- vinculo de css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.jdSlider.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <!-- vinculo de js -->
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" ></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/jquery.jdSlider-latest.js')}}"></script>


</head>
<body>

    <div id="app">
        <!-- CABECERA -->
        <header class=" container-fluid p-0 cabecera fixed-top">
            <div class="container ">
                <div class="row" >
                        <!-- logo -->
                    <div class="col-7 col-sm-2 col-md-2 col-lg-3 p-0 pt-1 pl-2 pt-sm-3 pt-md-3 pt-lg-1" @click='reset'> 
                        <router-link to='/'> <img src="{{asset('img/logo.png')}}" alt="newads" class="fluid logotipo"></router-link>
                    </div>
                        <!-- buscador -->
                            
                        <buscador v-if="$route.path == '/'"></buscador>
                                
                        <!-- user -->
                    
                        <div v-if="!sesion" class= "col-5 col-sm-2 col-md-2 col-lg-3 pt-1 pt-sm-3 pl-sm-0 pt-lg-1 pl-lg-5 d-flex justify-content-end">
                            <router-link to='/auth' class="btn_registrar"><button type="button" class="btn btn-primary btn_reg mt-1 mt-lg-3 pl-sm-0 pl-lg-3 pl-md-3">Registrarse</button></router-link>
                        </div>
                    
                        <div v-else class= "col-5 col-sm-2 col-md-2 col-lg-3 pt-1 pt-sm-2 pl-sm-0 pt-lg-1 d-flex justify-content-end ">
                            
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img class="avatar" src="{{asset('img/avatar1.png')}}" alt=" Avatar">
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <button class="dropdown-item"
                                    @click="logOut">
                                    Cerrar Sesion
                                </button>
                            </div>
                        </div>
                    
                </div>

            </div>
        </header>

        <!-- barra de categorias para movil -->
        <div class="container-fluid d-block d-sm-none py-2 d-flex justify-content-between cat_movil">
            <div class=""><a href="" class=""><i class="fa fa-fw fa-file-alt float-left icon_cat_mov"></i></a> </div>
            <div class=""><a href="" class=""><i class="fab fa-fw fa-houzz float-left icon_cat_mov"></i></a> </div>
            <div class=""><a href="" class=""><i class="fa fa-fw fa-car float-left icon_cat_mov"></i></a> </div>
            <div class=""><a href="" class=""><i class="fa fa-fw fa-book-reader float-left icon_cat_mov"></i></a> </div>
            <div class=""><a href="" class=""><i class="fa fa-fw fa-search-location float-left icon_cat_mov"></i></a> </div>
            <div class=""><a href="" class=""><i class="fa fa-fw fa-user-graduate float-left icon_cat_mov"></i></a> </div>
            <div class=""><a href="" class=""><i class="fa fa-fw fa-laptop-code float-left icon_cat_mov"></i></a> </div>
        </div>

        <!-- buscador para movil -->

        <div class="container d-block d-sm-none py-2">
            <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control my-0 py-1 lime-border" type="text" placeholder="¿Qué buscas en Puno?" aria-label="Search">
                <div @click="contenido=1" class="input-group-append">
                    <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
                        aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    
        <main>
            <app />
        </main>

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

    </div>
    
    <script src="{{asset('js/swiper.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></Script>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>

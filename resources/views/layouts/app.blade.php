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
    <link rel="icon" href="{{ URL::asset('/img/favicon.ico') }}" type="image/x-icon"/>
    <title>NewAdss</title>
    
    
    <!-- vinculo de css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.jdSlider.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <!-- vinculo de js -->
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/jquery.jdSlider-latest.js')}}"></script>
    {{-- <script src="{{asset('js/popper.min.js')}}" ></script> --}}
    <script src="{{asset('js/bootstrap.min.js')}}" ></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> --}}


</head>
<body>

    <div id="app">
        <!-- CABECERA -->
        <header class=" container-fluid p-0 cabecera fixed-top d-none d-md-block">
            <div class="container ">
                <div class="row" >
                    
                    {{-- <div v-text="$store.state.usuario"></div> --}}

                        <!-- logo -->
                    <div class="col-7 col-sm-2 col-md-2 col-lg-3 p-0 pt-1 pl-2 pt-sm-3 pt-md-3 pt-lg-1" @click='reset'> 
                        <router-link to='/'> <img src="{{asset('img/logo.png')}}" alt="newads" class="fluid logotipo"></router-link>
                    </div>
                        <!-- buscador -->
                            
                        <buscador></buscador>
                                
                        <!-- user -->
                    
                        <user-logo />
                </div>

            </div>
        </header>

        <!-- barra de logo cabecera mara movil -->
        <header class=" container-fluid d-block d-md-none cabecera fixed-top py-1">
            <menu-movil />    
        </header>

    
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
                                <li><router-link to="/fotter" @click="scroll">Acerca de NewAds</router-link></li>
                                <li><router-link to="/fotter" @click="scroll">Contáctenos</router-link></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="pl-1 pl-md-5">
                            <ul class="navbar-nav">
                                <li><router-link to="/fotter" @click="scroll">Politicas de privacidad</router-link></li>
                                <li><router-link to="/fotter" @click="scroll">Terminos y condiciones</router-link></li>
                             </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="redes2">
                            <ul class="d-flex justify-content-center pt-4 mr-0">
                                <li><a href="https://www.facebook.com/NewAdss-104907901239031/" target="_blank" class=""><i class="fab fa-facebook-f float-left lead ml-3"></i></a></li>
                                <li><a href="https://www.instagram.com/newadss/" target="_blank" class=""><i class="fab fa-instagram float-left lead ml-3"></i></a></li>
                                <li><a href="https://twitter.com/AdssNew" target="_blank" class=""><i class="fab fa-twitter float-left lead ml-3"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCeB5ImQ5858R1dCkegFTFfw?disable_polymer=true" target="_blank" class=""><i class="fab fa-youtube float-left lead ml-3"></i></a></li>
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

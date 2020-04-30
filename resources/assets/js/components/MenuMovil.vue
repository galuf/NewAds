<template>
  <nav class="navbar navbar-expand-lg px-0 menu_bar_movil">
           <!-- logo -->
           <div class="">
               <a href="index.html"> <img src="img/logo.png" alt="newads" class="fluid logo_movil"></a>
           </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon text-white"><i class="fas fa-bars"></i></span>
           </button>
           <div class="collapse navbar-collapse pt-3" id="navbarSupportedContent">
               <button class="btn btn-primary w-50 py-1 my-1">Acceder</button>
               <button class="btn btn-success w-50 py-1 my-1">Poner aviso</button>
               <ul class="navbar-nav mr-auto">
                   <li class="nav-item">
                       <a class="nav-link " href="#"><i class="fa fa-fw fa-home text_menu_movil"></i> <span class="text_menu_movil">Inicio</span></a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#"><i class="fa fa-fw fa-search text_menu_movil"></i><span class="text_menu_movil"> Buscar</span></a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#"><i class="fa fa-fw fa-envelope text_menu_movil"></i><span class="text_menu_movil"> Contactos</span></a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#"><i class="fa fa-fw fa-user text_menu_movil"></i><span class="text_menu_movil"> Login</span></a>
                   </li>
               </ul>
           </div>
       </nav>
</template>

<script>
export default {
  
}
</script>

<style>
  /* menu para moviles */
  .menu_movil{
      color: white;
      font-size: 30px;
  }
  .logo_movil{
      width: 100px;
  }
  .menu_bar_movil{
      background-color: #485769;  
  }
  .text_menu_movil{
  font-size: 16px;
  }
</style>
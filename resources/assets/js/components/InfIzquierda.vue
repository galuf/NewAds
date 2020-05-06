<template>
    <!-- lado izquierdo -->
      <div class="col-0 col-md-3 pl-0 pr-3 izquierdo"> 
          
        <router-link to="/ponerAviso" class="text-white"><button type="button" class="btn btn-primary btn-block mb-2"> Pon tu aviso</button></router-link>
          
        <div class="titulo_izq p-2">
              Opciones
        </div>
        
          <!-- A vertical navbar -->
          <div class="navbar bg-light">
            <a @click="cambia(1)" class="miPerfil" ><i class="miPerfil far fa-file-alt"></i> Mis avisos</a>
            <a @click="cambia(2)" class="miPerfil"><i class="miPerfil fas fa-envelope-open-text"></i> Ver más tarde</a>
            <a @click="cambia(0)" class="miPerfil"><i class="miPerfil fas fa-address-card"></i> Mi perfil</a>
            <!-- <a @click="cambia(3)" class="miPerfil"><i class="miPerfil fa fa-fw fa-user"></i> Cambiar contraseña</a> -->
          </div>

          <div class="titulo_izq p-2">
            Categorías
          </div>
          
          <!-- A vertical navbar -->
          <div class="navbar bg-light">
            <a class="miPerfil" @click="cambiaCategoria(1)"><i class="fa fa-fw fa-file-alt"></i> Alquileres</a>
            <a class="miPerfil" @click="cambiaCategoria(2)"><i class="fab fa-fw fa-houzz"></i> Casas y lotes</a>
            <a class="miPerfil" @click="cambiaCategoria(3)"><i class="fa fa-fw fa-car"></i> Automóviles</a>
            <a class="miPerfil" @click="cambiaCategoria(4)"><i class="fa fa-fw fa-book-reader"></i> Necesito</a>
            <a class="miPerfil" @click="cambiaCategoria(5)"><i class="fa fa-fw fa-search-location"></i> Busco empleo</a>
            <!-- <a class="miPerfil" @click="cambiaCategoria(6)"><i class="fa fa-fw fa-user-graduate"></i>Educación</a> -->
            <a class="miPerfil" @click="cambiaCategoria(7)"><i class="fa fa-fw fa-laptop-code"></i> Informática</a>
            <a class="miPerfil" @click="cambiaCategoria(8)"><i class="fa fa-fw fa-cat"></i> Mascotas</a>
            <a class="miPerfil" @click="cambiaCategoria(9)"><i class="fa fa-fw fa-couch"></i> Hogar</a>
            <a class="miPerfil" @click="cambiaCategoria(10)"><i class="fa fa-fw fa-volleyball-ball"></i> Deporte</a>
            <a class="miPerfil" @click="cambiaCategoria(11)"><i class="fa fa-fw fa-utensils"></i> Eventos</a>
            <!-- <a class="miPerfil" @click="cambiaCategoria(12)"><i class="fa fa-fw fa-palette"></i> Arte</a> -->
          </div>
      </div>
</template>

<script>
export default {
  data(){
    return {
      categoria:''
    }
  },
  methods:{
    cambiaCategoria(elemento){
      window.scroll (0, 0);
      if(this.$route.path != '/')
          this.$router.push({path: '/'});
      this.categoria = elemento  
      this.$store.commit('categoria',this.categoria)
    },
    cambia(contenido){
      window.scroll (0, 0);
      if(!this.$store.state.sesion){
        this.$router.push({path: '/auth'})
      }else{
        this.$store.commit('contenidoCambio',contenido)
        if(this.$route.path != '/perfilUsuario')
          this.$router.push({path: '/perfilUsuario'});
      }
    }
  },
  // destroyed(){
  //   this.$store.commit('contenidoCambio',0)
  // }
}
</script>

<style>
  .miPerfil{
    cursor: pointer;
  }
</style>
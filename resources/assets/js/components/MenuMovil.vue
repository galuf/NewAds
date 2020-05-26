<template>
<div>
    <div class="container d-flex justify-content-between"> 
        <!-- logo -->
        <div class="d-flex align-items-center" @click='reset'>
            <router-link to='/'> <img src="img/logo.png" alt="newads" class="fluid logo_movil" width="100px"></router-link>
        </div>
        <nav class="hamburger">
            <button class="hamburger__button" @click="openMobile()">
                <span class="hamburger__button-bar"></span>
                <span class="hamburger__button-bar"></span>
                <span class="hamburger__button-bar"></span>
            </button>
        </nav>
    </div>

    <nav class="mobile" @click="closeMobile()" :class="[ estado ? 'open' : '']">
        <ul class="mobile__items">            
            <li class="mobile__item  my-2 pb-2">
                <div v-if="!$store.state.sesion">
                    <li class="mobile__item pb-2"><i class="fas fa-times icon_movil_close"></i></li>
                    <router-link to='/auth'><button type="button" class="btn btn-primary boton_movil">Acceder</button></router-link>
                </div>
                <div v-else class="d-flex justify-content-between">
                    <li class="mobile__item"><i class="fas fa-times icon_movil_close"></i></li>
                    <div v-text="$store.state.usuario.nombre" style="color:white; font-weight: bold;" class="d-flex align-items-center"></div>
                    <img class="avatar" :src="($store.state.usuario.avatar || 'img/avatar1.png' )" alt=" Avatar">
                </div>
            </li>
            <li class="mobile__item  my-3 ">
                <router-link to="/ponerAviso"><button type="button" class="btn btn-success boton_movil">Poner aviso</button></router-link>
            </li>
            <li class="mobile__item  my-3 " v-if="$store.state.sesion">
                <button @click="logOut" type="button" class="btn btn-danger boton_movil">Cerrar Sesión</button>
            </li>
            <li><hr class="l1"></li>
            <li class="mobile__item my-3" @click="cambia(0)" ><i class="fa fa-fw fa-home"></i> Mi perfil</li>
            <li class="mobile__item my-3" @click="cambia(1)" ><i class="fa fa-fw fa-search"></i> Mis Avisos</li>
            <li class="mobile__item my-3" @click="cambia(2)" ><i class="fa fa-fw fa-clock"></i> Ver más tarde</li>
            <!-- <li class="mobile__item my-3" @click="cambia(3)" ><i class="fa fa-fw fa-user"></i> Cambiar contraseña</li> -->
        </ul>
    </nav>
</div>
</template>

<script>
/**** menu movil lineas ******************** */



export default {
  data(){
      return {
          estado : false
      }
  },
  methods : {
    openMobile() {
        this.estado = true
    },
    closeMobile() {
        this.estado = false
    },
    reset(){
        window.scroll (0, 0);
        this.$store.commit('buscador',{filtro:'',busqueda:'',categoria:''})
        this.$store.commit('changePages',1)
    },
    cambia(contenido){
      if(!this.$store.state.sesion){
        this.$router.push({path: '/auth'})
      }else{
        this.$store.commit('contenidoCambio',contenido)
        if(this.$route.path != '/perfilUsuario')
          this.$router.push({path: '/perfilUsuario'});
      }
    },
    logOut(){
      axios.post('/logoutver-contenido',{})
          .then(res => {
              //console.log(res)
              this.$store.commit('logout')
              if(this.$route.path != '/')
                  this.$router.push({path: '/'})
              //this.sesion = false
              this.$store.commit('mensajeShow','Adios')
          })
          .catch(err =>{
              console.log(err)
          })
    }
  }
}
</script>

<style>
.hamburger {
    display: flex;
    align-items: center;
}

.hamburger__button {
    width: 2.5rem;
    background: transparent;
    border: none;
    cursor: pointer;
    padding-top: 0;
    padding-bottom: 0;
  }
  
  .hamburger__button:focus {
    outline: none;
  }
  
  .hamburger__button-bar {
    width: 100%;
    height: 0.2rem;
    background: white;
    display: block;
    margin: 0.4rem 0;
  }

/*Mobile navigation*/
.mobile {
    position: fixed;
    top: 0;
    background: rgba(90, 90, 90, 0.8);
   
    width: 100vw;	
    height: 100vh;
    color: white;
    transform: translateX(100%);
    transition: transform 500ms ease-out;
}

.mobile__items {
    list-style: none;
    font-size: 16px;
	padding-left: 30px;
	margin-top: 0px;
}
.boton_movil{
    width: 240px;
}
.open {
    display: flex;
    transform: translateX(0);
}

@media (min-width: 40rem) {
    .desktop__navigation div {
        display: block;
    }
}

.icon_movil_close{
 font-size: 30px;
}
hr.l1 {
  border-top: 1px dotted white;
}

</style>
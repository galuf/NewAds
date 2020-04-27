<template>
  <div v-if="!$store.state.sesion" class= "col-5 col-sm-2 col-md-2 col-lg-3 pt-1 pt-sm-3 pl-sm-0 pt-lg-1 pl-lg-5 d-flex justify-content-end">
      <router-link to='/auth' class="btn_registrar"><button type="button" class="btn btn-primary btn_reg mt-1 mt-lg-3 pl-sm-0 pl-lg-3 pl-md-3">Registrarse</button></router-link>
  </div>
  <div v-else class= "col-5 col-sm-2 col-md-2 col-lg-3 pt-1 pt-sm-2 pl-sm-0 pt-lg-1 d-flex justify-content-end ">
      <div v-text="$store.state.usuario.nombre" style="color:white;" class="d-flex align-items-center"></div>
      <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="avatar" :src="($store.state.usuario.avatar || 'img/avatar1.png' )" alt=" Avatar">
      </a>
      <div>
      </div>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <router-link to="/perfilUsuario"> 
              <button class="dropdown-item">
              Perfil
              </button> </router-link>
          <button class="dropdown-item"
              @click="logOut">
              Cerrar Sesion
          </button>
      </div>
  </div>
</template>

<script>
export default {
  methods:{
    logOut(){
      axios.post('/logoutver-contenido',{})
          .then(res => {
              //console.log(res)
              this.$store.commit('logout')
              if(this.$route.path != '/')
                  this.$router.push({path: '/'})
              //this.sesion = false
          })
          .catch(err =>{
              console.log(err)
          })
    }
  },
  mounted(){
    //console.log(this.$store.state.usuario.avatar)
  }
}
</script>
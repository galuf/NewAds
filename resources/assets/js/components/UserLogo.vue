<template>
  <div v-if="!$store.state.sesion" class= "col-5 col-sm-2 col-md-2 col-lg-3 pt-1 pt-sm-3 pl-sm-0 pt-lg-1 pl-lg-5 d-flex justify-content-end">
      <router-link to='/auth' class="btn_registrar"><button type="button" class="btn btn-primary btn_reg mt-1 mt-lg-3 pl-sm-0 pl-lg-3 pl-md-3">Acceder</button></router-link>
  </div>
  <div v-else class= "col-5 col-sm-2 col-md-2 col-lg-3 pt-1 pt-sm-2 pl-sm-0 pt-lg-1 d-flex justify-content-end ">
      
      <div v-text="$store.state.usuario.nombre" style="color:white;" class="user-name d-flex align-items-center"></div>
      
      <div class="dropdown">
        <div class="caja">
          <a class="dropbtn" @click="clickToggle()">
            <img class="avatar" :src="($store.state.usuario.avatar || 'img/avatar1.png' )" alt=" Avatar">
            <i class="triangulo fas fa-sort-down"></i>
          </a>
        </div>
        
        <div id="myDropdown" class="dropdown-content" :class="[ toggle ? 'show' : '' ]">
          <a>
            <router-link to="/perfilUsuario" class="p-0 m-0" @click="toggle = false" > 
              Perfil
            </router-link>
          </a>
          <a @click="logOut">  
            Cerrar Sesión
          </a>
        </div>
      </div>
      
  </div>
</template>

<script>
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn') && !event.target.matches('.avatar') && !event.target.matches('.triangulo') && !event.target.matches('.caja')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
export default {
  data() {
    return {
      toggle : 'false'
    }
  },
  methods:{
    clickToggle(){
      this.toggle = !this.toggle
      console.log('toggle:' + this.toggle)
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
      this.toggle = false
    }
  },
  mounted(){
    this.toggle = false
    console.log('en mounted avatar circular')
    //console.log(this.$store.state.usuario.avatar)
  }
}
</script>

<style>
/* Dropdown Button */
.dropbtn {
  padding: 8px;
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {

}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}
.caja{
  display: flex;
  align-items: center;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 150px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
</style>
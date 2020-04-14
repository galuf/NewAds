<template>
  <div class="contenido container-fluid pt-2">
        <div class="p-5"></div>
    <div class="container">
      <div class="row">
        <!-- lado izquierdo -->
        <inf-izquierda />
        <!-- lado centro derecho -->
        <aviso-ver-mas :ads="$route.query.ads" :user="$store.state.usuario.id || 0"></aviso-ver-mas>
        <!-- fin lado centro derecho -->
      </div>
    </div>
  </div>
</template>

<script>
import AvisoVerMas from '../components/AvisoVerMas'
import InfIzquierda from '../components/InfIzquierda'
export default {
  components:{
    AvisoVerMas,
    InfIzquierda
  },
  data(){
    return {

    }
  },
  mounted(){
    console.log(this.$route.query.ads)
  }
  
}
</script>
<template>
  <div>
    <div class="p-3 p-md-4"></div>
    <div class="contenido container-fluid pt-4 mt-1 p-1">
      <div class="container">
          <div class="row">
              <!-- lado izquierdo -->
              <inf-izquierda />
              <poner-aviso></poner-aviso>      
          </div>
      </div>
    </div>
  </div>  
</template>

<script>
import InfIzquierda from '../components/InfIzquierda'
import PonerAviso from '../components/PonerAviso'

export default {
  components:{
    InfIzquierda,
    PonerAviso
  },
  mounted(){
    window.scroll (0, 0);
  } 
}
</script>

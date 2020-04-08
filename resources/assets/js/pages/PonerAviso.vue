<template>
  <div>
    <div class="p-4"></div>
    <div class="contenido container-fluid pt-2 p-1">
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
  }  
}
</script>

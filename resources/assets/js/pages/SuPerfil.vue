<template>
  <div>
    <div class="p-4"></div>
      <div class="contenido container-fluid pt-4 mt-2">
        <div class="container">
          <div class="row">
            <inf-izquierda />
            
            <perfil-ajeno :id="$route.query.id"/>

          </div>
        </div>
      </div>
  </div>
</template>

<script>
import InfIzquierda from '../components/InfIzquierda'
import PerfilAjeno from '../components/PerfilAjeno'

export default {
  components:{
    PerfilAjeno,
    InfIzquierda
  }  
}
</script>
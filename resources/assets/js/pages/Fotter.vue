<template>
  <div>
    <div class=" p-3 p-md-4 bg-danger"></div>
      <div class="contenido container-fluid pt-4 mt-2">
        <div class="container">
            <div class="row">
              <inf-izquierda />
              <acerca-de />
          </div>
        </div>
      </div>
  </div>
</template>

<script>
import AcercaDe from '../components/AcercaDe'
import InfIzquierda from '../components/InfIzquierda'
export default {
  components:{
    AcercaDe,
    InfIzquierda
  }
}
</script>
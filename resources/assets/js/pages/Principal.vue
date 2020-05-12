<template>
  <div>
    <barra-categoria />

    <!-- barra de categorias para movil -->
    <div class="d-md-none">
        <div class="p-4 d-sm-block  d-none"></div>
        <barra-categoria-movil />
    </div>
    
    <!-- buscador para movil -->
    <div class="d-md-none">
        <buscador-movil />
    </div>

    <div class="contenido container-fluid pt-2">
      <div class="container">
        <div class="row">

          <inf-izquierda />  
      
          <!-- lado centro derecho -->
          <listar-aviso>
          </listar-aviso>
          <!-- fin lado centro derecho -->

        </div>
      </div>
    </div>  
  </div>
    
</template>

<script>

import InfIzquierda from '../components/InfIzquierda'
import ListarAviso from '../components/ListarAviso'
import BarraCategoria from '../components/BarraCategoria'

export default {
  components: {
    InfIzquierda,
    ListarAviso,
    BarraCategoria
  },
  mounted(){
    window.scroll (0, 0);
  }
}
</script>
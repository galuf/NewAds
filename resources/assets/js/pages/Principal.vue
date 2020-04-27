<template>
  <div>
    <barra-categoria />
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
  }
}
</script>
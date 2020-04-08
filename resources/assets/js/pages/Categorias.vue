<template>
  <div>
    <barra-categoria />
      <div class="contenido container-fluid pt-2">
        <div class="container">
          <div class="row">

            <inf-izquierda />  
        
            <!-- lado centro derecho -->
            <listar-aviso :filtro="filtro" :busqueda="busqueda"></listar-aviso>
            <!-- fin lado centro derecho -->

          </div>
        </div>
      </div>  
  </div>
</template>

<script>
import BarraCategoria from '../components/BarraCategoria'
import ListarAviso from '../components/ListarAviso'
import InfIzquierda from '../components/InfIzquierda'

export default {
  components :{
    BarraCategoria,
    ListarAviso,
    InfIzquierda
  },
  data(){
    return {
      filtro:'',
      busqueda:''
    }
  }
}
</script>
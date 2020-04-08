<template>
  <div>
    <barra-categoria />
    <div class="contenido container-fluid pt-2">
      <div class="container">
        <div class="row">

          <inf-izquierda />  
      
          <!-- lado centro derecho -->
          <listar-aviso :filtro="filtro" 
                        :busqueda="busqueda" 
                        :categoria="categoria">
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
import { bus } from '../app'

export default {
  components: {
    InfIzquierda,
    ListarAviso,
    BarraCategoria
  },
  data(){
    return {
      filtro : '',
      busqueda : '',
      categoria: ''
    }
  },
  created(){
    bus.$on('datos', (o)=>{
      this.filtro = o.filtro,
      this.busqueda = o.busqueda
    })
    bus.$on('categoria', (o)=>{
      this.categoria = o.categoria
    })
  }
}
</script>
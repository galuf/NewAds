<template>
  <div class="contenido container-fluid pt-2">
    <div class="p-3 p-md-4"></div>
    <div class="container pt-4 mt-1">
      <div class="row">
        <!-- lado izquierdo -->
        <inf-izquierda />
        <!-- lado centro derecho -->
        <editar-aviso :ads="$route.query.ads" :user="$store.state.usuario.id || 0"></editar-aviso>
        <!-- fin lado centro derecho -->
      </div>
    </div>
  </div>
</template>

<script>
  import EditarAviso from '../components/EditarAviso'
  import InfIzquierda from '../components/InfIzquierda'
export default {
  components:{
    EditarAviso,
    InfIzquierda
  },  
  mounted(){
    window.scroll (0, 0);
  }
}
</script>
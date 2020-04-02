<template>
  <div class="d-none d-sm-block col-sm-8 col-9 col-md-8 col-lg-6  p-3 ">
    <div class="input-group md-form form-sm form-2 pl-0">
      <select v-model="filtro2" name="categoria" id="option" class="form-control" style="width:5px;">
        <option value="usuario">Usuario</option>
        <option value="region">Region</option>
        <option value="provincia">Provincia</option>
        <option value="distrito">Distrito</option>
        <option value="titulo">Titulo</option>
        <option value="contenido">Contenido</option>
      </select>

      <input class="form-control my-0 py-1 lime-border" v-model="busqueda2" type="text" placeholder="¿Qué buscas en Puno?" aria-label="Search">
      <div @click="presionar" class="input-group-append">
          <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
              aria-hidden="true"></i></span>
      </div>
    </div>
  </div>  
</template>

<script>
export default {
  props:['filtro', 'busqueda', 'contenido'],
  data(){
    return {
      filtro2:'',
      busqueda2:'',
    }
  },
  methods:{
    presionar(){
      this.$emit('datos', {filtro :this.filtro2, busqueda:this.busqueda2,contenido:1})
    }
  }
}
</script>
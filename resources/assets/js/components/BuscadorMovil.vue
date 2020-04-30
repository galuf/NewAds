<template>
  <div class="container d-block d-sm-none py-2">
      <div class="input-group md-form form-sm form-2 pl-0">
          <select v-model="filtro" name="categoria" id="option" class="filtro pl-2">
            <option disabled value="">Filtro</option>
            <option value="usuario">Usuario</option>
            <option value="region">Region</option>
            <option value="provincia">Provincia</option>
            <option value="distrito">Distrito</option>
            <option value="titulo">Titulo</option>
            <option value="contenido">Contenido</option>
          </select>
    
          <input @keyup.enter="presionar" class="form-control my-0 py-1 lime-border buscador" v-model="busqueda" type="text" placeholder="¿Qué buscas?" aria-label="Search">
          <div @click="presionar" class="input-group-append">
              <span class="input-group-text lime lighten-2 buscador-boton" id="basic-text1"><i class="fas fa-search text-grey"
                  aria-hidden="true"></i></span>
          </div>
        </div>
  </div>  
</template>

<script>
export default {
  data(){
    return {
      filtro:'',
      busqueda:'',
    }
  },
  methods:{
    presionar(){
      this.$store.commit('buscador',{filtro: this.filtro, busqueda: this.busqueda, categoria:''})
      this.filtro = ''
      this.busqueda = ''
      if(this.$route.path != '/')
        this.$router.push({path: '/'})
    }
  }
}
</script>

<style>
/* buscador y select ******************* */
.filtro {
    background-color: rgba(247, 248, 246, 0.6);
  
    border-top-left-radius:      20px;
    border-bottom-left-radius:   20px;
    cursor: pointer;
    color: rgba(0,0,0,.6);
    
}
.buscador{
   
    background-color: #fafcf9;
}
.buscador-boton{
    background-color:#85b260;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
    cursor: pointer;
    
}
</style>
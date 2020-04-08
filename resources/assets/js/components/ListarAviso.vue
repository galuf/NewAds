<template>
  <!-- lado centro derecho -->
      <div class="col-12 col-md-9 p-0">
        
        <div v-if="categoria!=''" class="d-flex flex-row justify-content-around">
          <h1 v-text="categorias[categoria]" ></h1>
        </div>
        <div v-if="filtro!='' && busqueda!=''">
          <div> <strong>Resultados Para :</strong> Filtro :{{filtro}} Busqueda : {{ busqueda }}</div>
        </div>

        {{listaAvisos}}
        <div class="cuadro_aviso_i p-2 mr-0 mr-md-1 mb-2" v-for="aviso in arrayAvisos" :key="aviso.id">
          <div class="row">
              <div class="col-0 col-sm-4 img-container">
                  <img :src="aviso.imagen" alt="" class="img-fluid img_aviso">
              </div>
              <div class="col-12 col-sm-8 pl-sm-0 pr-sm-3">
                  <!-- avatar aviso -->
                  <div class="float-right ">
                      <a href=""><img class="avatar_aviso" src="img/avatar1.png" alt=" Avatar"></a>
                  </div>
                  <div class="titulo_aviso"><a href="">{{aviso.titulo}}</a></div>
                  <div class="lugar_aviso float-left font-weight-bold">{{aviso.nombre_region}}</div>
                  <div class="hora_aviso">&nbsp;Hace 1 hora</div>
                  <p class="texto_aviso pt-1" v-text="aviso.contenido"></p>
                  <a href="" class="float-left" data-toggle="tooltip" data-placement="top"
                      title="Agregar a favoritos"><i class="far fa-star"></i>
                  </a>
                  <a href="" class="float-left" data-toggle="tooltip" data-placement="top"
                      title="Categoría"><i class="fa fa-fw fa-file-alt"></i>
                  </a>
                  <a href="">
                      <div class="ver_aviso">Ver más...</div>
                  </a>
              </div>
          </div>
        </div>    
      </div>
          <!-- fin lado centro derecho -->
</template>

<script>
import Buscador from './Buscador'
export default {
  components:{
    Buscador
  },
  props : ['filtro', 'busqueda','categoria'],
  data(){
    return {
      arrayAvisos : [],
      search : false,
      categorias: {
        '1': 'Alquileres',
        '2': 'Casas y Lotes',
        '3': 'Automoviles',
        '4': 'Necesito',
        '5': 'Empleos',
        '7': 'Informatica',
        '8': 'Mascotas',
        '9': 'Hogar',
        '10': 'Deporte',
        '11': 'Eventos'
      }
    }
  },
  computed:{
    listaAvisos(){
      let me = this;
      let url = '/buscador?filtro='+this.filtro+'&busqueda='+this.busqueda+'&categoria='+this.categoria;
      axios.get(url)
            .then((response)=>{
              let respuesta= response.data
              me.arrayAvisos = respuesta.avisos
              //console.log(me.arrayAvisos)
            })
            .catch((error)=>{
              console.log( 'Hubo un error en ListarAviso' + error)
            })
      console.log(`computed function con estos datos : ${this.filtro} ${this.busqueda} ${this.categoria}`)
      //console.log(this.$route.path)
    }
  },
  mounted(){
    this.search = this.$route.path != '/'
  }
}
</script>
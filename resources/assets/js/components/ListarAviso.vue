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
                  <div class="hora_aviso" v-text=" ' hace ' + dameHora(aviso.fecha_inicio,fecha_actual)">&nbsp;</div>
                  <p class="texto_aviso pt-1" v-text="aviso.contenido"></p>
                  <a href="" class="float-left" data-toggle="tooltip" data-placement="top"
                      title="Agregar a favoritos"><i class="far fa-star"></i>
                  </a>
                  <a href="" class="float-left" data-toggle="tooltip" data-placement="top"
                      title="Categoría"><i class="fa fa-fw fa-file-alt"></i>
                  </a>
                  <router-link :to="'/verContenidoAviso?ads=' + aviso.id">
                      <div class="ver_aviso">Ver más...</div>
                  </router-link>
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
  methods:{
    dameHora(fecha1,fecha2){
        console.log(fecha1 + ' fecha 1 ');
        console.log(fecha2 + 'fecha 2');
        let f1 = fecha1.split(' ');
        let f2 = fecha2.split(' ');
        let s1 = f1[0];
        let s2 = f2[0];
        let s3 = f1[1];
        let s4 = f2[1];  
        
        let anio1 = s1.split('-');
        let anio2 = s2.split('-');
        if(s1 == s2){
            let hora_min1 = s3.split(':');
            let hora_min2 = s4.split(':');
            if((hora_min1[0]+':'+hora_min1[1]) == (hora_min2[0]+':'+hora_min2[1])){
                if (parseInt(hora_min2[2]) - parseInt(hora_min1[2]) == 1) 
                    return parseInt(hora_min2[2]) - parseInt(hora_min1[2]) + ' segundo';
                else {
                    return parseInt(hora_min2[2]) - parseInt(hora_min1[2]) + ' segundos';
                }
            }else if(hora_min1[0] == hora_min2[0]){
                if( parseInt(hora_min2[1]) - parseInt(hora_min1[1]) == 1 ){
                    return parseInt(hora_min2[1]) - parseInt(hora_min1[1]) + ' minuto'
                }else{
                    return parseInt(hora_min2[1]) - parseInt(hora_min1[1]) + ' minutos'
                }
            }else{
                if(parseInt(hora_min2[0]) - parseInt(hora_min1[0]) == 1){
                    return parseInt(hora_min2[0]) - parseInt(hora_min1[0]) + ' hora'
                }else{
                    return parseInt(hora_min2[0]) - parseInt(hora_min1[0]) + ' horas'
                }
            }
        }else if((anio1[0]+'-'+anio1[1]) == (anio2[0]+'-'+anio2[1])){
            if( parseInt(anio2[2]) - parseInt(anio1[2]) == 1 ){
                return parseInt(anio2[2]) - parseInt(anio1[2]) + ' dia' 
            }else{
                return parseInt(anio2[2]) - parseInt(anio1[2]) + ' dias' 
            }
        }else if(anio1[0] == anio2[0]){
            if( parseInt(anio2[1]) - parseInt(anio1[1]) == 1 ){
                return parseInt(anio2[1]) - parseInt(anio1[1]) + ' mes'
            }else{
                return parseInt(anio2[1]) - parseInt(anio1[1]) + ' meses'
            }
        }else{
            if(parseInt(anio2[0]) - parseInt(anio1[0]) == 1){
                return parseInt(anio2[0]) - parseInt(anio1[0]) + ' años'
            }else{
                return parseInt(anio2[0]) - parseInt(anio1[0]) + ' años'
            }
        }
    }
  },
  mounted(){
    this.search = this.$route.path != '/';
    let fecha = new Date();
    this.fecha_actual = fecha.getFullYear() + '-' + (fecha.getMonth()+1) + '-'+(fecha.getDate())+' '+fecha.getHours()+':'+fecha.getMinutes()+':'+fecha.getSeconds();
  }
}
</script>
<template>
  <div class="col-12 col-md-9 p-0">
    
    <div class="d-flex flex-row justify-content-around titulo">
          <div class="texto-perfil" v-text="'Ver más tarde'"></div>
    </div>
    <spinner v-show="loading"/>
    <div class="cuadro_aviso_i p-2 mr-0 mr-md-1 mb-2" v-for="aviso in arrayAvisos" :key="aviso.id">
        <div class="row">
            <div class="col-0 col-sm-4 img-container">
                <img :src="aviso.imagen" alt="" class="img-fluid img_aviso">
            </div>
            <div class="col-12 col-sm-8 pl-sm-0 pr-sm-3">
                <!-- avatar aviso -->
                <div class="float-right ">
                    <router-link :to="'/suPerfil?id='+aviso.id_usuario" ><img class="avatar_aviso" :src="(aviso.avatar_usuario || 'img/avatar1.png' )" alt=" Avatar"></router-link>
                </div>
                <div class="titulo_aviso"><router-link :to="'/verContenidoAviso?ads=' + aviso.aviso_id">{{ contenidoVisual(aviso.titulo,10)}}</router-link></div>
                <div class="lugar_aviso float-left font-weight-bold">{{aviso.nombre_region}} - {{aviso.nombre_distrito}} &nbsp;</div>
                <div class="hora_aviso" v-text=" ' hace ' + dameHora(aviso.fecha_inicio,fecha_actual)">&nbsp;</div>
                <p class="texto_aviso pt-1" v-text=" contenidoVisual(aviso.contenido,27)"></p>

                <div class="propiedades-aviso mt-5">
                    
                    <a class="float-left" data-toggle="tooltip" data-placement="top"
                        :title="categorias[aviso.categoria_id][0]">
                        <i :class="`${categorias[aviso.categoria_id][2]} reloj`" 
                                :style="`color: ${categorias[aviso.categoria_id][1]}`">
                        </i>
                    </a>

                    <div v-if="aviso.estado == 0" style="color:red;">Este aviso fue dado de baja</div>

                    <div class="d-flex">    
                        <router-link :to="'/verContenidoAviso?ads=' + aviso.aviso_id">
                            <div class="ver_aviso"> <button class="btn btn-primary">Ver más</button> </div>
                        </router-link>
                        
                        <div class="d-flex justify-content-end ml-3">
                            <button class=" btn btn-danger " 
                                data-toggle="tooltip" 
                                data-placement="top"
                                @click="eliminar(aviso.id)">
                                Quitar
                            </button>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>    
  </div>
</template>

<script>
import Spinner from './Spinner'
export default {
  components:{
      Spinner
  },
  data(){
    return{
      arrayAvisos : [],
      categorias: {
        '1': ['Alquileres', '#3C0D6F' , 'fa fa-fw fa-file-alt'],
        '2': ['Casas y Lotes', '#E41B4D', 'fab fa-fw fa-houzz'],
        '3': ['Automoviles', '#E4CE00', 'fa fa-fw fa-car'],
        '4': ['Necesito', '#E38801','fa fa-fw fa-book-reader'],
        '5': ['Empleos', '#6CD92F','fa fa-fw fa-search-location'],
        '7': ['Informatica', '#04C7C0','fa fa-fw fa-laptop-code'],
        '8': ['Mascotas', '#E14877','fa fa-fw fa-cat'],
        '9': ['Hogar', '#C425C6','fa fa-fw fa-couch'],
        '10': ['Anunciate', '#5F2764','fa fa-fw fas fa-bullhorn'],
        '11': ['Eventos', '#222A96','fa fa-fw fa-utensils']
      },
      loading: true
    }
  },
  methods:{
    eliminar(aviso){
        let me = this
        let url = '/quitarFavorito'
        axios.put(url,{
            'id': aviso
        }).then(res => {
            this.listaAvisos()
        })
        .catch(err => {
            console.log(err)
        })
    },
    contenidoVisual(texto,letras){
      let txt = texto.split(' ')
      if(txt.length > letras) {
        txt = txt.slice(0,letras)
        txt.push('...')
      }
      txt = txt.join(' ')
      return txt
    },
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
    },
    listaAvisos(){
      let me = this;
      let url = '/misFavoritos?user_id='+this.$store.state.usuario.id;
      axios.get(url)
            .then((response)=>{
              let respuesta= response.data
              me.arrayAvisos = respuesta.favoritos
              //console.log(me.arrayAvisos)
              me.loading = false
            })
            .catch((error)=>{
              console.log( 'Hubo un error en ListarAviso' + error)
            })
      //console.log(`computed function con estos datos : ${this.filtro} ${this.busqueda} ${this.categoria}`)
      //console.log(this.$route.path)
    }
  },
  mounted(){
    let fecha = new Date();
    this.fecha_actual = fecha.getFullYear() + '-' + (fecha.getMonth()+1) + '-'+(fecha.getDate())+' '+fecha.getHours()+':'+fecha.getMinutes()+':'+fecha.getSeconds();
    this.listaAvisos()
  }
}
</script>

<style>
    .titulo{
        display: flex;
        justify-content: center;
        border-radius:10px;
        color: black;
        margin-bottom: 8px;
        background-color: #D3D3D3;
        padding: 5px;
    }
    .propiedades-aviso{
    display: flex;
    justify-content: space-between;
    }
    .reloj{
    font-size: 20px;
    margin : 7px;
    cursor: pointer;
  }
</style>
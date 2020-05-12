<template>
  <!-- lado centro derecho -->
      <div class="col-12 col-md-9 p-0">
        
        <div v-if="categoria!=''" class="d-flex flex-row justify-content-around titulo-categoria" :style='{backgroundColor:categorias[categoria][1]}'>
          <div class="texto-categoria" v-text="categorias[categoria][0]"></div>
        </div>
        
        <div v-if="filtro!='' && busqueda!=''">
          <div class="filtro-texto"> <strong>Resultados: </strong> Filtro <i class="fas fa-caret-right"></i> {{filtro}} Busqueda: {{ busqueda }}</div>
        </div>

        {{listaAvisos}}
        
        <spinner v-show="loading"/>

        <div class="d-flex justify-content-center" v-if="(arrayAvisos.length == 0 && loading==false)">
          <h5>Aún no hay anuncios para mostrar, sube tu anuncio.</h5>
        </div>
        
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
                  <div class="titulo_aviso"><router-link :to="'/verContenidoAviso?ads=' + aviso.id">{{aviso.titulo}}</router-link></div>
                  <div class="lugar_aviso float-left font-weight-bold">{{aviso.nombre_region}} &nbsp; </div>
                  <div class="hora_aviso" v-text=" ' hace ' + dameHora(aviso.fecha_inicio,fecha_actual)">&nbsp;</div>
                  <p class="texto_aviso pt-1" v-text="contenidoVisual(aviso.contenido)"></p>
                  
                  <div class="propiedades-aviso">

                    <div>
                      <a @click="favorito(aviso.id)" class="ver-mas-tarde float-left" data-toggle="tooltip" data-placement="top"
                          title="Agregar a ver más tarde"><i class="fas fa-clock reloj"></i>
                      </a>
                      
                      <a class="float-left" data-toggle="tooltip" data-placement="top"
                          :title="categorias[aviso.categoria_id][0]">
                          <i :class="`${categorias[aviso.categoria_id][2]} reloj`" 
                              :style="`color: ${categorias[aviso.categoria_id][1]}`">
                          </i>
                      </a>
                    </div>
                    
                    <router-link :to="'/verContenidoAviso?ads=' + aviso.id">
                        <div class="ver_aviso"> <button class="btn btn-primary">Ver más</button> </div>
                    </router-link>
                  </div>
              </div>
          </div>
        </div>   
      </div>
          <!-- fin lado centro derecho -->
</template>

<script>
import Buscador from './Buscador'
import Spinner from './Spinner'
export default {
  components:{
    Buscador,
    Spinner
  }, 
  //props : ['filtro', 'busqueda','categoria'],
  data(){
    return {
      filtro: '',
      busqueda : '',
      categoria: '',
      arrayAvisos : [],
      search : false,
      categorias: {
        '1': ['Alquileres', '#3C0D6F' , 'fa fa-fw fa-file-alt'],
        '2': ['Casas y Lotes', '#E41B4D', 'fab fa-fw fa-houzz'],
        '3': ['Automoviles', '#E4CE00', 'fa fa-fw fa-car'],
        '4': ['Necesito', '#E38801','fa fa-fw fa-book-reader'],
        '5': ['Empleos', '#6CD92F','fa fa-fw fa-search-location'],
        '7': ['Informatica', '#04C7C0','fa fa-fw fa-laptop-code'],
        '8': ['Mascotas', '#E14877','fa fa-fw fa-cat'],
        '9': ['Hogar', '#C425C6','fa fa-fw fa-couch'],
        '10': ['Deporte', '#5F2764','fa fa-fw fa-volleyball-ball'],
        '11': ['Eventos', '#222A96','fa fa-fw fa-utensils']
      },
      loading:true,
    }
  },
  computed:{
    listaAvisos(){
      this.filtro = this.$store.state.filtro
      this.busqueda = this.$store.state.busqueda
      this.categoria = this.$store.state.categoria
      let me = this;
      let url = '/buscador?filtro='+this.filtro+'&busqueda='+this.busqueda+'&categoria='+this.categoria;
      axios.get(url)
            .then((response)=>{
              let respuesta= response.data
              me.arrayAvisos = respuesta.avisos
              me.loading = false
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
    unico : async function(aviso,usuario){
      let me = this;
      let url = '/favoritoUnico?usuario_id='+usuario+'&aviso_id='+aviso
      const valor = await axios.get(url)
      return valor.data.favorito;
    },
    favorito : async function(aviso){
      if(!this.$store.state.sesion){
        this.$router.push({path: '/auth'})
      }else{
        let b = await this.unico(aviso,this.$store.state.usuario.id)
        if(b.length === 0){
          let me = this;
          const url = '/favorito'
          const favoritoValor = await axios.post(url,{
            'aviso_id' : aviso,
            'usuario_id' : this.$store.state.usuario.id
          })
          //console.log(`el id del aviso es : ${aviso} y el id de usuario es : ${this.$store.state.usuario.id}`)
        }else if(b.length != 0 && b[0].estado_favorito == 0){
          let me = this
          const url = '/activarFavorito'
          const favoritoActivar = await axios.put(url,{
            'id':b[0].id
          })
          //console.log('Se activo Favorito')
        } 
        this.$store.commit('mensajeShow','Se agrego a ver más tarde')     
      }
    },
    contenidoVisual(texto){
      let txt = texto.split(' ')
      if(txt.length > 15) {
        txt = txt.slice(0,15)
        txt.push('...')
      }
      txt = txt.join(' ')
      return txt
    },
    dameHora(fecha1,fecha2){
        //console.log(fecha1 + ' fecha 1 ');
        //console.log(fecha2 + 'fecha 2');
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
  },
  destroyed(){
    this.$store.commit('buscador',{filtro:'', busqueda:'',categoria:''})
  }
}
</script>

<style>
  .filtro-texto{
    font-family: 'Courier New', Courier, monospace;
    font-size: 12px;
    color: #b2a10c;
  }
  .texto-categoria{
    font-size: 24px;
    font-weight: bold;
  }
  .titulo-categoria{
    border-radius:10px;
    color: white;
    margin-bottom: 8px;
  }
  .reloj{
    font-size: 20px;
    margin : 7px;
    cursor: pointer;
  }
  .propiedades-aviso{
    display: flex;
    justify-content: space-between;
  }
  @media (max-width:575px){
    .texto-categoria{
      font-size: 16px;
    }
  }
</style>
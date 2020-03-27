<template>  
        <div class="grid-container1" >
            
            <div class="grid-item1 py-1" v-for="(aviso,index) in arrayAviso" :key="index">
                <div v-bind:class="index%2 == 0? 'cuadro_aviso_i p-2 mr-0 mr-md-1': 'cuadro_aviso_i p-2 ml-0 ml-md-1'">
                    <div class="row">
                        <div class="col-0 col-sm-4 img-container d-flex align-items-center">
                            <img :src="aviso.imagen" alt="" class="img-fluid img-aviso">
                        </div>
                        
                        <div class="col-12 col-sm-8">
                            <!-- avatar aviso -->
                            <div class= "float-right">
                                <a href=""><img class="avatar_aviso" src="img/avatar1.png" alt=" Avatar"></a>
                            </div>

                            <div class="titulo_aviso"><a href="" v-text="aviso.titulo"></a></div>
                            <div class="lugar_aviso float-left font-weight-bold" v-text="aviso.nombre_distrito + ' : '"> </div><div class="hora_aviso" v-text=" 'hace ' + dameHora(aviso.fecha_inicio,fecha_actual)">&nbsp;</div>
                            
                            <p class="texto_aviso pt-1" v-text="aviso.contenido"></p>
                            <a href="" class="float-left" data-toggle="tooltip" data-placement="top" title="Agregar a favoritos"><i class="far fa-star"></i></a>
                            <a :href="'/ver-contenido/'+aviso.id"><div class="ver_aviso">Ver más...</div></a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
</template>

<script>
export default {
  data(){
      return{
          arrayAviso:[],
          imagen:'img/aviso1.jpg',
          contenido:'',
          fecha_actual :''
      }
  },
  methods:{
    listarAviso() {
        let me = this;
        axios.get('/aviso_principal')
            .then(function (response) {
                //console.log(response);
                var respuesta = response.data;
                me.arrayAviso = respuesta.aviso;
        })
        .catch(function (error) {
            console.log(error)
        })
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
    }
  },
  mounted() {
      let fecha = new Date();
      this.listarAviso();
      this.fecha_actual = fecha.getFullYear() + '-' + (fecha.getMonth()+1) + '-'+(fecha.getDate())+' '+fecha.getHours()+':'+fecha.getMinutes()+':'+fecha.getSeconds();
  },
  
}
</script>
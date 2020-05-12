<template>

 <div class="col-12 col-md-9 p-0 p-md-1">
    <!-- carga datos del aviso -->
    <div class="p-0 pb-2 cuadro_aviso_i mb-2">
        
        <div class="titulo_izq py-2 mb-2">Detalles del aviso </div>
        
        <div class="px-4 p-2 pr-3">
            <div class="row">
                
                <div class="col-12 col-sm-4">
                    <img :src="aviso.imagen" alt="" class="img-fluid img_aviso">
                </div>

                <div class="col-12 col-sm-8 ">
                    <div class="titulo_aviso"><a href="" v-text="aviso.titulo"></a></div>
                    <div class="lugar_aviso float-left font-weight-bold"> {{region.nombre}} &nbsp;</div>
                    <div class="hora_aviso" v-text=" ' hace ' + dameHora(aviso.fecha_inicio,fecha_actual)" >&nbsp;</div>
                    
                    <p class="texto_aviso pt-1" v-text="aviso.contenido"></p>

                </div>
            </div>
            <hr class="line" style="border: .5px solid #ADD8E6">
            <div class="row">
                <div class="col-12 col-sm-6 texto_aviso ">
                    <p><strong> Nombre: </strong>{{ usuario.nombre}} {{usuario.apellido}}</p>
                    <p><strong>Email:</strong> {{aviso.email}} </p> 
                    <p><strong>Celular:</strong> {{aviso.telefono}} </p> 
                </div>
                <div class="col-12 col-sm-6 texto_aviso  ">
                    <p><strong>Categoría:</strong>  {{categoria.nombre}} </p>
                    <p><strong>Lugar:</strong> {{region.nombre}}-{{provincia.nombre}}-{{distrito.nombre}}</p>
                    <p><strong>Dirección:</strong> {{aviso.direccion}} </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- carga comentarios o preguntas -->
    
    <div class="p-0 pb-2 cuadro_aviso_i mb-2">    
        
        <div class="titulo_izq py-2 mb-2">Comentarios del aviso </div>

        <div class="px-4 p-2 pr-3">
            <!-- @foreach ($aviso->comentarios as $comentario) -->
                <div v-for="(comentario,index) in comentarios" :key="index">
                    <div class="row pb-3">
                        <div class="col-2 col-sm-1 ">
                            <div class= "">
                                <a href=""><img class="avatar_aviso" :src="( usuario_coment[index].avatar|| 'img/avatar1.png' )" alt=" Avatar"></a>
                            </div>
                        </div>
                    
                        <div class="col-10 col-sm-11">
                            <div class=""><a href="" v-text="usuario_coment[index].nombre + ' ' + usuario_coment[index].apellido"></a></div>
                            <p class="m-0 texto_aviso" v-text="comentario.contenido"></p>
                        </div>

                    </div>
                    <hr class="line" style="border: .5px solid #ADD8E6">
                </div>
                
            <!-- @endforeach -->
        </div>
    </div>

    <!-- carga poner comentario o consulta -->
    <div class="p-0 pb-2 cuadro_aviso_i mb-2">
        
        <div class="titulo_izq py-2 mb-2">Agregar comentario</div>
        
        <div class="px-4 p-2 pr-3">
            <div class="row">
                <div class= "col-2 col-sm-1">
                    <a href=""><img class="avatar_aviso" :src=" ($store.state.usuario.avatar || 'img/avatar1.png' )" alt=" Avatar"></a>
                </div>
                <div class="col-10 col-sm-11 form-group">
                    <form >
                        <textarea class="form-control mb-2" rows="3" id="contenido_Aviso" name='comentario' v-model='comentario'></textarea>
                    </form>
                    
                    <div v-show="estadoErrores" class="div-error">
                        <div class="text-error">
                            <div v-if="errores.sesion" v-text="errores.sesion" style="color:red; margin:7px;"></div>
                            <div v-else-if="errores.comentario" v-text="errores.comentario" style="color:red; margin:7px;"></div>
                        </div>
                    </div>
                        
                    <button class="btn btn-primary" type="button" @click='subirComentario' >Enviar comentario</button>
                    <a :href="'/registro?ver-contenido='+aviso.id" v-show="user==0" ><div class="ver_aviso float-right">Inicia sesión para comentar</div></a>
                    <!-- @guest
                        <a href=""><div class="ver_aviso float-right">Inicia sesión para comentar</div></a>
                    @endguest -->
                </div>
            </div>

        </div>
    </div>

  </div>
</template>

<script>

export default{
  props:['ads','user'],
  data(){
    return {
      comentarios:[],
      errores:{},
      estadoErrores:0,
      aviso:{},
      region:{},
      provincia:{},
      usuario:{},
      usuario_coment:[],
      categoria:{},
      distrito:{},
      comentario:''
    }
  },
  computed:{
      
  },
  methods: {
    dameAviso : function (){
      //console.log(this.ads)
      let me = this;
        axios.get('/contenido/'+me.ads)
            .then(function (response) {
                //console.log(response);
                var respuesta = response.data;
                let {aviso, region, provincia, usuario, comentarios ,categoria, distrito, coment_user} = respuesta
                me.aviso = aviso
                me.region = region
                me.provincia = provincia
                me.usuario = usuario
                me.comentarios = comentarios
                me.categoria = categoria
                me.distrito = distrito
                me.usuario_coment = coment_user
                console.log(me.usuario_coment)
                me.comentario=''
        })
        .catch(function (error) {
            console.log(error)
        })
    },
    subirComentario: function(){
        this.errores = []
        this.estadoErrores = 0
        if(this.validarComentario()) return

        let me = this;
        axios.post('/comentar',{
            'contenido' : this.comentario,
            'aviso_id' : this.aviso.id
        }).then( (res) => {
            console.log('comentario creado')
        }).catch((err)=>{
            console.log( 'ha habido un error enviando : ' + err)
        })
        this.dameAviso()
        this.comentario=''
    },
    validarComentario: function(){
        this.estadoErrores = 0
        if(this.user == 0) this.errores.sesion = 'Debe iniciar sesion'
        if(this.comentario=='') this.errores.comentario = 'Ingrese un comentario'
        
        if(Object.entries(this.errores) != 0){
            this.estadoErrores = 1;
        }
        return this.estadoErrores;
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
  mounted(){
    let fecha = new Date();
    this.fecha_actual = fecha.getFullYear() + '-' + (fecha.getMonth()+1) + '-'+(fecha.getDate())+' '+fecha.getHours()+':'+fecha.getMinutes()+':'+fecha.getSeconds();
    this.dameAviso()

  }
}

</script>
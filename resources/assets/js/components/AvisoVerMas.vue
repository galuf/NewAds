<template>

 <div class="col-12 col-md-9 p-0 p-md-3">
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
                    <div class="lugar_aviso float-left font-weight-bold" v-text="region.nombre"></div>
                    <div class="hora_aviso">&nbsp;Hace 1 hora</div>
                    
                    <p class="texto_aviso pt-1" v-text="aviso.contenido"></p>

                </div>
            </div>
            <hr class="line" style="border: .5px solid #ADD8E6">
            <div class="row">
                <div class="col-12 col-sm-6 texto_aviso ">
                    <p><strong> Nombre: </strong>{{ usuario.nombre}} {{usuario.apellido}}</p>
                    <p><strong>Correo electrónico:</strong> {{aviso.email}} </p> 
                    <p><strong>Celular de contacto:</strong> {{aviso.telefono}} </p> 
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
                                <a href=""><img class="avatar_aviso" src="img/avatar1.png" alt=" Avatar"></a>
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
                    <a href=""><img class="avatar_aviso" src="img/avatar1.png" alt=" Avatar"></a>
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
      comentario:'',
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
                this.comentario=''
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
    }
  },
  mounted(){
      this.dameAviso()
  }
}

</script>
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
                    <div class="lugar_aviso float-left font-weight-bold" :v-text="region.nombre"></div>
                    <div class="hora_aviso">&nbsp;Hace 1 hora</div>
                    
                    <p class="texto_aviso pt-1" v-text="aviso.contenido"></p>

                </div>
            </div>
            <hr class="line" style="border: .5px solid #ADD8E6">
            <div class="row">
                <div class="col-12 col-sm-6 texto_aviso ">
                    <!-- <p><strong>Nombre:</strong> {{$aviso->usuario->nombre .' '. $aviso->usuario->apellido}}</p>
                    <p><strong>Correo electrónico:</strong> {{$aviso->email}} </p> 
                    <p><strong>Celular de contacto:</strong> {{$aviso->telefono}} </p>  -->
                </div>
                <div class="col-12 col-sm-6 texto_aviso  ">
                    <!-- <p><strong>Categoría:</strong> {{$aviso->categoria->nombre}} <p>
                    <p><strong>Lugar:</strong> {{$aviso->distrito->provincia->region->nombre .' - '. $aviso->distrito->provincia->nombre .' - '. $aviso->distrito->nombre}} </p>
                    <p><strong>Dirección:</strong> {{$aviso->direccion}} <p> -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- carga comentarios o preguntas -->
    
    <div class="p-0 pb-2 cuadro_aviso_i mb-2">    
        
        <div class="titulo_izq py-2 mb-2">Comentarios del aviso </div>

        <div class="px-4 p-2 pr-3">
            <!-- @foreach ($aviso->comentarios as $comentario) -->
                
                <div class="row pb-3" v-for="(comentario,index) in comentarios" :key="index">
                    <div class="col-2 col-sm-1 ">
                        <div class= "">
                            <a href=""><img class="avatar_aviso" src="img/avatar1.png" alt=" Avatar"></a>
                        </div>
                    </div>
                
                    <div class="col-10 col-sm-11">
                        <div class=""><a href="" v-text="usuario.nombre + ' ' + usuario.apellido"></a></div>
                        <p class="m-0 texto_aviso" v-text="comentario.contenido"></p>
                    </div>
                </div>
                <hr class="line" style="border: .5px solid #ADD8E6">
                
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
                    <form>
                        <textarea class="form-control mb-2" rows="3" id="contenido_Aviso" name='comentario' v-model='comentario'></textarea>
                    </form>
                        <button class="btn btn-primary" @click='subirComentario' >Enviar comentario</button>
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
  props:['ads'],
  data(){
    return {
      comentarios:[],
      aviso:{},
      region:{},
      provincia:{},
      usuario:{},
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
                let {aviso, region, provincia, usuario, comentarios} = respuesta
                me.aviso = aviso
                me.region = region
                me.provincia = provincia
                me.usuario = usuario
                me.comentarios = comentarios
        })
        .catch(function (error) {
            console.log(error)
        })
    },
    subirComentario: function(){
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
    }
  },
  mounted(){
      this.dameAviso()
  }
}

</script>
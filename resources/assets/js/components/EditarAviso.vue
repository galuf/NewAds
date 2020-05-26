<template>
      <!-- lado centro derecho -->
    <div class="col-12 col-md-9 p-0 p-md-1">
    <form action="" method="post" enctype="multipart/form-data"> 
      <!-- Datos de Ubicacion del Anuncio -->
      <div class="p-0 py-2 cuadro_aviso_i mb-2">
          
          <div class="formulario_cont p-2 pr-3">
              
              <!-- Seleccion de Categoria-->
              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Categoría:</label>
                  </div>
                  <div class="col-12 col-sm-10 form-group"> 
                    <select v-model="categoria_id" name="categoria" id="option" class="form-control" >
                        <option disabled value="">Seleccione una Categoria</option>
                        <option value="1">Alquileres</option>
                        <option value="2">Casas y lotes</option>
                        <option value="3">Automóviles</option>
                        <option value="4">Necesito</option>
                        <option value="5">Empleo</option>
                        <option value="6">Educación</option>
                        <option value="7">Informática</option>
                        <option value="8">Mascotas</option>
                        <option value="9">Hogar</option>
                        <option value="10">Deporte</option>
                        <option value="11">Eventos</option>
                        <option value="12">Arte</option>
                    </select>
                    
                    <div v-show="estado_errores && errores.categoria" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.categoria" class="error"></div>
                        </div>
                    </div>
                  
                  </div>


              </div>
              <!-- Fin de Seleccion de Categoria-->
              
              <!-- Seleccion de Region-->
              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Región:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                    <select v-model='region_id' name="region" id="option" class="form-control">
                        <option disabled value="" >Seleccione una Region</option>
                        <option v-for='(region,index) in regiones' :key="index" :value="region.id" v-text="region.nombre"></option>
                    </select>
                  
                    <div v-show="estado_errores && errores.region" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.region" class="error"></div>
                        </div>
                    </div>
                  </div>
              </div>
              <!-- Fin de Seleccion de Region-->

              <!-- Seleccion de Provincia -->
              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Provincia:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <select v-model='provincia_id' name="provincia" id="option" class="form-control">
                        {{listarProvincia}}
                        <option disabled value="">Seleccione una Provincia</option>
                        <option v-for='(provincia,index) in provincias' :key="index" :value="provincia.id" v-text="provincia.nombre"></option>   
                      </select>
                        <div v-show="estado_errores && errores.provincia" class="div-error">
                            <div class="text-error" >
                                <div v-text="errores.provincia" class="error"></div>
                            </div>
                        </div>
                  </div>
              </div>
              <!-- Fin de Seleccion de Provincia-->

              <!-- Seleccion de Distrito-->
              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Distrito:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                    <select v-model='distrito_id' name="distrito" id="option" class="form-control">
                        {{listarDistrito}}
                        <option disabled value="">Seleccione un Distrito</option>
                        <option v-for='(distrito,index) in distritos' :key="index" :value="distrito.id" v-text="distrito.nombre"></option>   
                    </select>    
                    
                    <div v-show="estado_errores && errores.distrito" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.distrito" class="error"></div>
                        </div>
                    </div>
                  </div>
              </div>
              <!-- Fin de Seleccion de Distrito-->

              <!-- Input de Direccion -->
              <div class="row">
                  <div class="col-0 col-sm-2 form-group ">
                      <label for="" class="control-label">Dirección:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <input v-model="aviso.direccion" type="text"  class="form-control" id="direccion" placeholder="Ingrese la direccion">
                    <div v-show="estado_errores && errores.direccion" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.direccion" class="error"></div>
                        </div>
                    </div>
                  </div>
              </div>
              <!-- Fin de Input de Direccion -->
          </div>
      </div>
      <!-- Fin de Datod de ubicacion del Anuncio -->

      <!-- Datos del Contenido del Anuncio -->
      <div class="p-0 py-1 cuadro_aviso_i mb-2">
          <div class="formulario_cont p-2 pr-3">
            
            <!-- Input Titulo del aviso -->
            <div class="row">
                <div class="col-0 col-sm-2 form-group">
                    <label for="" class="control-label">Título del aviso:</label>
                </div>
                
                <div class="col-12 col-sm-10 form-group">
                    <input v-model="aviso.titulo" type="text" class="form-control" id="titulo_aviso" placeholder="Ingrese el título del aviso">
                    <div v-show="estado_errores && errores.titulo" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.titulo" style="color:red;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin del Input Titulo del aviso -->

            <!-- Input COntenido del aviso -->
            <div class="row">
                <div class="col-12 col-sm-2 form-group">
                    <label for="" class="control-label">Contenido del aviso:</label>
                </div>
                
                <div class="col-12 col-sm-10 form-group">     
                    <textarea v-model='aviso.contenido' class="form-control" rows="6" id="contenido_Aviso"></textarea>
                    
                    <div v-show="estado_errores && errores.contenido" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.contenido" class="error"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Input COntenido del aviso -->

            <!-- Input Imagen del aviso -->
            <div class="row">
                <div class="col-12 col-sm-4 form-group">
                    <label for="" class="control-label">Imagen del aviso:</label>
                </div>

                <div class="img-usuario col-sm-4">
                    <img class="img-fluid img_aviso" :src="( imagen )" >
                    <div class="form-group">
                    <input type="file" @change ='obtenerImagen' class="form-control-file border form-control" name="file">
                    </div>
                </div>
                <div class="col-sm-4"></div>
                <div v-show="estado_errores && errores.imagen" class="div-error">
                    <div class="text-error">
                        <div v-text="errores.imagen" class="error"></div>
                    </div>
                </div>
            </div>
            <!-- Fin de Imagen del aviso -->
        </div>
      </div>
      <!-- Fin de Datos del Contenido del Anuncio -->

      <!-- Datos del Usuario -->
      <div class="p-0 py-2 cuadro_aviso_i mb-2">
        <div class="formulario_cont p-2 pr-3">
            
            <!-- Input nombre de Usuario -->
            <div class="row">
                <div class="col-0 col-sm-2 form-group">
                    <label for="" class="control-label">Nombres:</label>
                </div>
                
                <div class="col-12 col-sm-10 form-group">
                    <input disabled type="text" class="form-control" id="nombre" placeholder="Ingrese los nombres" v-model="usuario.nombre" >
                <div v-show="estado_errores && errores.nombre" class="div-error">
                    <div class="text-error">
                        <div v-text="errores.nombre" class="error"></div>
                    </div>
                </div>
                </div>
            </div>
            <!-- FIn de Input nombre de Usuario -->
            
            <!-- Input Apellidos de Usuario -->
            <div class="row">
                <div class="col-0 col-sm-2 form-group">
                    <label for="" class="control-label">Apellidos:</label>
                </div>
                
                <div class="col-12 col-sm-10 form-group">
                    <input disabled type="text" class="form-control" id="apellidos" placeholder="Ingrese los apellidos" v-model="usuario.apellido">
                    <div v-show="estado_errores && errores.apellido" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.apellido" class="error"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin de Input Apellido de Usuario -->

            <!-- Input email de Usuario -->
            <div class="row">
                <div class="col-0 col-sm-2 form-group">
                    <label for="" class="control-label">Correo electrónico:</label>
                </div>
                
                <div class="col-12 col-sm-10 form-group">
                    <input disabled type="email" class="form-control" id="email" placeholder="Ingrese el correo electrónico" v-model="usuario.email">
                
                    <div v-show="estado_errores && errores.email" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.email" class="error"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin de Input email de Usuario -->

            <!-- Input Telefono de Usuario -->
            <div class="row">
                <div class="col-0 col-sm-2 form-group">
                    <label for="" class="control-label">Teléfono:</label>
                </div>
                
                <div class="col-12 col-sm-10 form-group">
                    <input type="text" class="form-control" id="telefono" placeholder="Ingrese el número de teléfono" v-model="usuario.telefono">
                    <div v-show="estado_errores && errores.telefono" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.telefono" class="error"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin de Input Telefono de Usuario -->
        </div>
      </div> 
      <!-- Fin de Datos del Usuario -->

    </form>
    
    <!-- boton enviar aviso -->
    <div class="container-fluid btn_ver_mas pt-2 d-flex justify-content-end">
        <button v-if="loading == false" @click="crearAviso()" type="button" class="btn btn-primary">Guardar Aviso</button>
        <button v-if="loading" type="button" class="btn btn-primary"><spinner2 /></button>
        <button @click="cancelar()" class="btn btn-danger mx-2">Cancelar</button>
    </div>
    <!-- Fin boton enviar aviso -->
    <div v-show="loading" class="alert alert-info" role="alert">Cargando, espere por favor</div>

    </div>
</template>

<script>
import Spinner2 from './Spinner2'
export default {
  props:['ads','user'],
  components:{
      Spinner2
  },
  data(){
    return{
        regiones:[],
        provincias:[],
        distritos:[],
        region_id: '',
        region_prev:'',
        provincia_id: '',
        provincia_prev:'',
        distrito_id: '',
        distrito_prev: '',
        categoria_id:'',
        aviso : {},
        usuario: {},
        errores:{},  
        estado_errores : 0,
        imagen: '',
        modificador : false,
        loading : false,
        imagen_error : false
    }
 },
 computed:{

   listarProvincia(){
      let me = this;
      axios.get('/provincia?region_id='+this.region_id)
      .then(function (response) {
                //console.log(response);
                var respuesta = response.data;
                me.provincias = respuesta.provincia;
        })
        .catch(function (error) {
            console.log(error)
        })
        //this.provincia_id = ''
        //this.distrito_id = ''
    },
    listarDistrito(){
        let me = this;
        axios.get('/distrito?region_id='+this.region_id+'&provincia_id='+this.provincia_id)
        .then(function (response) {
            //console.log(response);
            var respuesta = response.data;
            me.distritos = respuesta.distrito;
        })
        .catch(function (error) {
            console.log(error)
        })

    },
    imagenURL(){
        return this.imagen
    }
 }, 
 methods:{
    cancelar(){
        this.$store.commit('contenidoCambio',1)
        this.$router.push({path: '/perfilUsuario'})
    },
    avisoDatos(){
        let me = this;
        axios.get('/editarAviso?ads='+me.ads)
            .then(function (response) {
                //console.log(response);
                var respuesta = response.data;
                me.aviso = respuesta.aviso
                me.categoria_id = respuesta.aviso.categoria_id
                me.region_id = respuesta.aviso.region_id
                me.region_prev = respuesta.aviso.region_id
                me.provincia_id = respuesta.aviso.provincia_id
                me.provincia_prev = respuesta.aviso.provincia_id
                me.distrito_id  = respuesta.aviso.distrito_id
                me.distrito_prev = respuesta.aviso.distrito_id
                me.imagen = respuesta.aviso.imagen
                console.log(me.imagen)
            })
            .catch(function (error) {
                console.log(error)
            })
    },
    obtenerImagen(e){
        this.imagen_error = false
        let extencion = e.target.files[0].name.split('.') 
        let ext = extencion[extencion.length-1]
        let extensiones_permitidas = ["png","jpg", "jpeg"];
        
        if(extensiones_permitidas.includes(ext)){
            let file = e.target.files[0]
            let fileReader = new FileReader()
            fileReader.readAsDataURL(file)

            fileReader.onload = (e)=>{
            this.imagen = e.target.result;
            console.log('permitido')
            }
            this.modificador = true;

        }else{
            console.log('No permitido')
            this.imagen_error = true
            this.imagen = ''
        }
    },
    listarRegiones() {
        let me = this;
        axios.get('/regiones')
            .then(function (response) {
                //console.log(response);
                var respuesta = response.data;
                me.regiones = respuesta.region;
        })
        .catch(function (error) {
            console.log(error)
        })
    },
    datosUsuario(){
        let me = this;
        me.usuario = this.$store.state.usuario;
    },
    validarAvisos(){
        this.estado_errores = 0;
        this.errores = {};
        if( this.categoria_id == '' ) this.errores.categoria = "Seleccione una categoria";
        if( this.region_id == '') this.errores.region = "Seleccione una region";
        if( this.region_id != this.region_prev && ( this.provincia_id == this.provincia_prev)) this.errores.provincia = "Seleccione una provincia";
        if( this.region_id != this.region_prev && ( this.provincia_id != this.provincia_prev) && (this.distrito_id == this.distrito_prev)) this.errores.distrito = "Seleccione una distrito";
        if( this.provincia_id == '' ) this.errores.provincia = "Seleccione una provincia";
        if( this.distrito_id == '' ) this.errores.distrito = "Seleccione una distrito";
        if( this.aviso.direccion == '' ) this.errores.direccion = "Ingrese su direccion";
        if( this.aviso.titulo == '' ) this.errores.titulo = "Ingrese el titulo";
        if( this.aviso.contenido == '' ) this.errores.contenido = "Ingrese la descripcion del aviso";
        if( this.usuario.telefono == '' || this.usuario.telefono == null ) this.errores.telefono = "Ingrese su telefono";
        if( this.imagen_error) this.errores.imagen = "Formato de imagen invalido (ingrese .jpg, .jpeg, .png)"
        if(Object.entries(this.errores) != 0){
            this.estado_errores = 1;
        }

        return this.estado_errores;
    },
    crearAviso(){
        this.dameHora();
        if(this.validarAvisos()){
            console.log(this.errores+ '  ');
            console.log(this.usuario.telefono)
            window.scroll (0, 0);
            return
        }
        //console.log(`${this.region_id} ${this.provincia_id} ${this.distrito_id}`)
        let me = this;
        this.loading = true
        let variable = (this.modificador) ? this.imagen : ''  
        axios.put('/editarAviso',{
            'id' : this.ads,
            'categoria_id' : this.categoria_id,
            'distrito_id' : this.distrito_id,
            'provincia_id': this.provincia_id,
            'region_id' : this.region_id,
            'direccion' :  this.aviso.direccion,
            'telefono' : this.usuario.telefono,
            'titulo' : this.aviso.titulo,
            'imagen' : variable,
            'contenido' : this.aviso.contenido,
        }).then( (res) => {
            this.loading = false
            console.log('aviso modificado')
            //window.location.href = 'some url';
            //alert('Se modifico el aviso Correctamente');
            this.$router.push({path: '/'})
            this.$store.commit('mensajeShow','Aviso Modificado')
        }).catch((err)=>{
            console.log( 'ha habido un error enviando : ' + err)
        })
    },
    dameHora(){
        let fecha = new Date();
        this.fecha_inicio = fecha.getFullYear() + '-' + (fecha.getMonth()+1) + '-'+(fecha.getDate())+' '+fecha.getHours()+':'+fecha.getMinutes()+':'+fecha.getSeconds();
    }
 },
 mounted() {
    this.listarRegiones();
    this.datosUsuario();
    this.avisoDatos();
 }
}
</script>
<style>
.error{
    color: red;
    font-size: 12;
    margin-left: 5px;
}
</style>
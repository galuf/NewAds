<template>
    <!-- lado centro derecho -->
    <div class="col-12 col-md-9 p-0 p-md-3">
    <form action="" method="post" enctype="multipart/form-data"> 
      <div class="p-0 py-2 cuadro_aviso_i mb-2">
          
          <div class="formulario_cont p-2 pr-3">
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
                            <div v-text="errores.categoria" style="color:red;"></div>
                        </div>
                    </div>
                  
                  </div>


              </div>
              
              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Región:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                    <select v-model='region_id' name="region" id="option" class="form-control">
                        <option disabled value="">Seleccione una Region</option>
                        <option v-for='region in regiones' :key="region" :value="region.id" v-text="region.nombre"></option>
                    </select>
                  
                    <div v-show="estado_errores && errores.region" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.region" style="color:red;"></div>
                        </div>
                    </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Provincia:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <select v-model='provincia_id' name="provincia" id="option" class="form-control">
                        {{listarProvincia}}
                        <option disabled value="">Seleccione una Provincia</option>
                        <option v-for='provincia in provincias' :key="provincia" :value="provincia.id" v-text="provincia.nombre"></option>   
                      </select>
                        <div v-show="estado_errores && errores.provincia" class="div-error">
                            <div class="text-error" >
                                <div v-text="errores.provincia" style="color:red;"></div>
                            </div>
                        </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Distrito:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                    <select v-model='distrito_id' name="distrito" id="option" class="form-control">
                        {{listarDistrito}}
                        <option disabled value="">Seleccione un Distrito</option>
                        <option v-for='distrito in distritos' :key="distrito" :value="distrito.id" v-text="distrito.nombre"></option>   
                    </select>    
                    
                    <div v-show="estado_errores && errores.distrito" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.distrito" style="color:red;"></div>
                        </div>
                    </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-0 col-sm-2 form-group ">
                      <label for="" class="control-label">Dirección:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <input v-model="direccion" type="text" class="form-control" id="direccion" placeholder="Ingrese la direccion">
                    <div v-show="estado_errores && errores.direccion" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.direccion" style="color:red;"></div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="p-0 py-1 cuadro_aviso_i mb-2">
          
          <div class="formulario_cont p-2 pr-3">
              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Título del aviso:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <input v-model="titulo" type="text" class="form-control" id="titulo_aviso" placeholder="Ingrese el título del aviso">
                    <div v-show="estado_errores && errores.titulo" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.titulo" style="color:red;"></div>
                        </div>
                    </div>
                  </div>

              </div>
              

              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Contenido del aviso:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      
                    <textarea v-model='contenido' class="form-control" rows="6" id="contenido_Aviso"></textarea>
                    
                    <div v-show="estado_errores && errores.contenido" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.contenido" style="color:red;"></div>
                        </div>
                    </div>
                  </div>


              </div>

              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Imagen del aviso:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <input type="file" class="form-control-file border form-control" name="file">
                  </div>
              </div>
              
              <div class="row">
                  <div class="">
                      <div class="grid-container2">
                          <div class="grid-item pb-1 pr-1">
                              <div class="img_aviso1">
                                  <img src="img/alq1.png" alt="" class="img-fluid">
                              </div>
                          </div>
                          <div class="grid-item pb-1 pr-1">
                              <div class="img_aviso1">
                                  <img src="img/alq2.png" alt="" class="img-fluid">
                              </div>
                          </div>
                          <div class="grid-item pb-1 pr-1">
                              <div class="img_aviso1">
                                  <img src="img/alq1.png" alt="" class="img-fluid">
                              </div>
                          </div>
                          <div class="grid-item pb-1 pr-1">
                              <div class="img_aviso1">
                                  <img src="img/alq2.png" alt="" class="img-fluid">
                              </div>
                          </div>
                          <div class="grid-item pb-1 pr-1">
                              <div class="img_aviso1">
                                  <img src="img/alq1.png" alt="" class="img-fluid">
                              </div>
                          </div>
                          <div class="grid-item pb-1 pr-1">
                              <div class="img_aviso1">
                                  <img src="img/alq1.png" alt="" class="img-fluid">
                              </div>
                          </div>
                          <div class="grid-item pb-1 pr-1">
                              <div class="img_aviso1">
                                  <img src="img/alq1.png" alt="" class="img-fluid">
                              </div>
                          </div>
                          <div class="grid-item pb-1 pr-1">
                              <div class="img_aviso1">
                                  <img src="img/alq1.png" alt="" class="img-fluid">
                              </div>
                          </div>
                          <div class="grid-item pb-1 pr-1">
                              <div class="img_aviso1">
                                  <img src="img/alq1.png" alt="" class="img-fluid">
                              </div>
                          </div>
                          <div class="grid-item pb-1 pr-1">
                              <div class="img_aviso1">
                                  <img src="img/alq1.png" alt="" class="img-fluid">
                              </div>
                          </div>
                          

                      </div>
                  </div>

              </div>

          </div>
      </div>

      <div class="p-0 py-2 cuadro_aviso_i mb-2">
          
          <div class="formulario_cont p-2 pr-3">
              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Nombres:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <input type="text" class="form-control" id="nombre" placeholder="Ingrese los nombres" v-model="usuario.nombre" >
                    <div v-show="estado_errores && errores.nombre" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.nombre" style="color:red;"></div>
                        </div>
                    </div>
                  </div>
              </div>
              

              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Apellidos:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <input type="text" class="form-control" id="apellidos" placeholder="Ingrese los apellidos" v-model="usuario.apellido">
                    <div v-show="estado_errores && errores.apellido" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.apellido" style="color:red;"></div>
                        </div>
                    </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Correo electrónico:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                    <input type="email" class="form-control" id="email" placeholder="Ingrese el correo electrónico" v-model="usuario.email">
                    
                    <div v-show="estado_errores && errores.email" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.email" style="color:red;"></div>
                        </div>
                    </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Teléfono:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <input type="text" class="form-control" id="telefono" placeholder="Ingrese el número de teléfono" v-model="usuario.telefono">
                    <div v-show="estado_errores && errores.telefono" class="div-error">
                        <div class="text-error">
                            <div v-text="errores.telefono" style="color:red;"></div>
                        </div>
                    </div>
                  </div>
              </div>
              
          </div>
      </div> 
      </form>
        <!-- boton enviar aviso -->
      <div class="container-fluid btn_ver_mas pt-2">
          <button @click="crearAviso()" type="button" class="btn btn-primary btn_mas">Enviar aviso</button>
      </div>
    </div>
</template>

<script>
export default {
 data(){
      return{
          regiones:[],
          provincias:[],
          distritos:[],
          region_id: '',
          provincia_id: '',
          distrito_id: '',
          categoria_id:'',
          usuario:{},
          direccion:'',
          titulo:'',
          imagen:'img/aviso1.jpg',
          arrayAviso:[],
          contenido:'',
          fecha_inicio:'',
          errores:{},  
          estado_errores : 0   

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
    }
 }, 
 methods:{
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
        axios.get('/usuario')
            .then(function (response) {
                //console.log(response);
                var respuesta = response.data;
                me.usuario = respuesta.usuario;
                //console.log(me.usuario)
        })
        .catch(function (error) {
            console.log(error)
        })
    },
    validarAvisos(){
        this.estado_errores = 0;
        this.errores = {};
        if( this.categoria_id == '' ) this.errores.categoria = "Seleccione una categoria";
        if( this.region_id == '' ) this.errores.region = "Seleccione una region";
        if( this.provincia_id == '' ) this.errores.provincia = "Seleccione una provincia";
        if( this.distrito_id == '' ) this.errores.distrito = "Seleccione una distrito";
        if( this.direccion == '' ) this.errores.direccion = "Ingrese su direccion";
        if( this.titulo == '' ) this.errores.titulo = "Ingrese el titulo";
        if( this.contenido == '' ) this.errores.contenido = "Ingrese la descripcion del aviso";
        if( this.usuario.nombre == '' ) this.errores.nombre = "Ingrese su nombre";
        if( this.usuario.apellido == '' ) this.errores.apellido = "Ingrese su apellido";
        if( this.usuario.email == '' ) this.errores.email = "Ingrese su correo electronico";
        if( this.usuario.telefono == '' || this.usuario.telefono == null ) this.errores.telefono = "Ingrese su telefono";
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
            return
        }
        let me = this;
        axios.post('/aviso_crear',{
            'usuario_id' : this.usuario.id,
            'categoria_id' : this.categoria_id,
            'distrito_id' : this.distrito_id,
            'direccion' :  this.direccion,
            'telefono' : this.usuario.telefono,
            'email' : this.usuario.email,
            'titulo' : this.titulo,
            'imagen' : this.imagen,
            'contenido' : this.contenido,
            'fecha_inicio': this.fecha_inicio,//this.fecha_inicio,
        }).then( (res) => {
            console.log('aviso creado')
            alert('Se creo el aviso');
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
      //this.listarProvincia();
}

}
</script>
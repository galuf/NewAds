<template>
   <!-- lado centro derecho -->
  <div class="col-12 col-md-9 p-0 p-md-3">
      
    <form action="">

      <div class="p-0 py-2 cuadro_aviso_i mb-2">
          
          <div class="formulario_cont p-2 pr-3">
              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Categoría:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      
                      <select name="categoria" id="option" class="form-control">
                          <option disabled value="">Seleccione una Categoria</option>
                          <option value="">Alquileres</option>
                          <option value="">Casas y lotes</option>
                          <option value="">Automóviles</option>
                          <option value="">Necesito</option>
                          <option value="">Empleo</option>
                          <option value="">Educación</option>
                          <option value="">Informática</option>
                          <option value="">Mascotas</option>
                          <option value="">Hogar</option>
                          <option value="">Deporte</option>
                          <option value="">Eventos</option>
                          <option value="">Arte</option>
                      </select>
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
                  </div>
              </div>
              <div class="row">
                  <div class="col-0 col-sm-2 form-group ">
                      <label for="" class="control-label">Dirección:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <input type="text" class="form-control" id="direccion" placeholder="Ingrese la direccion">
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
                      <input type="text" class="form-control" id="titulo_aviso" placeholder="Ingrese el título del aviso">
                  </div>
              </div>
              

              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Contenido del aviso:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      
                      <textarea class="form-control" rows="6" id="contenido_Aviso"></textarea>
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
                      <input type="text" class="form-control" id="nombre" placeholder="Ingrese los nombres" :value="usuario.nombre" >
                  </div>
              </div>
              

              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Apellidos:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <input type="text" class="form-control" id="apellidos" placeholder="Ingrese los apellidos" :value="usuario.apellido">
                  </div>
              </div>

              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Correo electrónico:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <input type="text" class="form-control" id="email" placeholder="Ingrese el correo electrónico" :value="usuario.email">
                  </div>
              </div>

              <div class="row">
                  <div class="col-0 col-sm-2 form-group">
                      <label for="" class="control-label">Teléfono:</label>
                  </div>
                  
                  <div class="col-12 col-sm-10 form-group">
                      <input type="text" class="form-control" id="telefono" placeholder="Ingrese el número de teléfono" :value="usuario.telefono">
                  </div>
              </div>
              
          </div>
      </div>

        <!-- boton enviar aviso -->
      <div class="container-fluid btn_ver_mas pt-2">
          <button type="submit" class="btn btn-primary btn_mas">Enviar aviso</button>
      </div> 

    </form>

  </div>
      
  <!-- fin lado centro derecho -->
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
          usuario:{},
          arrayAviso:[],
          imagen:'img/aviso1.jpg',
          contenido:'',
          fecha_actual :''
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
                console.log(me.usuario)
        })
        .catch(function (error) {
            console.log(error)
        })
    }
    
 },
 mounted() {

      this.listarRegiones();
      this.datosUsuario();
      //this.listarProvincia();
  },
  update(){
    //this.listarProvincia();
  }   

}
</script>
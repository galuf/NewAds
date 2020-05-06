<template>
    <!-- lado centro derecho -->
  <div class="col-12 col-md-9 p-0 p-md-1">
    <div class="titulo"><div class="texto-perfil">Datos de Usuario</div></div>
    
    <div class="p-0 py-2 cuadro_aviso_i mb-2"> 
        <div class=" p-2 pr-3">
            <div class="row">
                
                <div class="col-12 col-sm-3">
                    <div class="img_usuario"><img :src="( imagenURL || ($store.state.usuario.avatar || 'img/avatar1.png' ))" class="img-fluid img_aviso"></div>
                    <div class="texto_perfil small">Carga o cambia tu imagen</div>
                    <div class="form-group">
                        <input type="file" @change ='obtenerImagen' class="form-control-file border form-control" name="file">
                    </div>
                </div>

                <div class="col-12 col-sm-9">
                    <!-- Input nombre de Usuario -->
                    <div class="row">
                        <div class="col-0 col-sm-2 form-group">
                        <label for="" class="control-label">Nombres:</label>
                        </div>
                        <div class="col-12 col-sm-10 form-group">
                            <input disabled type="text" class="form-control" id="nombre" placeholder="Ingrese los nombres" v-model="usuario.nombre" >
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
                                    <div v-text="errores.telefono" style="color:red;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin de Input Telefono de Usuario -->
                    
                    <!-- Seleccion de Region-->
                    <div class="row">
                        <div class="col-0 col-sm-2 form-group">
                            <label for="" class="control-label">Región:</label>
                        </div>
                        
                        <div class="col-12 col-sm-10 form-group">
                            <select v-model='region_id' name="region" id="option" class="form-control">
                                <option disabled value="" v-text=" usuario.region || 'Seleccione una Region'"></option>
                                <option v-for='(region,index) in regiones' :key="index" :value="region.id" v-text="region.nombre"></option>
                            </select>

                            <div v-show="estado_errores && errores.region" class="div-error">
                                <div class="text-error">
                                    <div v-text="errores.region" style="color:red;"></div>
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
                                <option disabled value="" v-text=" usuario.region || 'Seleccione una Provincia'"></option>
                                <option v-for='(provincia,index) in provincias' :key="index" :value="provincia.id" v-text="provincia.nombre"></option>   
                            </select>
                                <div v-show="estado_errores && errores.provincia" class="div-error">
                                    <div class="text-error" >
                                        <div v-text="errores.provincia" style="color:red;"></div>
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
                                <option disabled value="" v-text=" usuario.distrito || 'Seleccione un Distrito'"></option>
                                <option v-for='(distrito,index) in distritos' :key="index" :value="distrito.id" v-text="distrito.nombre"></option>   
                            </select>    
                            
                            <div v-show="estado_errores && errores.distrito" class="div-error">
                                <div class="text-error">
                                    <div v-text="errores.distrito" style="color:red;"></div>
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
                            <input v-model="usuario.direccion" type="text" class="form-control" id="direccion" placeholder="Ingrese la direccion">
                            <div v-show="estado_errores && errores.direccion" class="div-error">
                                <div class="text-error">
                                    <div v-text="errores.direccion" style="color:red;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin de Input de Direccion -->
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" @click="editarPerfil()"> Guardar </button>
                    </div>

                </div>

            </div>   
        </div>
    </div>
  
  </div>    
  <!-- fin lado centro derecho -->

</template>

<script>
export default {
  data(){
    return {
        regiones:[],
        provincias:[],
        distritos:[],
        region_id: '',
        provincia_id: '',
        distrito_id: '',
        usuario:{},
        errores:{},  
        estado_errores : 0,
        imagen :''
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
    },
    imagenURL(){
        return this.imagen
    }
 },
 methods:{
    editarPerfil(){
        if(this.validarAvisos()){
            console.log(this.errores);
            //console.log(this.usuario.telefono)
            return
        }
        let me = this
        let url = '/editarPerfil'
        axios.put(url,{
            'id' : this.usuario.id,
            'region_id': this.region_id,
            'provincia_id':this.provincia_id,
            'distrito_id' : this.distrito_id,
            'telefono' : this.usuario.telefono,
            'direccion': this.usuario.direccion,
            'imagen' : this.imagen
        })
        .then( res => {
            this.$store.commit('login',res.data.usuario)
            this.$store.commit('contenidoCambio',0)
        })
        .catch( err => {
            console.log(err)
        })
        //console.log(`region : ${this.region_id}, provincia : ${this.provincia_id}, distrito : ${this.distrito_id}`)
        //console.log(this.usuario)
    },
    obtenerImagen(e){
        let file = e.target.files[0]
        let fileReader = new FileReader()
        fileReader.readAsDataURL(file)

        fileReader.onload = (e)=>{
            this.imagen = e.target.result;
        }
        //fileReader.readAsDataURL(file)
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
        let exp = /^[0-9]*$/
        this.estado_errores = 0;
        this.errores = {}
        if( this.usuario.telefono == null || this.usuario.telefono == '' ) this.errores.telefono = "Ingrese su telefono";
        if( !exp.test(this.usuario.telefono)) this.errores.telefono = "Ingrese un telefono correcto";
        if( this.usuario.region == null && this.region_id == '' ) this.errores.region = "Ingrese su Region";
        if( this.usuario.provincia == null && this.provincia_id == '' ) this.errores.provincia = "Ingrese su Provincia";
        if( this.usuario.distrito == null && this.distrito_id == '' ) this.errores.distrito = "Ingrese su Distrito";
        if( this.usuario.region != null && !( ((this.region_id == '') === (this.provincia_id == '') ) && ( (this.region_id == '') === (this.distrito_id == '') ) )){
            this.errores.region = "Ingrese su Region"
            this.errores.provincia = "Ingrese su Provincia"
            this.errores.distrito = "Ingrese su Distrito";
        }
        if(Object.entries(this.errores) != 0){
            this.estado_errores = 1;
        }

        return this.estado_errores;
    }
 },
  mounted() {

    this.listarRegiones();
    this.datosUsuario();
      //this.listarProvincia();
}
}
</script>
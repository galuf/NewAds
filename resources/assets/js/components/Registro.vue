<template>
<div class="col-12 col-md-7 p-0 p-md-3 registro">
    <div class="p-0 py-2 cuadro_aviso_i mb-2">
        <div class="formulario_cont p-2 pr-3">
            <form role="form" id="register-form">
            
            <div class="form-header">
                <h3 class="form-title"><i class="fa fa-user"></i> Regístrate</h3>
                <small> Es fácil y no demoras nada.</small>
                            
                <div class="pull-right">
                    <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                </div>
                        
            </div>
                                        
            <div class=" form-group">
                <input v-model="nombre" type="text" class="form-control" placeholder="Nombre" name="name" required autofocus>
                <div v-if="stateError && (errors.nombre)">
                  <span v-text="errors.nombre[0]" style="color:red;"></span>
                </div>
            </div>

            <div class="form-group">
                <input v-model="apellidos" type="text" class="form-control" placeholder="Apellidos" name="lastname" required autofocus>
                <div v-if="stateError && (errors.apellidos)">
                  <span v-text="errors.apellidos[0]" style="color:red;"></span>
                </div>
            </div>   

            <div class=" form-group">
                <input v-model="email" type="email" name="email" class="form-control"  placeholder="Correo electrónico"  required>
                <div v-if="stateError && (errors.email)">
                  <span v-text="errors.email[0]" style="color:red;"></span>
                </div>
            </div>

            <div class=" form-group">
                <input v-model="password" type="password" name="password" class="form-control" placeholder="Contraseña"  required>
                <div v-if="stateError && (errors.password)">
                  <span v-text="errors.password[0]" style="color:red;"></span>
                </div>
            </div>

            <div class=" form-group">
                <input v-model="password_confirmation" type="password" class="form-control" placeholder="Confirma tu Contraseña" name="password_confirmation" required>
            </div>

            <div class="texto_reg">Al hacer clic en Registrarte, aceptas las Condiciones y 
                la Política de privacidad. Es posible 
                que te enviemos notificaciones por SMS que podrás desactivar cuando desees.</div>

            <div class="form-footer">
                <button type="button" class="btn btn-info" @click="registrar">
                <span class="glyphicon glyphicon-log-in"></span> Registrarte
                </button>
            </div>
        </form>

      </div>
    </div>   
  </div>
</template>

<script>
import { bus } from '../app'
export default {
  data(){
    return {
      nombre : '',
      apellidos : '',
      email : '',
      password : '',
      password_confirmation : '',
      stateError : false,
      errors : {}
    }
  },
  methods:{
    registrar(){
      let me = this
      axios.post('/register',{
        nombre : this.nombre,
        apellidos : this.apellidos,
        email : this.email,
        password : this.password,
        password_confirmation : this.password_confirmation
      })
      .then( res => {  
        console.log(res)
        this.stateError = false
        this.errors = {}
        bus.$emit('sesion', {sesion :true})
        me.$router.push({path:'/'})
      })
      .catch(err =>{
        //console.log(err.response.data.errors)
        this.stateError = true
        this.errors = err.response.data.errors
        this.password = ''
        this.password_confirmation = ''
      })
    }
  }
}
</script>
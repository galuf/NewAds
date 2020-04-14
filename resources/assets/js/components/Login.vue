<template>
<div class="col-0 col-md-5 p-4 cuadro_aviso_i my-3 "> 
    <div class="signup-form-container pr-sm-2 pl-sm-2">
      
    <!-- form start -->
    <form role="form" id="register-form">
      <div class="form-header">
        <h3 class="form-title"><i class="fa fa-user"></i> Ingresa</h3>
                    
        <div class="pull-right">
            <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
        </div>
      </div>
    
      <div class="form-body">
                    
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
            <input v-model="correo" name="email" id='email' type="email" class="form-control" placeholder="Correo electrónico" required autofocus>
          </div> 
          <div v-if="stateError && (errors.email || errors.login)">
            <span v-if="errors.email" v-text="errors.email[0]" style="color:red;"></span>
            <span v-if="errors.login" v-text="errors.login[0]" style="color:red;"></span>
          </div>                    
        </div>
                    
        <div class="row">         
          <div class="form-group col-lg-6">
            <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input v-model="password" 
                      name="password" id="password" 
                      type="password" class="form-control" 
                      placeholder="Contraseña">
            </div>  
            <div v-if="stateError && (errors.password)">
              <span v-text="errors.password[0]" style="color:red;"></span>
            </div>                    
          </div>                    
        </div>
        
      </div>
        
        <div class="form-footer">
            <button @click="iniciarSesion" type="button" class="btn btn-info">
            <span class="glyphicon glyphicon-log-in"></span> Entrar
            </button>
            <a class="btn btn-link" href="#">
              Forgot Your Password?
            </a>
        </div>
        
        

      </form>   
    </div>    
</div>  
</template>

<script>

export default {
  data(){
    return{
      correo : '',
      password : '',
      errors : {},
      stateError : false

    }
  },
  methods:{
    iniciarSesion(){
      //console.log(this.$route.query)
      let me = this
      axios.post('/login',{
        email: this.correo,
        password : this.password
      })
      .then( res => {  
        //console.log(this.$route.query.to)
        this.stateError = false
        this.errors = {}
        this.$store.commit('login',res.data.usuario)
        
        if(this.$route.query.to){
          me.$router.push({path: '/ponerAviso'})
        }else{
          me.$router.push({path:'/'})
        }
      
      })
      .catch(err =>{
        console.log(err.response)
        this.stateError = true
        this.errors = err.response.data.errors
      })
      this.correo = ''
      this.password = ''
    }
  }
}
</script>

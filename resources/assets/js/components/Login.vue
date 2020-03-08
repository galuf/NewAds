<template>
  <div class="col-0 col-md-5 p-4 cuadro_aviso_i my-3 "> 
    <div class="signup-form-container pr-sm-2 pl-sm-2">
      
          <!-- form start -->
      <form role="form" id="register-form" autocomplete="off" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
      @csrf
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
            <input name="email" id='email' type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo electrónico" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div> 
          <span class="help-block" id="error"></span>                     
        </div>
                    
        <div class="row">         
          <div class="form-group col-lg-6">
            <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" required>
                @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
            </div>  
            <span class="help-block" id="error"></span>                    
          </div>                    
        </div>


                    
      </div>
        
        <div class="form-footer">
            <button type="submit" class="btn btn-info">
            <span class="glyphicon glyphicon-log-in"></span> Entrar
            </button>
            <a class="btn btn-link" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
            </a>
        </div>


      </form>
      
    </div>
          
  </div>
</template>

<script>
export default {
  
}
</script>
@extends('layouts.app')

@section('content')

<!-- CONTENIDO -->

<div class="contenido container-fluid pt-2">
    <div class="container">
        <div class="row">
            
            <!-- lado izquierdo INGRESAR -->
            <!-- <login></login> -->
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
                        <a class="btn btn-link" href="#">
                          {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                  </form>   
                </div>    
            </div>
            <!-- fin lado  Izquierdo -->

            
            <!-- lado derecho REGISTRO-->
            <!-- <registro></registro> -->
            <div class="col-12 col-md-7 p-0 p-md-3 registro">
                <div class="p-0 py-2 cuadro_aviso_i mb-2">
                    <div class="formulario_cont p-2 pr-3">
                        
                        <form role="form" id="register-form" autocomplete="off" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf
                            <div class="form-header">
                                <h3 class="form-title"><i class="fa fa-user"></i> Regístrate</h3>
                                <small> Es fácil y no demoras nada.</small>
                                            
                                <div class="pull-right">
                                    <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                                </div>
                                        
                            </div>
                                                        
                            <div class=" form-group">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nombre" name="name" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="Apellidos" name="lastname" required autofocus>
                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>   
                            <div class=" form-group">
                                <input type="email" name="emailr" class="form-control{{ $errors->has('emailr') ? ' is-invalid' : '' }}"  placeholder="Correo electrónico"  required>
                                @if ($errors->has('emailr'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emailr') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class=" form-group">
                                <input type="password" name="password_r" class="form-control{{ $errors->has('password_r') ? ' is-invalid' : '' }}" placeholder="Contraseña"  required>
                                @if ($errors->has('password_r'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_r') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class=" form-group">
                                <input type="password" class="form-control" placeholder="Confirmacion de Contraseña" name="password_r_confirmation" required>
                            </div>

                            <div class="texto_reg">Al hacer clic en Registrarte, aceptas las Condiciones y 
                                la Política de privacidad. Es posible 
                                que te enviemos notificaciones por SMS que podrás desactivar cuando desees.</div>

                            <div class="form-footer">
                                <button type="submit" class="btn btn-info">
                                <span class="glyphicon glyphicon-log-in"></span> Registrarte
                                </button>
                           </div>
                        </form>

                    </div>
                </div>   
            </div>

            <!-- fin lado centro derecho -->
        </div>
    </div>
</div>

@endsection
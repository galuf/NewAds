<template>
  <div>
    <div class="p-4"></div>
    <div class="contenido container-fluid pt-2 mt-2">
    <div class="container">
        <div class="row">
            
            <!-- lado izquierdo INGRESAR -->
            <login></login>
            <!-- fin lado  Izquierdo -->

            
            <!-- lado derecho REGISTRO-->
            <registro></registro>
            <!-- fin lado centro derecho -->
        </div>
    </div>
  </div>
  </div>
  
</template>

<script>
import Login from '../components/Login'
import Registro from '../components/Registro'

export default {
  components :{
    Login,
    Registro
  }  
}
</script>

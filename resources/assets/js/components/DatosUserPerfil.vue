<template>
  <!-- lado centro derecho -->
  <div class="col-12 col-md-9 p-0 p-md-3">
    <div class="titulo"><h3>Datos de Usuario</h3></div>
    <div class="p-0 py-2 cuadro_aviso_i mb-2"> 
        <div class=" p-2 pr-3">
            <div class="row">
                <div class="col-0 col-sm-3">
                    <div class="img_usuario"><img :src="( $store.state.usuario.avatar || 'img/avatar1.png' )" class="img-fluid img_aviso"></div>
                </div>
                
                <div class="col-12 col-sm-9 datos">
                    <p>Nombres: {{usuario.nombre}} </p>
                    <p>Apellidos: {{usuario.apellido}} </p>
                    <p>Lugar: {{(usuario.region || '') +'-'+ (usuario.provincia || '') +'-'+ (usuario.distrito || '')}} </p>
                    <p>Dirección: {{usuario.direccion}} </p>
                    <p>Correo electrónico: {{usuario.email}}</p>
                    <p>Teléfono: {{usuario.telefono}}</p>
                    <div class="boton-editar">
                        <button class="btn btn-primary"
                                @click="editar">Editar Datos</button>
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
            usuario : this.$store.state.usuario
        }
    },
    methods: {
        editar(){
            this.$store.commit('contenidoCambio',4)  
        }
    },
    mounted(){
        this.usuario = this.$store.state.usuario
    }

}
</script>

<style>
    .datos{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .titulo{
        display: flex;
        justify-content: center;
    }
    .boton-editar{
        display: flex;
        justify-content:flex-end;
    }
</style>
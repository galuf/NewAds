<template>
  <!-- lado centro derecho -->
  <div class="col-12 col-md-9 p-0 p-md-1">
    
    <div class="d-flex flex-row justify-content-around titulo">
        <div class="texto-titulo" v-text="'Perfil del usuario'"></div>
    </div>
    
    <div class="p-0 py-2 cuadro_aviso_i mb-2"> 
        <div class=" p-2 pr-3">
            <div class="row">
                <div class="col-0 col-sm-3">
                    <div class="img_usuario"><img :src="( usuario.avatar || 'img/avatar1.png' )" class="img-fluid img_aviso"></div>
                </div>
                
                <div class="col-12 col-sm-9 datos">
                    <p> <strong> Nombres: </strong>{{usuario.nombre}} </p>
                    <p> <strong> Apellidos: </strong> {{usuario.apellido}} </p>
                    <p> <strong>Lugar: </strong>{{(usuario.region || '') +' - '+ (usuario.provincia || '') +' - '+ (usuario.distrito || '')}} </p>
                    <p> <strong>Dirección: </strong>{{usuario.direccion}} </p>
                    <p> <strong>Email: </strong>{{usuario.email}}</p>
                    <p> <strong>Teléfono: </strong>{{usuario.telefono}}</p>
                </div>
            </div>
            
        </div>
    </div>
  </div>    
  <!-- fin lado centro derecho -->
</template>

<script> 
export default {
    props:['id'],
    data(){
        return {
            usuario : {}
        }
    },
    methods:{
      dameUsuario(){
        let me = this
        let url = '/perfilAjeno?id='+this.id
        axios.get(url)
          .then( res => {
            let respuesta = res.data
            me.usuario = respuesta.usuario
          }).catch( err => {
            console.log(err)
          })
      }
    },
    mounted(){
        this.dameUsuario()
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
        border-radius:10px;
        color: black;
        margin-bottom: 8px;
        background-color: #D3D3D3;
        padding: 5px;
    }
    .boton-editar{
        display: flex;
        justify-content:flex-end;
    }
</style>
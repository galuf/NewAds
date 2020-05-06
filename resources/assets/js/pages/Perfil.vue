<template>
  <div>
    <div class=" p-3 p-md-4 bg-danger"></div>
      <div class="contenido container-fluid pt-4 mt-2">
        <div class="container">
            <div class="row">
              <inf-izquierda />
              <template v-if="$store.state.contenido == 0">
                <datos-user-perfil ></datos-user-perfil>
              </template>
              <template v-if="$store.state.contenido == 1">
                <mis-avisos></mis-avisos>
              </template>
              <template v-if="$store.state.contenido == 2">
                <mis-favoritos />
              </template>
              <template v-if="$store.state.contenido == 3">
                <h1>Cambiar Contraseña</h1>
              </template >
              <template v-if="$store.state.contenido == 4">
                <editar-datos />
              </template>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
import DatosUserPerfil from '../components/DatosUserPerfil'
import InfIzquierda from '../components/InfIzquierda'
import MisAvisos from '../components/MisAvisos'
import MisFavoritos from '../components/MisFavoritos'
import EditarDatos from '../components/EditarDatos'

export default {
  components:{
    DatosUserPerfil,
    InfIzquierda,
    MisAvisos,
    MisFavoritos,
    EditarDatos
  },
  mounted(){
    window.scroll (0, 0);
  }
}
</script>
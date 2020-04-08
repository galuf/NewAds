<template>
  <!-- BARRA DE CATEGORIAS -->
  <div class="container-fluid barra_categorias d-none d-sm-block">
    <div class="d-flex flex-row justify-content-center py-1">
        <div class="mx-2" @click="cambia(1)">
            <img class="img-fluid" src="img/a1.svg" alt="" width="90">
        </div>
        <div class="mx-2" @click="cambia(2)">
            <img class="img-fluid" src="img/a2.svg" alt="" width="90">
        </div>
        <div class="mx-2" @click="cambia(3)">
            <img class="img-fluid" src="img/a3.svg" alt="" width="90">
        </div>
        <div class="mx-2" @click="cambia(4)">
            <img class="img-fluid" src="img/a4.svg" alt="" width="90">
        </div>
        <div class="mx-2" @click="cambia(5)">
            <img class="img-fluid" src="img/a5.svg" alt="" width="90">
        </div>
        <div class="mx-2" @click="cambia(7)">
            <img class="img-fluid" src="img/a6.svg" alt="" width="90">
        </div>
        <div class="mx-2" @click="cambia(8)">
            <img class="img-fluid" src="img/a7.svg" alt="" width="90">
        </div>
        <div class="mx-2" @click="cambia(9)">
            <img class="img-fluid" src="img/a8.svg" alt="" width="90">
        </div>
        <div class="mx-2" @click="cambia(10)">
            <img class="img-fluid" src="img/a9.svg" alt="" width="90">
        </div>
        <div class="mx-2" @click="cambia(11)">
            <img class="img-fluid" src="img/a10.svg" alt="" width="90">
        </div>
    </div>
  </div>  
</template>

<script>
import { bus } from '../app'
export default {
    data(){
        return{
            categoria : ''
        }
    },
    methods : {
        cambia(element){
            this.categoria = element
            bus.$emit('categoria', {categoria:this.categoria})
        }
    }
}
</script>
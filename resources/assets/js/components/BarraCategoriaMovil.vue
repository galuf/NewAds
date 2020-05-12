<template>
  <!-- BARRA DE CATEGORIAS -->
  <div class="container-fluid d-block  py-2 d-flex justify-content-between cat_movil">
    <div @click="cambia(1)" class=""><i class="botonM_icono1 fa fa-fw fa-file-alt float-left icon_cat_mov"></i> </div>
    <div @click="cambia(2)" class=""><i class="botonM_icono2 fab fa-fw fa-houzz float-left icon_cat_mov"></i> </div>
    <div @click="cambia(3)" class=""><i class="botonM_icono3 fa fa-fw fa-car float-left icon_cat_mov"></i> </div>
    <div @click="cambia(4)" class=""><i class="botonM_icono4 fa fa-fw fa-book-reader float-left icon_cat_mov"></i> </div>
    <div @click="cambia(5)" class=""><i class="botonM_icono5 fa fa-fw fa-search-location float-left icon_cat_mov"></i> </div>
    <div @click="cambia(8)" class=""><i class="botonM_icono7 fa fa-fw fa-cat float-left icon_cat_mov"></i> </div>
    <div @click="cambia(7)" class=""><i class="botonM_icono8 fa fa-fw fa-laptop-code float-left icon_cat_mov"></i> </div>
  </div>

</template>

<script>
export default {
    data(){
        return{
            categoria : ''
        }
    },
    methods : {
        cambia(element){
            this.categoria = element
            this.$store.commit('categoria',this.categoria)
        }
    }
}
</script>

<style>
    /* BARRA DE BOTONES ******************* */

.botonM_icono1{
    color: #390074;
}

.botonM_icono2{
    color: #e41b4d;
}

.botonM_icono3{
    color: #e4ce00;
}

.botonM_icono4{
    color: #e38801;
}

.botonM_icono5{
    color: #6cd92f;
}

.botonM_icono6{
    color: #04c7c0;
}

.botonM_icono7{
    color: #e14877;
}

.botonM_icono8{
    color: #c425c6;
}

.botonM_icono9{
    color: #5f2764;
}

.botonM_icono10{
    color: #2731ad;
}

</style>
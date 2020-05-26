<template>
     <!-- BARRA DE CATEGORIAS -->
    <div class="container-fluid barra_categorias d-none d-md-block">
        <div class="d-flex flex-row justify-content-center py-1 baner">
            
            <div @click="cambia(1)" class="boton1 d-flex flex-column justify-content-center align-items-center pt-1 mx-lg-2 mx-md-1">
                <div class=" circulo d-flex flex-column justify-content-center align-items-center" >
                    <i class="fa fa-fw fa-file-alt boton_icono1 "></i>
                </div>
                <div class=" subtitulo ">ALQUILERES</div>
            </div>

            <div @click="cambia(2)" class="boton2 d-flex flex-column justify-content-center align-items-center pt-1 mx-lg-2 mx-md-1">
                <div class=" circulo d-flex flex-column justify-content-center align-items-center" >
                    <i class="fab fa-houzz boton_icono2"></i>
                </div>
                <div class=" subtitulo ">CASAS</div>
            </div>

            <div @click="cambia(3)" class="boton3 d-flex flex-column justify-content-center align-items-center pt-1 mx-lg-2 mx-md-1">
                <div class=" circulo d-flex flex-column justify-content-center align-items-center" >
                    <i class="fa fa-fw fa-car boton_icono3 "></i>
                </div>
                <div class=" subtitulo ">AUTOMÓVILES</div>
            </div>

            <div @click="cambia(4)" class="boton4 d-flex flex-column justify-content-center align-items-center pt-1 mx-lg-2 mx-md-1">
                <div class=" circulo d-flex flex-column justify-content-center align-items-center" >
                    <i class="fa fa-fw fa-book-reader boton_icono4"></i>
                </div>
                <div class=" subtitulo ">NECESITO</div>
            </div>

            <div @click="cambia(5)" class="boton5 d-flex flex-column justify-content-center align-items-center pt-1 mx-lg-2 mx-md-1">
                <div class=" circulo d-flex flex-column justify-content-center align-items-center" >
                    <i class="fa fa-fw fa-search-location boton_icono5 "></i>
                </div>
                <div class=" subtitulo ">EMPLEOS</div>
            </div>

            <div @click="cambia(7)" class="boton6 d-flex flex-column justify-content-center align-items-center pt-1 mx-lg-2 mx-md-1">
                <div class=" circulo d-flex flex-column justify-content-center align-items-center" >
                    <i class="fa fa-fw fa-laptop-code boton_icono6"></i>
                </div>
                <div class=" subtitulo ">INFORMÁTICA</div>
            </div>  

            <div @click="cambia(8)" class="boton7 d-flex flex-column justify-content-center align-items-center pt-1 mx-lg-2 mx-md-1">
                <div class=" circulo d-flex flex-column justify-content-center align-items-center" >
                    <i class="fa fa-fw fa-cat boton_icono7 "></i>
                </div>
                <div class=" subtitulo ">MASCOTAS</div>
            </div>

            <div @click="cambia(9)" class="boton8 d-flex flex-column justify-content-center align-items-center pt-1 mx-lg-2 mx-md-1">
                <div class=" circulo d-flex flex-column justify-content-center align-items-center" >
                    <i class="fa fa-fw fa-couch boton_icono8"></i>
                </div>
                <div class=" subtitulo ">HOGAR</div>
            </div>

            <div @click="cambia(10)" class="boton9 d-flex flex-column justify-content-center align-items-center pt-1 mx-lg-2 mx-md-1">
                <div class=" circulo d-flex flex-column justify-content-center align-items-center" >
                    <i class="fa fa-fw fas fa-bullhorn boton_icono9 "></i>
                </div>
                <div class=" subtitulo ">ANÚNCIATE</div>
            </div>

            <div @click="cambia(11)" class="boton10 d-flex flex-column justify-content-center align-items-center pt-1 mx-lg-2 mx-md-1">
                <div class=" circulo d-flex flex-column justify-content-center align-items-center" >
                    <i class="fa fa-fw fa-utensils boton_icono10"></i>
                </div>
                <div class=" subtitulo ">EVENTOS</div>
            </div>                  
        </div>
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
            this.$store.commit('changePages',1)
        }
    }
}
</script>

<style>
 /* BARRA DE BOTONES ******************* */
    .barra_categorias{
    background: linear-gradient( #fff, #9fabce, #fff);
    }
    /* barra botones nuevo */
.boton1{
    border-radius: 10px;
    background-color: #775997;
    width: 90px;
    height: 103px;
    cursor:pointer;
}
.boton_icono1{
    color: #390074;
    font-size: 50px;
}
.boton2{
    border-radius: 10px;
    background-color: #e95a7e;
    width: 90px;
    height: 103px;
    cursor:pointer;
}
.boton_icono2{
    color: #e41b4d;
    font-size: 50px;
}
.boton3{
    border-radius: 10px;
    background-color: #e9d94b;
    width: 90px;
    height: 103px;
    cursor:pointer;
}
.boton_icono3{
    color: #e4ce00;
    font-size: 50px;
}
.boton4{
    border-radius: 10px;
    background-color: #e38801;
    width: 90px;
    height: 103px;
    cursor:pointer;
}
.boton_icono4{
    color: #e38801;
    font-size: 50px;
}
.boton5{
    border-radius: 10px;
    background-color: #6cd92f;
    width: 90px;
    height: 103px;
    cursor:pointer;
}
.boton_icono5{
    color: #6cd92f;
    font-size: 50px;
}
.boton6{
    border-radius: 10px;
    background-color: #04c7c0;
    width: 90px;
    height: 103px;
    cursor:pointer;
}
.boton_icono6{
    color: #04c7c0;
    font-size: 50px;
}
.boton7{
    border-radius: 10px;
    background-color: #e14877;
    width: 90px;
    height: 103px;
    cursor:pointer;
}
.boton_icono7{
    color: #e14877;
    font-size: 50px;
}
.boton8{
    border-radius: 10px;
    background-color: #c425c6;
    width: 90px;
    height: 103px;
    cursor:pointer;
}
.boton_icono8{
    color: #c425c6;
    font-size: 50px;
}
.boton9{
    border-radius: 10px;
    background-color: #5f2764;
    width: 90px;
    height: 103px;
    cursor:pointer;
}
.boton_icono9{
    color: #5f2764;
    font-size: 50px;
}
.boton10{
    border-radius: 10px;
    background-color: #2731ad;
    width: 90px;
    height: 103px;
    cursor:pointer;
}
.boton_icono10{
    color: #2731ad;
    font-size: 50px;
}
.boton1:hover, .boton2:hover, .boton3:hover, .boton4:hover, .boton5:hover,
.boton6:hover, .boton7:hover, .boton8:hover, .boton9:hover, .boton10:hover{
    border: 1px solid white;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.5);
}
.circulo{
    border-radius: 50%;
    background-color: white;
    width: 80px;
    height: 80px;
}
.subtitulo{
    font-size: 12px;
    color: white;
    font-weight: bold;
    
}
</style>
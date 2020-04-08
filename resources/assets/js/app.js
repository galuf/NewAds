
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

let user = document.head.querySelector('meta[name="user"]')
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('avisos-principal', require('./components/Avisos.vue'));
Vue.component('poner-aviso', require('./components/PonerAviso.vue'));
Vue.component('aviso-ver-mas',require('./components/AvisoVerMas.vue'));
Vue.component('buscador',require('./components/Buscador.vue'));
Vue.component('listar-aviso',require('./components/ListarAviso.vue'));
Vue.component('app', require('./components/App.vue'))

import router from './router'

export var bus = new Vue()

const app = new Vue({
    el: '#app',
    router,
    data: {
        contenido: 0,
        filtro: '',
        busqueda:'',
        sesion: !!user.content
    },
    mounted(){
        this.filtro = ''
        this.busqueda = ''
        this.categoria = ''
    },
    methods:{
        reset(){
            bus.$emit('datos', {filtro :this.filtro, busqueda:this.busqueda,contenido:1})
            bus.$emit('categoria', {categoria:this.categoria})
        },
        logOut(){
            axios.post('/logoutver-contenido',{})
                .then(res => {
                    //console.log(res)
                })
                .catch(err =>{
                    //console.log(err)
                })
            this.sesion = false
        }
    },
    created(){
        bus.$on('sesion', (o)=>{
            this.sesion = o.sesion
        })
    }
});

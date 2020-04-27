
require('./bootstrap');
window.Vue = require('vue');

Vue.component('avisos-principal', require('./components/Avisos.vue'));
Vue.component('poner-aviso', require('./components/PonerAviso.vue'));
Vue.component('aviso-ver-mas',require('./components/AvisoVerMas.vue'));
Vue.component('buscador',require('./components/Buscador.vue'));
Vue.component('listar-aviso',require('./components/ListarAviso.vue'));
Vue.component('app', require('./components/App.vue'))
Vue.component('user-logo', require('./components/UserLogo.vue'))

import router from './router'
import store from  './store'

export var bus = new Vue()

const app = new Vue({
    el: '#app',
    router,
    store,
    data: {
        contenido: 0,
        filtro: '',
        busqueda:''
    },
    mounted(){
        this.filtro = ''
        this.busqueda = ''
        this.categoria = ''
    },
    methods:{
        reset(){
            this.$store.commit('buscador',{filtro:'',busqueda:'',categoria:''})
        }
    }
});

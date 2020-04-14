
require('./bootstrap');
window.Vue = require('vue');

Vue.component('avisos-principal', require('./components/Avisos.vue'));
Vue.component('poner-aviso', require('./components/PonerAviso.vue'));
Vue.component('aviso-ver-mas',require('./components/AvisoVerMas.vue'));
Vue.component('buscador',require('./components/Buscador.vue'));
Vue.component('listar-aviso',require('./components/ListarAviso.vue'));
Vue.component('app', require('./components/App.vue'))

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
            bus.$emit('datos', {filtro :this.filtro, busqueda:this.busqueda,contenido:1})
            bus.$emit('categoria', {categoria:this.categoria})
        },
        logOut(){
            axios.post('/logoutver-contenido',{})
                .then(res => {
                    //console.log(res)
                    store.commit('logout')
                    if(this.$route.path != '/')
                        this.$router.push({path: '/'})
                    //this.sesion = false
                })
                .catch(err =>{
                    console.log(err)
                })
        }
    }
});

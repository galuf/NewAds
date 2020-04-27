import Vue from 'vue'
import Vuex from 'vuex'

let user = document.head.querySelector('meta[name="user"]')

Vue.use(Vuex)

const store = new Vuex.Store({
    state:{
        filtro: '',
        busqueda:'',
        categoria:'',
        contenido: 0,
        sesion:!!user.content,
        usuario: (!!user.content ? JSON.parse(user.content) : {})
    },
    mutations:{
        login(state,usuario){
            state.usuario = usuario
            state.sesion = true
        },
        logout(state){
            state.sesion = false
            state.usuario = {}
        },
        buscador(state,busqueda){
            state.filtro = busqueda.filtro,
            state.busqueda = busqueda.busqueda,
            state.categoria = busqueda.categoria
        },
        categoria(state,cat){
            state.categoria = cat
        },
        contenidoCambio(state,cont){
            state.contenido = cont
        }
    }
})

export default store
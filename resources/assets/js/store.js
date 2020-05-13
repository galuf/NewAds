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
        usuario: (!!user.content ? JSON.parse(user.content) : {}),
        mensaje:{
            estado : false,
            texto: ''
        },
        page:1
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
        },
        mensajeShow(state,texto){
            state.mensaje.texto = texto
            state.mensaje.estado = true
            setTimeout(()=>{ state.mensaje.estado = false 
                state.mensaje.texto = ''
            }, 3000);
        },
        changePages(state,p){
            state.page = p
        }
    }
})

export default store
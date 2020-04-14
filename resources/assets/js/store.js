import Vue from 'vue'
import Vuex from 'vuex'

let user = document.head.querySelector('meta[name="user"]')

Vue.use(Vuex)

const store = new Vuex.Store({
    state:{
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
        }
    }
})

export default store
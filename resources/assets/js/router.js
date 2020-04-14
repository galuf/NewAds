import Vue from 'vue'
import VueRouter from 'vue-router';

import PrincipalPage from './pages/Principal'
import Auth from './pages/Auth'
import Categorias from './pages/Categorias'
import PonerAviso from './pages/PonerAviso'
import VerContenidoAviso from './pages/VerContenidoAviso'

import store from './store'

Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path:'/',
      name:'home',
      component:PrincipalPage
    },
    {
      path:'/auth',
      name:'Authentication',
      component: Auth
    },
    {
      path:'/categoria',
      name:'Categoria',
      component: Categorias
    },
    {
      path: '/ponerAviso',
      name:'PonerAviso',
      component: PonerAviso,
      meta:{requiresAuth: true}
    },
    {
      path:'/verContenidoAviso',
      name: 'VerContenido',
      component : VerContenidoAviso
    }
  ]
})

router.beforeEach( (to,from,next) =>{  
  if(to.matched.some(record => record.meta.requiresAuth)){
    if(store.state.sesion){
      next()
    }else{
      router.replace('/auth?to='+to.path)
    }
  }else{
    next()
  }
})

export default router
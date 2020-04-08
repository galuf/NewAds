import Vue from 'vue'
import VueRouter from 'vue-router';

import PrincipalPage from './pages/Principal'
import Auth from './pages/Auth'
import Categorias from './pages/Categorias'
import PonerAviso from './pages/PonerAviso'

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
      component: PonerAviso
    }
  ]
})

export default router
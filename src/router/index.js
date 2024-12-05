import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/create-note',
    name: 'CreateNote',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../components/CreateNote.vue')
  },
  {
    path: '/notes',
    name: 'NotePage',
    component: () => import('../components/NotePage.vue')
  },
  {
    path: '/register',
    name: 'registerApp',
    component: () => import('../components/RegisterComponent.vue')
  },
  {
    path: '/login',
    name: 'loginApp',
    component: () => import('../components/LoginComponent.vue')
  }

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

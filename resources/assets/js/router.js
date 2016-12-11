import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// Components

  import Example from './components/Example.vue';
/*import Dashboard2 from './components/Dashboard2'
import Widgets from './components/Widgets'
import Charts from './components/Charts'

import AuthUser from './components/auth/User'
import AuthRole from './components/auth/Role'
import AuthPermission from './components/auth/Permission'
import AuthMenu from './components/auth/Menu'
import Login from './Login'*/


//import ServiceOrderComplaint from './components/service/Complaint'

const router = new VueRouter({
  routes: [
    { path: '/', component: Example },
 /*     { path: '/login', component: Login },
    { path: '/dashboard2', component: Dashboard2 },
    { path: '/widgets', component: Widgets },
    { path: '/charts', component: Charts },
    { path: '/auth/user', component: AuthUser },
    { path: '/auth/role', component: AuthRole },
    { path: '/auth/permission', component: AuthPermission },
        { path: '/auth/menus', component: AuthMenu },

          { path: '/ServiceOrderComplaint', component: ServiceOrderComplaint }*/
  ]
})

export default router

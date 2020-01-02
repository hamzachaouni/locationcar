import VueRouter from 'vue-router'
// Pages
import Home from './pages/Home'
import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import AdminDashboard from './pages/admin/Dashboard'


// visitor
/*import home from './components/home';
import car from './components/car';
import who_we_are from './components/who_we_are';
import all_cars from './components/all_cars';
import contact from './components/contact';*/

//admin
import users from './components/users';
import profile from './components/profile';
import cars from './components/cars';
import ourinformation from './components/ourinformation';



// Routes
const routes = [

  // admin
  { 
    path: '/admin/users', 
    component: users, 
    meta: {
      auth: 
      {roles: 2, redirect: {name: 'logsin'}, forbiddenRedirect: '/403'}
    } 
  },
  { path: '/admin/profile', component: profile, 
    meta: {
      auth: 
      {roles: 2, redirect: {name: 'logssin'}, forbiddenRedirect: '/403'}
    }
  },
  { path: '/admin/cars', component: cars,
    name: 'admin.cars', 
    meta: {
      auth: 
      {roles: 2, redirect: {name: 'losss;sgin'}, forbiddenRedirect: '/403'}
    }
  },
  { path: '/admin/ourinformation', component: ourinformation, 
    meta: {
      auth: 
      {roles: 2, redirect: {name: 'lossssgin'}, forbiddenRedirect: '/403'}
    }
  },
  
  // visitor
  /*{ path: '/home', component: home },
  { path: '/car/:slug', component: car },
  { path: '/who-we-are', component: who_we_are },
  { path: '/cars-all', component: all_cars },
  { path: '/contact', component: contact },*/

  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: undefined
    }
  },
  {
    path: '/register',
    name: 'register',
    component: Register,
    meta: {
      auth: false
    }
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      auth: false
    }
  },
  // USER ROUTES
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: {
      auth: true
    }
  },
  // ADMIN ROUTES
  {
    path: '/admin',
    name: 'admin.dashboard',
    component: AdminDashboard,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
]
const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})
export default router
// Layouts
import LayoutWizard from 'core/layouts/LayoutWizard.vue'

import Wizard from 'core/pages/wizard/Index.vue'
import store from '../store'

import categoryRoutes from 'modules/category/routes'

const beforeEnter = (to, from, next) => {
  // console.log(store().state)
  if (store().state.token) {
    next({ path: '/' })
  } else {
    // console.log(to, from)
  }
  next()
}


const routes = [
  {
    path: '/',
    component: () => import('core/layouts/MainLayout.vue'),
    meta: { auth: true },
    children: [
      { path: '', component: () => import('core/pages/Index.vue') },
      categoryRoutes
    ]
  },

  /*
  |--------------------------------------------------------------------------
  | Onboarding Routes
  |--------------------------------------------------------------------------|
 */
  {
    path: '/on-boarding',
    component: LayoutWizard,
    children: [
      {
        path: '/',
        component: Wizard,
        name: 'wizard'
      }
    ]
  },

  {
    path: '/auth',
    name: 'auth',
    component: () => import('core/pages/auth/Auth.vue'),
    redirect: '/auth/login',
    children: [
      {
        path: 'login',
        name: 'auth.login',
        component: () => import('core/pages/auth/Login.vue'),
        beforeEnter: (to, from, next) => beforeEnter(to, from, next),
        meta: { title: 'Login' },
        // beforeEnter: (to, from, next) => beforeEnter(to, from, next)
      }
      // {
      //   path: 'register',
      //   name: 'auth.register',
      //   component: () => import('pages/auth/Register.vue'),
      //   meta: { title: 'Registro' },
      //   beforeEnter: (to, from, next) => beforeEnter(to, from, next)
      // }
    ]
  }
]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    meta: { auth: true },
    component: () => import('core/pages/Error404.vue')
  })
}

export default routes

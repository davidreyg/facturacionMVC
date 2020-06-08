// Layouts
import LayoutWizard from 'layouts/LayoutWizard.vue'

import Wizard from 'pages/wizard/Index.vue'


const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Index.vue') }
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
]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: () => import('pages/Error404.vue')
  })

}

export default routes

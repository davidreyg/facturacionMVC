export default {
  path: 'categories',
  component: () => import('modules/category/pages/Index.vue'),
  meta: { auth: true, title: 'Categorias' },
  children: [
    { path: '', component: () => import('modules/category/components/CategoryList.vue') },
    {
      path: '/categories/create',
      name: 'categories.create',
      component: () => import('modules/category/pages/CategoryCreate.vue')
    },
    {
      path: '/categories/:id/edit',
      name: 'categories.edit',
      component: () => import('modules/category/pages/CategoryEdit.vue')
    }
  ]
}

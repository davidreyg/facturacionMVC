export default {
  path: 'categorias',
  name: 'home.categorias',
  component: () => import('../pages/Index.vue'),
  meta: { auth: true, title: 'Categorias' }
}

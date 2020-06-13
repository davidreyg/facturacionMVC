import { ServiceFactory } from 'core/services/ServiceFactory'
const CategoriaService = ServiceFactory.get('categories')
export async function fetchCategories({ commit }) {
  await CategoriaService.get()
    .then(categorias => {
      // console.log(categorias.data);
      commit('SET_CATEGORIES', categorias.data.data)
    })
    .catch(err => {
      console.error(err)
    })
}

export async function fetchOneCategory(context, payload) {
  await CategoriaService.getOne(payload)
    .then(categoria => {
      // console.log(categoria);
      context.commit('SET_CATEGORY', categoria.data)
    })
    .catch(err => {
      console.error(err)
    })
}

export async function storeCategory(context, payload) {
  await CategoriaService.create(payload)
    .then(() => {
      context.dispatch('fetchCategories')
      // context.dispatch('openModalCrear', false)
    })
    .catch(err => {
      console.error(err)
    })
}

// export async function updateCategoria(context, payload) {
//   await CategoriaService.update(payload)
//     .then(res => {
//       // console.log(res)
//       context.dispatch('fetchCategorias')
//       context.dispatch('openModalEditar', false)
//       context.commit('SET_CATEGORIA', {})
//     })
//     .catch(err => {
//       console.error(err)
//     })
// }
export async function deleteCategory(context, payload) {
  await CategoriaService.destroy(payload).then(res => {
    // console.log(res)

    context.dispatch('fetchCategorias')
  })
}

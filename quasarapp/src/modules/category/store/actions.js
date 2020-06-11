import { ServiceFactory } from 'core/services/ServiceFactory'
const CategoriaService = ServiceFactory.get('categories')
export async function fetchCategorias({ commit }) {
  await CategoriaService.get()
    .then(categorias => {
      // console.log(categorias.data);
      commit('SET_CATEGORIAS', categorias.data)
    })
    .catch(err => {
      console.error(err)
    })
}

// export async function fetchOneCategoria(context, payload) {
//   await CategoriaService.getOne(payload)
//     .then(categoria => {
//       // console.log(categoria);
//       context.dispatch('openModalEditar', true)
//       context.commit('SET_CATEGORIA', categoria)
//     })
//     .catch(err => {
//       console.error(err)
//     })
// }

// export function openModalCrear({ commit }, payload) {
//   commit('SET_MODAL_CREAR_ABIERTO', payload)
// }
// export function openModalEditar({ commit }, payload) {
//   commit('SET_MODAL_EDITAR_ABIERTO', payload)
// }

// export async function storeCategoria(context, payload) {
//   await CategoriaService.create(payload)
//     .then(() => {
//       context.dispatch('fetchCategorias')
//       context.dispatch('openModalCrear', false)
//     })
//     .catch(err => {
//       console.error(err)
//     })
// }
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
// export async function deleteCategoria(context, payload) {
//   await CategoriaService.destroy(payload).then(res => {
//     // console.log(res)

//     context.dispatch('fetchCategorias')
//   })
// }

import { getField } from 'vuex-map-fields'

export function getCategories(state) {
  return state.categories
}
export function getCategory(state) {
  return state.category
}

export function getCategoryField(state) {
  return getField(state.category)
}

// export function filtrarCategoriesPorCampo(state) {
//   return campo => {
//     return state.categories.filter(producto =>
//       Object.keys(producto).some(({ nombre }) =>
//         producto[nombre]
//           .toString()
//           .toLowerCase()
//           .includes(campo.toLowerCase())
//       )
//     )
//   }
// }

import Service from 'core/services/Service'
const resource = '/api/categories'
export default {
  get () {
    return  Service.get(`${resource}`)
  },

  getOne (categoriaId) {
    return  Service.get(`${resource}/${categoriaId}`)
  },

  create (categoria) {
    return Service.post(`${resource}`, categoria)
  },
  update (categoria) {
    return Service.put(`${resource}`, categoria)
  },

  destroy (categoria) {
    return Service.delete(`${resource}/${categoria}`)
  }
}

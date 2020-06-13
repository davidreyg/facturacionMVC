import CategoryService from 'modules/category/services/categoryService'
// import ProductoService from 'modules/Producto/Services/ProductoService'
// import TipoDocumentoService from './TipoDocumentoService'
const services = {
  categories: CategoryService,
  // productos: ProductoService
  // tipoDocumentos: TipoDocumentoService
  // other repositories ...
}

export const ServiceFactory = {
  get: name => services[name]
}

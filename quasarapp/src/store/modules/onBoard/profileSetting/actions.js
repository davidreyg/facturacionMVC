import * as types from './mutation-types'

export function uploadUserAavatar({ commit, dispatch, state }, data) {
  return new Promise((resolve, reject) => {
    this.$axios.post(`/api/admin/profile/upload-avatar`, data).then((response) => {
      commit(types.UPDATE_USER, response.data.user)
      resolve(response)
    }).catch((err) => {
      reject(err)
    })
  })
}

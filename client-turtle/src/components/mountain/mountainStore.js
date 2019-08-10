import Vue from 'vue'
import {
  getAllMountainUrl,
  getHeader
}
  from '../../config'

const state = {
  mountains: []
}

const mutations = {
  SET_MESSAGES_VIEW (state, messages) {
    state.mountains = messages
  }
}

const actions = {
  getAllMountains: ({commit}) => {
    Vue.http.get(getAllMountainUrl, {headers: getHeader()})
      .then(response => {
        commit('SET_MESSAGES_VIEW', response.data)
      }).catch(response => {})
  }
}

export default {
  state, mutations, actions
}

import Vue from 'vue'
import {
  getUserCurrentTasksUrl,
  getCreateTaskUrl,
  getDeleteTaskByIdUrl,
  getHeader
}
  from '../../config'

const state = {
  tasks: [],
  idForTodo: 0,
  filter: 'all'
}

const mutations = {
  SET_TODOS_VIEW (state, messages) {
    state.tasks = messages
  },
  UPDATE_TASKS (state, messages) {
    state.idForTodo = state.tasks.length + 1
    console.log()
    state.tasks.push({
      id: messages.idForTodo,
      title: messages.title,
      completed: false,
      editing: false
    })
    /*
    state.tasks.push({
      id: 1,
      title: 'coap',
      completed: false,
      editing: false
    })
    */
  },
  INCREASE_ID_FOR_TODO (state) {
    state.idForTodo = state.tasks.length + 1
  },
  DELETE_TASK (state, messages) {
    state.tasks.splice(messages.index, 1)
  }
}

const actions = {
  getAllTodos: ({commit}) => {
    Vue.http.get(getUserCurrentTasksUrl, {headers: getHeader()})
      .then(response => {
        commit('SET_TODOS_VIEW', response.body.data)
      }).catch(response => {})
  },
  addTask: ({commit}, postData) => {
    return Vue.http.post(getCreateTaskUrl, postData, {headers: getHeader()})
      .then(response => {
        commit('UPDATE_TASKS', postData)
        return response
      })
  },
  increaseIdForTodo: ({commit}) => {
    commit('INCREASE_ID_FOR_TODO')
  },
  deleteTask: ({commit}, postData) => {
    return Vue.http.post(getDeleteTaskByIdUrl, postData, {headers: getHeader()})
      .then(response => {
        commit('DELETE_TASK', postData)
        return response
      })
  }
}

export default {
  state, mutations, actions
}

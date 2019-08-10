import Vue from 'vue'
import _ from 'lodash'
import {
  getUserPrivateMessagesUrl,
  getUserPrivateMessagesSentUrl,
  getUserPrivateMessageByIdUrl,
  getUserPrivateMessageSendUrl,
  getHeader
}
  from '../../config'

const state = {
  notifications: [],
  messageRec: [],
  messageSent: [],
  message: {
    subject: '',
    message: '',
    sender: ''
  }
}

const mutations = {
  SET_MESSAGES_REC (state, messages) {
    state.messageRec = messages
  },
  SET_MESSAGES_SENT (state, messages) {
    state.messageSent = messages
  },
  SET_MESSAGES_VIEW (state, messages) {
    state.message = messages
  },
  CLEAR_MESSAGE_VIEW (state) {
    state.message = {
      subject: '',
      message: '',
      sender: ''
    }
  },
  SEND_PRIVATE_MESSAGE (state, messages) {
    state.messageSent.push(messages)
  },
  NEW_PM_NOTIFICATION (state, message) {
    state.notifications.unshift(message)
    state.messageRec.unshift(message)
  },
  MESSAGE_READ_NOTIFICATION (state, message) {
    console.log('MESSAGE: ', message)
    _.forEach(state.messageRec, function (value, key) {
      if (message.id === value.id) {
        state.messageRec[key] = value
      }
    })

    _.forEach(state.notifications, function (value, key) {
      if (message.id === value.id) {
        state.notifications.splice(key, 1)
      }
    })
  }
}

const actions = {
  setUserMessagesRec: ({commit}) => {
    let postData = {}
    return Vue.http.post(getUserPrivateMessagesUrl, postData, {headers: getHeader()})
      .then(response => {
        commit('SET_MESSAGES_REC', response.body.data)
      })
  },
  setUserMessagesSent: ({commit}) => {
    let postData = {}
    return Vue.http.post(getUserPrivateMessagesSentUrl, postData, {headers: getHeader()})
      .then(response => {
        commit('SET_MESSAGES_SENT', response.body.data)
        return response
      })
  },
  getPrivateMessageById: ({commit}, id) => {
    let postData = {'id': id}
    return Vue.http.post(getUserPrivateMessageByIdUrl, postData, {headers: getHeader()})
      .then(response => {
        commit('SET_MESSAGES_VIEW', response.body.data)
      })
  },
  clearMessageView: ({commit}) => {
    commit('CLEAR_MESSAGE_VIEW')
  },
  sendPrivateMessage: ({commit}, postData) => {
    return Vue.http.post(getUserPrivateMessageSendUrl, postData, {headers: getHeader()})
      .then(response => {
        commit('SEND_PRIVATE_MESSAGE', response.body.data)
        return response
      })
  },
  newMessageNotification: ({commit}, message) => {
    commit('NEW_PM_NOTIFICATION', message)
  },
  messageReadNotification: ({commit}, message) => {
    commit('MESSAGE_READ_NOTIFICATION', message)
  }
}

export default {
  state, mutations, actions
}

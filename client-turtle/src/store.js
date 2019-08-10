import Vue from 'vue'
import Vuex from 'vuex'

import userStore from './components/user/userStore'
import chatStore from './components/chat/chatStore'
import privateMessageStore from './components/privateMessage/privateMessageStore'
import mountainStore from './components/mountain/mountainStore'
import todoStore from './components/todo/todoStore'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    userStore,
    chatStore,
    privateMessageStore,
    mountainStore,
    todoStore
  },
  strict: debug
})

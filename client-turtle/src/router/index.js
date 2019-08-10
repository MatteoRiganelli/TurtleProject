import Vue from 'vue'
import Router from 'vue-router'
// import HelloWorld from '@/components/HelloWorld'
import Login from '@/components/Login'
import Dashboard from '@/components/Dashboard'
import ChatPage from '@/components/ChatPage'
import ForgotPassword from '@/components/ForgotPassword'
import ResetPassword from '@/components/ResetPassword'
import Registration from '@/components/Registration'

import MountainList from '@/components/mountain/MountainList'
import MountainInsert from '@/components/mountain/MountainInsert'

import Todo from '@/components/todo/TodoPage'
// import PrivateMessage from '@/components/PrivateMessagePage'
import PrivateMessageInbox from '@/components/privateMessage/PrivateMessageInbox'
import PrivateMessageSent from '@/components/privateMessage/PrivateMessageSent'
import PrivateMessageView from '@/components/privateMessage/PrivateMessageView'
import PrivateMessageCompose from '@/components/privateMessage/PrivateMessageCompose'

Vue.use(Router)

const routes = [

  {path: '/', name: 'home', component: Login},
  {path: '/registration', name: 'Registration', component: Registration},
  {path: '/dashboard', name: 'dashboard', component: Dashboard, meta: { requiresAuth: true }},
  {path: '/chat', name: 'chat', component: ChatPage, meta: { requiresAuth: true }},
  {path: '/forgot-password', name: 'forgot-password', component: ForgotPassword},
  {path: '/reset-password/:token', name: 'reset-password', component: ResetPassword},
  {path: '/mountainList', name: 'mountain-list', component: MountainList, meta: { requiresAuth: true }},
  {path: '/mountainInsert', name: 'mountain-insert', component: MountainInsert, meta: { requiresAuth: true }},
  {path: '/todo', name: 'todo', component: Todo, meta: { requiresAuth: true }},
  {path: '/inbox-pms', name: 'my-pms', component: PrivateMessageInbox, meta: { requiresAuth: true }},
  {path: '/new-pm', name: 'new-pm', component: PrivateMessageCompose, meta: { requiresAuth: true }},
  {path: '/pm/:id', name: 'pm-view', component: PrivateMessageView, meta: { requiresAuth: true }},
  {path: '/sent-pms', name: 'sent-pms', component: PrivateMessageSent, meta: { requiresAuth: true }}

]

export default new Router({
  mode: 'history',
  routes
})

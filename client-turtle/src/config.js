
export const apiDomain = 'http://localhost:8000/'
export const loginUrl = apiDomain + 'oauth/token'
export const userUrl = apiDomain + 'api/auth/user'
export const registationUrl = apiDomain + 'api/auth/signup'
export const userListUrl = apiDomain + 'api/auth/v1/user-list'
export const getUserConversationUrl = apiDomain + 'api/auth/v1/get-user-conversation'
export const saveChatMessageUrl = apiDomain + 'api/auth/v1/chat-save'
export const uploadImageAvatarUrl = apiDomain + 'api/uploadImageAvatar'
export const foundDateUrl = apiDomain + 'api/foundDate'
export const getAllMountainUrl = apiDomain + '' + 'api/auth/v1/mountain/get-all'

export const getUserPrivateMessagesUrl = apiDomain + 'api/auth/get-private-messages'
export const getUserPrivateMessagesSentUrl = apiDomain + 'api/auth/get-private-message-sent'
export const getUserPrivateMessageByIdUrl = apiDomain + 'api/auth/get-private-message'
export const getUserPrivateMessageSendUrl = apiDomain + 'api/auth/send-private-message'

export const getUserCurrentTasksUrl = apiDomain + 'api/auth/current_tasks'
export const getCreateTaskUrl = apiDomain + 'api/auth/create_task'
export const getDeleteTaskByIdUrl = apiDomain + 'api/auth/delete_task'

export const forgotPasswordUrl = apiDomain + 'api/forgot-password'
export const resetPasswordUrl = apiDomain + 'api/reset-password'

export const getHeader = function () {
  const tokenData = JSON.parse(window.localStorage.getItem('authUser'))
  const headers = {
    'Accept': 'application/json',
    'Authorization': 'Bearer ' + tokenData.access_token
  }
  return headers
}

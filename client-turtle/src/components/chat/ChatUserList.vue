<!-- eslint-disable -->
<template>
    <div class="wrapper" id="chat-user-list-wrapper">
        <ul class="list-group">
            <li class="list-group-item"
                v-for="user in chatStore.userList"
                v-on:click="changeChatUser(user)"
                v-if="user.email !== userStore.authUser.email"
                :class="[{active: userActiveStyle(user)}]"
                :style="{ cursor: 'pointer'}">{{user.name}}</li>
        </ul>
    </div>
</template>

<script>
import {mapState} from 'vuex'
export default {
  name: 'ChatUserList',
  computed: {
    ...mapState({
      chatStore: state => state.chatStore,
      userStore: state => state.userStore
    })
  },
  methods: {
    userActiveStyle (user) {
      if (this.chatStore.currentChatUser === null) {
        return false
      }
      if (this.chatStore.currentChatUser.id === user.id) {
        return true
      }
      return false
    },
    changeChatUser (user) {
      this.$store.dispatch('setCurrentChatUser', user)
    }
  }
}
</script>

<style scoped>

</style>

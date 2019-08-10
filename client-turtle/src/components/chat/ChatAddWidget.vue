<template>
    <div class="chat-add-widget">
        <form v-on:submit.prevent="handleAddChat()">
            <div class="form-group">
                <input type="text" placeholder="Enter your text" class="form-control" v-model="message">
            </div>
        </form>
    </div>
</template>

<script>
import {mapState} from 'vuex'
import Pusher from 'pusher-js'
import { pusherAppKey, pusherAppCluster } from './../../../env'

export default {
  name: 'ChatAddWidget',
  created () {
    this.pusher = new Pusher(pusherAppKey, {
      encrypted: true,
      cluster: pusherAppCluster
    })
    let that = this
    this.channel = this.pusher.subscribe('chat-channel')
    this.channel.bind('chat_saved', function (data) {
      that.$emit('incoming_chat', data)
    })
    this.$on('incoming_chat', function (chatMessage) {
      this.incomingChat(chatMessage)
    })
  },
  computed: {
    ...mapState({
      chatStore: state => state.chatStore,
      userStore: state => state.userStore
    })
  },
  data () {
    return {
      message: null,
      pusher: null,
      channel: null
    }
  },
  methods: {
    handleAddChat () {
      if (this.message !== null) {
        console.log(this.message)
        let postData = {
          'receiver_id': this.chatStore.currentChatUser.id,
          'chat': this.message
        }
        this.$store.dispatch('addNewChatToConversation', postData)
          .then(response => {
            this.message = null
            let element = document.getElementById('chat-widget-wrapper')
            element.scrollIntoView(false)
          })
      }
    },
    incomingChat (chatMessage) {
      console.log(this.chatStore.currentChatUser.id + ' ' + chatMessage.message.sender_id)
      if (this.chatStore.currentChatUser.id === chatMessage.message.sender_id) {
        if (chatMessage.message.receiver.email === this.userStore.authUser.email) {
          this.$store.dispatch('newIncomingChat', chatMessage.message)
            .then(
              res => {
                let element = document.getElementById('chat-widget-wrapper')
                element.scrollIntoView(false)
              }
            )
        } else {
          console.log('Message for some other user by the selected user')
        }
      }
    }
  }
}
</script>

<style lan="scss">

</style>

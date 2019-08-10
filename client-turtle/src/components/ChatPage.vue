<template>
    <div class="wrapper" id="chat-wrapper">
        <section class="heading">
            <h1 class="page-title">
                Chat
                <small class="text-muted">get connected with your friends</small>
            </h1>
        </section>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-2" id="user-list-col">
                        <user-list></user-list>
                    </div>
                    <div class="col-md-10">
                        <div class="chat-block">
                            <chat-block></chat-block>
                        </div>
                        <div class="add-chat-block">
                            <add-chat></add-chat>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import { mapState } from 'vuex'
import ChatUserList from './../components/chat/ChatUserList'
import ChatWidget from './../components/chat/ChatWidget'
import ChatAddWidget from './../components/chat/ChatAddWidget'

export default {
  name: 'ChatPage',
  computed: {
    ...mapState({
      chatStore: state => state.chatStore
    })
  },
  components: {
    'user-list': ChatUserList,
    'chat-block': ChatWidget,
    'add-chat': ChatAddWidget
  },
  created () {
    this.$store.dispatch('setUserList')
  }
}

</script>

<style scoped>

</style>

<style lang="scss">
    @import './../assets/css/variables.scss';
    #user-list-col {
        border-right: 1px solid $border-color;
    }
</style>

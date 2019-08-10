<!-- eslint-disable -->
<template>
    <div id="chat-widget-wrapper">
        <div v-for="chat in chatConversation" class="conversation">
            <div class="sender-data clearfix">
                <div class="name">{{chat.sender.name}}</div>
                <div class="time">{{chat.sender.created_at}}</div>
            </div>
        <div class="chat-body">{{chat.chat}}</div>
        </div>
    </div>
</template>

<script>
import {mapState} from 'vuex'
import _ from 'lodash'

export default {
  name: 'ChatWidget',
  computed: {
    chatConversation () {
      return _.orderBy(this.chatStore.conversation, ['created_at'], ['asc'])
    },
    ...mapState({
      chatStore: state => state.chatStore
    })
  }
}
</script>

<style lang="scss">
    @import './../../assets/css/variables.scss';
    .conversation {
        border-bottom: 1px solid $border-color;
        padding-bottom: 5px;
        margin-bottom: 10px;
        .sender-data .name {
            float: left;
            font-weight: bold;
            font-size: 1.1em;
        }
        .sender-data .time {
            font-size: 0.8em;
            float: left;
            margin-left: 10px;
            line-height: 21px;
        }
        &:last-child {
            border-bottom: none;
        }
    }
</style>

<!-- eslint-disable -->
<template>
    <div class="PrivateMessage PrivateMessage-Inbox">
        <section class="header">
            <h1 class="page-title">Private-Messageee <small> My private Message</small></h1>
        </section>

        <section class="content">
            <div>
                <div class="col-md-2 col-sm-2 col-with-right-border">
                    <private-message-sidebar></private-message-sidebar>
                </div>

                <div class="col-sm-8">
                    <table class="table table-striped table-hover table-bordered table-condensed message-table">
                        <thead>
                        <tr>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Time ago</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="message in pmStore.messageRec" v-bind:class="[message.read == 0 ? 'unread' : 'read']">
                                <td class="col-sm-3">{{message.sender.name}}</td>
                                <td class="col-sm-7">
                                    <router-link :to="{name: 'pm-view', params: {id:message.id}}">{{message.subject}}</router-link>
                                </td>
                                <td class="col-sm-2">{{message.created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import {mapState} from 'vuex'
import PrivateMessageSidebar from './PrivateMessageSidebar'

export default {
  name: 'PrivateMessageInbox',
  components: {
    'private-message-sidebar': PrivateMessageSidebar
  },
  computed: {
    ...mapState({
      pmStore: state => state.privateMessageStore
    })
  },
  created () {
    this.$store.dispatch('setUserMessagesRec')
  },
  sockets: {
    message (data) {
      let message = JSON.parse(data)
      this.$store.dispatch('newMessageNotification', message)
      // console.log('messageReadNotification')
    }
  }
}
</script>

<style scoped>

</style>

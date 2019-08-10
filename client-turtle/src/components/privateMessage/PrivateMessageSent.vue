<!-- eslint-disable -->
<template v-if="pmStore.messageSent">
    <div class="PrivateMessage PrivateMessage-Inbox">
        <section class="header">
            <h1 class="page-title"> Sent messages <small> All private messages that i have sent. </small></h1>
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
                                <th>Send to</th>
                                <th>Subject</th>
                                <th>Time ago</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="message in pmStore.messageSent">
                                <td class="col-sm-3">{{ message.receiver.name }}</td>
                                <td class="col-sm-7">
                                    <router-link :to="{name: 'pm-view', params: { id: message.id }}">{{ message.subject }}</router-link>
                                </td>
                                <td class="col-sm-2">{{ message.created_at }}</td>
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
  name: 'PrivateMessageSent',
  computed: {
    ...mapState({
      pmStore: state => state.privateMessageStore
    })
  },
  data () {
    return {
      messages: []
    }
  },
  components: {
    'private-message-sidebar': PrivateMessageSidebar
  },
  created () {
    this.$store.dispatch('setUserMessagesSent')
  }
}
</script>

<style scoped>

</style>

<template>
    <div class="PrivateMessage PrivateMessage-Inbox">
        <section class="header">
            <h1 class="page-title"> Compose message <small> Send a private message </small></h1>
        </section>
        <section class="content">
            <div>
                <div class="col-md-2 col-sm-2 col-with-right-border">
                    <private-message-sidebar></private-message-sidebar>
                </div>
                <div class="col-sm-8">
                    <form v-on:submit.prevent="handleFormSubmit()">
                        <div class="form-group">
                            <!-- <pre>{{pm}}</pre> -->
                            <label>Select a User</label>
                            <multiselect
                                    v-model="pm.userSelected"
                                    :options="userStore.users"
                                    :searchable="true"
                                    :close-on-select="true"
                                    :show-labels="false"
                                    track-by="id"
                                    label="name"
                                    placeholder="Select a User">
                            </multiselect>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text"
                                   v-model="pm.subject"
                                   class="form-control"
                                   placeholder="Enter subject">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" v-model="pm.message" class="form-control"></textarea>
                        </div>

                        <button class="btn btn-primary">
                            <i class="fa fa-save"></i> Send
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import {mapState} from 'vuex'
import PrivateMessageSidebar from './PrivateMessageSidebar'

export default {
  name: 'PrivateMessageCompose',
  data () {
    return {
      pm: {
        userSelected: '',
        subject: '',
        message: ''
      }
    }
  },
  components: {
    'private-message-sidebar': PrivateMessageSidebar
  },
  computed: {
    ...mapState({
      pmStore: state => state.privateMessageStore,
      userStore: state => state.userStore
    })
  },
  created () {
    this.$store.dispatch('getUserList')
  },
  methods: {
    handleFormSubmit () {
      let postData = {
        'receiver_id': this.pm.userSelected.id,
        'message': this.pm.message,
        'subject': this.pm.subject
      }
      this.$store.dispatch('sendPrivateMessage', postData)
        .then(response => {
          this.$router.push({name: 'my-pms'})
        })
    }
  }
}
</script>

<style>

</style>

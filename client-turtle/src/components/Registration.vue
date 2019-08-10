<!-- eslint-disable -->
<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <h2 id="register-form-link">Register</h2>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label> Name </label>
                                            <input
                                                    class="form-control"
                                                    placeholder="Name"
                                                    type="text"
                                                    v-model="user.name"
                                                    id="inputName"
                                                    required autofocus
                                            >
                                            <label> Email Address </label>
                                            <input
                                                    class="form-control"
                                                    placeholder="Email address"
                                                    type="email"
                                                    v-model="user.email"
                                                    id="inputEmail"
                                                    required autofocus
                                            >
                                            <label> Password </label>
                                            <input
                                                    class="form-control"
                                                    placeholder="Email address"
                                                    type="password"
                                                    v-model="user.password"
                                                    id="inputPassword"
                                                    required autofocus
                                            >
                                            <label> Confirm Password </label>
                                            <input
                                                    class="form-control"
                                                    placeholder="Password"
                                                    type="password"
                                                    v-model="user.confirm_password"
                                                    id="inputConfirmPassword"
                                            >
                                        </div>
                                        <add-photo-block></add-photo-block>
                                        <button v-on:click="handleRegistrationSubmit()" class="btn btn-primary">Sign Up</button>
                                        <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { registationUrl } from './../config'
import PhotoUpload from './ImageUpload'
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'

export default {
  name: 'Registration',
  data () {
    return {
      name: '',
      user: {
        name: 'Fabio',
        email: 'fabio@mail.com',
        password: '123456',
        confirm_password: '123456'
      },
      checkedInput: {
        name: false,
        email: false,
        password: false
      }
    }
  },
  components: {
    'add-photo-block': PhotoUpload
  },
  computed: {
  },
  methods: {
    validEmail: function (email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email)
    },
    handleRegistrationSubmit () {
      // if (this.validateForm()) {
      const postData = {
        name: this.user.name,
        email: this.user.email,
        password: this.user.password,
        password_confirmation: this.user.confirm_password
      }
      console.log(postData)

      this.$http.post(registationUrl, postData)
        .then(response => {
          console.log(response)
          window.alert('Registered! - Check the mail!')
          this.$router.push('/')
        })
      // }
    }
  }
}
</script>

<style lang="sass">
    #registration-wrapper
        margin-top: 50px
</style>

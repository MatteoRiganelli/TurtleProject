<template>

  <div class="wrapper" id="login-wrapper">
      <section class="login">
      <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-push-3">
                <div class="panel panel-default">
                    <div class="panel-body">

                      <div class="form-group">
                    <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <h2 class="form-signin-heading">Please login</h2>
                      <label> Email Address </label>
                      <!-- <div class="alert" v-if="error">{{ login.error }}</div> -->
                      <input
                              class="form-control"
                              placeholder="Email address"
                              type="email"
                              v-model="login.email"
                              id="inputEmail"
                              required autofocus
                      >
                      <label for="inputPassword" class="sr-only">Password</label>
                      <input
                              class="form-control"
                              placeholder="Password"
                              type="password"
                              v-model="login.password"
                              id="inputPassword"
                      >
                      <div class="checkbox mb-3">
                      <label>
                        <input type="checkbox" value="remember-me"> Remember me
                      </label>
                      </div>
                      </div>
                      <button v-on:click="handleLoginSubmit()" class="btn btn-primary">Sign In</button>
                      <button v-on:click="handleRegistrationSubmit()" class="btn btn-primary">Sign Up</button>
                      <router-link :to="{name: 'forgot-password'}" > Forgot Password</router-link>
                      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
                    </div>
                </div>
            </div>
          </div>
      </div>
      </section>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import { loginUrl, getHeader, userUrl } from './../config'
import { clientId, clientSecretId } from './../../env'
export default {
  data () {
    return {
      login: {
        email: 'fabio@mail.com',
        password: '123456',
        error: true
      }
    }
  },
  created () {
    console.log('Login was created')
  },
  methods: {
    handleLoginSubmit () {
      console.log('Login')
      const postData = {
        grant_type: 'password',
        client_id: clientId,
        client_secret: clientSecretId,
        username: this.login.email,
        password: this.login.password,
        scope: ''
      }
      const authUser = {}
      this.$http.post(loginUrl, postData)
        .then(
          response => {
            if (response.status === 200) {
              console.log('OauthToken: ', response.data)
              authUser.access_token = response.data.access_token
              authUser.refresh_token = response.data.refresh_token
              window.localStorage.setItem('authUser', JSON.stringify(authUser))
              console.log(getHeader())
              this.$http.get(userUrl, {headers: getHeader()})
                .then(
                  response => {
                    authUser.email = response.data.email
                    authUser.name = response.data.name
                    authUser.id = response.data.id
                    window.localStorage.setItem('authUser', JSON.stringify((authUser)))
                    // const userObj = JSON.parse(window.localStorage.getItem('authUser'))
                    // console.log('AUTHUSER: ', userObj)
                    this.$store.dispatch('setUserObject', authUser)
                    this.$router.push('/dashboard')
                  }
                )
            }
          }
        )
    },
    handleRegistrationSubmit () {
      console.log('Registation')
      this.$router.push('/registration')
    }
  },
  computed: {
    ...mapState({ userStore: state => state.userStore })
  }
}

</script>

<style lang="sass">
    #login-wrapper
        margin-top: 50px
</style>

<template>
    <div class="wrapper" id="dashboard-wrapper">
        <p> Welcome to the Dash <strong>{{this.$store.state.userStore.authUser.name}}</strong></p>
        <add-photo-block></add-photo-block>
        <div class="alert alert-success alert-dismissible fade show" role="alert"></div>
        <div class="example">
            <h3>Choose a date</h3>
            <datepicker :format="format" v-model="vModelExample" @selected="resetVariables"></datepicker>
            <hr/>
            <p>{{vModelExample}}</p>
            <h3>Choose a a number of days</h3>
            <input
                    class="form-control"
                    placeholder="days"
                    type="number"
                    v-model="days"
                    id="inputDays"
                    required autofocus
                    v-on:click="resetVariables()"
            >
            <br/>
            <button v-on:click="handleDatebyNumberDays()" class="btn btn-primary">Calculate</button>
        </div>
        <hr/>
        <h2>
            <p v-if="resultFutureDate">La data dopo {{days}} giorni e' <strong>{{resultFutureDate}}</strong></p>
            <p v-if="resultFutureDate && days===1">La data dopo {{days}} giorno e' <strong>{{resultFutureDate}}</strong></p>
        </h2>
    </div>
</template>

<script>
import { mapState } from 'vuex'
import PhotoUpload from './ImageUpload'
import DatePicker from 'vuejs-datepicker'
import * as lang from 'vuejs-datepicker/src/locale'
import { foundDateUrl } from './../config'

const state = {
  date1: new Date()
}
let userObj = ''

export default {
  name: 'app',
  computed: {
    ...mapState({userStore: state => state.userStore})
  },
  components: {
    'add-photo-block': PhotoUpload,
    'datepicker': DatePicker
  },
  created () {
    userObj = JSON.parse(window.localStorage.getItem('authUser'))
    this.$store.dispatch('setUserObject', userObj)
    console.log('-------', userObj)
  },
  data () {
    return {
      format: 'd MMMM yyyy',
      disabledDates: {},
      disabledFn: {
        customPredictor (date) {
          if (date.getDate() % 3 === 0) {
            return true
          }
        }
      },
      highlightedFn: {
        customPredictor (date) {
          if (date.getDate() % 4 === 0) {
            return true
          }
        }
      },
      highlighted: {},
      eventMsg: null,
      state: state,
      language: 'en',
      languages: lang,
      vModelExample: null,
      days: '',
      resultFutureDate: '',
      changedMonthLog: []
    }
  },
  methods: {
    handleDatebyNumberDays () {
      const postData = {
        date: this.vModelExample,
        idUser: userObj.id,
        days: this.days
      }
      this.$http.post(foundDateUrl, postData)
        .then(
          response => {
            if (response.status === 200) {
              this.resultFutureDate = response.data.data
            }
          })
    },
    resetVariables () {
      console.log('reset variables...')
      this.resultFutureDate = ''
    }
  },
  updated () {
  }
}
</script>



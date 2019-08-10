<!-- eslint-disable -->
<!--
<template>
    <div class="wrapper" id="chat-user-list-wrapper">
        <div class="col-sm-8">
            <table class="table table-striped table-hover table-bordered table-condensed message-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="mountain in pmStore.mountains">
                    <td class="col-sm-3">{{mountain.name}}</td>
                    <td class="col-sm-2">{{mountain.latitude}}</td>
                    <td class="col-sm-2">{{mountain.longitude}}</td>
                    <pre>{{mountain}}</pre>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
-->
<template>
    <div class="PrivateMessage PrivateMessage-Inbox">
        <section class="header">
            <h1 class="page-title"> Mountain List <small> List of all mountains in the database</small></h1>
        </section>

        <section class="content">
            <div>
                <div class="col-md-2 col-sm-2 col-with-right-border">
                    <mountain-sidebar></mountain-sidebar>
                </div>

                <div class="col-sm-8">
                    <table class="table table-striped table-hover table-bordered table-condensed message-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="mountain in pmStore.mountains">
                            <td class="col-sm-3">{{mountain.name}}</td>
                            <td class="col-sm-2">{{mountain.latitude}}</td>
                            <td class="col-sm-2">{{mountain.longitude}}</td>
                            <pre>{{mountain}}</pre>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
// import { getAllMountainUrl, getHeader } from './../../config'
import {mapState} from 'vuex'
import MoutainSidebar from './MountainSidebar'

export default {
  name: 'Mountain',
  computed: {
    ...mapState({
      pmStore: state => state.mountainStore
    })
  },
  components: {
    'mountain-sidebar': MoutainSidebar
  },
  created () {
    this.$store.dispatch('getAllMountains')
    console.log('quiiiii: ', this.pmStore)
  },
  mounted () {
    /*
    this.$http.get(getAllMountainUrl, {headers: getHeader()})
      .then(response => {
        console.log('OKKKK: ', response.data)
        this.mountains = response.data
      }).catch(response => {
        console.log('ERROR: ', response)
      })
      */
  }
}
</script>

<style scoped>

</style>

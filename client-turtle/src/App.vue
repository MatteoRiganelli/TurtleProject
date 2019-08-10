<template>
  <div id="app">
      <!--<pre>{{userStore}}</pre>-->
      <top-menu></top-menu>
      <router-view></router-view>
      <!-- <img src="./assets/logo.png"> -->
  </div>
</template>

<script>
import TopMenu from './components/TopMenu'

export default {
  components: {
    TopMenu
  },
  created () {
  },
  sockets: {
    connect: function () {
      console.log('socket connected')
    }
  }
}
</script>

<style lang="sass">
    @import './assets/css/bootstrap.css'
    @import './assets/css/global.scss'
</style>

<style>
    body {
        font-family: "Helvetica Neue Light", Helvetica, sans-serif;
        padding: 1em 2em 2em;
    }
    input,
    select {
        padding: 0.75em 0.5em;
        font-size: 100%;
        border: 1px solid #ccc;
        width: 100%;
    }

    select {
        height: 2.5em;
    }

    .example {
        background: #f2f2f2;
        border: 1px solid #ddd;
        padding: 0em 1em 1em;
        margin-bottom: 2em;
    }

    code,
    pre {
        margin: 1em 0;
        padding: 1em;
        border: 1px solid #bbb;
        display: block;
        background: #ddd;
        border-radius: 3px;
    }

    .settings {
        margin: 2em 0;
        border-top: 1px solid #bbb;
        background: #eee;
    }

    h5 {
        font-size: 100%;
        padding: 0;
    }

    .form-group {
        margin-bottom: 1em;
    }

    .form-group label {
        font-size: 80%;
        display: block;
    }
</style>
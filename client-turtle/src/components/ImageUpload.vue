<template>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2">
                <img :src="image" class="img-responsive">
            </div>
            <div class="col-md-8">
                <input type="file" v-on:change="onFileChange" class="form-control">
            </div>
            <div class="col-md-2">
                <button class="btn btn-success btn-block" @click="upload">Upload</button>
            </div>
        </div>
    </div>
</template>

<script>
import {uploadImageAvatarUrl} from '../config'

export default{
  data () {
    return {
      image: ''
    }
  },
  created () {
  },
  methods: {
    onFileChange (e) {
      let files = e.target.files || e.dataTransfer.files
      if (!files.length) {
        return
      }
      this.createImage(files[0])
    },
    createImage (file) {
      let reader = new FileReader()
      let vm = this
      reader.onload = (e) => {
        vm.image = e.target.result
      }
      reader.readAsDataURL(file)
    },
    upload () {
      console.log(this.image)
      const userObj = JSON.parse(window.localStorage.getItem('authUser'))
      this.$store.dispatch('setUserObject', userObj)
      console.log(userObj.id)
      this.$http.post(uploadImageAvatarUrl, {image: this.image, idUser: userObj.id})
        .then(response => {
          console.log(response)
        }).catch(response => {
          console.log(response)
        })
    }
  }
}
</script>

<style scoped>
    img{
        max-height: 36px;
    }
</style>

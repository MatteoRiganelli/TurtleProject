<template>
    <div class="PrivateMessage PrivateMessage-Inbox">
        <section class="header">
            <h1 class="page-title"> Mountain Insert <small> Insrt a new Mountain </small></h1>
        </section>
        <section class="content">
            <div>
                <div class="col-md-2 col-sm-2 col-with-right-border">
                    <mountain-sidebar></mountain-sidebar>
                </div>
                <div class="col-sm-8">
                    <div>
                        <div>
                            <h2>Search and add a pin</h2>
                            <label>
                                <gmap-autocomplete
                                        @place_changed="setPlace">
                                </gmap-autocomplete>
                                <button @click="addMarker">Add</button>
                            </label>
                            <br/>

                        </div>
                        <br>
                        <gmap-map
                                :center="center"
                                :zoom="12"
                                style="width:100%;  height: 400px;"
                        >
                            <gmap-marker
                                    :key="index"
                                    v-for="(m, index) in markers"
                                    :position="m.position"
                                    @click="center=m.position"
                            ></gmap-marker>
                        </gmap-map>
                    </div>
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
  name: 'MountainInsert',
  computed: {
    ...mapState({
      pmStore: state => state.mountainStore
    })
  },
  data () {
    return {
      // default to Montreal to keep it simple
      // change this to whatever makes sense
      center: { lat: 45.508, lng: -73.587 },
      markers: [],
      places: [],
      currentPlace: null
    }
  },
  components: {
    'mountain-sidebar': MoutainSidebar
  },
  created () {
    this.$store.dispatch('getAllMountains')
    console.log('quiiiii: ', this.pmStore)
  },
  mounted () {
    this.geolocate();
  },
  methods: {
    // receives a place object via the autocomplete component
    setPlace (place) {
      this.currentPlace = place;
    },
    addMarker () {
      if (this.currentPlace) {
        const marker = {
          lat: this.currentPlace.geometry.location.lat(),
          lng: this.currentPlace.geometry.location.lng()
        };
        this.markers.push({ position: marker });
        this.places.push(this.currentPlace);
        this.center = marker;
        this.currentPlace = null;
      }
    },
    geolocate: function () {
      navigator.geolocation.getCurrentPosition(position => {
        this.center = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        }
      })
    }
  }
}
</script>

<style scoped>

</style>

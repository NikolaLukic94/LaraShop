<template>
  <div class="container">
      <gmap-map
        :center="mapCenter"
        :zoom="10"
        map-type-id="terrain"
        style="width: 500px; height: 300px"
    >
        <gmap-info-window
            :options="infoWindowOptions"
            :position="infoWindowPosition"
            :opened="infoWindowOpened"
            @closeclick="handleInfoWindowClose">
        </gmap-info-window>
            <div class="info-window" v-if="this.activeStore">
                <h2 v-text="this.activeStore.name"></h2>
                <h2 v-text="'Hours: '+ this.activeStore.hours"></h2>
                <h2 v-text="this.activeStore.address"></h2>
                <h2 v-text="this.activeStore.city"></h2>
            </div>
        <gmap-marker
            v-for="r in this.getStores"
            :key="r.id"
            :position="getPosition(r)"
            :clickable="true"
            :draggable="false"
            @click="this.activeStore = r;this.infoWindowOpened = true;">
        </gmap-marker>
        </gmap-map>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'map-component',
        data: function () {
            return {
                infoWindowOptions: {
                    pixelOffset: {
                        width: 0,
                        height: -35
                    }
                },
                activeStore: null,
                infoWindowPosition: {
                    lat: '',
                    lng: ''
                },
                infoWindowOpened: false
            }
        },
        computed: {
             ...mapGetters('aStore', ['getStores']),
            mapCenter() {
                if (!this.getStores.length) {
                    return {
                        lat: 10,
                        lng: 10
                    }
                }

                return {
                    lat: parseFloat(this.getStores[0].latitude),
                    lng: parseFloat(this.getStores[0].longitude)
                }
            },
            infoWindowPosition() {
                return {
                    lat: parseFloat(this.activeStore.latitude),
                    lat: parseFloat(this.activeStore.longitude)
                }
            }
        },
        methods: {
            ...mapActions('aStore', ['setStores']),  
            getPosition(r) {
                return {
                    lat: parseFloat(r.latitude),
                    lng: parseFloat(r.longitude)
                }
            },
            handleInfoWindowClose() {
                this.activeStore = {},
                this.infoWindowOptions = false
            }
        },
        created() {
            this.setStores();
        },             
    }
</script>

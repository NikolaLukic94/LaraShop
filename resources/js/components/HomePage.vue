<template>
    <v-app>
        <v-carousel hide-delimiters>
            <v-carousel-item
                v-for="(item,i) in items"
                :key="i"
                :src="item.src"
            ></v-carousel-item>
        </v-carousel>
        <v-row>
            <v-col></v-col>
        </v-row>

<!--        <p style="font-size:18px; font-weight: 100; padding: 20px 0; margin: 20px;"></p>-->
        <products-table-component :filter="'newest'"></products-table-component>

        <info-component></info-component>
    </v-app>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import InfoComponent from "./visuals/InfoComponent";

    export default {
        name: 'home-page',
        components: {InfoComponent},
        computed: {
            ...mapGetters('orderItem', ['getOrderItems'])
        },
        data() {
            return {
                carouselSection: true,
                items: [
                    {
                        src: 'https://cdn.hipwallpaper.com/i/40/57/t5Bz9j.jpg',
                    },
                    {
                        src: 'https://cdn.concreteplayground.com/content/uploads/2018/10/reading-book-bed-stock-unsplash.jpg',
                    },
                ],
            }
        },
        methods: {
            ...mapActions('orderItem', ['setOrderItems']),
            passData(value) {
                Object.keys(this.$data).forEach(key => this.$data[key] = null);
            }
        },
        created() {
            this.setOrderItems();
        },
    }
</script>


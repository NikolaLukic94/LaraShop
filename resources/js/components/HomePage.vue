<template>
    <v-app>
        <landing-page></landing-page>
        <info-component></info-component>
    </v-app>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: 'home-page',
        computed: {
            ...mapGetters('orderItem', ['getOrderItems'])
        },
        data() {
            return {
                carouselSection: true,
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


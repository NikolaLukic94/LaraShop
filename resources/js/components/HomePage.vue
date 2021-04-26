<template>
    <v-app>
        <navbar-component @clicked="passData"></navbar-component>
        <div v-if="this.carouselSection">
            <landing-page></landing-page>
        </div>
        <div v-if="this.login">
            <login-form-component></login-form-component>
        </div>
        <div v-if="this.register">
            <register-form-component></register-form-component>
        </div>
        <div v-if="this.gMap">
            <map-component></map-component>
        </div>
        <div v-if="this.product">
            <products-table-component :filter="'newest'"></products-table-component>
        </div>
        <div v-if="this.about">
            <about></about>
        </div>
        <div v-if="this.checkout">
            <order-review></order-review>
            <stripe-checkout-component></stripe-checkout-component>
        </div>
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
                search: false,
                login: false,
                register: false,
                product: false,
                gMap: false,
                checkout: false,
                about: false,
            }
            // always show navbar, other don't show all the time
        },
        methods: {
            ...mapActions('orderItem', ['setOrderItems']),
            passData(value) {
                Object.keys(this.$data).forEach(key => this.$data[key] = null);

                // TODO: resolve differently
                if (value === 'login') {
                    this.login = true;
                }

                if (value === 'register') {
                    this.register = true;
                }

                if (value === 'home') {
                    this.carouselSection = true;
                }

                if (value === 'product') {
                    this.product = true;
                }

                if (value === 'checkout') {
                    this.checkout = true;
                }

                if (value === 'gMap') {
                    this.gMap = true;
                }

                if (value === 'about') {
                    this.about = true;
                }
            }
        },
        created() {
            this.setOrderItems();
        },
    }
</script>


<template>
    <v-app style="height: 60px;" id="inspire">
        <v-toolbar fixed>
            <v-toolbar-title>Gallery</v-toolbar-title>
            <v-toolbar-items class="hidden-sm-and-down" @click="redirect('home')">
                <v-btn text>Home</v-btn>
            </v-toolbar-items>
            <v-toolbar-items class="hidden-sm-and-down" @click="redirect('browse')">
                <v-btn text>Browse</v-btn>
            </v-toolbar-items>
            <v-toolbar-items class="hidden-sm-and-down" @click="redirect('map')">
                <v-btn text>Find Us</v-btn>
            </v-toolbar-items>
            <v-toolbar-items class="hidden-sm-and-down" @click="showSearch = !showSearch">
                <autocomplete></autocomplete>
            </v-toolbar-items>
            <v-toolbar-items class="hidden-sm-and-down" @click="redirect('history')">
                <v-btn text>History</v-btn>
            </v-toolbar-items>

            <v-spacer></v-spacer>

            <v-toolbar-items v-if="!this.tokenIsset" class="hidden-sm-and-down" @click="redirect('login')">
                <v-btn text>Login</v-btn>
            </v-toolbar-items>
            <v-toolbar-items v-if="!this.tokenIsset" class="hidden-sm-and-down" @click="redirect('register')">
                <v-btn text>Register</v-btn>
            </v-toolbar-items>

            <v-toolbar-items v-if="this.tokenIsset" class="hidden-sm-and-down" @click="redirect('admin')">
                <v-btn text>Admin</v-btn>
            </v-toolbar-items>

            <v-toolbar-items class="hidden-sm-and-down" v-if="getOrderItems.length > 0">
                <v-btn @click="drawer = !drawer" text>{{ getOrderItems.length }} in Cart</v-btn>
            </v-toolbar-items>
        </v-toolbar>
        <v-sheet
            class="overflow-hidden"
        >
            <v-navigation-drawer
                v-model="drawer"
                absolute
                temporary
                width="600"
            >
                <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title>Your cart</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>

                <CartItem></CartItem>

                <stripe-checkout-component></stripe-checkout-component>
            </v-navigation-drawer>
        </v-sheet>
    </v-app>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import StripeCheckoutComponent from "./StripeCheckoutComponent";
    import CartItem from "./CartItem"

    export default {

        name: 'navbar-component',
        components: {StripeCheckoutComponent, CartItem},
        computed: {
            ...mapGetters('orderItem', ['getOrderItems', 'getSidebarToogleValue'])
        },
        data() {
            return {
                tokenIsset: false,
                drawer: null,
                authUser: false,
                showSearch: false,
            }
        },
        methods: {
            ...mapActions('orderItem', ['setOrderItems']),
            redirect(val) {
                this.$router.push({name: val})
            },
            sendLogOutRequest() {
                axios.post('/logout').then(() => location.href = '/home')
            },
        },
        mounted() {
            this.$router.push({name: 'home'})
            this.tokenIsset = document.head.querySelector('meta[name="auth-token"]').getAttribute('content') !== 'not-authenticated' ? true : false
        },
        created() {
            this.setOrderItems()
        },
        watch: {
            cart: function (newVal) {
                this.$emit('clicked', 'cart')
            }
        },
    }
</script>

<style scoped>
    .navbar-p {
        display: inline-block;
        font-weight: 500;
        margin-right: 20px;
    }

    #navbar {
        display: inline;
        font-family: Century Gothic;
        font-size: 13px;
        padding-left: 175px;
    }

    .v-tab-main {
        font-family: OpenSans, sans-serif, arial;
        text-transform: uppercase;
        letter-spacing: .075em;
        max-height: 3.7em;
        cursor: pointer;
        font-weight: 400;
        height: 150px;
    }

</style>

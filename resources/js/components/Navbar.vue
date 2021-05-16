<template>
    <v-app style="height: 110px;">
        <v-row>
            <v-col cols=2 class="text-center">
            </v-col>
            <v-col cols=10 class="mt-5">
                <v-tabs color="teal" center-active class="v-tab-main">
                    <v-tab @click="redirect('home')">Home</v-tab>
                    <v-tab @click="redirect('productDisplay')">Browse</v-tab>
                    <v-tab @click="redirect('history')">Workshops</v-tab>
                    <v-tab @click="redirect('about')">About</v-tab>
                    <v-tab @click="redirect('map')">
                        <v-icon color="teal" style="text-decoration:none" :href="'/maps'">
                            mdi-google-maps
                        </v-icon>
                    </v-tab>
                    <v-tab @click="showSearch = !showSearch">
                        <autocomplete></autocomplete>
                    </v-tab>
                    <v-spacer></v-spacer>
                    <v-tab class="mr-3"
                           @click="redirect('login')"
                           v-if="this.authUser === 0"
                    >
                        <v-icon class="pr-2" color="teal">mdi-nature-people</v-icon>
                        Log In
                    </v-tab>
                    <v-tab
                        class="mr-12"
                        style="background-color: #008080; color: #fff;"
                        v-if="this.authUser === 0"
                        @click="redirect('register')"
                    >
                        Join
                    </v-tab>
                    <v-btn
                        v-if="this.authUser === 1"
                        @click="cart = !cart"
                        @click.stop="drawer = !drawer"
                        class="text-white mr-8 h-100"
                        style="background-color: #008080; color: #fff;">
                        <v-icon style="text-decoration:none">
                            mdi-cart
                        </v-icon>
                        {{ getOrderItems.length }}
                    </v-btn>
                </v-tabs>
            </v-col>
        </v-row>

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

                <cart-items></cart-items>

                <stripe-checkout-component></stripe-checkout-component>
            </v-navigation-drawer>
        </v-sheet>
    </v-app>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {

        name: 'navbar-component',
        computed: {
            ...mapGetters('orderItem', ['getOrderItems', 'getSidebarToogleValue'])
        },
        data() {
            return {
                drawer: null,
                authUser: false,
                showSearch: false,
                menu: [
                    {icon: 'home', title: 'home', href: '/'},
                    {icon: 'about us', title: 'about us', href: 'about-us'},
                    {icon: 'catalog', title: 'catalog', href: '/products/search'},
                    {icon: 'new', title: 'new', href: '/products/search'},
                    {icon: 'contracts', title: 'contracts', href: '/products/search'}
                ],
            }
        },
        methods: {
            redirect(val) {
                this.$router.push({name: val})
            },
            sendLogOutRequest() {
                axios.post('/logout')
                    .then(() => location.href = '/home')
            },
            getAuthStatus() {
                // todo: redo; testing purpose only
                if (window.axios.defaults.headers.common['Authorization'] !== 'Bearer ') {
                    this.authUser = 1;
                } else {
                    this.authUser = 0;
                }

                // axios.get('/api/user')
                //     .then(response => {
                //         console.log(response)
                //         this.authUser = response.data ? 1 : 0;
                //         console.log('au', this.authUser)
                //     })
                //     .catch(function (error) {
                //         console.log(error);
                //     });
            }
        },
        mounted() {
            this.getAuthStatus();
            this.$router.push({name: 'home'})
        },
        updated() {
            this.getAuthStatus();
        },
        watch: {
            // change to watch all at once and apss newVal as second param to this.$emit
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

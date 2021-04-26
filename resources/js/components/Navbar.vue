<template>
    <v-app style="height: 110px;">
        <v-row>
            <v-col cols=2 class="text-center">
                <a href="/">
                    <img src="/img/logo.png" height="110px;">
                </a>
            </v-col>
            <v-col cols=10 class="mt-5">
                <v-tabs color="teal" center-active class="v-tab-main">
                    <v-tab @click="home = !home">Home</v-tab>
                    <v-tab @click="product = !product">Browse</v-tab>
                    <v-tab>Workshops</v-tab>
                    <v-tab @click="about = !about">About</v-tab>
                    <v-tab @click="gMap = !gMap">
                        <v-icon color="teal" style="text-decoration:none" :href="'/maps'">
                            mdi-google-maps
                        </v-icon>
                    </v-tab>
                    <v-tab @click="showSearch = !showSearch">
                        <autocomplete></autocomplete>
                    </v-tab>
                    <v-spacer></v-spacer>
                    <v-tab class="mr-3"
                           @click="login = !login"
                           v-if="!this.authUser"
                    >
                        <v-icon class="pr-2" color="teal">mdi-nature-people</v-icon>
                        Log In
                    </v-tab>
                    <v-tab
                        class="mr-12"
                        style="background-color: #008080; color: #fff;"
                        v-if="!this.authUser"
                        @click="register = !register"
                    >
                        Join
                    </v-tab>
<!--                    <v-tab @click="checkout = !checkout" class="mr-12">-->
                        <cart-component></cart-component>
<!--                    </v-tab>-->
                </v-tabs>
            </v-col>
        </v-row>
    </v-app>
</template>

<script>
    export default {
        name: 'navbar-component',
        data() {
            return {
                authUser: false,
                home: false,
                searchPage: false,
                showSearch: false,
                login: false,
                register: false,
                product: false,
                checkout: false,
                gMap: false,
                about: false,
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
            sendLogOutRequest() {
                axios.post('/logout')
                    .then(() => location.href = '/home')
            },
            onClickButton(event) {
                this.$emit('clicked', 'someValue')
            },
            getAuthStatus() {
                axios.get('/api/user')
                    .then(response => {
                        this.authUser = response.data === 1;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        created() {
            this.getAuthStatus();
        },
        updated() {
            this.getAuthStatus();
        },
        watch: {
            // change to watch all at once and apss newVal as second param to this.$emit
            login: function (newVal) {
                this.$emit('clicked', 'login')
            },
            register: function (newVal) {
                this.$emit('clicked', 'register')
            },
            home: function (newVal) {
                this.$emit('clicked', 'home')
            },
            product: function (newVal) {
                this.$emit('clicked', 'product')
            },
            gMap: function (newVal) {
                this.$emit('clicked', 'gMap')
            },
            checkout: function (newVal) {
                this.$emit('clicked', 'checkout')
            },
            about: function (newVal) {
                this.$emit('clicked', 'about')
            },
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

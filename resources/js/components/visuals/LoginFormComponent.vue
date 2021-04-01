<template>
    <v-app>
        <v-container>
            <v-card
                class="mx-auto mt-16"
                max-width="444"
                outlined
            >
                <v-toolbar color="teal" dark>
                    <v-toolbar-title>Log In</v-toolbar-title>
                    <v-spacer></v-spacer>
                </v-toolbar>
                <v-container>
                    <form id="login_form" method="POST" action="/login" aria-label="Login" ref="form">
                        <input type="hidden" name="_token" :value="csrf_token">
                        <v-text-field
                            v-model="email"
                            name="email"
                            type="email"
                            label="Email"
                            required
                        >
                        </v-text-field>
                        <v-text-field
                            v-model="password"
                            name="password"
                            type="password"
                            label="Password"
                            required
                        >
                        </v-text-field>
                        <v-row>
                            <v-col cols="12" sm="6">
                                <v-btn color="light" type="submit" style="width: 100%">Password reset</v-btn>
                            </v-col>
                            <v-col cols="12" sm="6">
                                <v-btn @click="validate()" color="teal" type="submit" class="white--text"
                                       style="width: 100%">Log In
                                </v-btn>
                            </v-col>
                        </v-row>
                    </form>
                </v-container>
                <v-container>
                    <v-row class="pb-0 mb-0">
                        <v-card-text>
                            <p class="text-md-center text--secondary"><i>Or Login With</i></p>
                        </v-card-text>
                    </v-row>
                    <v-row>
                        <v-col class="text-center">
                            <v-btn color="teal lighten-1" @click="redirectToThirdPartyLogin('twitch')">
                                <v-icon dark class="white--text">
                                    mdi-twitch
                                </v-icon>
                            </v-btn>
                            <v-btn color="teal lighten-1" @click="redirectToThirdPartyLogin('github')">
                                <v-icon dark class="white--text">
                                    mdi-github
                                </v-icon>
                            </v-btn>
                            <v-btn color="teal lighten-1" @click="redirectToThirdPartyLogin('facebook')">
                                <v-icon dark class="white--text">
                                    mdi-facebook
                                </v-icon>
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card>
        </v-container>
    </v-app>
</template>


<script>
    export default {
        name: 'login-form-component',
        computed: {
            csrf_token() {
                let token = document.head.querySelector('meta[name="csrf-token"]')
                return token.content
            }
        },
        data() {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            validate() {
                // console.log(this.$refs.form)
                document.getElementById("login_form").submit()
            },
            redirectToThirdPartyLogin(providerName) {
                window.location.href = '/login/' + providerName;
            }
        }
    }
</script>

<template>
    <v-app>
        <v-container>
            <v-card
                class="mx-auto mt-16"
                max-width="444"
                outlined
            >
                <v-toolbar color="teal" dark>
                    <v-toolbar-title>Register</v-toolbar-title>
                    <v-spacer></v-spacer>
                </v-toolbar>
                <v-container>
                    <form id="register_form" method="POST" action="/register" aria-label="Register" ref="form">
                        <input type="hidden" name="_token" :value="csrf_token">
                        <v-text-field
                            v-model="name"
                            type="text"
                            name="name"
                            label="Name"
                        ></v-text-field>
                        <v-text-field
                            name="email"
                            type="email"
                            v-model="email"
                            label="Email"
                        ></v-text-field>
                        <v-text-field
                            name="password"
                            v-model="password"
                            type="password"
                            label="Password"
                            autocomplete="new-password"
                        ></v-text-field>
                        <v-text-field
                            name="password_confirmation"
                            v-model="email"
                            type="password"
                            label="Confirm password"
                            required
                            class="pt-4"
                            autocomplete="new-password"
                        ></v-text-field>
                        <v-row>
                            <v-col cols="12" sm="6">
                                <v-btn @click="validate()" color="teal" class="white--text" style="width: 100%">
                                    Register
                                </v-btn>
                            </v-col>
                            <v-col cols="12" sm="6">
                                <div class="text-right">
                                    <v-btn color="teal lighten-1" :href="'/login/twitch'">
                                        <v-icon dark class="white--text">
                                            mdi-twitch
                                        </v-icon>
                                    </v-btn>
                                    <v-btn color="teal lighten-1" :href="'/login/github'">
                                        <v-icon dark class="white--text">
                                            mdi-github
                                        </v-icon>
                                    </v-btn>
                                    <v-btn color="teal lighten-1" :href="'/login/facebook'">
                                        <v-icon dark class="white--text">
                                            mdi-facebook
                                        </v-icon>
                                    </v-btn>
                                </div>
                            </v-col>
                        </v-row>
                    </form>
                </v-container>
            </v-card>
        </v-container>
    </v-app>
</template>


<script>
    export default {
        name: 'register-form-component',
        data() {
            return {
                name: '',
                email: '',
                password: '',
            }
        },
        computed: {
            csrf_token() {
                let token = document.head.querySelector('meta[name="csrf-token"]')
                return token.content
            }
        },
        methods: {
            validate() {
                // console.log(this.$refs.form)
                // this.$validator.validateAll().then((result) => {
                //     if (result) {
                //Manually submit form if not errors
                document.getElementById("register_form").submit()
                // }
                // })
            },
        },
    }
</script>

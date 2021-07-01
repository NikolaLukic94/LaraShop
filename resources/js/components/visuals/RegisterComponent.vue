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
                            v-model="password"
                            type="password"
                            label="Confirm password"
                            required
                            class="pt-4"
                            autocomplete="new-password"
                        ></v-text-field>
                        <v-row>
                            <v-col>
                                <v-btn @click="registerUser()" color="teal" class="white--text" style="width: 100%">
                                    Register
                                </v-btn>
                            </v-col>
                        </v-row>
                        <v-row class="pb-0 mb-0">
                            <v-card-text>
                                <p class="text-md-center text--secondary"><i>Or Join With</i></p>
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

                max: 40,
                min:8
            }
        },
        computed: {
            csrf_token() {
                let token = document.head.querySelector('meta[name="csrf-token"]')
                return token.content
            },
            rules() {
                const rules = []

                if (this.name) {
                    const rule =
                        v => (v || '').length <= this.max ||
                            `A maximum of ${this.max} characters is allowed`

                    rules.push(rule)
                }

                if (this.email) {
                    const rule =
                        v => (v || '').length <= this.max ||
                            `A maximum of ${this.max} characters is allowed`

                    rules.push(rule)
                }

                if (this.password) {
                    const rule =
                        v => (v || '').length <= this.max ||
                            `A maximum of ${this.max} characters is allowed`

                    rules.push(rule)
                }

                return rules
            },
        },
        watch: {
            match: 'validateField',
            max: 'validateField',
            model: 'validateField',
        },
        methods: {
            registerUser() {
                return axios.post('/register', {
                    'name': this.name,
                    'password': this.password,
                    'password_confirmation': this.password_confirmation,
                    'email': this.email
                }).then((res) => {
                    this.redirectAfterSuccess();
                })
            },
            redirectAfterSuccess() {
                this.$router.push({name: 'admin'})
            },
            validateField() {
                this.$refs.form.validate()
            },
            redirectToThirdPartyLogin(providerName) {
                // window.location.href = '/login/' + providerName;
            }
        },
    }
</script>

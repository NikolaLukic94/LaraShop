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
                            v-validate="'required|max:255'"
                            label="Email"
                            required
                        >
                        </v-text-field>
                        <v-text-field
                            v-model="password"
                            name="password"
                            type="password"
                            v-validate="'required|min:8'"
                            label="Password"
                            required
                        >
                        </v-text-field>
                        <v-checkbox
                            v-model="checkbox"
                            :error-messages="checkboxErrors"
                            label="Remember me"
                        >
                        </v-checkbox>
                        <v-row >
                            <v-col cols="12" sm="6">
                                <v-btn color="light" type="submit" style="width: 100%">Password reset</v-btn>
                            </v-col>
                            <v-col cols="12" sm="6">
                                <v-btn @click="validate()" color="teal" type="submit" class="white--text" style="width: 100%">Log In</v-btn>                   
                            </v-col>
                        </v-row>
                    </form>
                </v-container>
                <v-container>
                    <hr>
                    <v-toolbar color="teal" dark>
                        <v-spacer></v-spacer>
                        <v-spacer>
                        <v-toolbar-title>
                            <v-icon dark class="pr-3" :href="'/login/github'">
                                mdi-github
                            </v-icon>
                            <v-icon dark class="pr-3" :href="'/login/twitch'">
                                mdi-twitch
                            </v-icon>
                            </v-toolbar-title>
                        </v-spacer>
                    </v-toolbar>
                    <br>
                </v-container>
            </v-card>
        </v-container>
        <footer-component></footer-component>
    </v-app>
</template>


<script>
    export default {
        inject: ['$validator'],
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
                console.log(this.$refs.form)
                // this.$validator.validateAll().then((result) => {
                //     if (result) {
                        //Manually submit form if not errors
                    document.getElementById("login_form").submit()
                    // }
                // })
            },
        }
    }
</script>

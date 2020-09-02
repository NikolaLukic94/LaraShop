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
                            :counter="10"
                            label="Email"
                            required
                        ></v-text-field>
                        <v-text-field
                            v-model="password"
                            name="password"
                            type="password"
                            v-validate="'required|min:8'"
                            label="Password"
                            required
                        ></v-text-field>
                        <v-checkbox
                            v-model="checkbox"
                            :error-messages="checkboxErrors"
                            label="Remember me"
                        ></v-checkbox>
                        <v-btn color="grey" type="submit">Password reset</v-btn>
                        <v-btn @click="validate()" color="teal" type="submit">Log In</v-btn>
                    </form>
                </v-container>
            </v-card>
        </v-container>
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

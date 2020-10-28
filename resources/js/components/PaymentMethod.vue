<template>
    <v-app>
        <v-card
            class="mx-auto"
            max-width="570"
            outlined
        >
            <v-card-title class="justify-center">
                <v-avatar color="indigo" size="38">
                    <span class="white--text headline">3</span>
                </v-avatar>
            </v-card-title>
            <v-list-item three-line class="text-center">
                <v-list-item-content>
                    <div class="overline mb-4">
                        <h5>
                            <b>Payment Details</b>
                        </h5>
                    </div>
                    <v-list-item-title class="headline mb-1">Headline 5</v-list-item-title>
                    <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
            <v-container class="grey lighten-5">
                <div>
                    <v-text-field 
                        v-model="owner"
                        label="Name on Card" 
                        :rules="ownerRules" 
                        hide-details="auto" 
                        class="mb-3">
                    </v-text-field>
                </div>
                <div>
                    <v-text-field
                        v-model="cardNumber"
                        label="Card Number" 
                        :rules="cardNumberRules" 
                        hide-details="auto"
                        class="mb-3">
                    </v-text-field>
                </div>
                <v-row no-gutters>
                    <v-col
                        cols="12"
                        sm="4"
                    >
                        <v-text-field 
                            v-model="ccv"
                            label="CCV" 
                            :rules="ccvRules" 
                            hide-details="auto" 
                            class="mb-3 mr-2">
                        </v-text-field>
                    </v-col>
                    <v-col
                        cols="12"
                        sm="4"
                    >
                        <v-text-field 
                            label="Expiration month" 
                            :rules="expirationDateRules" 
                            hide-details="auto"
                            class="mb-3 mr-2">
                        </v-text-field>
                    </v-col>
                    <v-col
                        cols="12"
                        sm="4"
                    >
                        <v-text-field 
                            label="Expiration Year" 
                            :rules="yearRules" 
                            hide-details="auto" 
                            class="mb-3">
                        </v-text-field>
                    </v-col>
                </v-row>
            </v-container>
        </v-card>
        <button @click="sendRequest">Do it!</button>
    </v-app>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';
    import {VueGoodTable} from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'user-payment-methods',
        computed: {
            ...mapGetters(
                'paymentMethods',
                [
                    'getUserPaymentMethods',
                    'getPaymentErrors'
                ])
        },
        methods: {
            ...mapActions(
                'paymentMethods',
                [
                    'updateNewPaymentMethod',
                    'validatePaymentField'
                ]),
            ...mapActions(
                'payment', ['createPayment']),
            getValidationError(inputFieldName) {
                let inputFieldError = this.getPaymentErrors.find(e => e[0] === inputFieldName);
                return !inputFieldError || inputFieldError === null ? null : inputFieldError[1];
            },
            savePaymentInfo() {
                let payload = {};

                payload.owner = this.owner;
                payload.ccv = this.ccv;
                payload.cardNumber = this.cardNumber,
                payload.expiration = this.expiration,
                payload.year = this.year,
                payload.cardType = this.cardType

                this.createPayment(payload);
            },
            callUpdateNewPaymentField(attr) {
                this.updateNewPaymentMethod(attr);
            },
            callValidate(input) {
                this.validatePaymentField(input);
            },
            sendRequest() {
                let stripeKey = document.getElementsByTagName('meta')['stripeKey'];

                let token = Stripe.setPublishableKey(stripeKey);
                Stripe.createToken({
                    stripeToken: token,
                    number: this.cardNumber,
                    cvc: this.ccv,
                    exp_month: this.expiration,
                    exp_year: this.year
                });
            }
        },
        data: function () {
            return {
                owner: '',
                ccv: '',
                cardNumber: '',
                expiration: '',
                year: '',
                cardType: '',
                ownerRules: [
                    v => !!v || 'Owner is required',
                    v => v.length <= 30 || 'Name must be less than 30 characters',
                    v => v.length > 5 || 'Name must be less at least 5 characters',
                ],
                ccvRules: [
                    v => !!v || 'CCV is required',
                    v => v.length == 3 || 'CCV must be 3 characters long',
                ],
                cardNumberRules: [
                    v => !!v || 'Card number is required',
                    v => v.length <= 19 || 'Card Number requires less than 19 characters',
                    v => v.length > 8 || 'Card Number requires at least 8 characters',
                ],
                expirationDateRules: [
                    v => !!v || 'Expiration date is required',
                ],
                yearRules: [
                    v => !!v || 'Year rules is required',
                ],
            }
        },
    }
</script>

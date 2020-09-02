<template>
    <v-app class="mt-3">
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
                    <v-text-field label="Owner" :rules="ownerRules" hide-details="auto" class="mb-3"></v-text-field>
                </div>
                <div>
                    <v-text-field label="CCV" :rules="ccvRules" hide-details="auto" class="mb-3"></v-text-field>
                </div>
                <div>
                    <v-text-field label="Card Number" :rules="cardNumberRules" hide-details="auto"
                                  class="mb-3"></v-text-field>
                </div>
                <div>
                    <v-text-field label="Expiration date" :rules="expirationDateRules" hide-details="auto"
                                  class="mb-3"></v-text-field>
                </div>
                <div>
                    <v-text-field label="Year" :rules="yearRules" hide-details="auto" class="mb-3"></v-text-field>
                </div>
                <div>
                    <v-text-field label="Card Type" :rules="cardTypeRules" hide-details="auto"
                                  class="mb-3"></v-text-field>
                </div>
            </v-container>
        </v-card>
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
                    'setUserPaymentMethod',
                    'updateNewPaymentMethod',
                    'validatePaymentField'
                ]),
            ...mapActions(
                'payment',
                [
                    'createPayment',
                ]),
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
            }
        },
        data: function () {
            return {
                // errors: [],

                owner: '',
                ccv: '',
                cardNumber: '',
                expiration: '',
                year: '',
                cardType: '',
                ownerRules: [
                    v => !!v || 'Owner is required',
                    v => v.length <= 10 || 'Name must be less than 10 characters',
                ],
                ccvRules: [
                    v => !!v || 'CCV is required',
                    v => v.length <= 4 || 'Name must be less than 4 characters',
                ],
                cardNumberRules: [
                    v => !!v || 'Card number is required',
                    v => v.length <= 10 || 'Name must be less than 10 characters',
                ],
                expirationDateRules: [
                    v => !!v || 'Expiration date is required',
                    v => v.length <= 10 || 'Name must be less than 10 characters',
                ],
                yearRules: [
                    v => !!v || 'Year rules is required',
                    v => v.length <= 10 || 'Name must be less than 10 characters',
                ],
                cardTypeRules: [
                    v => !!v || 'Card type is required',
                    v => v.length <= 10 || 'Name must be less than 10 characters',
                ],
            }
        },
        created() {
            this.setUserPaymentMethod();
        },
    }
</script>

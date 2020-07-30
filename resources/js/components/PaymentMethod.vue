<template>
  <div class="container">
    <p> <i>Step 2 of 3</i> </p>
    <h3><b>Payment method</b></h3>
    <div class="card">
    <div class="container">
        <div class="d-flex justify-content-center pt-3">
            <div class="card">
                <img src="/img/card.png" width="45" class="mt-3 mr-3 ml-3 mb-3" height="45" alt="Image"/>
            </div>
            <div class="card">
                <img src="/img/paypal.png" width="45" class="mt-3 mr-3 ml-3 mb-3" height="45" alt="Image"/>
            </div>
            <div class="card">
                <img src="/img/delivery.png" width="45" class="mt-3 mr-3 ml-3 mb-3" height="45" alt="Image"/>
            </div>
        </div>
        <div class="card border-0">
            <div class="row">
                <div class="col-8">
                    <label for="basic-url">Owner</label>
                    <div class="input-group mb-3">
                        <input
                            @input="
                                    callUpdateNewAddressField({fieldName:'owner', fieldValue: owner});
                                    callValidate('ownerError', 'Owner is required');
                                "
                            v-model="owner"
                            type="text"
                            class="form-control"
                            id="basic-url"
                            aria-describedby="basic-addon3">
                    </div>
                    <span class="help-block pull-left">{{ getValidationError('ownerError') }}</span>
                </div>
                <div class="col-4">
                    <label for="basic-url">CCV</label>
                    <div class="input-group mb-3">
                        <input
                            @input="
                                    callUpdateNewAddressField({fieldName:'ccv', fieldValue: ccv});
                                    callValidate('ccvError', 'CCV is required');
                                "
                            v-model="ccv"
                            type="text"
                            class="form-control"
                            id="basic-url"
                            aria-describedby="basic-addon3">
                    </div>
                    <span class="help-block pull-left">{{ getValidationError('ccvError') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="basic-url">Card Number</label>
                    <div class="input-group mb-3">
                        <input
                            @input="
                                    callUpdateNewAddressField({fieldName:'cardNumber', fieldValue: cardNumber});
                                    callValidate('cardNumberError', 'Card Number is required');
                                "
                            v-model="cardNumber"
                            type="text"
                            class="form-control"
                            id="basic-url"
                            aria-describedby="basic-addon3">
                    </div>
                    <span class="help-block pull-left">{{ getValidationError('cardNumberError') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="basic-url">Expiration</label>
                    <div class="input-group mb-3">
                        <input
                            @input="
                                    callUpdateNewAddressField({fieldName:'expiration', fieldValue: expiration});
                                    callValidate('expirationError', 'Expiration date is required');
                                "
                            v-model="expiration"
                            type="text"
                            class="form-control"
                            id="basic-url"
                            aria-describedby="basic-addon3">
                    </div>
                    <span class="help-block pull-left">{{ getValidationError('expirationError') }}</span>
                </div>
                <div class="col-md-4">
                    <label for="basic-url">Year</label>
                    <div class="input-group mb-3">
                        <input
                            @input="
                                    callUpdateNewAddressField({fieldName:'year', fieldValue: year});
                                    callValidate('yearError', 'Year is required');
                                "
                            v-model="year"
                            type="text"
                            class="form-control"
                            id="basic-url"
                            aria-describedby="basic-addon3">
                    </div>
                    <span class="help-block pull-left">{{ getValidationError('yearError') }}</span>
                </div>
                <div class="col-md-4">
                    <label for="basic-url">Card (Visa/Electron)</label>
                    <div class="input-group mb-3">
                        <input
                            @input="
                                    callUpdateNewAddressField({fieldName:'cardType', fieldValue: cardType});
                                    callValidate('cardTypeError', 'Card Type is required');
                                "
                            v-model="cardType"
                            type="text"
                            class="form-control"
                            id="basic-url"
                            aria-describedby="basic-addon3">
                    </div>
                    <span class="help-block pull-left">{{ getValidationError('cardTypeError') }}</span>
                </div>
            </div>
        </div>
        <div class="custom-control custom-checkbox pb-3">
            <input type="checkbox" class="custom-control-input" id="paymentInfo" @input="validateData()">
        </div>
        </div>
    </div>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'user-payment-methods',
        computed: {
            ...mapGetters(
                'paymentMethods',
                [
                    'getUserPaymentMethods'
                ])
        },
        methods: {
            ...mapActions(
                'paymentMethods',
                [
                    'setUserPaymentMethod',
                    'updateNewPaymentMethod',
                    'validateField'
                ]),
            ...mapActions(
                'payment',
                [
                    'createPayment',
                ]),
                getValidationError(inputFieldName) {
                    let inputFieldError = this.errors.find(e => e[0] === inputFieldName);
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
                callUpdatePaymentMethod(attr) {
                    this.updateNewPaymentMethod(attr);
                },
                callValidate(input) {
                    this.validateField(input);
                }
        },
        data: function () {
            return {
                errors: [],

                owner: '',
                ccv: '',
                cardNumber: '',
                expiration: '',
                year: '',
                cardType: '',
            }
        },
        created() {
            this.setUserPaymentMethod();
        },
    }
</script>

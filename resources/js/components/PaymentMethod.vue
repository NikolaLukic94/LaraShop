<template>
<!--  <div class="container">-->
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
                      <v-text-field label="Owner" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
                      <!--                        <v-text-field label="Another input"></v-text-field>-->
                  </div>
                  <div>
                      <v-text-field label="CCV" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
                      <!--                        <v-text-field label="Another input"></v-text-field>-->
                  </div>
                  <div>
                      <v-text-field label="Card Number" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
                      <!--                        <v-text-field label="Another input"></v-text-field>-->
                  </div>
                  <div>
                      <v-text-field label="Expiration date" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
                      <!--                        <v-text-field label="Another input"></v-text-field>-->
                  </div>
                  <div>
                      <v-text-field label="Year" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
                      <!--                        <v-text-field label="Another input"></v-text-field>-->
                  </div>
                  <div>
                      <v-text-field label="Card Type" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
                      <!--                        <v-text-field label="Another input"></v-text-field>-->
                  </div>
              </v-container>
          </v-card>
      </v-app>



<!--    <p> <i>Step 2 of 3</i> </p>-->
<!--    <h3><b>Payment method</b></h3>-->
<!--    <div class="card">-->
<!--    <div class="container">-->
<!--        <div class="card border-0">-->
<!--            <div class="row">-->
<!--                <div class="col-8">-->
<!--                    <label for="basic-url">Owner</label>-->
<!--                    <div class="input-group mb-3">-->
<!--                        <input-->
<!--                            @input="-->
<!--                                    callUpdateNewPaymentField({fieldName:'owner', fieldValue: owner});-->
<!--                                    callValidate({errorName: 'ownerError', errorMessage: 'Owner is required'});-->
<!--                                "-->
<!--                            v-model="owner"-->
<!--                            type="text"-->
<!--                            class="form-control"-->
<!--                            id="basic-url"-->
<!--                            aria-describedby="basic-addon3">-->
<!--                    </div>-->
<!--                    <span class="help-block pull-left">{{ getValidationError('ownerError') }}</span>-->
<!--                </div>-->
<!--                <div class="col-4">-->
<!--                    <label for="basic-url">CCV</label>-->
<!--                    <div class="input-group mb-3">-->
<!--                        <input-->
<!--                            @input="-->
<!--                                    callUpdateNewPaymentField({fieldName:'ccv', fieldValue: ccv});-->
<!--                                    callValidate({errorName: 'ccvError',  errorMessage:  'CCV is required'});-->
<!--                                "-->
<!--                            v-model="ccv"-->
<!--                            type="text"-->
<!--                            class="form-control"-->
<!--                            id="basic-url"-->
<!--                            aria-describedby="basic-addon3">-->
<!--                    </div>-->
<!--                    <span class="help-block pull-left">{{ getValidationError('ccvError') }}</span>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <div class="col">-->
<!--                    <label for="basic-url">Card Number</label>-->
<!--                    <div class="input-group mb-3">-->
<!--                        <input-->
<!--                            @input="-->
<!--                                    callUpdateNewPaymentField({fieldName:'cardNumber', fieldValue: cardNumber});-->
<!--                                    callValidate({errorName: 'cardNumberError', errorMessage:  'Card Number is required'});-->
<!--                                "-->
<!--                            v-model="cardNumber"-->
<!--                            type="text"-->
<!--                            class="form-control"-->
<!--                            id="basic-url"-->
<!--                            aria-describedby="basic-addon3">-->
<!--                    </div>-->
<!--                    <span class="help-block pull-left">{{ getValidationError('cardNumberError') }}</span>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <div class="col-md-4">-->
<!--                    <label for="basic-url">Expiration</label>-->
<!--                    <div class="input-group mb-3">-->
<!--                        <input-->
<!--                            @input="-->
<!--                                    callUpdateNewPaymentField({fieldName:'expiration', fieldValue: expiration});-->
<!--                                    callValidate({errorName: 'expirationError', errorMessage: 'Expiration date is required'});-->
<!--                                "-->
<!--                            v-model="expiration"-->
<!--                            type="text"-->
<!--                            class="form-control"-->
<!--                            id="basic-url"-->
<!--                            aria-describedby="basic-addon3">-->
<!--                    </div>-->
<!--                    <span class="help-block pull-left">{{ getValidationError('expirationError') }}</span>-->
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <label for="basic-url">Year</label>-->
<!--                    <div class="input-group mb-3">-->
<!--                        <input-->
<!--                            @input="-->
<!--                                    callUpdateNewPaymentField({fieldName:'year', fieldValue: year});-->
<!--                                    callValidate({errorName: 'yearError', errorMessage: 'Year is required'});-->
<!--                                "-->
<!--                            v-model="year"-->
<!--                            type="text"-->
<!--                            class="form-control"-->
<!--                            id="basic-url"-->
<!--                            aria-describedby="basic-addon3">-->
<!--                    </div>-->
<!--                    <span class="help-block pull-left">{{ getValidationError('yearError') }}</span>-->
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <label for="basic-url">Card (Visa/Electron)</label>-->
<!--                    <div class="input-group mb-3">-->
<!--                        <input-->
<!--                            @input="-->
<!--                                    callUpdateNewPaymentField({fieldName:'cardType', fieldValue: cardType});-->
<!--                                    callValidate({errorName: 'cardTypeError', errorMessage: 'Card Type is required'});-->
<!--                                "-->
<!--                            v-model="cardType"-->
<!--                            type="text"-->
<!--                            class="form-control"-->
<!--                            id="basic-url"-->
<!--                            aria-describedby="basic-addon3">-->
<!--                    </div>-->
<!--                    <span class="help-block pull-left">{{ getValidationError('cardTypeError') }}</span>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="custom-control custom-checkbox pb-3">-->
<!--            <input type="checkbox" class="custom-control-input" id="paymentInfo" @input="validatePaymentData()">-->
<!--        </div>-->
<!--        </div>-->
<!--    </div>-->
<!--  </div>-->
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
            }
        },
        created() {
            this.setUserPaymentMethod();
        },
    }
</script>

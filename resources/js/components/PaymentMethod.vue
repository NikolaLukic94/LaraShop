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
                            @input="validateField(owner,  'ownerError',  'Owner is required')"
                            v-model="owner"
                            type="text" 
                            class="form-control" 
                            id="basic-url" 
                            aria-describedby="basic-addon3">
                    </div>
                    <!-- <small>{{ getValidationError('ownerError') }}</small> -->
                    <span class="help-block pull-left">{{ getValidationError('ownerError') }}</span>
                </div>
                <div class="col-4">
                    <label for="basic-url">CCV</label>
                    <div class="input-group mb-3">
                        <input 
                            @input="validateField(ccv,  'ccvError',  'CCV is required')"
                            v-model="ccv"
                            type="text" 
                            class="form-control" 
                            id="basic-url" 
                            aria-describedby="basic-addon3">
                    </div>  
                    <!-- <small>{{ getValidationError('ccvError') }}</small>    -->
                    <span class="help-block pull-left">{{ getValidationError('ccvError') }}</span>               
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="basic-url">Card Number</label>
                    <div class="input-group mb-3">
                        <input 
                            @input="validateField(cardNumber, 'cardNumberError', 'Card Number is required')"
                            v-model="cardNumber"
                            type="text" 
                            class="form-control" 
                            id="basic-url" 
                            aria-describedby="basic-addon3">
                    </div>
                    <!-- <small>{{ getValidationError('cardNumberError') }}</small>       -->
                    <span class="help-block pull-left">{{ getValidationError('cardNumberError') }}</span>         
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="basic-url">Expiration</label>
                    <div class="input-group mb-3">
                        <input 
                            @input="validateField(expiration,  'expirationError',  'Expiration date is required')"
                            v-model="expiration"
                            type="text" 
                            class="form-control" 
                            id="basic-url" 
                            aria-describedby="basic-addon3">
                    </div>
                    <!-- <small>{{ getValidationError('expirationError') }}</small>    -->
                    <span class="help-block pull-left">{{ getValidationError('expirationError') }}</span>   
                </div>
                <div class="col-md-4">
                    <label for="basic-url">Year</label>
                    <div class="input-group mb-3">
                        <input 
                            @input="validateField(year,  'yearError',  'Year is required')"
                            v-model="year"
                            type="text" 
                            class="form-control" 
                            id="basic-url" 
                            aria-describedby="basic-addon3">
                    </div>
                    <!-- <small>{{ getValidationError('yearError') }}</small>    -->
                    <span class="help-block pull-left">{{ getValidationError('yearError') }}</span>   
                </div>
                <div class="col-md-4">
                    <label for="basic-url">Card (Visa/Electron)</label>
                    <div class="input-group mb-3">
                        <input 
                            @input="validateField(cardType,  'cardTypeError',  'Card Type is required')"
                            v-model="cardType"
                            type="text" 
                            class="form-control" 
                            id="basic-url" 
                            aria-describedby="basic-addon3">
                    </div>
                    <span class="help-block pull-left">{{ getValidationError('cardTypeError') }}</span>
                    <!-- <small>{{ getValidationError('cardTypeError') }}</small>       -->
                </div>
            </div>
        </div>
        <div class="custom-control custom-checkbox pb-3">
            <input type="checkbox" class="custom-control-input" id="paymentInfo" @input="validateData()">
            <label class="custom-control-label" for="paymentInfo">Save payment info</label>
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
                'paymentMethod',
                [
                    'getUserPaymentMethods'
                ])
        },
        methods: {
            ...mapActions(
                'paymentMethod',
                [
                    'setUserPaymentMethod',
                ]),
                getValidationError(inputFieldName) {
                    let inputFieldError = this.errors.find(e => e[0] === inputFieldName);
                    return !inputFieldError || inputFieldError === null ? null : inputFieldError[1];
                },
                validateField(input, errorName, message) {
                    if (!input) {
                        this.errors.push([errorName, message]);
                    } else {
                        this.errors = this.errors.filter(e => e[0] !== errorName)
                    }  
                },
                validateData() {
                    this.validateField(this.owner, 'ownerError', '* Owner is required');
                    this.validateField(this.ccv,  'ccvError',  '* CCV is required');
                    this.validateField(this.cardNumber, 'cardNumberError', '* Card Number is required');
                    this.validateField(this.expiration,  'expirationError',  '* Expiration date is required');
                    this.validateField(this.year,  'yearError',  '* Year is required');
                    this.validateField(this.cardType,  'cardTypeError',  '* Card Type is required');
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

<template>
<!--    <div class="mt-3">-->
        <v-app class="mt-3">
            <v-card
                class="mx-auto"
                max-width="570"
                outlined
            >
                <v-card-title class="justify-center">
                    <v-avatar color="indigo" size="38">
                        <span class="white--text headline">2</span>
                    </v-avatar>
                </v-card-title>
                <v-list-item three-line class="text-center">
                    <v-list-item-content>
                        <div class="overline mb-4">
                            <h5>
                                <b>Your order</b>
                            </h5>
                            <span>Change</span>
                        </div>
                        <v-list-item-title class="headline mb-1">Headline 5</v-list-item-title>
                        <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>
                <v-container class="grey lighten-5">
                    <div>
                        <v-text-field label="First Name" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
<!--                        <v-text-field label="Another input"></v-text-field>-->
                    </div>
                    <div>
                        <v-text-field label="Last Name" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
<!--                        <v-text-field label="Another input"></v-text-field>-->
                    </div>
                    <div>
                        <v-text-field label="Phone Number" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
<!--                        <v-text-field label="Another input"></v-text-field>-->
                    </div>
                    <div>
                        <v-text-field label="Address Line 1" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
<!--                        <v-text-field label="Another input"></v-text-field>-->
                    </div>
                    <div>
                        <v-text-field label="Address Line 2" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
<!--                        <v-text-field label="Another input"></v-text-field>-->
                    </div>
                    <div>
                        <v-text-field label="City" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
<!--                        <v-text-field label="Another input"></v-text-field>-->
                    </div>
                    <div>
                        <v-text-field label="County" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
<!--                        <v-text-field label="Another input"></v-text-field>-->
                    </div>
                    <div>
                        <v-text-field label="ZIP" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
<!--                        <v-text-field label="Another input"></v-text-field>Country-->
                    </div>
                    <div>
                        <v-text-field label="Country" :rules="rules" hide-details="auto" class="mb-3"></v-text-field>
<!--                        <v-text-field label="Another input"></v-text-field>-->
                    </div>
                </v-container>
            </v-card>
        </v-app>
<!--        <div class="container">-->
<!--            <p><i>Step 1 of 3</i></p>-->
<!--            <h3><b>Shipping information</b></h3>-->
<!--            <div class="card">-->
<!--            </div>-->
<!--            <br>-->
<!--            <div class="card text-center">-->
<!--                <div class="card-header">-->
<!--                    <ul class="nav nav-tabs card-header-tabs">-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link active" href="#">Add new</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item" v-for="address in getUserAddresses">-->
<!--                            <a class="nav-link" href="#">Address {{ address.id }}</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                    <div class="container">-->
<!--                        <div class="row d-flex justify-content-center pt-3">-->
<!--                            <div class="col">-->
<!--                                <div class="form-group input-group-sm mb-3">-->
<!--                                    <label class="control-label pull-left" for="inputWarning">First Name</label>-->
<!--                                    <input-->
<!--                                        @input="-->
<!--                                        callUpdateNewAddressField({fieldName:'firstName', fieldValue: firstName});-->
<!--                                        callValidate({errorName:'firstNameError', errorMessage: 'First Name is required'})-->
<!--                                "-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        v-model="firstName"-->
<!--                                        aria-label="Small"-->
<!--                                        aria-describedby="inputGroup-sizing-sm">-->
<!--                                    <span class="help-block pull-left">{{ getValidationError('firstNameError') }}</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col">-->
<!--                                <div class="form-group input-group-sm mb-3">-->
<!--                                    <label class="control-label pull-left" for="inputWarning">Last Name</label>-->
<!--                                    <input-->
<!--                                        @input="-->
<!--                                    callUpdateNewAddressField({fieldName:'lastName', fieldValue: lastName});-->
<!--                                    callValidate({errorName:'lastNameError', errorMessage: 'Last Name is required'});-->
<!--                                    "-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        v-model="lastName"-->
<!--                                        aria-label="Small"-->
<!--                                        aria-describedby="inputGroup-sizing-sm">-->
<!--                                    <span class="help-block pull-left">{{ getValidationError('lastNameError') }}</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row d-flex justify-content-center">-->
<!--                                <div class="col">-->
<!--                                    <div class="form-group input-group-sm mb-3">-->
<!--                                        <label class="control-label pull-left" for="inputWarning">Phone Number</label>-->
<!--                                        <input-->
<!--                                            @input="-->
<!--                                        callUpdateNewAddressField({fieldName:'phoneNumber', fieldValue: phoneNumber});-->
<!--                                        callValidate({errorName:'phoneNumberError', errorMessage: 'Phone Number is required'});-->
<!--                                    "-->
<!--                                            type="text"-->
<!--                                            class="form-control"-->
<!--                                            v-model="phoneNumber"-->
<!--                                            aria-label="Small"-->
<!--                                            aria-describedby="inputGroup-sizing-sm">-->
<!--                                        <span-->
<!--                                            class="help-block pull-left">{{ getValidationError('phoneNumberError') }}</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="row d-flex justify-content-center pt-3">-->
<!--                            <div class="col">-->
<!--                                <div class="form-group input-group-sm mb-3">-->
<!--                                    <label class="control-label pull-left" for="inputWarning">Address Line 1</label>-->
<!--                                    <input-->
<!--                                        @input="-->
<!--                                callUpdateNewAddressField({fieldName:'addressLineOne', fieldValue: addressLineOne});-->
<!--                                    callValidate({errorName: 'addressLineOneError', errorMessage: 'Address Line 1 is required'});-->

<!--                                "-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        v-model="addressLineOne"-->
<!--                                        aria-label="Small"-->
<!--                                        aria-describedby="inputGroup-sizing-sm">-->
<!--                                    <span-->
<!--                                        class="help-block pull-left">{{ getValidationError('addressLineOneError') }}</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col">-->
<!--                                <div class="form-group input-group-sm mb-3">-->
<!--                                    <label class="control-label pull-left" for="inputWarning">Address Line 2</label>-->
<!--                                    <input-->
<!--                                        @input="-->

<!--                                    callUpdateNewAddressField({fieldName:'addressLineTwo', fieldValue: addressLineTwo});-->
<!--                                    callValidate({errorName: 'addressLineTwoError', errorMessage: 'Address Line 2 is required'});-->
<!--                                "-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        v-model="addressLineTwo"-->
<!--                                        aria-label="Small"-->
<!--                                        aria-describedby="inputGroup-sizing-sm">-->
<!--                                    <span-->
<!--                                        class="help-block pull-left">{{ getValidationError('addressLineTwoError') }}</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col">-->
<!--                                <div class="form-group input-group-sm mb-3">-->
<!--                                    <label class="control-label pull-left" for="inputWarning">City</label>-->
<!--                                    <input-->
<!--                                        @input="-->
<!--                                    callUpdateNewAddressField({fieldName:'city', fieldValue: city});-->
<!--                                    callValidate({errorName: 'cityError', errorMessage: 'City is required'});-->

<!--                                "-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        v-model="city"-->
<!--                                        aria-label="Small"-->
<!--                                        aria-describedby="inputGroup-sizing-sm">-->
<!--                                    <span class="help-block pull-left">{{ getValidationError('cityError') }}</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="row d-flex justify-content-center">-->
<!--                            <div class="col">-->
<!--                                <div class="form-group input-group-sm mb-3">-->
<!--                                    <label class="control-label pull-left" for="inputWarning">County</label>-->
<!--                                    <input-->
<!--                                        @input="-->
<!--                                        callUpdateNewAddressField({fieldName:'county', fieldValue: county});-->
<!--                                        callValidate({errorName: 'countyError', errorMessage: 'County is required'});-->

<!--                                "-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        v-model="county"-->
<!--                                        aria-label="Small"-->
<!--                                        aria-describedby="inputGroup-sizing-sm">-->
<!--                                    <span class="help-block pull-left">{{ getValidationError('countyError') }}</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col">-->
<!--                                <div class="form-group input-group-sm mb-3">-->
<!--                                    <label class="control-label pull-left" for="inputWarning">ZIP</label>-->
<!--                                    <input-->
<!--                                        @input="-->

<!--                                    callUpdateNewAddressField({fieldName:'zip', fieldValue: zip});-->
<!--                                    callValidate({errorName: 'zipError', errorMessage: 'ZIP is required'});-->
<!--                                "-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        v-model="zip"-->
<!--                                        aria-label="Small"-->
<!--                                        aria-describedby="inputGroup-sizing-sm">-->
<!--                                    <span class="help-block pull-left">{{ getValidationError('zipError') }}</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col">-->
<!--                                <div class="form-group input-group-sm mb-3 has-warning">-->
<!--                                    <label class="control-label pull-left" for="inputWarning">Country</label>-->
<!--                                    <input-->
<!--                                        @input="-->
<!--                                        callUpdateNewAddressField({fieldName:'country', fieldValue: country});-->
<!--                                        callValidate({errorName: 'countryError', errorMessage: 'Country is required'});-->
<!--                                    "-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        v-model="country"-->
<!--                                        aria-label="Small"-->
<!--                                        aria-describedby="inputGroup-sizing-sm"-->
<!--                                        :placeholder="getValidationError('countryError')">-->
<!--                                    <span class="help-block pull-left">{{ getValidationError('countryError') }}</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';

    export default {
        name: 'user-addresses',
        computed: {
            ...mapGetters(
                'userAddress', ['getUserAddresses', 'getErrors'])
        },
        methods: {
            ...mapActions(
                'userAddress', [
                    'setUserAddresses',
                    // 'saveUserAddress', - will be auto used on checkout page
                    'updateNewAddressField',
                    'validateField'
                ]
            ),
            sendCreateUserAddressRequest() {
                let payload = {};

                payload.firstName = this.firstName;
                payload.lastName = this.lastName;
                payload.addressLineOne = this.addressLineOne,
                    payload.addressLineTwo = this.addressLineTwo,
                    payload.phoneNumber = this.phoneNumber,
                    payload.city = this.city,
                    payload.county = this.county,
                    payload.zip = this.zip,
                    payload.country = this.country

                this.saveUserAddress(payload);
            },
            getValidationError(inputFieldName) {
                let inputFieldError = this.getErrors.find(e => e[0] === inputFieldName);
                return !inputFieldError || inputFieldError === null ? null : inputFieldError[1];
            },
            callUpdateNewAddressField(attrName) {
                console.log(1)
                this.updateNewAddressField(attrName)
            },
            callValidate(input) {
                this.validateField(input);
            }
        },
        data: function () {
            return {
                addressLineOne: '',
                addressLineTwo: '',
                firstName: '',
                lastName: '',
                phoneNumber: '',
                city: '',
                county: '',
                zip: '',
                country: '',

                nameRules: [
                    v => !!v || 'Name is required',
                    v => v.length <= 10 || 'Name must be less than 10 characters',
                ],

            }
        },
        created() {
            this.setUserAddresses();
        },
    }
</script>

<style>
    .help-block {
        color: #ff471a;
    }

</style>

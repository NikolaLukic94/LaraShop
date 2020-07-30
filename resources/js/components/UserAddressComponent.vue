<template>
    <div>
        <div class="container">
            <p><i>Step 1 of 3</i></p>
            <h3><b>Shipping information</b></h3>
            <div class="card">
            </div>
            <br>
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Add new</a>
                        </li>
                        <li class="nav-item" v-for="address in getUserAddresses">
                            <a class="nav-link" href="#">Address {{ address.id }}</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row d-flex justify-content-center pt-3">
                            <div class="col">
                                <div class="form-group input-group-sm mb-3">
                                    <label class="control-label pull-left" for="inputWarning">First Name</label>
                                    <input
                                        @input="
                                    callUpdateNewAddressField({fieldName:'firstName', fieldValue: firstName});
                                    callValidate({errorName:'firstNameError', errorMessage: 'First Name is required'})
                                "
                                        type="text"
                                        class="form-control"
                                        v-model="firstName"
                                        aria-label="Small"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <span class="help-block pull-left">{{ getValidationError('firstNameError') }}</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group input-group-sm mb-3">
                                    <label class="control-label pull-left" for="inputWarning">Last Name</label>
                                    <input
                                        @input="
                                    callUpdateNewAddressField({fieldName:'lastName', fieldValue: lastName});
                                    callValidate('lastNameError', 'Last Name is required');

                                    "
                                        type="text"
                                        class="form-control"
                                        v-model="lastName"
                                        aria-label="Small"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <span class="help-block pull-left">{{ getValidationError('lastNameError') }}</span>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <div class="form-group input-group-sm mb-3">
                                        <label class="control-label pull-left" for="inputWarning">Phone Number</label>
                                        <input
                                            @input="
                                        callUpdateNewAddressField({fieldName:'phoneNumber', fieldValue: phoneNumber});
                                        callValidate('phoneNumberError', 'Phone Number is required');
                                    "
                                            type="text"
                                            class="form-control"
                                            v-model="phoneNumber"
                                            aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm">
                                        <span
                                            class="help-block pull-left">{{ getValidationError('phoneNumberError') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center pt-3">
                            <div class="col">
                                <div class="form-group input-group-sm mb-3">
                                    <label class="control-label pull-left" for="inputWarning">Address Line 1</label>
                                    <input
                                        @input="
                                callUpdateNewAddressField({fieldName:'addressLineOne', fieldValue: addressLineOne});
                                    callValidate('addressLineOneError', 'Address Line 1 is required');

                                "
                                        type="text"
                                        class="form-control"
                                        v-model="addressLineOne"
                                        aria-label="Small"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <span
                                        class="help-block pull-left">{{ getValidationError('addressLineOneError') }}</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group input-group-sm mb-3">
                                    <label class="control-label pull-left" for="inputWarning">Address Line 2</label>
                                    <input
                                        @input="

                                    callUpdateNewAddressField({fieldName:'addressLineTwo', fieldValue: addressLineTwo});
                                    callValidate('addressLineTwoError', 'Address Line 2 is required');
                                "
                                        type="text"
                                        class="form-control"
                                        v-model="addressLineTwo"
                                        aria-label="Small"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <span
                                        class="help-block pull-left">{{ getValidationError('addressLineTwoError') }}</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group input-group-sm mb-3">
                                    <label class="control-label pull-left" for="inputWarning">City</label>
                                    <input
                                        @input="
                                    callUpdateNewAddressField({fieldName:'city', fieldValue: city});
                                    callValidate('cityError', 'City is required');

                                "
                                        type="text"
                                        class="form-control"
                                        v-model="city"
                                        aria-label="Small"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <span class="help-block pull-left">{{ getValidationError('cityError') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <div class="form-group input-group-sm mb-3">
                                    <label class="control-label pull-left" for="inputWarning">County</label>
                                    <input
                                        @input="
                                        callUpdateNewAddressField({fieldName:'county', fieldValue: county});
                                        callValidate('countyError', 'County is required');

                                "
                                        type="text"
                                        class="form-control"
                                        v-model="county"
                                        aria-label="Small"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <span class="help-block pull-left">{{ getValidationError('countyError') }}</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group input-group-sm mb-3">
                                    <label class="control-label pull-left" for="inputWarning">ZIP</label>
                                    <input
                                        @input="

                                    callUpdateNewAddressField({fieldName:'zip', fieldValue: zip});
                                    callValidate('zipError', 'ZIP is required');
                                "
                                        type="text"
                                        class="form-control"
                                        v-model="zip"
                                        aria-label="Small"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <span class="help-block pull-left">{{ getValidationError('zipError') }}</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group input-group-sm mb-3 has-warning">
                                    <label class="control-label pull-left" for="inputWarning">Country</label>
                                    <input
                                        @input="
                                        callUpdateNewAddressField({fieldName:'country', fieldValue: country});
                                        callValidate('countryError',  'Country is required');
                                    "
                                        type="text"
                                        class="form-control"
                                        v-model="country"
                                        aria-label="Small"
                                        aria-describedby="inputGroup-sizing-sm"
                                        :placeholder="getValidationError('countryError')">
                                    <span class="help-block pull-left">{{ getValidationError('countryError') }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="custom-control custom-checkbox pb-2 row">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="defaultUnchecked"
                                @input="sendCreateUserAddressRequest(); validateData()">
                                <label class="custom-control-label" for="defaultUnchecked">Save address</label>
                        </div>
                        <div class="custom-control custom-checkbox pb-2 row">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="defaultUnchecked">
                                <label class="custom-control-label" for="defaultUnchecked">Use this address</label>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
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

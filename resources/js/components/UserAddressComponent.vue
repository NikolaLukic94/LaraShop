<template>
  <div>
    <div class="container">
        <p> <i>Step 1 of 3</i> </p>
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
                                @input="validateField(firstName, 'firstNameError', 'First Name is required')"
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
                                @input="validateField(lastName, 'lastNameError', 'Last Name is required')"
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
                                    @input="validateField(phoneNumber, 'phoneNumberError', 'Phone Number is required')"
                                    type="text" 
                                    class="form-control" 
                                    v-model="phoneNumber" 
                                    aria-label="Small" 
                                    aria-describedby="inputGroup-sizing-sm">
                                    <span class="help-block pull-left">{{ getValidationError('phoneNumberError') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center pt-3">
                    <div class="col">
                        <div class="form-group input-group-sm mb-3">
                            <label class="control-label pull-left" for="inputWarning">Address Line 1</label>
                            <input 
                                @input="validateField(addressLineOne, 'addressLineOneError', 'Address Line 1 is required')"
                                type="text" 
                                class="form-control" 
                                v-model="addressLineOne" 
                                aria-label="Small" 
                                aria-describedby="inputGroup-sizing-sm">
                                <span class="help-block pull-left">{{ getValidationError('addressLineOneError') }}</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group input-group-sm mb-3">
                            <label class="control-label pull-left" for="inputWarning">Address Line 2</label>
                            <input 
                                @input="validateField(addressLineTwo, 'addressLineTwoError', 'Address Line 2 is required')"
                                type="text" 
                                class="form-control" 
                                v-model="addressLineTwo" 
                                aria-label="Small" 
                                aria-describedby="inputGroup-sizing-sm">
                                <span class="help-block pull-left">{{ getValidationError('addressLineTwoError') }}</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group input-group-sm mb-3">
                            <label class="control-label pull-left" for="inputWarning">City</label>
                            <input 
                                @input="validateField(city, 'cityError', 'City is required')"
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
                                @input="validateField(county, 'countyError', 'County is required')"
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
                                @input="validateField(zip, 'zipError', 'ZIP is required')"
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
                                    @input="validateField(country,  'countryError',  'Country is required')"
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
                    <div class="custom-control custom-checkbox pb-2 row">
                        <input 
                            type="checkbox" 
                            class="custom-control-input" 
                            id="defaultUnchecked" 
                            @input="sendCreateUserAddressRequest(); validateData()">
                            <label class="custom-control-label" for="defaultUnchecked">Save address</label>
                    </div>
                </div>
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
        name: 'user-addresses',
        computed: {
            ...mapGetters(
                'userAddress', ['getUserAddresses'])
        },
        methods: {
            ...mapActions(
                'userAddress', ['setUserAddresses', 'saveUserAddress']),
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
                    let inputFieldError = this.errors.find(e => e[0] === inputFieldName);
                    return !inputFieldError || inputFieldError === null ? null : inputFieldError[1];
                },
                validateField(input, errorName, message) {
                    if (!input) {
                        this.errors.push([errorName, message]);
                    } else {
                        console.log('removing....', errorName,this.errors)
                        this.errors = this.errors.filter(e => e[0] !== errorName)
                    }  
                },
                validateData() {
                    this.validateField(this.firstName, 'firstNameError', '* First Name is required');
                    this.validateField(this.lastName, 'lastNameError', '* Last Name is required');
                    this.validateField(this.phoneNumber, 'phoneNumberError', '* Phone Number is required');
                    this.validateField(this.addressLineOne, 'addressLineOneError', '* Address Line 1 is required');
                    this.validateField(this.addressLineTwo, 'addressLineTwoError', '* Address Line 2 is required');
                    this.validateField(this.city, 'cityError', '* City is required');
                    this.validateField(this.county, 'countyError', '* County is required');
                    this.validateField(this.zip, 'zipError', '* ZIP is required');
                    this.validateField(this.country,  'countryError',  '* Country is required');
                    this.setUserAddresses();
                }
        },
        data: function () {
            return {
                errors: [],

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
    color:#ff471a;
}

</style>
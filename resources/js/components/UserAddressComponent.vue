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
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">First Name</span>
                            </div>
                            <input 
                                @input="validateField(firstName, 'firstNameError', 'First Name is required')"
                                type="text" 
                                class="form-control" 
                                v-model="firstName" 
                                aria-label="Small" 
                                aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Last Name</span>
                            </div>
                            <input 
                                @input="validateField(lastName, 'lastNameError', 'Last Name is required')"
                                type="text" 
                                class="form-control" 
                                v-model="lastName" 
                                aria-label="Small" 
                                aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Phone number</span>
                                </div>
                                <input 
                                    @input="validateField(phoneNumber, 'phoneNumberError', 'Phone Number is required')"
                                    type="text" 
                                    class="form-control" 
                                    v-model="phoneNumber" 
                                    aria-label="Small" 
                                    aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center pt-3">
                    <span class="col" v-if="getValidationError('firstNameError') !== null">
                        <span>{{ getValidationError('firstNameError') }}</span>
                    </span>
                    <span class="col" v-if="getValidationError('lastNameError') !== null">
                        <span>{{ getValidationError('lastNameError') }}</span>
                    </span>
                    <span class="col" v-if="getValidationError('phoneNumber') !== null">
                        <span>{{ getValidationError('phoneNumber') }}</span>
                    </span>
                </div>
                <div class="row d-flex justify-content-center pt-3">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Address 1</span>
                            </div>
                            <input 
                                @input="validateField(addressLineOne, 'addressLineOneError', 'Address Line 1 is required')"
                                type="text" 
                                class="form-control" 
                                v-model="addressLineOne" 
                                aria-label="Small" 
                                aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Address 2</span>
                            </div>
                            <input 
                                @input="validateField(addressLineTwo, 'addressLineTwoError', 'Address Line 2 is required')"
                                type="text" 
                                class="form-control" 
                                v-model="addressLineTwo" 
                                aria-label="Small" 
                                aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center pt-3">
                    <span class="col" v-if="getValidationError('addressLineOneError') !== null">
                        <span>{{ getValidationError('addressLineOneError') }}</span>
                    </span>
                    <span class="col" v-if="getValidationError('addressLineTwoError') !== null">
                        <span>{{ getValidationError('addressLineTwoError') }}</span>
                    </span>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">County</span>
                            </div>
                            <input 
                                @input="validateField(county, 'countyError', 'County is required')"
                                type="text" 
                                class="form-control" 
                                v-model="county" 
                                aria-label="Small" 
                                aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ZIP</span>
                            </div>
                            <input 
                                @input="validateField(zip, 'zipError', 'ZIP is required')"
                                type="text" 
                                class="form-control" 
                                v-model="zip" 
                                aria-label="Small" 
                                aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Country</span>
                                </div>
                                <input 
                                    @input="validateField(country,  'countryError',  'Country is required')"
                                    type="text" 
                                    class="form-control" 
                                    v-model="country" 
                                    aria-label="Small" 
                                    aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <span class="col" v-if="getValidationError('countyError') !== null">
                            <span>{{ getValidationError('countyError') }}</span>
                        </span>
                        <span class="col" v-if="getValidationError('zipError') !== null">
                            <span>{{ getValidationError('zipError') }}</span>
                        </span>
                        <span class="col" v-if="getValidationError('countryError') !== null">
                            <small>{{ getValidationError('countryError') }}</small>
                        </span>
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
                    if (!this.firstName) {
                        this.errors.push(['firstNameError', "First Name is required."]);
                    } else {
                        this.errors.filter(e => e[0] === 'firstNameError')
                    }

                    if (!this.lastName) {
                         this.errors.push(['lastNameError', "Last Name is required."]);
                    } else {
                        this.errors.filter(e => e[0] === 'lastNameError')
                    }

                    if (!this.addressLineOne) {
                        this.errors.push(['addressLineOneError', "Address is required."]);
                    } else {
                        this.errors.filter(e => e[0] === 'addressLineOneError')
                    }

                    if (!this.addressLineTwo) {
                        this.errors.push(['addressLineTwoError', "Address is required."]);
                    } else {
                        this.errors.filter(e => e[0] === 'addressLineTwoError')
                    }

                    if (!this.phoneNumber) {
                        this.errors.push(['phoneNumberError', "Phone number is required."]);
                    } else {
                        this.errors.filter(e => e[0] === 'phoneNumberError')
                    }

                    if (!this.city) {
                        this.errors.push(['cityError', "City is required."]);
                    } else {
                        this.errors.filter(e => e[0] === 'cityError')
                    }

                    if (!this.county) {
                        this.errors.push(['countyError', "County is required."]);
                    } else {
                        this.errors.filter(e => e[0] === 'countyError')
                    }

                    if (!this.zip) {
                        this.errors.push(['zipError', "ZIP is required."]);
                    } else {
                        this.errors.filter(e => e[0] === 'zipError')
                    }

                    if (!this.country) {
                        this.errors.push(['countryError', "Country is required."]);
                    } else {
                        this.errors.filter(e => e[0] === 'countryError')
                    }
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

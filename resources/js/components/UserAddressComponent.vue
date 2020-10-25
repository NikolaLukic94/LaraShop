<template>
    <v-app>
            <span>
                <v-card
                    class="mx-auto mb-2"
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
                        <v-text-field 
                            label="Recipient's Full Name" 
                            :rules="addressLineOneRules" 
                            hide-details="auto"
                            class="mb-3">
                        </v-text-field>
                        <v-text-field 
                            label="Address Line 1" 
                            :rules="addressLineOneRules" 
                            hide-details="auto"
                            class="mb-3">
                        </v-text-field>
                    </div>
                    <div>
                        <v-text-field 
                            label="Address Line 2" 
                            :rules="addressLineTwoRules" 
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
                                label="City" 
                                :rules="cityRules" 
                                hide-details="auto" 
                                class="mb-3 mr-3">
                            </v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                            sm="4"
                        >
                            <v-text-field 
                                label="County" 
                                :rules="countyRules" 
                                hide-details="auto"
                                class="mb-3 mr-3">
                            </v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                            sm="4"
                        >
                            <v-text-field 
                                label="ZIP" 
                                :rules="zipRules" 
                                hide-details="auto" 
                                class="mb-3">
                            </v-text-field>
                        </v-col>
                    </v-row>

                    <v-row no-gutters>
                        <v-col
                            cols="12"
                            sm="6"
                        >
                            <v-text-field 
                                label="Country" :rules="countryRules"
                                hide-details="auto"
                                class="mb-3 mr-3">
                            </v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                            sm="6"
                        >
                            <v-text-field 
                                type="number"
                                label="Phone Number" 
                                :rules="phoneNumberRules" 
                                hide-details="auto"
                                class="mb-3"></v-text-field>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card>
            </span>
        <span>
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
                                <b>Address is not required since selected books are digital</b>
                            </h5>
                            <span>Change</span>
                        </div>
                        <v-list-item-title class="headline mb-1">Headline 5</v-list-item-title>
                        <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>
            </v-card>
            </span>
            <br>
    </v-app>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';

    export default {
        name: 'user-addresses',
        computed: {
            ...mapGetters('userAddress', ['getUserAddresses', 'getErrors']),
        },
        methods: {
            ...mapActions(
                'userAddress', [
                    'setUserAddresses',
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
            },
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
                firstNameRules: [
                    v => !!v || 'Name is required',
                    v => v.length < 5 || 'Name must be at least 5 characters long',
                ],
                phoneNumberRules: [
                    v => !!v || 'Phone Number is required',
                    v => v.length <= 10 || 'Phone number should be at least 6 digits long',
                ],
                addressLineOneRules: [
                    v => !!v || 'Address is required',
                ],
                addressLineTwoRules: [
                    v => !!v || 'Address is required',
                ],
                cityRules: [
                    v => !!v || 'Name is required',
                    v => v.length <= 10 || 'Name must be less than 10 characters',
                ],
                countyRules: [
                    v => !!v || 'City is required',
                    v => v.length <= 10 || 'Name must be less than 10 characters',
                ],
                zipRules: [
                    v => !!v || 'ZIP is required',
                ],
                // make dropdown
                countryRules: [
                    v => !!v || 'country is required',
                    v => v.length <= 10 || 'Name must be less than 10 characters',
                ],
            }
        },
        created() {
            this.setUserAddresses();
            this.setOrders();
        },
    }
</script>

<style>
    .help-block {
        color: #ff471a;
    }

</style>

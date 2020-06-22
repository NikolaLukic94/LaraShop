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
                                <span class="input-group-text" v-model="firstName" id="inputGroup-sizing-sm">First Name</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" v-model="lastName" id="inputGroup-sizing-sm">Last Name</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" v-model="phoneNumber" id="inputGroup-sizing-sm">Phone number</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" v-model="addressLineOne" id="inputGroup-sizing-sm">Address 1</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" v-model="addressLineTwo" id="inputGroup-sizing-sm">Address 2</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" v-model="county" id="inputGroup-sizing-sm">County</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" v-model="zip" id="inputGroup-sizing-sm">ZIP</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" v-model="country" id="inputGroup-sizing-sm">Country</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="custom-control custom-checkbox pb-2">
                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" @input="sendCreateUserAddressRequest()">
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

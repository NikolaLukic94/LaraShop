<template>
  <div class="container">
    <p> <i>Step 2 of 3</i> </p>
    <h3><b>Payment method</b></h3>
    <div class="card">
    <div class="container">
        <div class="row d-flex justify-content-center pt-3">
            <div class="col">
                <div class="card">
                    Credit Card
                </div>
            </div>
            <div class="col">
                <div class="card">
                    Pay Pal
                </div>
            </div>
            <div class="col">
                <div class="card">
                    Upon Delivery 
                    <!-- applicable if paperback -->
                </div>
            </div>
        </div>
        <div class="custom-control custom-checkbox pb-3">
            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
            <label class="custom-control-label" for="defaultUnchecked">Save payment info</label>
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
        },
        created() {
            this.setUserPaymentMethod();
        },             
    }
</script>

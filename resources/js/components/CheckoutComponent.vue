<template>
  <div>
    <user-addresses></user-addresses>

    <user-payment-methods></user-payment-methods>

    <order-review></order-review>

    <div class="row pt-3">
        <div class="col">
            <button class="btn btn-info text-center" @click="placeNewOrder()">Place order</button>
        </div>
    </div>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';

    export default {
        name: 'checkout-component',
        computed: {
            ...mapGetters('userAddress', ['getNewAddress']),
            ...mapGetters('paymentMethods', ['getNewPaymentMethod'])
        },
        methods: {
            ...mapActions('order', ['createOrder']),
            ...mapActions('userAddress', ['validateData']),
            ...mapActions('paymentMethods', ['validatePaymentData']),
            placeNewOrder() {
                this.validateData();
                this.validatePaymentData();
                // validate user addresses and card data
                // create new order and redirect to successful order page
            }
        },
    }
</script>

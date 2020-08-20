<template>
    <div>
        <order-review></order-review>

        <user-addresses></user-addresses>

        <user-payment-methods></user-payment-methods>

<!--        <div class="row pt-3">-->
<!--            <div class="col">-->
                <button class="btn btn-info text-center" @click="placeNewOrder">Place order</button>
<!--            </div>-->
<!--        </div>-->
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';

    export default {
        name: 'checkout-component',
        computed: {
            ...mapGetters('userAddress', ['getNewAddress', 'getErrors']),
            ...mapGetters('paymentMethods', ['getNewPaymentMethod'])
        },
        methods: {
            ...mapActions('order', ['createOrder']),
            ...mapActions('userAddress', ['validateData']),
            ...mapActions('paymentMethods', ['validatePaymentData']),
            placeNewOrder() {
                console.log('placing order')
                // validate user addresses and card data
                // this.validateData();
                // this.validatePaymentData();
                // create new order (along with other stuff) and redirect to successful order page
                // if (this.getErrors.length === 0 && this.getPaymentErrors.length === 0) {
                this.createOrder();
                // }

            }
        },
    }
</script>

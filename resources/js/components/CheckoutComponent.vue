<template>
  <div>
    <user-addresses></user-addresses>

    <user-payment-methods></user-payment-methods>
    
    <order-review></order-review>

    <div class="row pt-3">
        <div class="col">
            <button class="btn btn-info text-center">Place order</button>
        </div>
    </div>
  </div>
</template>

<script>
    // import { mapGetters } from 'vuex';
    // import { mapActions } from 'vuex';

    export default {
        name: 'checkout-component',
        // computed: {
        //     ...mapState('cartItem', ['getCartItems', 'getTotalPremium'])
        // },
        // methods: {
        //     ...mapActions(
        //         'cartItem', 
        //         [
        //             'setCartItems', 
        //             'increaseQuantity', 
        //             'decreaseQuantity', 
        //             'changeQuantity',
        //             'deleteCartItem'
        //         ]
        //     ),
        // },
        // data: function () {
        //     return {
                
        //     }
        // },
        // created() {
        //     this.setCartItems();
        // },             
    }
</script>

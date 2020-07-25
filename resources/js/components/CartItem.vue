<template>
  <div>
    <div class="container">

        <div class="card border-0">
        <div class="row">
            <div class="col-sm">
                
            </div>
            <div class="col-sm">

            </div>
            <div class="col-sm">
                Price
            </div>
            <div class="col-sm">
                Quantity
            </div>
            <div class="col-sm">
                Total
            </div>
            <div class="col-sm">

            </div>
        </div>
        <hr>
        <div v-if="getCartItems.length > 0" >
            <div class="row" v-for="cartItem in getCartItems">
                <div class="col-sm">
                    <img src="/img/logo.jpg" width="185" height="150" alt="Image"/>
                </div>
                <div class="col-sm align-self-center">
                    <p>{{cartItem.relationships.product.data.name}}</p>
                    <p>Author</p>
                </div>
                <div class="col-sm align-self-center">
                <!-- ${{ cartItem.relationships.product.data.price }} -->
                </div>
                <div class="col-sm align-self-center">
                    <i class="fa fa-plus-circle" aria-hidden="true" @click="increaseQuantity(cartItem.id)"></i>
                    <input type="text" :value="cartItem.quantity" style="width:25px" @input="changeQuantity()">
                    <i class="fa fa-minus-circle" aria-hidden="true" @click="decreaseQuantity(cartItem.id)"></i>
                </div>
                <div class="col-sm align-self-center">
                    ${{ cartItem.quantity * cartItem.relationships.product.data.price }}
                </div>
                <div class="col-sm align-self-center">
                    <i class="fa fa-remove" @click="deleteCartItem(cartItem.id)"></i>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        
        <hr>
    </div>
    <!-- <nav class="navbar navbar-light bg-faded"> -->
        <!-- <div class="container text-center"> -->
            <div class="row">
                <div class="col-4">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Add more items
                </div>
                <div class="col-4">
                    <b>Total: $ {{ this.getTotalPremium }}</b> 
                    
                </div>
                <div class="col-4">
                    <a href="/checkout">Checkout</a>
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </div>
            </div>
        <!-- </div> -->
    <!-- </nav> -->
    </div>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';

    export default {
        name: 'cart-items',
        computed: {
            ...mapGetters('cartItem', [
                'getCartItems', 
                'getTotalPremium'
            ])
        },
        methods: {
            ...mapActions(
                'cartItem', 
                [
                    'setCartItems', 
                    'increaseQuantity',
                    'decreaseQuantity',
                    'changeQuantity',
                ]
            ),
        },
        data: function () {
            return {
                
            }
        },
        created() {
            this.setCartItems();
        },             
    }
</script>

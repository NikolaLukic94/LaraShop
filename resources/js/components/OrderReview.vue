<template>
  <div class="container">
    <p><i>Step 3 of 3</i></p>
    <h3><b>Order review</b></h3>
    <div class="card">
        <div class="container">
            <div class="row" v-for="cartItem in getOrders">
                <div class="col-sm">
                    <img src="/img/logo.jpg" width="185" height="150" alt="Image"/>
                </div>
                <div class="col-sm align-self-center">
                    <p>Title of the book</p>
                    <p>Author</p>
                </div>
                <div class="col-sm align-self-center">
                ${{ cartItem.relationships.product.data.price }}
                </div>
                <div class="col-sm align-self-center">
                    {{ cartItem.quantity }}
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
    </div>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'order-review',
        computed: {
            ...mapGetters(
                'orderReview',
                [
                    'getOrders'
                ])
        },
        methods: {
            ...mapActions(
                'orderReview',
                [
                    'setOrders',
                ]),
        },
        created() {
            this.setOrders();
        },             
    }
</script>

<template>
    <div id="cart-component">
        <p class="p-1 mb-0" id="elements">
        <a href="/cart/index" class="text-center">
            {{ getCartItems.length }}<i class="fa fa-shopping-bag pl-1" aria-hidden="true"></i>
        </a>
        </p>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'cart-component',
        computed: {
            ...mapGetters('cartItem', ['getCartItems'])
        },
        methods: {
            ...mapActions(
                'cartItem', ['setCartItems']),
        },
        created() {
            this.setCartItems();
        },
    }
</script>

<style>

    #cart-component:hover {
        background-color: #008080;
    }

    #cart-component:hover * {
        color: white;
        text-decoration: none;
        
    }

    #cart-component * {
        color: black;
        text-decoration: none;
    }


    #cart-component {
      display: inline-block; 
      float: right; 
      border: 2px solid #73AD21;
      width: 55px; 
      text-align: center; 
      border-radius: 35px;
      margin-right: 20px;
    }

</style>

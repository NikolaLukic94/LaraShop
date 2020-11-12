<template>
  <div style="border-radius: 35px; border: 2px solid #73AD21; width: 35px;">
        <a href="/cart/index" style="color: black;" class="text-center">
            {{ getCartItems.length }}<i class="fa fa-shopping-bag pl-1" aria-hidden="true"></i>
        </a>
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

<template>
  <div>
    <li class="nav-item" v-if="getCartItems.length > 0">
      <b>
        <a class="nav-link" href="/cart/index"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
        <p>{{ getCartItems.length }}</p>
        </a>
      
      </b> 
    </li>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'cart-component',
        computed: {
            ...mapGetters(
                'cartItem', ['getCartItems'])
        },
        methods: {
            ...mapActions(
                'cartItem',
                [
                    'setCartItems',
                ]),
        },
        created() {
            this.setCartItems();
        },             
    }
</script>

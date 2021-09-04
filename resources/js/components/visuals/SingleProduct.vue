<template>
    <v-app class="container">
        <v-row v-for="product in this.getFilteredProductsByKey('id=' + this.$route.params.id)">
            <v-col>
                <img :src="product.relationships.images.data[0].imagePath" alt="Book" height="250" class="pt-4 pl-4">
            </v-col>
            <v-col>
                <p>{{ product.name }}</p>
                <p>$ {{ product.price }}</p>
                <p>{{ product.author }}</p>
                <p>{{ product.publisher }}</p>
                <button class="btn btn-info tile" @click="storeOrderItem(product.id)">Add to cart</button>
            </v-col>
        </v-row>
    </v-app>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'single-product-component',
        methods: {
            ...mapActions('orderItem', ['storeOrderItem']),
            ...mapActions('products', ['filterForProduct']),
        },
        computed: {
            ...mapGetters('products', ['getFilteredProductsByKey']),
        },
        created() {
            this.filterForProduct('id=' + this.$route.params.id);
        }
    }
</script>

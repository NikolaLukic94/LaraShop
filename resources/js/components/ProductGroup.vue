<template>
    <v-app>
        <p><b>{{ this.title }}</b></p>
        <v-row>
            <div v-for="product in this.getFilteredProductsByKey(this.queryParam)">
                <v-col class="ma-0 pa-0">
                    <img :src="product.relationships.images.data[0].imagePath" :id="product.id" alt="Book" height="300" width="220" class="pt-4 pl-4">
                    <p>{{ product.name.substring(0, 20) }}</p>
                    <p>$ {{ product.price }}</p>
                    <p>{{ product.author }}</p>
                    <p>{{ product.publisher }}</p>
                    <button class="btn btn-info tile" @click="storeOrderItem(product.id)">Add to cart</button>
                </v-col>
            </div>
        </v-row>
    </v-app>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: 'product-group',
        props: ['queryParam', 'title', 'quantity'],
        methods: {
            ...mapActions('orderItem', ['storeOrderItem']),
            ...mapActions('products', ['filterForProduct']),
        },
        computed: {
            ...mapGetters('products', ['getFilteredProducts', 'getFilteredProductsByKey']),
        },
        created() {
            this.filterForProduct(this.queryParam);
        }
    }
</script>

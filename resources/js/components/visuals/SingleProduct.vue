<template>
    <div>
        <div class="container">
        <span v-if="this.product.relationships.images.data">
            <div v-for="image in this.product.relationships.images.data">
                <img v-bind:src="image.imagePath" alt="">
            </div>
        </span>
            <p>{{ this.product.id }}</p>
            <p>{{ this.product.name }}</p>
            <p>{{ this.product.author }}</p>
            <p>{{ this.product.publisher }}</p>
            <button class="btn btn-info" @click="callStoreCartItem()">Add to cart</button>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'single-product-component',
        data: function () {
            return {
                product: ''
            }
        },
        methods: {
            ...mapActions('cartItem', ['storeCartItem']),
            callStoreCartItem() {
                this.storeCartItem(this.product.id);
            },
        },
        created() {
            this.product = document.querySelector('meta[name="product"]').content;
            axios.get('/api/products/' + this.product)
                .then((response) => {
                    console.log(response)
                    this.product = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
        }
    }
</script>

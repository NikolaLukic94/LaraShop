<template>
    <div>
        <v-row v-for="books in this.chunkedProducts" :key="books.id">
            <div class="container" v-for="book in books" :key="book.id">
                <img :src="book.relationships.images.data[0].imagePath" alt="Avatar"
                     class="image" style="width:100%">
                <div class="middle">
                    <button style="background-color: green; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; margin-top: 15px;">
                        <i class="fa fa-eye text-white" style="font-size: 30" aria-hidden="true" title="View book"></i>
                    </button>
                    <button
                        style="background-color: green; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; margin-top: 15px;">
                        <i class="fa fa-cart-plus text-white" style="font-size: 30" aria-hidden="true"
                           title="Add to cart"
                           @click="storeOrderItem(book.id)"
                        ></i>
                    </button>
                </div>
            </div>
            <!--            <v-col>-->
            <!--                <v-img-->
            <!--                    max-height="250"-->
            <!--                    max-width="180"-->
            <!--                    style="margin-right: 25%;"-->
            <!--                    v-bind:src="'https://prodimage.images-bn.com/pimages/9780062386908_p0_v6_s550x406.jpg'"-->
            <!--                ></v-img>-->
            <!--            </v-col>-->
        </v-row>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'products-table-component',
        props: ['filter', 'products'],
        computed: {
            ...mapGetters('products', ['getFilteredProducts']),
            chunkedProducts() {
                return _.chunk(Object.values(this.books), 5);
            },
        },
        data: function () {
            return {
                books: [],
            }
        },
        methods: {
            ...mapActions('products', ['filterForProduct']),
            ...mapActions('orderItem', ['storeOrderItem']),
            search(inputValue) {
                return axios.get('/api/products?' + inputValue)
                    .then((response) => {
                        this.books = response.data.data;
                    })
                    .catch(err => console.log(err))
            }
        },
        created() {
            if (this.filter) {
                this.search(this.filter)
            }

            if (this.products) {
                this.books = this.products;
            }
        },
        watch: {
            filter: function(newVal, oldVal) {
                this.search(newVal)
            }
        }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0
    }

    .container {
        position: relative;
        width: 14%;
    }

    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .container:hover .image {
        opacity: 0.3;
    }

    .container:hover .middle {
        opacity: 1;
    }

    .text {
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
        padding: 16px 32px;
    }
</style>

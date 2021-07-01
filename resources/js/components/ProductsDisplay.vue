<template>
    <div>
        <v-row no-gutters v-for="books in this.chunkedProducts" :key="books.id"
               class="ml-64 mr-64 justify-center">
            <div v-for="book in books" :key="book.id">
                <div class="pl-4 pr-4 mb-4" style="height: 350px;"
                     @mouseover="selectItem(book.id)"
                     @mouseleave="unSelectItem()"
                >
                    <img :src="book.relationships.images.data[0].imagePath" :id="book.id" alt="Book"
                         style="height: 200px; width: 150px;"
                         class="image pt-4">
                    <p class="pt-2 text-center">{{ book.name.substring(0, 20) }}</p>
                    <p class="text-center">${{ book.price }}</p>

                    <!--                    <div class="middle">-->
                    <div  v-if="hoverOverBookId === book.id">
                        <button class="hover-buttons">
                            <i class="fa fa-eye text-white" aria-hidden="true" title="View book"></i>
                        </button>
                        <button class="hover-buttons">
                            <i class="fa fa-cart-plus text-white" aria-hidden="true"
                               title="Add to cart"
                               @click="storeOrderItem(book.id)"
                            ></i>
                        </button>
                    </div>
                </div>
            </div>

            <!--            <v-col>-->
            <!--                <img :src="book.relationships.images.data[0].imagePath" alt="Book" class="image">-->
            <!--            </v-col>-->
            <!--            &lt;!&ndash;            <v-col>&ndash;&gt;-->
            <!--            &lt;!&ndash;                <v-img&ndash;&gt;-->
            <!--            &lt;!&ndash;                    max-height="250"&ndash;&gt;-->
            <!--            &lt;!&ndash;                    max-width="180"&ndash;&gt;-->
            <!--            &lt;!&ndash;                    style="margin-right: 25%;"&ndash;&gt;-->
            <!--            &lt;!&ndash;                    v-bind:src="'https://prodimage.images-bn.com/pimages/9780062386908_p0_v6_s550x406.jpg'"&ndash;&gt;-->
            <!--            &lt;!&ndash;                ></v-img>&ndash;&gt;-->
            <!--            &lt;!&ndash;            </v-col>&ndash;&gt;-->
            <!--                        </div>-->
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
                return _.chunk(Object.values(this.books), 6);
            },
        },
        data: function () {
            return {
                books: [],
                hoverOverBookId: null
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
            },
            selectItem(item) {
                this.hoverOverBookId = item
            },
            unSelectItem(item) {
                this.hoverOverBookId = false
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
            filter: function (newVal, oldVal) {
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

    .hover-buttons {
        background-color: green;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 20px;
        padding-right: 20px;
        margin-top: 15px;
    }
</style>

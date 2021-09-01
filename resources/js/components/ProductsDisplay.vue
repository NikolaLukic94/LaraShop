<template>
    <div style="padding-top: 10%;">
        <v-row no-gutters v-for="books in this.chunkedProducts" :key="books.id"
               class="ml-64 mr-64 justify-center">
            <div v-for="book in books" :key="book.id" class="m-1">
                <v-card
                    class="mx-auto my-12"
                    max-width="250"
                >
                    <template slot="progress">
                        <v-progress-linear
                            color="deep-purple"
                            height="10"
                            indeterminate
                        ></v-progress-linear>
                    </template>

                    <img :src="book.relationships.images.data[0].imagePath" :id="book.id" alt="Book" height="250" class="pt-4 pl-4">

                        <v-card-title :title="book.name">{{ book.name.substring(0, 20) }}</v-card-title>

                        <v-card-text>
                            <v-row
                                align="center"
                                class="mx-0"
                            >
                                <v-rating
                                    :value="4.5"
                                    color="amber"
                                    dense
                                    half-increments
                                    readonly
                                    size="14"
                                ></v-rating>

                                <div class="grey--text ms-4">
                                    4.5 (413)
                                </div>
                            </v-row>

                            <div class="my-4 text-subtitle-1">
                                $ {{ book.price }}
                            </div>

                            <div>{{ book.otherProductDetails.substring(0, 120) }}</div>
                        </v-card-text>

                        <v-card-actions>
                            <v-btn
                                class="hover-buttons"
                                @click="redirect('singleProduct', book.id)"
                                color="deep-purple lighten-2"
                                text
                            >
                                <i class="fa fa-eye text-white" aria-hidden="true"
                                   title="Add to cart"
                                ></i>
                            </v-btn>
                            <v-btn
                                class="hover-buttons"
                                @click="storeOrderItem(book.id)"
                                color="deep-purple lighten-2"
                                text
                            >
                                <i class="fa fa-cart-plus text-white" aria-hidden="true"
                                   title="Add to cart"
                                ></i>
                            </v-btn>

                        </v-card-actions>
                    </v-card>
                </div>
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
                    hoverOverBookId: null
                }
            },
            methods: {
                ...mapActions('products', ['filterForProduct']),
                ...mapActions('orderItem', ['storeOrderItem']),
                redirect(val, id) {
                    this.$router.push({path: `/spa/product/${id}`})
                },
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

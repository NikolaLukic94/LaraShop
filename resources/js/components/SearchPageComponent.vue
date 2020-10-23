<template>
    <div>
        <nav class="navbar navbar-light bg-light justify-content-between">
        <div class="container">
            <a class="navbar-item text-warning"><b>BOOKSTORE</b></a>
            
            <v-container style="width: 600px;">
                <template>
                    <v-text-field label="Search" @click="searchForProduct()"></v-text-field>
                </template>
            </v-container>            
            
            <cart-component></cart-component>  
        </div>
        </nav>

        <v-app>
            <div v-if="chunkedProducts">
                    <div class="row" v-for="products in chunkedProducts">
                        <div class="col-sm" v-for="product in products">
                            <div class="card border-0 pt-2 pb-2 mt-2 mb-2"
                                 @mouseover="hover = true; hoverId = product.id"
                                 @mouseleave="hover = false; hoverId = null"
                            >
                                <div class="container">
                                    <v-card
                                        class="mx-auto"
                                        max-width="220"
                                    >
                                        <v-img
                                            class="white--text align-end"
                                            height="200px"
                                            src="/img/cover.jpg"
                                        >
                                        </v-img>
                                        <v-card-subtitle class="pb-0">{{product.name}}</v-card-subtitle>
                                        <v-card-text class="text--primary">
                                            <div> ${{ product.price }}</div>
                                        </v-card-text>
                                        <v-card-actions>
                                            <v-btn
                                                color="light-blue"
                                                text
                                            >
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </v-btn>
                                            <v-btn
                                                @click="callStoreCartItem(product.id)"
                                                color="light-blue"
                                                text
                                            >
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                            </v-btn>
                                            <v-btn
                                                @click="callStoreCartItem(product.id)"
                                                color="light-blue"
                                                text
                                            >
                                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                            </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </v-app>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';
    import {VueGoodTable} from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'product',
        computed: {
            chunkedProducts() {
                return _.chunk(Object.values(this.getFilteredProducts), 6);
            },
            ...mapGetters('products', ['getFilteredProducts']),
        },
        methods: {
            ...mapActions(
                'products', ['setFilteredProducts', 'filterForProduct']),
            ...mapActions('cartItem', ['storeCartItem']),
            searchForProduct() {
                this.filterForProduct(this.searchValue);
            },
            callStoreCartItem(productId) {
                this.storeCartItem(productId);
            }
        },
        data: function () {
            return {
                hover: false,
                hoverId: null,
                searchValue: '',
                columns: [
                    {
                        label: 'Name',
                        field: 'name',
                    },
                    {
                        label: 'Created',
                        field: 'createdAt',
                    },
                    {
                        label: 'Action',
                        field: 'action',
                    },
                ],
            }
        },
        created() {
            this.setFilteredProducts();
        },
    }
</script>


<style>
    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
</style>
<template>
    <div>
        <v-app>
            <v-container>
                <template>
                    <v-text-field>
                        <v-icon slot="append" color="green" @click="searchForProduct()">fas fa-search</v-icon>
                    </v-text-field>
                </template>
            </v-container>
            <!--    <div class="container">-->
            <!--      <div class="input-group mb-3">-->
            <!--        <input type="text"-->
            <!--               class="form-control"-->
            <!--               v-model="searchValue"-->
            <!--               placeholder="Search everything"-->
            <!--               aria-label="Recipient's username"-->
            <!--               aria-describedby="basic-addon2">-->
            <!--        <div class="input-group-append">-->
            <!--          <button class="btn btn-outline-secondary" type="button" @click="searchForProduct()">Search</button>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <div v-if="chunkedProducts">
                <div class="container">
                    <!--          <v-container class="grey lighten-5">-->
                    <!--              <v-row no-gutters>-->

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
                                                View
                                            </v-btn>

                                            <v-btn
                                                @click="callStoreCartItem(product.id)"
                                                color="light-blue"
                                                text
                                            >
                                                Add to Cart
                                            </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </div>
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
                return _.chunk(Object.values(this.getFilteredProducts), 3);
            },
            ...mapGetters('products', ['getFilteredProducts']),
        },
        methods: {
            ...mapActions(
                'products',
                [
                    'setFilteredProducts',
                    'filterForProduct',
                ]),
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

<template>
    <div class="px-1">
        <v-row v-if="filter == 'recommended'">
            <v-col v-for="products in this.getRecommended" :key="products.id">
                <v-card
                    class="mx-auto my-12"
                    max-width="374"
                >
                    <template slot="progress">
                        <v-progress-linear
                            color="deep-purple"
                            height="10"
                            indeterminate
                        ></v-progress-linear>
                    </template>

                    <v-img
                        height="250"
                        style="margin-right: 25%;"
                        v-bind:src="products.relationships.images.data[0].imagePath"
                    ></v-img>
                    <v-card-title :title="products.name">{{ products.name.substring(0,20)+".." }}</v-card-title>

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

                            <div class="grey--text ml-4">
                                4.5 (413)
                            </div>
                        </v-row>

                        <div class="my-4 subtitle-1">
                            $ • {{ products.price }}
                        </div>

                        <i :title="products.author">
                            {{ products.author.substring(0,20)+".." }}
                        </i>

                    </v-card-text>

                    <v-divider class="mx-4"></v-divider>
                    <v-card-text>
                        <v-chip-group
                            active-class="deep-purple accent-4 white--text"
                            column
                        >
                            <v-chip @click="callStoreCartItem(products.id)" color="teal">
                                <v-icon class="text-white font-weight-medium">
                                    mdi-cart-plus
                                </v-icon>
                            </v-chip>
                            <v-chip :href="`/products/show/${products.id}`" color="teal">
                                <v-icon class="text-white">
                                    mdi-eye
                                </v-icon>
                            </v-chip>
                        </v-chip-group>
                    </v-card-text>

                </v-card>
            </v-col>
        </v-row>
        <v-row v-if="filter == 'mostPopular'">
            <v-col v-for="products in this.getMostPopular" :key="products.id">
                <v-card
                    class="mx-auto my-12"
                    max-width="374"
                >
                    <template slot="progress">
                        <v-progress-linear
                            color="deep-purple"
                            height="10"
                            indeterminate
                        ></v-progress-linear>
                    </template>

                    <v-img
                        height="250"
                        style="margin-right: 25%;"
                        v-bind:src="products.relationships.images.data[0].imagePath"
                    ></v-img>
                    <v-card-title :title="products.name">{{ products.name.substring(0,20)+".." }}</v-card-title>

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

                            <div class="grey--text ml-4">
                                4.5 (413)
                            </div>
                        </v-row>

                        <div class="my-4 subtitle-1">
                            $ • {{ products.price }}
                        </div>

                        <i :title="products.author">
                            {{ products.author.substring(0,20)+".." }}
                        </i>

                    </v-card-text>

                    <v-divider class="mx-4"></v-divider>

                    <v-card-title>Tonight's availability</v-card-title>

                    <v-card-text>
                        <v-chip-group
                            active-class="deep-purple accent-4 white--text"
                            column
                        >
                            <v-chip @click="callStoreCartItem(products.id)" color="teal">
                                <v-icon class="text-white font-weight-medium">
                                    mdi-cart-plus
                                </v-icon>
                            </v-chip>
                            <v-chip :href="`/products/show/${products.id}`" color="teal">
                                <v-icon class="text-white">
                                    mdi-eye
                                </v-icon>
                            </v-chip>
                        </v-chip-group>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
        <div v-if="filter == 'none'" class="ml-1 mr-1">
            <v-row v-for="filteredProducts in this.chunkedProducts" :key="filteredProducts.id">
                <v-col v-for="filteredProduct in filteredProducts" :key="filteredProduct.id">
                    <v-card
                        class="mx-auto my-12"
                        max-width="374"
                    >
                        <template slot="progress">
                            <v-progress-linear
                                color="deep-purple"
                                height="10"
                                indeterminate
                            ></v-progress-linear>
                        </template>

                        <v-img
                            height="250"
                            style="margin-right: 25%;"
                            v-bind:src="filteredProduct.relationships.images.data[0].imagePath"
                        ></v-img>
                        <v-card-title :title="filteredProduct.name">{{ filteredProduct.name.substring(0,20)+".." }}
                        </v-card-title>

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

                                <div class="grey--text ml-4">
                                    4.5 (413)
                                </div>
                            </v-row>

                            <div class="my-4 subtitle-1">
                                $ • {{ filteredProduct.price }}
                            </div>

                            <i :title="filteredProduct.author">
                                {{ filteredProduct.author.substring(0,20)+".." }}
                            </i>
                        </v-card-text>

                        <v-divider class="mx-4"></v-divider>

                        <v-card-text>
                            <v-chip-group
                                active-class="deep-purple accent-4 white--text"
                                column
                            >
                                <v-chip @click="callStoreCartItem(filteredProduct.id)" color="teal">
                                    <v-icon class="text-white font-weight-medium">
                                        mdi-cart-plus
                                    </v-icon>
                                </v-chip>
                                <v-chip color="teal">
                                    <product-modal :product="filteredProduct"></product-modal>
                                </v-chip>
                            </v-chip-group>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'products-table-component',
        props: ['filter'],
        computed: {
            ...mapGetters('products', ['getFilteredProducts', 'getRecommended', 'getMostPopular']),
            chunkedProducts() {
                return _.chunk(Object.values(this.getFilteredProducts), 5);
            },
        },
        data: function () {
            return {
                hover: false,
                hoverId: null,
            }
        },
        methods: {
            ...mapActions('products', ['setFilteredProducts', 'filterForProduct']),
            ...mapActions('cartItem', ['storeCartItem']),
            searchForProduct() {
                this.filterForProduct(this.searchValue);
            },
            callStoreCartItem(productId) {
                this.storeCartItem(productId);
            },
        },
        created() {
            this.filter === 'none'
                ? this.setFilteredProducts()
                : this.filterForProduct({type: this.filter});
        },
    }
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0
    }
</style>

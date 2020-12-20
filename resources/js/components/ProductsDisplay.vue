<template>
    <div>
        <v-row v-if="filter == 'recommended'">
            <v-col v-for="products in this.getRecommended" :key="products.id">
                <v-card class="card" style="height:350px;"
                    @mouseover="hover = true; hoverId = products.id"
                    @mouseleave="hover = false; hoverId = null"    
                >
                    <img class="p-2 image" style="margin: 0 auto;" v-bind:src="products.relationships.images.data[0].imagePath" width="170" height="200" alt="">
                    <p class="text-center">{{ products.name }}</p>
                    <p class="text-center" style="color: #e60000">{{ products.price }}</p>    
                    <transition name="fade">
                            <v-toolbar style="background-color: #00897B;"  v-show="hoverId === products.id">
                                <v-spacer></v-spacer>
                                <v-spacer>
                                <v-toolbar-title>
                                    <v-icon dark class="pr-3" @click="callStoreCartItem(products.id)">
                                        mdi-cart-plus
                                    </v-icon>
                                    <v-icon dark class="pr-3" :href="`/products/show/${products.id}`">
                                        mdi-eye
                                    </v-icon>
                                    </v-toolbar-title>
                                </v-spacer>
                            </v-toolbar>    
                    </transition>
                </v-card>
            </v-col>
        </v-row>
        <v-row v-if="filter == 'mostPopular'">
            <v-col v-for="products in this.getMostPopular" :key="products.id">
                <v-card class="card" style="height:350px;"
                    @mouseover="hover = true; hoverId = products.id"
                    @mouseleave="hover = false; hoverId = null"
                >
                    <img class="p-2 image" style="margin: 0 auto;" v-bind:src="products.relationships.images.data[0].imagePath" width="170" height="200" alt="">
                    <p class="text-center">{{ products.name }}</p>
                    <p class="text-center" style="color: #e60000">{{ products.price }}</p>    
                        <transition name="fade">
                            <v-toolbar style="background-color: #00897B;" v-show="hoverId === products.id">
                                <v-spacer></v-spacer>
                                <v-spacer>
                                <v-toolbar-title>
                                    <v-icon dark class="pr-3" @click="callStoreCartItem(products.id)">
                                        mdi-cart-plus
                                    </v-icon>
                                    <v-icon dark class="pr-3" :href="`/products/show/${products.id}`">
                                        mdi-eye
                                    </v-icon>
                                    </v-toolbar-title>
                                </v-spacer>
                            </v-toolbar>    
                    </transition>
                </v-card>
            </v-col>
        </v-row>
        <div v-if="filter == 'none'" class="ml-1 mr-1">
            <v-row v-for="filteredProducts in this.chunkedProducts" :key="filteredProducts.id">
                <v-col v-for="filteredProduct in filteredProducts" :key="filteredProduct.id">
                <v-card 
                    @mouseover="hover = true; hoverId = filteredProduct.id"
                    @mouseleave="hover = false; hoverId = null"
                    class="card" style="height:350px;"
                >
                        <div v-if="filteredProduct.relationships.images.data.length">
                            <img class="p-2 image" style="margin: 0 auto;" v-bind:src="filteredProduct.relationships.images.data[0].imagePath" width="170" height="200" alt="">
                        </div>
                        <p class="text-center">{{ filteredProduct.name }}</p>
                        <p class="text-center" style="color: #e60000">{{ filteredProduct.price }}</p>   
                        <transition name="fade">
                            <v-toolbar style="background-color: #00897B;"  v-show="hoverId === filteredProduct.id">
                                <v-spacer></v-spacer>
                                <v-spacer>
                                <v-toolbar-title>
                                    <v-icon dark class="pr-3" @click="callStoreCartItem(filteredProduct.id)">
                                        mdi-cart-plus
                                    </v-icon>
                                    <v-icon dark class="pr-3" :href="`/products/show/${filteredProduct.id}`">
                                        mdi-eye
                                    </v-icon>
                                    </v-toolbar-title>
                                </v-spacer>
                            </v-toolbar>    
                    </transition>  
                </v-card> 
                </v-col>
            </v-row>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';
    import {VueGoodTable} from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'products-table-component',
        props: ['filter'],
        computed: {
            ...mapGetters('products', ['getFilteredProducts', 'getRecommended', 'getMostPopular']),
            chunkedProducts() {
                return _.chunk(Object.values(this.getFilteredProducts), 6);
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
            this.filter == 'none' 
                ? this.setFilteredProducts()
                : this.filterForProduct({type: this.filter});
        },
    }
</script>

<style>

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0
}

</style>
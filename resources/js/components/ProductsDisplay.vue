<template>
    <div>
        <v-row v-if="filter == 'recommended'">
            <v-col v-for="products in this.getRecommended" :key="products.id">
                <v-card class="card h-100"
                    @mouseover="hover = true; hoverId = products.id"
                    @mouseleave="hover = false; hoverId = null"    
                >
                    <img class="p-2 image" style="margin: 0 auto;" src="/img/cover.jpg" width="170" height="200" alt="">
                    <p class="text-center">{{ products.name }}</p>
                    <p class="text-center" style="color: #e60000">{{ products.price }}</p>    
                    <transition name="component-fade" mode="out-in">
                        <v-toolbar style="background-color: #00897B"  v-if="hoverId === products.id">
                            <v-spacer></v-spacer>
                            <v-spacer>
                            <v-toolbar-title>
                                <v-icon dark class="pr-3" @click="callStoreCartItem(products.id)">
                                    mdi-cart-plus
                                </v-icon>
                                <v-icon dark class="pr-3">
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
                <v-card class="card h-100"
                    @mouseover="hover = true; hoverId = products.id"
                    @mouseleave="hover = false; hoverId = null"
                >
                    <img class="p-2 image" style="margin: 0 auto;" src="/img/cover.jpg" width="170" height="200" alt="">
                    <p class="text-center">{{ products.name }}</p>
                    <p class="text-center" style="color: #e60000">{{ products.price }}</p>    
                    <div class="text-center" v-if="hoverId === products.id">
                        <button class="btn btn-primary" @click="callStoreCartItem(products.id)">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        </button>
                    </div>                  
                </v-card>
            </v-col>
        </v-row>
        <div v-if="filter == 'none'" class="ml-1 mr-1">
            <v-row v-for="filteredProducts in this.chunkedProducts" :key="filteredProducts.id">
                <v-col v-for="filteredProduct in filteredProducts" :key="filteredProduct.id"
                    @mouseover="hover = true; hoverId = filteredProduct.id"
                    @mouseleave="hover = false; hoverId = null"
                >
                    <img class="p-2 image" style="margin: 0 auto;" src="/img/cover.jpg" width="170" height="200" alt="">
                        <p class="text-center">{{ filteredProduct.name }}</p>
                        <p class="text-center" style="color: #e60000">{{ filteredProduct.price }}</p>   
                        <div class="text-center" v-if="hoverId === filteredProduct.id">
                            <button class="btn btn-primary" @click="callStoreCartItem(filteredProduct.id)">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            </button>
                            <a v-bind:href="'/products/show/'+ filteredProduct.id">
                                <button class="btn btn-primary" :href="'/products/show/{{ filteredProduct.id }}'">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </a>
                        </div>  
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
            }
        },
        created() {
            this.filter == 'none' 
                ? this.setFilteredProducts()
                : this.filterForProduct({type: this.filter});
        },
    }
</script>

<style>
.component-fade-enter-active, .component-fade-leave-active {
  transition: opacity .7s ease;
}
.component-fade-enter, .component-fade-leave-to {
  opacity: 0;
}
</style>
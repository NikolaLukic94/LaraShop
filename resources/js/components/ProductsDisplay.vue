<template>
    <div>
        <div class="row" v-if="filter == 'recommended'">
            <div class="col" v-for="products in this.getRecommended" :key="products.id">
                <div class="card h-100"
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
                </div>
            </div>
        </div>
        <div class="row" v-if="filter == 'mostPopular'">
            <div class="col" v-for="products in this.getMostPopular" :key="products.id">
                <div class="card h-100"
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
                </div>
            </div>
        </div>
        <div v-if="filter == 'none'">
            <div class="row" v-for="filteredProducts in this.chunkedProducts" :key="filteredProducts.id">
                <div class="col" v-for="filteredProduct in filteredProducts" :key="filteredProduct.id">
                    <div class="card h-100"
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
                        </div>                          
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <div class="row" v-if="filter == 'none'">
            <div class="col" v-for="filteredProducts in this.chunkedProducts" :key="filteredProducts.id">
                <div class="col-sm" v-for="filteredProduct in filteredProducts" :key="filteredProduct.id">
                <div class="card"
                >
                    <img class="p-2 image" style="margin: 0 auto;" src="/img/cover.jpg" width="170" height="200" alt="">
                    <p class="text-center">{{ filteredProduct.name }}</p>
                    <p class="text-center" style="color: #e60000">{{ filteredProduct.price }}</p>    
                </div>
                </div>
            </div>
        </div> -->
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

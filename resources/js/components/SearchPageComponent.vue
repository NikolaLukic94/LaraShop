<template>
    <div>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <div class="container">
                <a class="navbar-item text-warning"><b>BOOKSTORE</b></a>
                <v-container style="width: 600px;">
                    <template>
                        <v-text-field label="Search" v-model="searchValue" @input="searchForProduct()"></v-text-field>
                    </template>
                </v-container>            
                <cart-component></cart-component>  
            </div>
        </nav>
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
                'products', 
                [
                    'setFilteredProducts', 
                    'filterForProduct'
                    ]
                ),
            ...mapActions(
                'cartItem', 
                    [
                        'storeCartItem'
                    ]
                ),
            searchForProduct() {
                console.log('search is caled', this.searchValue)
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
<template>
  <div>
    <div class="container">
      <div class="input-group mb-3">
        <input type="text" class="form-control" v-model="searchValue" placeholder="Search everything" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" @click="searchForProduct()">Search</button>
        </div>
      </div>
    </div>

    <div v-if="chunkedProducts">
      <div class="container">
        <div class="row" v-for="products in chunkedProducts"> 
          <div class="col-sm" v-for="product in products">
            <div class="card border-0 pt-2 pb-2 mt-2 mb-2"
                @mouseover="hover = true; hoverId = product.id"
                @mouseleave="hover = false; hoverId = null"
            >
            <div class="container">
              <div class="row d-flex justify-content-around">
                      <img src="/img/cover.jpg" width="125" height="150" alt="Image"/>
              </div>
              <div class="row d-flex justify-content-around pt-2">
                {{product.name}}
              </div>
              <div class="row d-flex justify-content-around pt-2" style="color:red">
                <b>${{ product.price }}</b>
              </div>
              <div class="row d-flex justify-content-around pt-1">
                <span v-if="hover && hoverId === product.id">
                  <button type="button" class="btn btn-primary btn-sm" @click="callStoreCartItem(product.id)">
                    Add to Cart
                    </button>
                  </span>
                <span v-if="hover && hoverId === product.id">
                  <button type="button" class="btn btn-primary btn-sm">
                    See
                  </button>
                </span>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'product',
        computed: {
          chunkedProducts() {
              return  _.chunk(Object.values(this.getFilteredProducts), 3);
          },  
          ...mapGetters(
                'products',
                [
                    'getFilteredProducts'
                ]),
        },
        methods: {
            ...mapActions(
                'products',
                [
                    'setFilteredProducts',
                    'filterForProduct',
                ]),
                ...mapActions('cartItem', [ 'storeCartItem' ]),
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

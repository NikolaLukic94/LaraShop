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
  <div class="row"   v-for="products in chunkedProducts"> 
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
          <span v-if="hover && hoverId === product.id"><button type="button" class="btn btn-primary btn-sm">Add to Cart</button></span>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
</div>


<!-- @foreach($items->chunk(5) as $chunk)
        <ul>
            @foreach($chunk as $item)
                Item {{ $loop->iteration }}
            @endforeach 
        </ul>
 @endforeach` -->


    <!-- <div class="container">
        <vue-good-table
            :pagination-options="{
              enabled: true
            }"
            :columns="columns"
            :rows="getFilteredProducts">
            <div slot="table-actions">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
              </button>
            </div>
            <template slot="table-row" slot-scope="props">
              <span v-if="props.column.field == 'action'">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="btn btn-info" @click="openEditModal(props.row)">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-info" @click="openDeleteModal(props.row.id)">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </div>
              </span>
              <span v-else>
                {{props.formattedRow[props.column.field]}}
              </span>
            </template>
        </vue-good-table>
    </div> -->

    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Shipment Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" style="width:100%">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div> -->


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
            console.log(this.getFilteredProducts)
            if (this.getFilteredProducts.length > 3) {
              var newArr =  _.chunk(Object.values(this.getFilteredProducts), 3);
            }
            console.log(newArr)
            return newArr;
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
                    'filterForProduct'
                ]),
                searchForProduct() {
                  this.filterForProduct(this.searchValue);
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

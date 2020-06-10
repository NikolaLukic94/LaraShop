<template>
  <div>
    <div class="container">
        <vue-good-table
            theme="black-rhino"
            styleClass="vgt-table striped"
            :columns="columns"
            :rows="getProducts">
            <div slot="table-actions">
                <!-- <button class="btn btn-primary" @click="openAddModal">Add New Products</button> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
              Add modal
            </button>
            </div>
            <template slot="table-row" slot-scope="props">
              <span v-if="props.column.field == 'action'">
                  <button class="btn btn-primary" @click="openEditModal(props.row.id)">Buy</button>
                  <button class="btn btn-primary" @click="openEditModal(props.row.id)">Edit</button>
                  <button class="btn btn-primary" @click="openDeleteModal(props.row.id)">Delete</button>
              </span>
              <span v-else>
                {{props.formattedRow[props.column.field]}}
              </span>
            </template>
        </vue-good-table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                </div>
                <input v-model="name" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Description</span>
                </div>
                <input v-model="description" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Price/Quantity</span>
                </div>
                <input v-model="price" type="text" class="form-control">
                <input v-model="quantity" type="text" class="form-control">
              </div>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Color/Size</span>
                </div>
                <input v-model="color" type="text" class="form-control">
                <input v-model="size" type="text" class="form-control">
              </div>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Other Notes</span>
                </div>
                <input v-model="other" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>
              <div class="row">
                  <div class="card" style="width:100%">
                    <div class="card-header">Image Upload Component</div>
                    <div class="card-body">
                        <input type="file" class="form-control">
                    </div>
                  </div>
              </div>
            
              <div class="row">
                <div class="col-sm">
                  Images
                </div>
                <div class="col-sm">
                  a
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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
        name: 'products-component',
        computed: {
            ...mapGetters(
                'products', ['getProducts'])
        },
        methods: {
            ...mapActions(
                'products',
                [
                    'setProducts',
                ]),


                
                openAddModal() {
                  this.$swal({
                      title: 'Add a new invoice status code',
                      input: 'text',
                      inputAttributes: {
                        autocapitalize: 'off'
                      },
                      showCancelButton: true,
                      confirmButtonText: 'Save',
                      showLoaderOnConfirm: true,
                      preConfirm: (name) => {
                        this.createInvoiceStatusCode(name);
                      },
                      allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                      if (result.value) {
                        Swal.fire({
                          title: `${result.value.login}'s avatar`,
                          imageUrl: result.value.avatar_url
                        })
                      }
                    });
                },
                openEditModal() {
                  this.$swal({
                      title: 'Update the name',
                      input: 'text',
                      inputAttributes: {
                        autocapitalize: 'off'
                      },
                      showCancelButton: true,
                      confirmButtonText: 'Save',
                      showLoaderOnConfirm: true,
                      preConfirm: (login) => {
                        return fetch(`//api.github.com/users/${login}`)
                          .then(response => {
                            if (!response.ok) {
                              throw new Error(response.statusText)
                            }
                            return response.json()
                          })
                          .catch(error => {
                            Swal.showValidationMessage(
                              `Request failed: ${error}`
                            )
                          })
                      },
                      allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                      if (result.value) {
                        Swal.fire({
                          title: `${result.value.login}'s avatar`,
                          imageUrl: result.value.avatar_url
                        })
                      }
                    });
                },
                openDeleteModal() {
                  this.$swal.fire({
                      title: 'Are you sure?',
                      text: "This will delete it permanently!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        this.deleteInvoiceStatusCode(result);
                      if (result.value) {

                        Swal.fire(
                          'Deleted!',
                          'Invoice status code has been deleted.',
                          'success'
                        )
                      }
                    })
                },
        },
        data: function () {
            return {
                name: '',
                description: '',
                price: '',
                quantity: '',
                color: '',
                size: '',
                other: '',
                newPaymentMethod: '',
                columns: [
                    {
                      label: 'Name',
                      field: 'name',
                    },
                                        {
                      label: 'Description',
                      field: 'description',
                    },
                                        {
                      label: 'Price',
                      field: 'price',
                    },
                    {
                      label: 'Color',
                      field: 'color',
                    },
                    {
                      label: 'Quantity',
                      field: 'quantity',
                    },
                    {
                      label: 'Size',
                      field: 'size',
                    },
                                        {
                      label: 'Other',
                      field: 'otherProductDetails',
                    },
                    {
                      label: 'Created',
                      field: 'createdAt',
                    },
                    {
                      label: 'Action',
                      field: 'action',
                    },                    
                ]
            }
        },
        created() {
            this.setProducts();
        },             
    }
</script>

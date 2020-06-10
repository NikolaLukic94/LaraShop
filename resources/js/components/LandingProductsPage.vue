<template>
  <div>
    <div class="container">
        <div class="row">
            <div class="col-sm">
            <div class="card border-0">
                <img class="card-img-top" src="/img/logo.jpg" alt="Card image cap">
                <hr>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p style="color:red"> $9.99</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
                </div>
            </div>
            </div>
            <div class="col-sm">
            <div class="card border-0">
                <img class="card-img-top" src="/img/logo.jpg" alt="Card image cap">
                <hr>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p style="color:red"> $9.99</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
                </div>
            </div>
            </div>
            <div class="col-sm">
            <div class="card border-0">
                <img class="card-img-top" src="/img/logo.jpg" alt="Card image cap">
                <hr>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p style="color:red"> $9.99</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
                </div>
            </div>
            </div>
            <div class="col-sm">
            <div class="card border-0">
                <img class="card-img-top" src="/img/logo.jpg" alt="Card image cap">
                <hr>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p style="color:red"> $9.99</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
                </div>
            </div>
            </div>
            <div class="col-sm">
            <div class="card border-0">
                <img class="card-img-top" src="/img/logo.jpg" alt="Card image cap">
                <hr>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p style="color:red"> $9.99</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
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
        name: 'invoice-status-code-component',
        computed: {
            ...mapGetters(
                'indexStatusCodes',
                [
                    'getInvoiceStatusCodes'
                ])
        },
        methods: {
            ...mapActions(
                'indexStatusCodes',
                [
                    'setInvoiceStatusCodes',
                    'createInvoiceStatusCode',
                    'deleteInvoiceStatusCode',
                    'updateInvoiceStatusCode'
                ]),
                openAddModal(name) {
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
                        // Swal.fire({
                        //   title: `${result.value.login}'s avatar`,
                        //   imageUrl: result.value.avatar_url
                        // })
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
                openDeleteModal(rowId) {
                  console.log('deleting')
                  this.$swal.fire({
                      title: 'Are you sure?',
                      text: "This will delete it permanently!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.value) {
                        this.deleteInvoiceStatusCode(rowId);
                        console.log('p')
                        // Swal.fire(
                        //   'Deleted!',
                        //   'Invoice status code has been deleted.',
                        //   'success'
                        // )
                      }
                    })
                },
        },
        data: function () {
            return {
                newInvoiceStatusColumnName: '',
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
            this.setInvoiceStatusCodes();
        },             
    }
</script>

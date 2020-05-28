<template>
  <div>
    <div class="container">
        <vue-good-table
            theme="black-rhino"
            styleClass="vgt-table striped"
            :columns="columns"
            :rows="getOrderStatusCodes">
            <div slot="table-actions">
                <button class="btn btn-primary" @click="openAddModal">Add New Status</button>
            </div>
            <template slot="table-row" slot-scope="props">
              <span v-if="props.column.field == 'action'">
                <button class="btn btn-primary" @click="openEditModal(props.row.id)">Edit</button>
                <button class="btn btn-primary" @click="openDeleteModal(props.row.id)">Delete</button>
              </span>
              <span v-else>
                {{props.formattedRow[props.column.field]}}
              </span>
            </template>

        </vue-good-table>
    </div>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'order-item-status-codes-component',
        computed: {
            ...mapGetters(
                'orderStatusCodes',
                [
                    'getOrderStatusCodes'
                ])
        },
        methods: {
            ...mapActions(
                'orderStatusCodes',
                [
                    'setOrderStatusCodes',
                    'createOrderStatusCode',
                    'deleteOrderStatusCodes',
                    'updateOrderStatusCode'
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
                        // return fetch(`//api.github.com/users/${login}`)
                        //   .then(response => {
                        //     if (!response.ok) {
                        //       throw new Error(response.statusText)
                        //     }
                        //     return response.json()
                        //   })
                        //   .catch(error => {
                        //     Swal.showValidationMessage(
                        //       `Request failed: ${error}`
                        //     )
                        //   })
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
                newOrderItemStatusColumnName: '',
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
                ]
            }
        },
        created() {
            this.setOrderStatusCodes();
        },             
    }
</script>

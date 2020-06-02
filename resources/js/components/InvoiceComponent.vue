<template>
  <div>
    <div class="container">
        <vue-good-table
            theme="black-rhino"
            styleClass="vgt-table striped"
            :columns="columns"
            :rows="getInvoices">
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
        name: 'invoices-component',
        computed: {
            ...mapGetters(
                'invoices', ['getInvoices']
                )
        },
        methods: {
            ...mapActions(
                'invoices',
                [
                    'setInvoices',
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
                openDeleteModal($rowId) {
                  this.$swal.fire({
                      title: 'Are you sure?',
                      text: "This will delete it permanently!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((rowId) => {
                        this.deleteInvoiceStatusCode(rowId);
                      // if (result.value) {

                      //   Swal.fire(
                      //     'Deleted!',
                      //     'Invoice status code has been deleted.',
                      //     'success'
                      //   )
                      // }
                    })
                },
        },
        data: function () {
            return {
                newInvoiceStatusColumnName: '',
                columns: [
                    {
                      label: 'date',
                      field: 'date',
                    },
                    {
                      label: 'invoiceDetails',
                      field: 'invoiceDetails',
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
            this.setInvoices();
        },             
    }
</script>

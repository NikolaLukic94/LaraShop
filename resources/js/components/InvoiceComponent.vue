<template>
  <div>
    <div class="container">
        <vue-good-table
            :pagination-options="{
              enabled: true
            }"
            theme="black-rhino"
            styleClass="vgt-table striped"
            :columns="columns"
            :rows="getInvoices">
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

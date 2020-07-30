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
            :rows="getOrderStatusCodes">
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Order Status Code</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" style="width:100%" v-model="name">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ref="modalClose">Close</button>
            <button type="button" class="btn btn-primary" @click="handleCreateOrderStatusCode()">Save</button>
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
                handleCreateOrderStatusCode() {
                  this.createOrderStatusCode(this.name);
                  this.$refs.modalClose.click();
                  this.name = '';
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
                  this.$swal.fire({
                      title: 'Are you sure?',
                      text: "This will delete it permanently!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        this.deleteOrderStatusCodes(rowId);
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

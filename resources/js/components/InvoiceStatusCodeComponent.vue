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
                :rows="getInvoiceStatusCodes">
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
                            <div class="text-center">
                                <v-dialog
                                    v-model="dialog"
                                    width="500"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-btn
                                            color="red lighten-2"
                                            dark
                                            v-bind="attrs"
                                            v-on="on"
                                        >
                                            Click Me
                                        </v-btn>
                                    </template>

                                    <v-card>
                                        <v-card-title class="headline grey lighten-2">
                                            Edit
                                        </v-card-title>

                                        <v-container>
                                            <v-text-field :model="name"></v-text-field>
                                        </v-container>

                                        <v-divider></v-divider>

                                        <v-card-actions>
                                            <v-spacer></v-spacer>
                                                <v-btn
                                                    color="green darken-1"
                                                    text
                                                    @click="dialog = false"
                                                >
                                                Close
                                              </v-btn>
                                            <v-btn
                                                color="primary"
                                                text
                                                @click="
                                                    dialog = false;
                                                    updateInvoiceStatusCode({id: props.row.id, name: name})"
                                            >
                                                Update
                                            </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </v-dialog>
                            </div>
                      </div>
                  </span>
                    <span v-else>
                {{props.formattedRow[props.column.field]}}
              </span>
                </template>
            </vue-good-table>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new invoice status code</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" style="width:100%" v-model="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" ref="modalClose">Close
                        </button>
                        <button type="button" class="btn btn-primary" @click="callSaveInvoiceStatusCode()">Save</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';
    import {VueGoodTable} from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'invoice-status-code-component',
        computed: {
            ...mapGetters(
                'indexStatusCodes', ['getInvoiceStatusCodes'])
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
                    if (result.value) {
                        this.deleteInvoiceStatusCode(rowId);
                        // Swal.fire(
                        //   'Deleted!',
                        //   'Invoice status code has been deleted.',
                        //   'success'
                        // )
                    }
                })
            },
            callSaveInvoiceStatusCode() {
                this.createInvoiceStatusCode(this.name);
                this.$refs.modalClose.click();
            }
        },
        data: function () {
            return {
                dialog: false,
                name: '',
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



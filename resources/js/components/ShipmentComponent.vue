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
                :rows="getShipments">
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
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';

    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'shipments-component',
        computed: {
            ...mapGetters('shipment', ['getShipments'])
        },
        methods: {
            ...mapActions('shipment', ['setShipments']),
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
        },
        data: function () {
            return {
                newPaymentMethod: '',
                columns: [
                    {
                        label: 'Tracking Number',
                        field: 'trackingNumber',
                    },
                    {
                        label: 'Date',
                        field: 'date',
                    },
                    // {
                    //     label: 'Other Details',
                    //     field: 'otherShipmentDetails',
                    // },
                    {
                        label: 'Action',
                        field: 'action',
                    },
                ]
            }
        },
        created() {
            this.setShipments();
        },
    }
</script>

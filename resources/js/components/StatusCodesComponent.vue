<template>
    <div>
        <div class="container">
            <statuses-component></statuses-component>
            <vue-good-table
                :pagination-options="{
                      enabled: true
                    }"
                theme="black-rhino"
                styleClass="vgt-table striped"
                :columns="columns"
                :rows="getStatusCodes"
                :search-options="{
                    placeholder: 'Search for the statuses',
                    enabled: true
                }"
            >
                <template slot="table-row" slot-scope="props">
                      <span v-if="props.column.field === 'action'">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-info" @click="openDeleteModal(props.row.id)">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-info" @click="setInEdit(props.row.id)">
                              <i class="fa fa-pencil" aria-hidden="true"></i>
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
    import {mapGetters, mapActions} from 'vuex';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'status-codes-component',
        computed: {
            ...mapGetters('statuses', ['getStatusCodes'])
        },
        methods: {
            ...mapActions(
                'statuses',
                [
                    'setStatusCodes',
                    'deleteStatusCodes',
                    'updateStatusCode',
                    'setInEdit'
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
                    if (result.isConfirmed) {
                        this.deleteStatusCodes(rowId);
                    }
                })
            },
        },
        data: function () {
            return {
                dialog: false,
                name: '',
                newStatusColumnName: '',
                columns: [
                    {
                        label: 'Name',
                        field: 'name',
                    },
                    {
                        label: 'Type',
                        field: 'type',
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
            this.setStatusCodes();
        },

    }
</script>

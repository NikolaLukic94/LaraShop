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
                :rows="getOrders">
                <template slot="table-row" slot-scope="props">
              <span v-if="props.column.field == 'action'">
                  <v-btn-toggle
                      v-model="toggle_multiple"
                      dense
                      background-color="primary"
                      dark
                      multiple
                  >
                    <v-btn @click="openEditModal(props.row)">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </v-btn>
                    <v-btn @click="openDeleteModal(props.row.id)">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </v-btn>
                    </v-btn-toggle>
                    <v-dialog
                        v-model="dialog"
                        width="500"
                    >
                    </v-dialog>
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
        name: 'order-component',
        computed: {
            ...mapGetters('order', ['getOrders'])
        },
        methods: {
            ...mapActions('order', ['setOrders']),
        },
        data: function () {
            return {
                columns: [
                    {
                        label: 'Date Placed',
                        field: 'datePlaced',
                    },
                    {
                        label: 'Order Details',
                        field: 'orderDetails:',
                    },
                    // {
                    //     label: 'Name',
                    //     field: 'name',
                    // },
                    {
                        label: 'Order Status',
                        field: 'orderStatusCode',
                    },
                    {
                        label: 'Action',
                        field: 'action',
                    },
                ]
            }
        },
        created() {
            this.setOrders();
        },
    }
</script>

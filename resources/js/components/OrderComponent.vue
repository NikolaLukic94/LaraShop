<template>
    <div>
        <order-modal></order-modal>
        <div class="container">
            <vue-good-table
                :pagination-options="{
                    enabled: true
                }"
                :search-options="{
                    placeholder: 'Search for orders',
                    enabled: true
                }"
                theme="black-rhino"
                styleClass="vgt-table striped"
                :columns="columns"
                :rows="getOrders">
                <template slot="table-row" slot-scope="props">
              <span v-if="props.column.field === 'action'">
                  <span v-if="props.column.field === 'action'">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-info" @click="setInEdit(props.row)">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                        </div>
                  </span>
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
        name: 'order-component',
        computed: {
            ...mapGetters('order', ['getOrders'])
        },
        methods: {
            ...mapActions('order', ['setOrders', 'setInEdit']),
        },
        data: function () {
            return {
                columns: [
                    {
                        label: 'Date Placed',
                        field: 'datePlaced',
                    },
                    {
                        label: 'Sum',
                        field: 'sum',
                    },
                    {
                        label: 'Order Status',
                        field: 'status',
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

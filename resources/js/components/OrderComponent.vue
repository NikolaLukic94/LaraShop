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
        name: 'order-item-status-codes-component',
        computed: {
            ...mapGetters(
                'order',
                [
                    'getOrders'
                ])
        },
        methods: {
            ...mapActions(
                'order',
                [
                    'setOrders',
                ]),              
        },
        data: function () {
            return {
                columns: [
                    {
                      label: 'date_placed',
                      field: 'date_placed',
                    },
                    {
                      label: 'order_details',
                      field: 'order_details',
                    },
                    {
                      label: 'Name',
                      field: 'name',
                    },
                    {
                      label: 'order_status_codes_id',
                      field: 'order_status_codes_id',
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

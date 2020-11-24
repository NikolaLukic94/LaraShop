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
            :rows="getRoles">
            <template slot="table-row" slot-scope="props">
              <span v-if="props.column.field == 'action'">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="btn btn-info" @click="redirectToShow(props.row.id)">
                      <i class="fa fa-eye" aria-hidden="true"></i>
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
        name: 'roles-component',
        computed: {
            ...mapGetters(
                'role',
                [
                    'getRoles'
                ])
        },
        methods: {
            ...mapActions(
                'role',
                [
                    'setRoles',
                ]),
                redirectToShow(rowId) {
                  window.location.href = '/roles/' + rowId;
                }
        },
        data: function () {
            return {
                dialog: false,
                name: '',
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
            this.setRoles();
        },             
    }
</script>

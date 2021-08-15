<template>
    <div>
        <role-modal></role-modal>
        <div class="container">
            <vue-good-table
                :pagination-options="{
              enabled: true
            }"
                theme="black-rhino"
                styleClass="vgt-table striped"
                :columns="columns"
                :rows="getPermissions">
                <template slot="table-row" slot-scope="props">
              <span v-if="props.column.field == 'action'">
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
    import {mapActions, mapGetters} from 'vuex';
    import {VueGoodTable} from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'permissions-component',
        computed: {
            ...mapGetters('permission', ['getPermissions'])
        },
        methods: {
            ...mapActions('permission', ['setPermissions']),
        },
        data: function () {
            return {
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
            this.setPermissions();
        },
    }
</script>

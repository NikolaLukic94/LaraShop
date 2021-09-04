<template>
    <div class="container">
        <br><br><br>
        <div class="row">
            <new-sidebar-component></new-sidebar-component>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-14">
                    <h1 class="h2">Permissions</h1>
                </div>
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
            </main>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
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

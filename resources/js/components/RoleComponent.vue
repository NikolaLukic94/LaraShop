<template>
    <div class="container">
        <br><br><br>
        <div class="row">
            <new-sidebar-component></new-sidebar-component>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-14">
                    <h1 class="h2">Roles</h1>
                </div>
                <role-modal></role-modal>
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
                        <span v-if="props.column.field === 'action'">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button
                                    class="btn btn-info"
                                    @click="setInEdit({'value': props.row})">
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
            </main>
        </div>
    </div>
</template>

<script>
    import RoleModal from "./RoleModal";
    import {mapGetters, mapActions} from 'vuex';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'roles-component',
        components: {RoleModal},
        computed: {
            ...mapGetters('role', ['getRoles'])
        },
        methods: {
            ...mapActions('role', ['setRoles', 'setInEdit']),
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

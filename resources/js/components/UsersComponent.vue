<template>
    <div>
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
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </v-btn>
                </template>

                <v-card>
                    <v-card-title class="headline grey lighten-2">
                        Add new users
                    </v-card-title>
                    <v-container class="grey lighten-5">
                        <div>
                            <v-text-field
                                label="Name"
                                v-model="userName"
                                hide-details="auto"
                                class="mb-3">
                            </v-text-field>
                        </div>
                        <div>
                            <v-text-field
                                label="Email"
                                v-model="userEmail"
                                hide-details="auto"
                                class="mb-3">
                            </v-text-field>
                        </div>
                        <div>
                            <v-text-field
                                label="Password"
                                v-model="userPassword"
                                hide-details="auto"
                                class="mb-3">
                            </v-text-field>
                        </div>
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
                          storeUser({name: userName, email: userEmail, password: userPassword})"
                        >
                            Save
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </div>
        <div class="container">
            <vue-good-table
                :pagination-options="{
              enabled: true
            }"
                theme="black-rhino"
                styleClass="vgt-table striped"
                :columns="columns"
                :rows="getUsers">
                <template slot="table-row" slot-scope="props">
              <span v-if="props.column.field == 'action'">
              <div class="btn-group" role="group" aria-label="Basic example">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <v-btn-toggle
                        v-model="toggle_multiple"
                        dense
                        background-color="primary"
                        dark
                        multiple
                    >
                    <v-btn :href="`/users/${props.row.id}`">
                        <i class="fa fa-eye" aria-hidden="true"></i>
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
                </div>
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
        name: 'users-component',
        computed: {
            ...mapGetters('users', ['getUsers'])
        },
        methods: {
            ...mapActions(
                'users',
                [
                    'setUsers',
                    'deleteUser',
                    'storeUser',
                    'updateUser'
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
                    this.deleteUser(rowId);
                    if (result.value) {

                        Swal.fire(
                            'Deleted!',
                            'Invoice status code has been deleted.',
                            'success'
                        )
                    }
                })
            },
        },
        data: function () {
            return {
                uName: null,
                uEmail: null,
                uPassword: null,

                editDialog: false,
                dialog: false,
                userName: null,
                userEmail: null,
                userPassword: null,
                name: [
                    v => !!v || 'Name is required',
                    v => v.length <= 10 || 'Name must be less than 10 characters',
                ],
                email: [
                    v => !!v || 'Email is required',
                    v => v.length <= 10 || 'Email must be less than 25 characters',
                ],
                password: [
                    v => !!v || 'Password is required',
                    v => v.length > 8 || 'Password must be at least 8 characters',
                ],
                newPaymentMethod: '',
                columns: [
                    {
                        label: 'First name',
                        field: 'firstName',
                    },
                    {
                        label: 'Last Name',
                        field: 'lastName',
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
            this.setUsers();
        },
    }
</script>

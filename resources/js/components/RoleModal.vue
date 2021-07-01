<template>
    <div>
        <v-app id="inspire" style="height:60px;">
            <v-row justify="space-around">
                <v-col cols="auto">
                    <v-dialog
                        transition="dialog-bottom-transition"
                        max-width="600"
                        v-model="dialog"
                    >
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn
                                color="teal text-white"
                                v-bind="attrs"
                                v-on="on"
                            >Add new
                            </v-btn>
                        </template>
                        <template v-slot:default="dialog">
                            <v-card>
                                <v-toolbar
                                    color="teal"
                                    dark
                                >Add new product
                                </v-toolbar>
                                <v-card-text>
                                    <v-row>
                                        <v-col>
                                            <v-text-field
                                                v-model="name"
                                                class="m-auto pb-2"
                                                label="Enter name"
                                                :rules="generalRules"
                                                hide-details="auto"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <p>Permissions:</p>
                                        <v-col>
                                            <div v-for="permission in getPermissions">
                                                <div v-if="permission.id % 2 === 0">
                                                    <v-checkbox
                                                        @click="updateSelectedPermissions(permission.id)"
                                                        :label="permission.name"
                                                    ></v-checkbox>
                                                </div>
                                            </div>
                                        </v-col>
                                        <v-col>
                                            <div v-for="permission in getPermissions">
                                                <div v-if="permission.id % 2 !== 0">
                                                    <v-checkbox
                                                        @click="updateSelectedPermissions(permission.id)"
                                                        :label="permission.name"
                                                    ></v-checkbox>
                                                </div>
                                            </div>
                                        </v-col>
                                    </v-row>
                                </v-card-text>
                                <v-card-actions class="justify-end">
                                    <div v-if="getInEditRoleId === ''">
                                        <v-btn
                                            color="teal text-white"
                                            @click="expand=!expand; callCreateRole(); dialog.value = false;">
                                            Submit
                                        </v-btn>
                                    </div>
                                    <div v-else>
                                        <v-btn
                                            color="teal text-white"
                                            @click="expand=!expand; callUpdateRole(); dialog.value = false;">
                                            Submit
                                        </v-btn>
                                    </div>
                                    <v-btn
                                        text
                                        @click="dialog.value = false"
                                    >Close
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </template>
                    </v-dialog>
                </v-col>
            </v-row>
        </v-app>
    </div>
</template>

<script>
    import 'vue-good-table/dist/vue-good-table.css';
    import {mapGetters, mapActions} from "vuex";

    export default {
        name: 'role-modal',
        computed: {
            ...mapGetters('role', ['getInEditRoleId']),
            ...mapGetters('permission', ['getPermissions']),
        },
        data: function () {
            return {
                selectedPermissions: [],
                dialog: false,
                inEditId: '',
                name: '',
                expand: false,
                generalRules: [
                    r => !!r || 'This field is required',
                    r => r.length > 5 || 'The field must be at least 5 characters',
                ],
            }
        },
        methods: {
            ...mapActions('role', ['createRole', 'setInEdit']),
            callCreateRole() {
                this.createRole(this.name);
                this.name = '';
            },
            callUpdateRole() {
                let updatedRoleData = {
                    id: this.inEditId,
                    name: this.name,
                }

                this.updateRole(updatedRoleData);
                this.setInEdit('');
                this.name = '';
            },
            updateSelectedPermissions(permissionId) {
                this.selectedPermissions = this.selectedPermissions.includes(permissionId)
                    ? this.selectedPermissions.filter(p => p.id !== permissionId)
                    : this.selectedPermissions.push(permissionId);
            }
        },
        watch: {
            getInEditRoleId(val) {
                if (val !== '') {
                    this.inEditId = val.id;
                    this.dialog = true;
                    this.name = val.name;
                } else {
                    this.inEditId = '';
                    this.dialog = false;
                }
            },
        },
    }
</script>

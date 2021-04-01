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
                                @click="inEditId = ''; newType = '', newName = ''"
                            >Add new
                            </v-btn>
                        </template>
                        <template v-slot:default="dialog">
                            <v-card>
                                <v-toolbar
                                    color="teal"
                                    dark
                                >Add new status
                                </v-toolbar>
                                <v-card-text>
                                    <v-row>
                                        <v-col>
                                            <v-text-field
                                                v-model="newName"
                                                class="m-auto pb-2"
                                                label="Enter name"
                                                :rules="nameRules"
                                                hide-details="auto"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col>
                                            <v-text-field
                                                v-model="newType"
                                                class="m-auto pb-2"
                                                label="Enter type"
                                                :rules="typeRules"
                                                hide-details="auto"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-card-text>
                                <v-card-actions class="justify-end">
                                    <div v-if="inEditId !== ''">
                                        <v-btn
                                            color="teal text-white"
                                            @click="expand=!expand; updateStatusCode({id: inEditId, name: newName, type: newType}); dialog.value = false;  newName = ''; newType = '' ">
                                            Update
                                        </v-btn>
                                    </div>
                                    <div v-else>
                                        <v-btn
                                            color="teal text-white"
                                            @click="expand=!expand; createStatusCode({name: newName, type: newType}); dialog.value = false; inEditId = '', newName = ''; newType = '' ">
                                            Add
                                            New
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
    import {mapState, mapGetters, mapActions} from "vuex";

    export default {
        name: 'statuses-component',
        computed: {
            ...mapState('statuses', ['inEditStatusId']),
            ...mapGetters('statuses', ['getInEdit']),
        },
        data: function () {
            return {
                dialog: false,
                inEditId: '',
                newName: '',
                newType: '',
                expand: false,
                nameRules: [
                    r => !!r || 'Name is required',
                    r => r.length <= 30 || 'Name must be less than 30 characters',
                    r => r.length > 5 || 'Name must be less at least 5 characters',
                ],
                typeRules: [
                    r => !!r || 'Type is required',
                    r => r.length <= 30 || 'Type must be less than 30 characters',
                    r => r.length > 5 || 'Type must be less at least 5 characters',
                ],
            }
        },
        methods: {
            ...mapActions('statuses', ['createStatusCode', 'updateStatusCode']),
        },
        watch: {
            getInEdit(val) {
                console.log(val)
                this.inEditId = val.id;
                this.dialog = true;
                this.newName = val.name;
                this.newType = val.type;
            },
        },
    }
</script>

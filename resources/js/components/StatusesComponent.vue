<template>
    <div>
        <v-card
            class="mb-3"
            elevation="2"
        >
            <div>
                <v-container>
                <span v-if="!this.expand" @click="expand=!expand">
                    <v-toolbar-title>Add new</v-toolbar-title>
                </span>
                    <span v-if="this.expand">
                    <v-row>
                        <v-col>
                            <v-text-field
                                v-model="newName"
                                class="m-auto pb-2"
                                label="Enter name"
                                :rules="rules"
                                hide-details="auto"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-btn @click="expand=!expand; sendCreateRequest()">Add New</v-btn>
                    <v-btn class="float-right" @click="expand=!expand;">
                        <v-icon color="green darken-2">mdi-arrow-collapse-vertical</v-icon>
                    </v-btn>
                </span>
                </v-container>
            </div>
        </v-card>
    </div>
</template>

<script>
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        props: [
            'statusName',
            'methodName'
        ],
        name: 'statuses-component',
        data: function () {
            return {
                newName: '',
                expand: false,
                rules: [
                    r => !!r || 'Name is required',
                    r => r.length <= 30 || 'Name must be less than 30 characters',
                    r => r.length > 5 || 'Name must be less at least 5 characters',
                ],
            }
        },
        methods: {
            sendCreateRequest() {
                this.$store.dispatch(
                    this.statusName + '/' + this.methodName, this.newName
                );
            },
        },
    }
</script>

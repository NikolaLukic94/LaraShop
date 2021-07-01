<template>
    <div>
        <v-col
            cols="12"
            sm="4"
        >
            <v-card
                class="text-center"
                outlined
                tile
            >
                <v-dialog
                    v-model="dialog"
                    fullscreen
                    hide-overlay
                    transition="dialog-bottom-transition"
                >
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn @click="showSearch = !showSearch"          color="teal"
                               dark
                               v-bind="attrs"
                               v-on="on">
                            Search
                        </v-btn>
                    </template>
                    <v-card>
                        <v-toolbar dark>
                            <v-btn
                                icon
                                dark
                                @click="dialog = false"
                            >
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                            <v-toolbar-title>Find your next favourite book</v-toolbar-title>
                        </v-toolbar>
                        <div class="m-4 w-50">
                            <v-text-field
                                v-model="input"
                                label="Search here"
                                hide-details="auto"
                            ></v-text-field>
                        </div>
                        <div v-if="this.input.length">
                            <products-table-component :filter="'contains=' + this.input"></products-table-component>
                        </div>
                    </v-card>
                </v-dialog>
            </v-card>
        </v-col>
    </div>
</template>

<script>

    import {mapActions, mapGetters} from 'vuex';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'admin-home',
        data() {
            return {
                input: '',
                dialog: false,
                benched: 0,
            }
        },
        computed: {

        },
        methods: {

        },
    }
</script>

<style scoped>
    .center {
        margin: auto;
        width: 50%;
        padding: 10px;
    }
</style>




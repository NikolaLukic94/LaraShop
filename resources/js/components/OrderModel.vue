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
                        <template v-slot:default="dialog">
                            <v-card>
                                <v-toolbar
                                    color="teal"
                                    dark
                                >Order details
                                </v-toolbar>
                                <v-card-text>
                                    <v-row class="pt-4">
                                        <v-col class="text-left">
                                            Date Placed
                                        </v-col>
                                        <v-col class="text-left">{{ datePlaced }}</v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col class="text-left">
                                            Status
                                        </v-col>
                                        <v-col class="text-left">
                                            {{ orderStatus }}
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col class="text-left">
                                            Details
                                        </v-col>
                                        <v-col class="text-left">
                                            {{ orderDetails }}
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col class="text-left">
                                            Placed by
                                        </v-col>
                                        <v-col class="text-left">
                                            {{ user }}
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col class="text-left">
                                            Invoice details
                                        </v-col>
                                        <v-col class="text-left">
                                            Invoice test
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col class="text-left">
                                            Order Items
                                        </v-col>
                                        <v-col class="text-left">
                                            <v-row>Test</v-row>
                                            <v-row>Test</v-row>
                                            <v-row>Test</v-row>
                                            <v-row>Test</v-row>
                                        </v-col>
                                    </v-row>
                                </v-card-text>
                                <v-card-actions class="justify-end">
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
    import {mapState, mapGetters} from "vuex";

    export default {
        name: 'order-modal',
        computed: {
            ...mapState('order', ['inOrderId']),
            ...mapGetters('order', ['getInEdit']),
        },
        data: function () {
            return {
                dialog: false,
                inEditId: '',
                expand: false,

                orderDetails: null,
                datePlaced: null,
                invoice: [],
                orderItems: [],
                orderStatus: null,
                user: null
            }
        },
        watch: {
            getInEdit(val) {
                if (val !== '') {
                    this.inEditId = val.id;
                    this.dialog = true;

                    this.orderDetails = val.orderDetails;
                    this.createdAt = val.createdAt;
                    this.datePlaced = val.datePlaced;
                    this.invoice = val.relationships.invoice.data;
                    this.orderItems = val.relationships.invoice.orderItems;
                    this.user = val.relationships.invoice.user;
                    this.orderStatus = val.relationships.invoice.orderStatus;
                } else {
                    this.dialog = false;
                }
            },
        },
    }
</script>

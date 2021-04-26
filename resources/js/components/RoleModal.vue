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
                                                v-model="description"
                                                class="m-auto pb-2"
                                                label="Enter description"
                                                :rules="generalRules"
                                                hide-details="auto"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col>
                                            <v-text-field
                                                v-model="otherProductDetails"
                                                class="m-auto pb-2"
                                                label="Enter other product details"
                                                hide-details="auto"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-card-text>
                                <v-card-actions class="justify-end">
                                    <div v-if="inEditId !== ''">
                                        <v-btn
                                            color="teal text-white"
                                            @click="expand=!expand; callUpdateProduct();">
                                            Update
                                        </v-btn>
                                    </div>
                                    <div v-else>
                                        <v-btn
                                            color="teal text-white"
                                            @click="expand=!expand; callCreateProduct(); dialog.value = false;">
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
        name: 'role-modal',
        computed: {
            ...mapState('products', ['inEditProductId']),
            ...mapGetters('products', ['getInEditProductId']),
        },
        data: function () {
            return {
                dialog: false,
                inEditId: '',

                // name: '',
                // author: '',
                // publisher: '',
                // description: '',
                // genre: '',
                // price: '',
                // quantity: '',
                // otherProductDetails: '',

                expand: false,
                generalRules: [
                    r => !!r || 'This field is required',
                    r => r.length <= 30 || 'The field must be less than 30 characters',
                    r => r.length > 5 || 'The field must be at least 5 characters',
                ],
            }
        },
        methods: {
            ...mapActions('products', ['createProduct', 'updateProduct', 'setInEdit']),
            callCreateProduct() {
                let newProductData = {
                    name: this.name,
                    author: this.author,
                    publisher: this.publisher,
                    description: this.description,
                    genre: this.genre,
                    price: this.price,
                    quantity: this.quantity,
                    otherProductDetails: this.otherProductDetails,
                    productTypeId: 1,
                }

                this.createProduct(newProductData);
                this.resetFields();
            },
            callUpdateProduct() {
                let updatedProductData = {
                    id: this.inEditId,
                    name: this.name,
                    author: this.author,
                    publisher: this.publisher,
                    description: this.description,
                    genre: this.genre,
                    price: this.price,
                    quantity: this.quantity,
                    otherProductDetails: this.otherProductDetails,
                    productTypeId: 1,
                }

                this.updateProduct(updatedProductData);
                this.setInEdit('');
                this.resetFields();
            },
            resetFields() {
                // this.name = '';
                // this.author = '';
                // this.publisher = '';
                // this.description = '';
                // this.genre = '';
                // this.price = '';
                // this.quantity = '';
                // this.otherProductDetails = '';
            }
        },
        watch: {
            getInEditProductId(val) {
                if (val !== '') {
                    this.inEditId = val.id;
                    this.dialog = true;

                    // this.name = val.name;
                    // this.author = val.author;
                    // this.publisher = val.publisher;
                    // this.description = val.description;
                    // this.genre = val.genre;
                    // this.price = val.price;
                    // this.quantity = val.quantity;
                    // this.otherProductDetails = val.otherProductDetails;
                } else {
                    this.dialog = false;
                }
            },
        },
    }
</script>

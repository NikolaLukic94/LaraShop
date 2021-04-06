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
                                                hide-details="auto"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col>
                                            <v-text-field
                                                v-model="author"
                                                class="m-auto pb-2"
                                                label="Enter author"
                                                :rules="generalRules"
                                                hide-details="auto"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col>
                                            <v-text-field
                                                v-model="publisher"
                                                class="m-auto pb-2"
                                                label="Enter publisher"
                                                :rules="generalRules"
                                                hide-details="auto"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
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
                                            <v-autocomplete
                                                v-model="genre"
                                                :items="['Realism', 'Sci-fi', 'History']"
                                                label="genre"
                                            ></v-autocomplete>
                                        </v-col>
                                        <v-col>
                                            <v-text-field
                                                v-model="price"
                                                class="m-auto pb-2"
                                                label="Enter price"
                                                :rules="generalRules"
                                                hide-details="auto"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col>
                                            <v-text-field
                                                v-model="quantity"
                                                class="m-auto pb-2"
                                                label="Enter quantity"
                                                hide-details="auto"
                                            ></v-text-field>
                                        </v-col>
                                        <!--                                        <v-col>-->
                                        <!--                                            <v-autocomplete-->
                                        <!--                                                v-model="dimensions"-->
                                        <!--                                                :items="['100x30', '50x50', '80x60']"-->
                                        <!--                                                label="Dimensions"-->
                                        <!--                                            ></v-autocomplete>-->
                                        <!--                                        </v-col>-->
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
        name: 'statuses-component',
        computed: {
            ...mapState('products', ['inEditProductId']),
            ...mapGetters('products', ['getInEditProductId']),
        },
        data: function () {
            return {
                dialog: false,
                inEditId: '',

                name: '',
                author: '',
                publisher: '',
                description: '',
                genre: '',
                price: '',
                quantity: '',
                otherProductDetails: '',

                expand: false,
                // typeRules: [
                //     r => !!r || 'Type is required',
                //     r => r.length <= 30 || 'Type must be less than 30 characters',
                //     r => r.length > 5 || 'Type must be less at least 5 characters',
                // ],
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
                this.resetFields();
                this.name = '';
                this.author = '';
                this.publisher = '';
                this.description = '';
                this.genre = '';
                this.price = '';
                this.quantity = '';
                this.otherProductDetails = '';
            }
        },
        watch: {
            getInEditProductId(val) {
                if (val !== '') {
                    this.inEditId = val.id;
                    this.dialog = true;

                    this.name = val.name;
                    this.author = val.author;
                    this.publisher = val.publisher;
                    this.description = val.description;
                    this.genre = val.genre;
                    this.price = val.price;
                    this.quantity = val.quantity;
                    this.otherProductDetails = val.otherProductDetails;
                } else {
                    this.dialog = false;
                }
            },
        },
    }
</script>

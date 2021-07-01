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
                                >
                                    <div v-if="!inEditId">
                                        Add product
                                    </div>
                                    <div v-else>
                                        Update product
                                    </div>
                                </v-toolbar>
                                <v-card-text>

                                    <v-row>
                                        <v-col>
                                            <v-text-field
                                                v-model="name"
                                                :rules="nameRules"
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
                                                :rules="amountRules"
                                                hide-details="auto"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col>
                                            <v-text-field
                                                v-model="quantity"
                                                class="m-auto pb-2"
                                                label="Enter quantity"
                                                hide-details="auto"
                                                :rules="amountRules"
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

                                <vue2Dropzone
                                    @vdropzone-sending="sendingEvent"
                                    ref="myVueDropzone"
                                    id="dropzone"
                                    :options="dropzoneOptions">
                                </vue2Dropzone>

                                <div v-for="image in getPhotosOfProductInEdit.data">
                                    <img :src="image.imagePath" alt="Book" class="image">
                                </div>

                                <v-card-actions class="justify-end">
                                    <div v-if="inEditId !== ''">
                                        <v-btn
                                            color="teal text-white"
                                            @click="expand=!expand; callUpdateProduct();">
                                            Submit
                                        </v-btn>
                                    </div>
                                    <div v-else>
                                        <v-btn
                                            color="teal text-white"
                                            @click="expand=!expand; callCreateProduct();">
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
    import {mapState, mapGetters, mapActions} from "vuex";

    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        name: 'statuses-component',
        computed: {
            ...mapState('products', ['inEditProductId', 'photosOfProductInEdit']),
            ...mapGetters('products', ['getInEditProductId', 'getPhotosOfProductInEdit']),
        },
        components: {
            vue2Dropzone
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

                nameRules: [
                    r => !!r || 'This field is required',
                ],
                amountRules: [
                    r => !!r || 'This field is required',
                ],
                generalRules: [
                    r => !!r || 'This field is required',
                    r => r.length <= 30 || 'The field must be less than 30 characters',
                    r => r.length > 5 || 'The field must be at least 2 characters',
                ],

                dropzoneOptions: {
                    url: '/api/product-images',
                    thumbnailWidth: 150,
                    maxFilesize: 2,
                    headers: {
                        "Authorization": 'Bearer ' + document.head.querySelector('meta[name="auth-token"]').getAttribute('content')
                    }
                }
            }
        },
        methods: {
            ...mapActions('products', ['createProduct', 'updateProduct', 'setInEdit']),
            getProductDataObject() {
               return {
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
            },
            callCreateProduct() {
                this.resetFields();

                let newProductData = this.getProductDataObject()

                this.createProduct(newProductData);

                this.dialog = false;
            },
            callUpdateProduct() {
                let updatedProductData = this.getProductDataObject()

                updatedProductData.id = this.inEditId;

                this.updateProduct(updatedProductData);

                this.dialog = false;
            },
            resetFields() {
                this.name = '';
                this.author = '';
                this.publisher = '';
                this.description = '';
                this.genre = '';
                this.price = '';
                this.quantity = '';
                this.otherProductDetails = '';
            },
            sendingEvent(file, xhr, formData) {
                formData.append("productId", this.inEditId);
            },
        },
        watch: {
            getInEditProductId(val) {
                if (val !== '') {
                    this.resetFields();

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

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0
    }

    .container {
        position: relative;
        width: 14%;
    }

    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .container:hover .image {
        opacity: 0.3;
    }

    .container:hover .middle {
        opacity: 1;
    }

    .text {
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
        padding: 16px 32px;
    }

    .hover-buttons {
        background-color: green;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 20px;
        padding-right: 20px;
        margin-top: 15px;
    }
</style>

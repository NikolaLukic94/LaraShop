<template>
    <div>
        <v-app style="height: 50px;">
            <v-row justify="center">
                <v-dialog
                    v-model="dialog"
                    persistent
                    max-width="600px"
                >
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn
                            dark
                            v-bind="attrs"
                            v-on="on"
                        >
                            <v-icon>mdi-plus</v-icon>
                        </v-btn>
                    </template>
                    <v-card>
                        <v-card-title>
                            <span class="headline">Add new product</span>
                        </v-card-title>
                        <v-card-text>
                            <v-container>
                                <v-row>
                                    <v-col
                                        cols="12"
                                        sm="6"
                                        md="4"
                                    >
                                        <v-text-field
                                            v-model="name"
                                            label="Name"
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        sm="6"
                                        md="4"
                                    >
                                        <v-text-field
                                            v-model="author"
                                            label="Author"
                                            hint="has to be unique"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        sm="6"
                                        md="4"
                                    >
                                        <v-text-field
                                            v-model="publisher"
                                            label="Publisher"
                                            hint="example of persistent helper text"
                                            persistent-hint
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field
                                            v-model="description"
                                            label="description"
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field
                                            v-model="other"
                                            label="other"
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        sm="6"
                                        md="6"
                                    >
                                        <v-text-field
                                            v-model="price"
                                            label="price"
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        sm="6"
                                        md="6"
                                    >
                                        <v-text-field
                                            v-model="quantity"
                                            label="quantity"
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        sm="6"
                                        md="6"
                                    >
                                        <v-text-field
                                            v-model="color"
                                            label="color"
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        sm="6"
                                    >
                                        <v-autocomplete
                                            v-model="genre"
                                            :items="['Realism', 'Sci-fi', 'History']"
                                            label="genre"
                                            multiple
                                        ></v-autocomplete>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        sm="6"
                                    >
                                        <v-autocomplete
                                            v-model="size"
                                            :items="['100x30', '50x50', '80x60']"
                                            label="size"
                                            multiple
                                        ></v-autocomplete>
                                    </v-col>
                                </v-row>
                            </v-container>
                            <small>*indicates required field</small>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="teal"
                                text
                                @click="dialog = false"
                            >
                                Close
                            </v-btn>
                            <span v-if="this.editId">
                <v-btn
                    color="teal"
                    text
                    @click="dialog = false; sendUpdateProductRequest()"
                >
                  Update
                </v-btn>
              </span>
                            <span v-else>
                <v-btn
                    color="teal"
                    text
                    @click="dialog = false; sendCreateProductRequest()"
                >
                  Save
                </v-btn>
              </span>

                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-row>
        </v-app>
        <div class="container">
            <vue-good-table
                :pagination-options="{
              enabled: true
            }"
                theme="black-rhino"
                styleClass="vgt-table striped"
                :columns="columns"
                :rows="getProducts">
                <template slot="table-row" slot-scope="props">
              <span v-if="props.column.field == 'action'">
                <div class="btn-group" role="group">
                    <v-btn-toggle
                        v-model="toggle_multiple"
                        dense
                        background-color="primary"
                        dark
                        multiple
                    >
                    <v-btn @click="openEditModal(props.row)">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
        name: 'products-component',
        computed: {
            ...mapGetters('products', ['getProducts'])
        },
        methods: {
            ...mapActions('products', ['setProducts', 'createProduct', 'deleteProduct', 'updateProduct']),
            sendCreateProductRequest() {

                let payload = {};

                payload.id = this.editId;
                payload.productTypeId = 1;
                payload.name = this.name;
                payload.author = this.author;
                payload.publisher = this.publisher;
                payload.description = this.description;
                payload.price = this.price;
                payload.quantity = this.quantity;
                payload.color = this.color;
                payload.size = this.size;
                payload.other = this.other;

                this.name = '';
                this.author = '',
                    this.publisher = '',
                    this.genre = '',
                    this.description = '';
                this.price = '';
                this.quantity = '';
                this.color = '';
                this.size = '';
                this.other = '';
                this.editId = '';

                this.createProduct(payload);
            },
            openDeleteModal(id) {
                this.$swal.fire({
                    title: 'Are you sure?',
                    text: "This will delete it permanently!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    this.deleteProduct(id);
                    if (result.value) {

                        Swal.fire(
                            'Deleted!',
                            'Product status code has been deleted.',
                            'success'
                        )
                    }
                })
            },
            openEditModal(theRow) {
                this.editId = theRow.id;
                this.name = theRow.name;
                this.author = theRow.author;
                this.publisher = theRow.publisher;
                this.description = theRow.description;
                this.price = theRow.price;
                this.quantity = theRow.quantity;
                this.color = theRow.color;
                this.size = theRow.size;
                this.genre = theRow.genre;
                this.other = theRow.other;


            },
            sendUpdateProductRequest() {
                let payload = {};

                payload.id = this.editId;
                payload.productTypeId = 1;
                payload.name = this.name;
                payload.author = this.author;
                payload.publisher = this.publisher;
                payload.description = this.description;
                payload.price = this.price;
                payload.quantity = this.quantity;
                payload.color = this.color;
                payload.size = this.size;
                payload.other = this.other;

                this.name = '';
                this.author = '',
                    this.publisher = '',
                    this.genre = '',
                    this.description = '';
                this.price = '';
                this.quantity = '';
                this.color = '';
                this.size = '';
                this.other = '';
                this.editId = '';

                this.updateProduct(payload);
            }
        },
        data: function () {
            return {
                editId: '',
                name: '',
                author: '',
                publisher: '',
                description: '',
                price: '',
                quantity: '',
                color: '',
                size: '',
                genre: '',
                other: '',

                dialog: false,

                columns: [
                    {
                        label: 'Name',
                        field: 'name',
                    },
                    {
                        label: 'Description',
                        field: 'description',
                    },
                    {
                        label: 'Price',
                        field: 'price',
                    },
                    {
                        label: 'Color',
                        field: 'color',
                    },
                    {
                        label: 'Quantity',
                        field: 'quantity',
                    },
                    {
                        label: 'Size',
                        field: 'size',
                    },
                    {
                        label: 'Other',
                        field: 'otherProductDetails',
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
            this.setProducts();
        },
    }
</script>

<style>

    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .avatar-uploader .el-upload:hover {
        border-color: #409EFF;
    }

    .avatar-uploader-icon {
        font-size: 28px;
        color: #8c939d;
        width: 178px;
        height: 178px;
        line-height: 178px;
        text-align: center;
    }

    .avatar {
        width: 178px;
        height: 178;
        display: block;
    }

</style>

<template>
    <div>
        <product-modal></product-modal>
        <div class="container">
            <vue-good-table
                :pagination-options="{
                  enabled: true
                }"
                :search-options="{
                    placeholder: 'Search for products',
                    enabled: true
                }"
                theme="black-rhino"
                styleClass="vgt-table striped"
                :columns="columns"
                :rows="getProducts">
                <template slot="table-row" slot-scope="props">
                <span v-if="props.column.field === 'action'">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-info" @click="openDeleteModal(props.row.id)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-info"
                                @click="setInEdit(props.row)">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                    </div>
                </span>
                    <span v-else>{{props.formattedRow[props.column.field]}}</span>
                </template>
            </vue-good-table>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'products-component',
        computed: {
            ...mapGetters('products', ['getProducts'])
        },
        methods: {
            ...mapActions('products',
                [
                    'setProducts',
                    'createProduct',
                    'deleteProduct',
                    'updateProduct',
                    'setInEdit'
                ]
            ),
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
                    if (result.value) {
                        this.deleteProduct(id);

                        Swal.fire(
                            'Deleted!',
                            'Product status code has been deleted.',
                            'success'
                        )
                    }
                })
            },
        },
        data: function () {
            return {
                editId: '',
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

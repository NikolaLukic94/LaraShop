<template>
    <div>
        <template>
            <v-row justify="center">
                <v-dialog
                    v-model="dialog"
                    persistent
                    max-width="630px"
                >
                    <template v-slot:activator="{ on, attrs }">
                        <v-icon color="teal" v-bind="attrs" v-on="on">
                            mdi-search-web
                        </v-icon>
                    </template>
                    <v-card style="height: 500px;">
                        <v-card-text>
                            <br>
                            <br>
                            <v-responsive
                                max-width="400"
                                class="mx-auto"
                            >
                                <v-text-field
                                    v-if="!this.input.length"
                                    label="Search..."
                                    hide-details="auto"
                                    @input="autoComplete()"
                                    v-model="input"
                                    color="success"
                                ></v-text-field>
                                <v-text-field
                                    v-else
                                    label="Search..."
                                    hide-details="auto"
                                    @input="autoComplete()"
                                    v-model="input"
                                    color="success"
                                    loading
                                ></v-text-field>
                                <br>
                            </v-responsive>
                            <div
                                elevation="16"
                                max-width="400"
                                class="mx-auto"
                            >
                                <v-virtual-scroll
                                    v-show="this.dialog && getSearchResults"
                                    :bench="benched"
                                    :items="getSearchResults"
                                    height="300"
                                    item-height="64"
                                >
                                    <template v-slot:default="{ item }">
                                        <v-list-item :key="item.id">

                                            <v-list-item-content>
                                                <v-list-item-title>
                                                    {{ item.name }}
                                                </v-list-item-title>
                                            </v-list-item-content>

                                            <v-list-item-action>
                                                <v-btn title="Add to cart"
                                                       @click="callStoreCartItem(item.id)"
                                                       depressed
                                                       small
                                                       color="teal"
                                                       class="mb-1"
                                                       style="background-color: #009688; color: #fff; text-decoration:
                                                    none;"
                                                >
                                                    <v-icon
                                                        color="white"
                                                        right
                                                        class="text-center p-1 m-1"
                                                    >
                                                        mdi-cart-plus
                                                    </v-icon>
                                                </v-btn>

                                            </v-list-item-action>
                                        </v-list-item>
                                    </template>
                                </v-virtual-scroll>
                                <v-card-actions class="center text-center">
                                    <v-col>
                                        <v-btn
                                            color="blue darken-1"
                                            text
                                            @click="dialog = false"
                                        >
                                            Close
                                        </v-btn>
                                    </v-col>
                                </v-card-actions>
                            </div>
                        </v-card-text>
                    </v-card>
                </v-dialog>
            </v-row>
        </template>
    </div>
</template>

<script>

    import {mapActions, mapGetters} from 'vuex';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'autocomplete',
        data() {
            return {
                input: '',
                dialog: false,
                benched: 0,
            }
        },
        computed: {
            ...mapGetters('products', ['getSearchResults'])
        },
        methods: {
            ...mapActions('cartItem', ['storeCartItem']),
            ...mapActions('products', ['searchProduct']),
            autoComplete() {
                if (this.input.length > 2) {
                    this.searchProduct(this.input);
                }
            },
            callStoreCartItem(productId) {
                this.storeCartItem(productId);
            },
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




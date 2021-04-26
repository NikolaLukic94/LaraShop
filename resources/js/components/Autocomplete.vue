<template>
    <div>
<!--        <template>-->
<!--            <v-row justify="center">-->
<!--                <v-dialog-->
<!--                    v-model="dialog"-->
<!--                    persistent-->
<!--                    max-width="630px"-->
<!--                >-->
<!--                    <template v-slot:activator="{ on, attrs }">-->
<!--                        <v-icon color="teal" v-bind="attrs" v-on="on">-->
<!--                            mdi-search-web-->
<!--                        </v-icon>-->
<!--                    </template>-->
<!--                    <v-card style="height: 500px;">-->
<!--                        <v-card-text>-->
<!--                            <br>-->
<!--                            <br>-->
<!--                            <v-responsive-->
<!--                                max-width="400"-->
<!--                                class="mx-auto"-->
<!--                            >-->
<!--                                <v-text-field-->
<!--                                    v-if="!this.input.length"-->
<!--                                    label="Search..."-->
<!--                                    hide-details="auto"-->
<!--                                    @input="autoComplete()"-->
<!--                                    v-model="input"-->
<!--                                    color="success"-->
<!--                                ></v-text-field>-->
<!--                                <v-text-field-->
<!--                                    v-else-->
<!--                                    label="Search..."-->
<!--                                    hide-details="auto"-->
<!--                                    @input="autoComplete()"-->
<!--                                    v-model="input"-->
<!--                                    color="success"-->
<!--                                    loading-->
<!--                                ></v-text-field>-->
<!--                                <br>-->
<!--                            </v-responsive>-->
<!--                            <div-->
<!--                                elevation="16"-->
<!--                                max-width="400"-->
<!--                                class="mx-auto"-->
<!--                            >-->
<!--                                <v-virtual-scroll-->
<!--                                    v-show="this.dialog && getSearchResults"-->
<!--                                    :bench="benched"-->
<!--                                    :items="getSearchResults"-->
<!--                                    height="300"-->
<!--                                    item-height="64"-->
<!--                                >-->
<!--                                    <template v-slot:default="{ item }">-->
<!--                                        <v-list-item :key="item.id">-->

<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>-->
<!--                                                    {{ item.name }}-->
<!--                                                </v-list-item-title>-->
<!--                                            </v-list-item-content>-->

<!--                                            <v-list-item-action>-->
<!--                                                <v-btn title="Add to cart"-->
<!--                                                       @click="callStoreCartItem(item.id)"-->
<!--                                                       depressed-->
<!--                                                       small-->
<!--                                                       color="teal"-->
<!--                                                       class="mb-1"-->
<!--                                                       style="background-color: #009688; color: #fff; text-decoration:-->
<!--                                                    none;"-->
<!--                                                >-->
<!--                                                    <v-icon-->
<!--                                                        color="white"-->
<!--                                                        right-->
<!--                                                        class="text-center p-1 m-1"-->
<!--                                                    >-->
<!--                                                        mdi-cart-plus-->
<!--                                                    </v-icon>-->
<!--                                                </v-btn>-->

<!--                                            </v-list-item-action>-->
<!--                                        </v-list-item>-->
<!--                                    </template>-->
<!--                                </v-virtual-scroll>-->
<!--                                <v-card-actions class="center text-center">-->
<!--                                    <v-col>-->
<!--                                        <v-btn-->
<!--                                            color="blue darken-1"-->
<!--                                            text-->
<!--                                            @click="dialog = false"-->
<!--                                        >-->
<!--                                            Close-->
<!--                                        </v-btn>-->
<!--                                    </v-col>-->
<!--                                </v-card-actions>-->
<!--                            </div>-->
<!--                        </v-card-text>-->
<!--                    </v-card>-->
<!--                </v-dialog>-->
<!--            </v-row>-->
<!--        </template>-->
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
                        <v-btn
                            v-bind="attrs" v-on="on"
                            class="ma-2"
                            large
                            fab
                            color="teal"
                        >
                            <v-icon color="white">mdi-search-web</v-icon>
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
<!--                        <v-list-->
<!--                            three-line-->
<!--                            subheader-->
<!--                        >-->
<!--                            <v-subheader>User Controls</v-subheader>-->
<!--                            <v-list-item>-->
<!--                                <v-list-item-content>-->
<!--                                    <v-list-item-title>Always place orders from a secure connection-->
<!--                                    </v-list-item-title>-->
<!--                                    <v-list-item-subtitle>If your computer isn’t protected from potentially-->
<!--                                        malicious software, your financial information and passwords are at-->
<!--                                        risk from being stolen (and everything else you store on your-->
<!--                                        computer or do online). This concept is so basic, yet only a-->
<!--                                        fraction of the U.S. population adequately protects their computers.-->
<!--                                        Use a secure connection – make sure your computer’s firewall is on.-->
<!--                                    </v-list-item-subtitle>-->
<!--                                </v-list-item-content>-->
<!--                            </v-list-item>-->
<!--                            <v-list-item>-->
<!--                                <v-list-item-content>-->
<!--                                    <v-list-item-title>Coupon codes</v-list-item-title>-->
<!--                                    <v-list-item-subtitle>If you are buying a Gift Card, read the Terms and-->
<!--                                        Conditions.-->
<!--                                    </v-list-item-subtitle>-->
<!--                                </v-list-item-content>-->
<!--                            </v-list-item>-->
<!--                        </v-list>-->
<!--                        <v-divider></v-divider>-->
<!--                        <v-list-->
<!--                            three-line-->
<!--                            subheader-->
<!--                        >-->
<!--                            <v-subheader>General</v-subheader>-->
<!--                            <v-list-item>-->
<!--                                <v-list-item-content>-->
<!--                                    <v-list-item-title>Is the site secure?</v-list-item-title>-->
<!--                                    <v-list-item-subtitle>Before entering any personal or credit card info-->
<!--                                        onto a shopping site look to see if the web address on the page-->
<!--                                        begins with "https:", not "http:" That little ’s’ tells you the-->
<!--                                        website is secure and encrypted to protect your information.-->
<!--                                    </v-list-item-subtitle>-->
<!--                                </v-list-item-content>-->
<!--                            </v-list-item>-->
<!--                        </v-list>-->
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




<template>
    <div>
        <v-container>
            <v-card
                class="mx-auto mt-3"
                max-width="600"
                outlined
            >
                <v-container v-for="cartItem in getCartItems" :key="cartItem.id">
                    <v-row dense>
                        <v-card
                            class="card-outter"
                            color="#385F73"
                            dark
                        >
                            <v-row>
                                <v-col cols="4">
                                    <v-img src="https://picsum.photos/510/300?random" class="ml-3" aspect-ratio="1.7"
                                        height="230px"></v-img>
                                </v-col>
                                <v-col cols="8">
                                    <v-card-title class="headline">
                                        {{ cartItem.relationships.product.data.name }}
                                    </v-card-title>

                                    <v-card-subtitle>Listen to your favorite artists and albums whenever and wherever,
                                        online and offline.
                                    </v-card-subtitle>

                                    <v-card-subtitle>
                                        <v-row>
                                            Cover color:
                                            {{ cartItem.relationships.product.data.color }}
                                        </v-row>
                                        <v-row>
                                            Dimensions:
                                            {{ cartItem.relationships.product.data.size }}
                                        </v-row>
                                        <v-row>
                                            Paperback/digital:
                                            {{ cartItem.relationships.product.data.relationships.productType.data.name}}
                                        </v-row>
                                    </v-card-subtitle>

                                    <v-card-actions class="card-actions">
                                        <v-btn text>
                                            <i class="fa fa-plus-circle pr-3" aria-hidden="true"
                                            @click="changeQuantity({id:cartItem.id, value: 'increase'})">
                                            </i>
                                        </v-btn>

                                        <input type="text" :value="cartItem.quantity"
                                            style="width:25px; color: white"
                                            @input="changeQuantity({id:cartItem.id, value: this.quantity})">

                                        <v-btn text>
                                            <i class="fa fa-minus-circle pr-3" aria-hidden="true"
                                            @click="changeQuantity({id: cartItem.id, value: 'decrease'})">
                                            </i>
                                        </v-btn>

                                        ${{ cartItem.quantity * cartItem.relationships.product.data.price }}

                                        <v-btn text><i class="fa fa-remove"
                                                    @click="deleteCartItem(cartItem.id)"></i>
                                        </v-btn>
                                    </v-card-actions>
                                </v-col>
                            </v-row>
                        </v-card>
                    </v-row>
                </v-container>
                <v-container>
                    <v-row no-gutters>
                        <v-col>
                            <v-btn :href="'/products/search'" style="width: 100%">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>Add more items
                            </v-btn>
                        </v-col>
                        <v-col align="center">
                            <b>Total: $ {{ this.getTotalPremium }}</b>
                        </v-col>
                        <v-col>
                            <v-btn :href="'/checkout'" class="pull-right" style="width: 100%">
                                Checkout
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card>
        </v-container>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';

    export default {
        name: 'cart-items',
        computed: {
            ...mapGetters(
                'cartItem', 
                [
                    'getCartItems',
                    'getTotalPremium'
                ]
            )
        },
        methods: {
            ...mapActions(
                'cartItem',
                [
                    'setCartItems',
                    'increaseQuantity',
                    'decreaseQuantity',
                    'changeQuantity',
                    'deleteCartItem',
                ]
            ),
        },
        data: function () {
            return {
                quantity: ''
            }
        },
        created() {
            this.setCartItems();
            this.getTotalPremium;
        },
    }
</script>

<style>
    .card-outter {
        position: relative;
    }

    .card-actions {
        position: absolute;
        bottom: 0;
    }
</style>

<template>
    <div>
        <v-container>
            <v-card
                class="mx-auto mt-3"
                max-width="600"
                outlined
            >
                <v-container v-for="cartItem in getOrderItems">
                    <v-row dense>
                        <v-card
                            class="card-outter"
                            color="#385F73"
                            dark
                        >
                            <v-row>
                                <v-col cols="4">
                                    <v-img
                                        class="ml-2"
                                        height="230"
                                        v-bind:src="cartItem.relationships.product.data.relationships.images.data[0].imagePath"
                                    ></v-img>
                                </v-col>
                                <v-col cols="8">
                                    <v-card-title class="headline">
                                        {{ cartItem.relationships.product.data.name }}
                                    </v-card-title>

                                    <v-card-subtitle>
                                        {{ cartItem.relationships.product.data.otherProductDetails.substring(0, 200)+".." }}
                                    </v-card-subtitle>

                                    <v-card-actions class="card-actions mt-3">
                                        <v-btn text>
                                            <i class="fa fa-plus-circle pr-3" aria-hidden="true"
                                               @click="updateOrderItem({item:cartItem, value: 'increase'})">
                                            </i>
                                        </v-btn>

                                        <input type="text" :value="cartItem.quantity"
                                               style="width:25px; color: white"
                                               @input="updateOrderItem({item:cartItem, value: this.quantity})">

                                        <v-btn text>
                                            <i class="fa fa-minus-circle pr-3" aria-hidden="true"
                                               @click="updateOrderItem({item: cartItem, value: 'decrease'})">
                                            </i>
                                        </v-btn>


                                        <v-btn text><i class="fa fa-remove"
                                                       @click="deleteOrderItem(cartItem.id)"></i>
                                        </v-btn>
                                    </v-card-actions>
                                </v-col>
                            </v-row>
                        </v-card>
                    </v-row>
                </v-container>
            </v-card>
        </v-container>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: 'cart-items',
        computed: {
            ...mapGetters(
                'orderItem', ['getOrderItems']
            )
        },
        methods: {
            ...mapActions(
                'orderItem',
                [
                    'setOrderItems',
                    'updateOrderItem',
                    'deleteOrderItem',
                ]
            ),
        },
        data: function () {
            return {
                quantity: ''
            }
        },
        created() {
            this.setOrderItems();
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

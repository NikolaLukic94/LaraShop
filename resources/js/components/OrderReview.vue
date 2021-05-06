<template>
    <v-app style="display: 0;">
        <v-card
            class="mx-auto ma-0"
            outlined
        >
            <v-card-title class="justify-center">
                <v-avatar color="indigo" size="38">
                    <span class="white--text headline">1</span>
                </v-avatar>
            </v-card-title>
            <v-list-item three-line class="text-center">
                <v-list-item-content>
                    <div class="overline mb-4">
                        <h5>
                            <b>Your order</b>
                        </h5>
                        <span><i>summary</i></span>
                    </div>
                    <v-list-item-title class="headline mb-1">Headline 5</v-list-item-title>
                    <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
            <v-container class="grey lighten-5">
                <v-row
                    no-gutters
                    align="center"
                    justify="center"
                >
                    <v-col></v-col>
                    <v-col>
                        <b>Name</b>
                    </v-col>
                    <v-col>
                        <b>Sum</b>
                    </v-col>
                </v-row>
                <span v-if="getOrderItems.length > 0">
                    <v-row
                        no-gutters
                        v-for="cartItem in getOrderItems"
                        :key="cartItem.id"
                        align="center"
                        justify="center"
                    >
                        <v-col>
                            <img src="/img/logo.jpg" width="130" height="110" class="pt-3 pb-3" alt="Image"/>
                        </v-col>
                        <v-col>
                            {{ cartItem.quantity }} x
                            {{ cartItem.relationships.product.data.name }}
                        </v-col>
                        <v-col>
                            ${{ cartItem.quantity * cartItem.relationships.product.data.price }}
                        </v-col>
                    </v-row>
                </span>
            </v-container>
        </v-card>
    </v-app>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'order-review',
        data: function () {
            return {
                total: 11,
                hasPaperback: false,
            }
        },
        computed: {
            ...mapGetters('orderItem', ['getOrderItems'])
        },
        methods: {
            ...mapActions('orderItem', ['setOrderItems']),
        },
        created() {
            this.setOrderItems();
        },
    }
</script>

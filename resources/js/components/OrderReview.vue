<template>
    <v-app>
        <v-card
            class="mx-auto"
            max-width="570"
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
                        <span>Change</span>
                    </div>
                    <v-list-item-title class="headline mb-1">Headline 5</v-list-item-title>
                    <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
            <v-container class="grey lighten-5">
                <v-row no-gutters v-for="cartItem in getOrders" :key="cartItem.id" align="center" justify="center"
                       v-if="getOrders.length > 0">
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
<!--                    <v-col>-->
<!--                        <i class="fa fa-remove" @click="deleteCartItem(cartItem.id)"></i>-->
<!--                        <i class="fa fa-heart" aria-hidden="true"></i>-->
<!--                    </v-col>-->
                </v-row>
            </v-container>
        </v-card>
        <!--        <div class="container">-->
        <!--            <div class="card">-->
        <!--                <div class="container">-->
        <!--                    <div class="row" v-for="cartItem in getOrders">-->
        <!--                        <div class="col-sm">-->
        <!--                            <img src="/img/logo.jpg" width="185" height="150" alt="Image"/>-->
        <!--                        </div>-->
        <!--                        <div class="col-sm align-self-center">-->
        <!--                            <p>Title of the book</p>-->
        <!--                            <p>Author</p>-->
        <!--                        </div>-->
        <!--                        <div class="col-sm align-self-center">-->
        <!--                            ${{ cartItem.relationships.product.data.price }}-->
        <!--                        </div>-->
        <!--                        <div class="col-sm align-self-center">-->
        <!--                            {{ cartItem.quantity }}-->
        <!--                        </div>-->
        <!--                        <div class="col-sm align-self-center">-->
        <!--                            ${{ cartItem.quantity * cartItem.relationships.product.data.price }}-->
        <!--                        </div>-->
        <!--                        <div class="col-sm align-self-center">-->
        <!--                            <i class="fa fa-remove" @click="deleteCartItem(cartItem.id)"></i>-->
        <!--                            <i class="fa fa-heart" aria-hidden="true"></i>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    </v-app>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';
    import {VueGoodTable} from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'order-review',
        computed: {
            ...mapGetters(
                'orderReview',
                [
                    'getOrders'
                ])
        },
        methods: {
            ...mapActions(
                'orderReview',
                [
                    'setOrders',
                ]),
        },
        created() {
            this.setOrders();
        },
    }
</script>

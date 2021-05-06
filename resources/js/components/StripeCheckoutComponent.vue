<template>
    <div style="padding-top: 0; margin-top: 0;">
        <div v-if="this.loading === true">
            <vue-loader></vue-loader>
        </div>
        <v-card
            class="mx-auto mb-2"
            outlined
            max-width="570"
        >
            <v-card-title class="justify-center">
                <v-avatar color="indigo" size="38">
                    <span class="white--text headline">3</span>
                </v-avatar>
            </v-card-title>
            <v-list-item three-line class="text-center">
                <v-list-item-content>
                    <div class="overline mb-4">
                        <h5>
                            <b>Payment Details</b>
                        </h5>
                    </div>
                </v-list-item-content>
            </v-list-item>
            <v-container>
                <stripe-elements
                    style="border-bottom: 1px solid black"
                    ref="elementsRef"
                    :pk="publishableKey"
                    :amount="amount"
                    locale="de"
                    @token="tokenCreated"
                    @loading="loading = $event"
                >
                </stripe-elements>
                <button class="btn btn-info mt-1" @click="submit">Make a purchase / Pay
                </button>
            </v-container>
        </v-card>
    </div>
</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';
    import {StripeElements} from 'vue-stripe-checkout';

    export default {
        components: {
            StripeElements
        },
        computed: {
            ...mapGetters('orderReview', ['getOrders']),
            ...mapGetters('orderItem'),
        },
        data: () => ({
            loading: false,
            amount: 0,
            publishableKey: null,
            token: null,
            charge: null
        }),
        methods: {
            ...mapActions('orderItem', ['setOrderItems']),
            submit() {
                this.loading = true;
                this.$refs.elementsRef.submit();
            },
            tokenCreated(token) {
                this.token = token;

                this.charge = {
                    source: token.id,
                    amount: this.amount,
                    description: this.description
                }
                this.sendTokenToServer(this.charge);
            },
            sendTokenToServer(charge) {
                this.loading = true;

                return axios.post('/stripe-payment', {
                    amount: charge.amount,
                    stripeToken: charge.source,
                    description: charge.description
                })
                    .then((response) => {

                        this.loading = true;

                        toast.fire({
                            icon: 'success',
                            type: 'success',
                            title: 'Successful purchase! Please check your inbox!'
                        })

                        window.location.href = 'http://larashop.abc/';
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
        },
        created() {
            this.setOrderItems();

            this.publishableKey = document.querySelector('meta[name="stripe_key"]').content;
        }
    }
</script>

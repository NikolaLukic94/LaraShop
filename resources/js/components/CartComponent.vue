<template>
    <div>
        <v-btn
            w-100
            :loading="loading3"
            :disabled="loading3"
            color="blue-grey"
            class="ma-2 white--text"
            @click="loader = 'loading3'"
        >
            <div>
                {{ getOrderItems.length }}
                <v-icon
                    right
                    dark
                >
                    fa fa-shopping-bag
                </v-icon>
            </div>
        </v-btn>

<!--        <p class="p-1 mb-0" id="elements">-->
<!--            <a class="text-center">-->
<!--                {{ getOrderItems.length }}<i class="fa fa-shopping-bag pl-1" aria-hidden="true"></i>-->
<!--            </a>-->
<!--        </p>-->
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'cart-component',
        computed: {
            ...mapGetters('orderItem', ['getOrderItems'])
        },
        methods: {
            ...mapActions(
                'orderItem', ['setOrderItems']),
        },
        created() {
            this.setOrderItems();
        },
    }
</script>

<style>

    #cart-component:hover {
        background-color: #008080;
    }

    #cart-component:hover * {
        color: white;
        text-decoration: none;

    }

    #cart-component * {
        color: black;
        text-decoration: none;
    }

    #cart-component {
        display: inline-block;
        float: right;
        border: 2px solid #73AD21;
        width: 55px;
        text-align: center;
        border-radius: 35px;
        margin-right: 20px;
    }

</style>

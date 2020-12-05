<template>
    <div>
        <products-table-component :filter="'none'" @clicked="onClickChild"></products-table-component>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';

    export default {
        name: 'cart-items',
        methods: {
            onClickChild (value) {
                console.log(value)
            }
        },
        data: function () {
            return {
                showSingleProduct: false,
                showProducts: true,
            }
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

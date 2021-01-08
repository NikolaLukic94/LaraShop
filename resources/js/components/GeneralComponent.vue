<template>
    <div>
        <products-table-component :filter="'none'" @clicked="onClickChild"></products-table-component>
    </div>
</template>

<script>
    export default {
        name: 'cart-items',
        methods: {
            onClickChild(value) {
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

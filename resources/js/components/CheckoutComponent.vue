<template>
    <div class="container">
        <order-review></order-review>
        <user-addresses></user-addresses>
        <stripe-checkout-component></stripe-checkout-component>   
    </div>
</template>

<script>
    import {mapGetters, mapActions, mapState} from 'vuex';

    export default {
        name: 'checkout-component',
    }
</script>

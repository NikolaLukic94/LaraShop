<template>
  <div class="container">
    <p><i>Step 3 of 3</i></p>
    <h3><b>Order review</b></h3>
    <div class="card">
        <p>Review</p>
    </div>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'order-review',
        computed: {
            ...mapGetters(
                'orderReview',
                [
                    'getOrderReview'
                ])
        },
        methods: {
            ...mapActions(
                'orderReview',
                [
                    'setOrderReview',
                ]),
        },
        created() {
            this.setOrderReview();
        },             
    }
</script>

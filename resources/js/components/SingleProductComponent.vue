<template>
  <div>
    <div class="container">
        <p>Single product</p>
    </div>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'product-types-component',
        computed: {
            ...mapGetters(
                'productTypes',
                [
                    'getProductTypes'
                ])
        },
        methods: {
            ...mapActions(
                'productTypes',
                [
                    'setProductTypes',
                    'createProductType',
                    'deleteProductType',
                    'updateProductType'
                ]),
        },
        data: function () {
            return {
                
            }
        },
        created() {
            this.setProductTypes();
        },             
    }
</script>

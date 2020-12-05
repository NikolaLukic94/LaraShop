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
            ...mapGetters('products', ['getFilteredProducts'])
        },
        methods: {
             ...mapActions('products', ['setFilteredProducts', 'filterForProduct']),
        },
        data: function () {
            return {
                
            }
        },
        created() {
                this.filterForProduct({type: this.filter});
        },         
    }
</script>

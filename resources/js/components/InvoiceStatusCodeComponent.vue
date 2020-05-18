<template>
  <div>
    <vue-good-table
      :columns="columns"
      :rows="getInvoiceStatusCodes"/>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';

    export default {
        name: 'invoice-status-code-component',
        computed: {
            ...mapGetters(
                // 'indexStatusCodes',
                [
                    'getInvoiceStatusCodes'
                ])
        },
        methods: {
            ...mapActions(
                'indexStatusCodes',
                [
                    'setInvoiceStatusCodes'
                ])
        },
        data: function () {
            return {
                columns: [
                    {
                      label: 'Name',
                      field: 'name',
                    },
                ]
            }
        },
        created() {
            this.setInvoiceStatusCodes();
        },             
    }
</script>

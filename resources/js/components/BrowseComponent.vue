<template>
    <v-app class="container">
        <product-group :queryParam="'popular=true'" :title="'Popular'" :quantity="10"></product-group>
        <product-group :queryParam="'bestseller=true'" :title="'Bestsellers'" :quantity="10"></product-group>
    </v-app>
</template>

<script>
    export default {
        name: 'browse-component',
    }
</script>

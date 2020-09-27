<template>
    <div id="app">
        <v-card
            flat
            height="100px"
            color="grey lighten-4"
        >
            <v-toolbar dark height="30px">
            <v-spacer></v-spacer>
            <v-toolbar-title center>Buy online for best savings</v-toolbar-title>

            <v-spacer></v-spacer>
         <!-- <v-list-item> -->
            <!-- <v-list-item-title>text</v-list-item-title> -->
          <!-- </v-list-item> -->


            <v-btn icon>
                <v-icon>mdi-magnify</v-icon>
            </v-btn>

            <v-btn icon>
                <v-icon>mdi-heart</v-icon>
            </v-btn>

            <v-btn icon>
                <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
            </v-toolbar>
        </v-card>
        <!-- <v-toolbar class="headling text-uppercase">
            <v-toolbar-title>
                <i>BookStore</i>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
                <v-btn
                    v-for="item in menu"
                    :key="item.icon"
                    :to="item.link"
                    :href="item.href"
                    flat
                >{{ item.title }}
                </v-btn>
            </v-toolbar-items>
            <cart-component></cart-component>
        </v-toolbar> -->
    </div>
</template>

<script>
    export default {
        name: 'navbar-component',
        data() {
            return {
                menu: [
                    {icon: 'home', title: 'home', href: '/'},
                    {icon: 'about us', title: 'about us', href: 'about-us'},
                    {icon: 'catalog', title: 'catalog', href: '/products/search'},
                    {icon: 'new', title: 'new', href: '/products/search'},
                    {icon: 'contracts', title: 'contracts', href: '/products/search'}
                ]
            }
        },
    }
</script>

<template>
    <div>
        <v-app>
            <v-app-bar app color="grey darken-4" dark>
                <v-app-bar-nav-icon @click.stop="sidebarMenu = !sidebarMenu"></v-app-bar-nav-icon>
                <v-toolbar-title>BookStore, 2020</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-icon>mdi-account</v-icon>
            </v-app-bar>
        </v-app>
        <v-navigation-drawer dark
                             v-model="sidebarMenu"
                             app
                             floating
                             :permanent="sidebarMenu"
                             color="grey darken-4"
        >
            <v-list dense>
                <v-list-item>
                    <v-list-item-action>
                        <v-icon @click.stop="sidebarMenu = !sidebarMenu">mdi-chevron-left</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title></v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
            <v-list-item class="px-2" @click="toggleMini = !toggleMini">
                <v-list-item-avatar>
                    <v-icon>mdi-account-outline</v-icon>
                </v-list-item-avatar>
                <v-list-item-content class="text-truncate">
                    Carol Skelly
                </v-list-item-content>
                <v-btn icon small>
                    <v-icon>mdi-chevron-left</v-icon>
                </v-btn>
            </v-list-item>
            <v-divider></v-divider>
            <v-list>
                <v-list-item v-for="item in items" :key="item.title" :href="item.href">
                    <v-list-item-icon class="mr-3">
                        <v-icon color="primary">{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title class="primary--text">{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
            <v-treeview
                hoverable
                :items="supportItems"
            ></v-treeview>
        </v-navigation-drawer>
    </div>
</template>


<script>

    export default {
        name: 'new-sidebar-component',
        data: function () {
            return {
                sidebarMenu: true,
                toggleMini: false,
                items: [
                    {title: "Home", href: "/", icon: "mdi-home-outline"},
                    {title: "Dashboard", href: "/dashboard", icon: "mdi-file-document-multiple"},
                    {title: "Users", href: "/users/index", icon: "mdi-shield-account"},
                    // { title:"Payment Methods", href:"/payment-methods/index", icon:"mdi-crown-outline" },
                    {title: "Reports", href: "/reports", icon: "mdi-alarm-light-outline"},
                    {title: "Orders", href: "/orders/index", icon: "mdi-shield-account"},
                    // { title:"Order Status Codes", href:"/order-status-codes/index", icon:"mdi-palette-swatch" },
                    // { title:"Order Item Status Code", href:"/order-item-status-codes/index", icon:"mdi-account-search-outline" },
                    {title: "Shipments", href: "/shipments/index", icon: "mdi-bus-clock"},
                    {title: "Products", href: "/products/index", icon: "mdi-shape-square-rounded-plus"},
                    // { title:"Product Types", href:"/product-types/index", icon:"mdi-settings-outline" },
                    // { title:"Invoice Status Codes", href:"/invoice-status-codes/index", icon:"mdi-settings-outline" },
                    {title: 'Roles & Permissions', href: "/roles/index", icon: "mdi-wrench"}
                ],
                supportItems: [
                    {
                        id: 1,
                        name: 'Support :',
                        children: [
                            // { id: 2, name: 'Orders : app'},
                            {id: 3, name: 'Order Status Codes'},
                            {id: 4, name: 'Order Item Status Code'},
                            {id: 3, name: 'Product Types'},
                            {id: 3, name: 'Payment Methods'},
                            {id: 3, name: 'Invoice Status Codes'},
                        ],
                    },
                ],
            }
        },
    }
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition-property: opacity;
        transition-duration: .25s;
    }

    .fade-enter-active {
        transition-delay: .25s;
    }

    .fade-enter, .fade-leave-active {
        opacity: 0
    }

    .theme--light.v-application ::-webkit-scrollbar {
        width: 13px;
    }

    .theme--light.v-application ::-webkit-scrollbar-track {
        background: #e6e6e6;
        border-left: 1px solid #dadada;
    }

    .theme--light.v-application ::-webkit-scrollbar-thumb {
        background: #b0b0b0;
        border: solid 3px #e6e6e6;
        border-radius: 7px;
    }

    .theme--light.v-application ::-webkit-scrollbar-thumb:hover {
        background: black;
    }

    .theme--dark.v-application ::-webkit-scrollbar {
        width: 13px;
    }

    .theme--dark.v-application ::-webkit-scrollbar-track {
        background: #202020;
        border-left: 1px solid #2c2c2c;
    }

    .theme--dark.v-application ::-webkit-scrollbar-thumb {
        background: #3e3e3e;
        border: solid 3px #202020;
        border-radius: 7px;
    }

    .theme--dark.v-application ::-webkit-scrollbar-thumb:hover {
        background: white;
    }

</style>

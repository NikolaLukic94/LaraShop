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
            <v-list-item class="mt-3 px-2" @click="toggleMini = !toggleMini">
                <v-list-item-avatar>
                    <v-icon>mdi-account-outline</v-icon>
                </v-list-item-avatar>
                <v-list-item-content class="text-truncate">
                    {{ this.name }}
                </v-list-item-content>
            </v-list-item>
            <v-divider></v-divider>
            <v-list v-if="this.isSuperadmin">
                <v-list-item v-for="item in superAdminItems" :key="item.title" :href="item.href">
                    <v-list-item-icon class="mr-3">
                        <v-icon color="primary">{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title class="primary--text">{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
            <v-list v-if="this.isAdmin && !this.isSuperadmin">
                <v-list-item v-for="item in adminItems" :key="item.title" :href="item.href">
                    <v-list-item-icon class="mr-3">
                        <v-icon color="primary">{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title class="primary--text">{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
            <v-list v-if="this.isCustomer">
                <v-list-item v-for="item in customerItems" :key="item.title" :href="item.href">
                    <v-list-item-icon class="mr-3">
                        <v-icon color="primary">{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title class="primary--text">{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
            <v-treeview v-if="isSuperadmin"
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
                roles: [],
                permissions: [],
                name: '',
                sidebarMenu: true,
                toggleMini: false,
                isSuperadmin: false,
                isAdmin: false,
                isCustomer: false,
                isDelivery: false,
                superAdminItems: [
                    {title: "Home", href: "/", icon: "mdi-home-outline"},
                    {title: "Dashboard", href: "/dashboard", icon: "mdi-file-document-multiple"},
                    {title: "Users", href: "/users", icon: "mdi-shield-account"},
                    {title: "Reports", href: "/reports", icon: "mdi-alarm-light-outline"},
                    {title: "Orders", href: "/orders", icon: "mdi-shield-account"},
                    {title: "Shipments", href: "/shipments", icon: "mdi-bus-clock"},
                    {title: "Products", href: "/products", icon: "mdi-shape-square-rounded-plus"},
                    {title: 'Roles & Permissions', href: "/roles", icon: "mdi-wrench"}
                ],
                adminItems: [
                    {title: "Home", href: "/", icon: "mdi-home-outline"},
                    {title: "Dashboard", href: "/dashboard", icon: "mdi-file-document-multiple"},
                    {title: "Orders", href: "/orders", icon: "mdi-shield-account"},
                    {title: "Shipments", href: "/shipments", icon: "mdi-bus-clock"},
                    {title: "Products", href: "/products", icon: "mdi-shape-square-rounded-plus"},
                ],
                isDelivery: [
                    {title: "Home", href: "/", icon: "mdi-home-outline"},
                    {title: "Dashboard", href: "/dashboard", icon: "mdi-file-document-multiple"},
                    {title: "Orders", href: "/orders", icon: "mdi-shield-account"},
                    {title: "Shipments", href: "/shipments", icon: "mdi-bus-clock"},
                ],
                supportItems: [
                    {
                        id: 1,
                        name: 'Support :',
                        children: [
                            {id: 3, name: 'Order Status Codes'},
                            {id: 4, name: 'Order Item Status Code'},
                            {id: 3, name: 'Product Types'},
                            {id: 3, name: 'Payment Methods'},
                            {id: 3, name: 'Invoice Status Codes'},
                        ],
                    },
                ],
                customerItems: [
                    {title: "Home", href: "/", icon: "mdi-home-outline"},
                    {title: "Profile", href: "/orders", icon: "mdi-shield-account"},
                    {title: "My Orders", href: "/orders", icon: "mdi-shield-account"},
                    {title: "Wishlist", href: "/orders", icon: "mdi-shield-account"},
                    {title: "History", href: "/orders", icon: "mdi-shield-account"},
                ]
            }
        },
        methods: {
            getUserPermissions() {

                return axios.get('/auth-role')
                    .then((response) => {

                        this.name = response.data.data.firstName;

                        let authUserRoles = response.data.data.roles;

                        let superadmin = Object.keys(authUserRoles).filter( key => authUserRoles[key].name === 'superadmin');
                        if (superadmin) {
                            this.isSuperadmin = true;
                        }     

                        let admin = Object.keys(authUserRoles).filter( key => authUserRoles[key].name === 'admin');
                        if (admin) {
                            this.isAdmin = true;
                        }    

                        let delivery = Object.keys(authUserRoles).filter( key => authUserRoles[key].name === 'delivery');
                        if (delivery) {
                            this.isDelivery = true;
                        }   

                        if (!admin && !superadmin) {
                            this.isCustomer = true;
                        }                  
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            }
        },
        created() {
            this.getUserPermissions();
            
        }
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

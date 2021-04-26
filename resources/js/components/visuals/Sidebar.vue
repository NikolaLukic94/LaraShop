<template>
    <v-app>
        <v-navigation-drawer v-model="drawer" app>

            <template>
                <v-list>
                    <v-subheader>System</v-subheader>
                    <v-list-item-group v-model="newitem" color="primary">
                        <v-list-item v-for="(item, i) in newitems" :key="i" :href="item.href">
                            <v-list-item-icon>
                                <v-icon v-text="item.icon"></v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title v-text="item.text"></v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-item-group>
                </v-list>
            </template>

        </v-navigation-drawer>

        <v-app-bar color="teal accent-4" dark flat app>

            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

            <v-toolbar-title>{{ appTitle }}</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-btn icon>
                <v-icon>mdi-filter</v-icon>
            </v-btn>

            <v-btn icon>
                <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
        </v-app-bar>

<!--        <main>-->
<!--            <span>Vuetify Container</span>-->
<!--        </main>-->
    </v-app>
</template>

<script>
    import { getNavbarItems } from '../../helpers/sidebar.js'

    export default {
        name: 'new-sidebar-component',
        data: function () {
            return {
                permissions: [],
                name: '',
                sidebarMenu: true,
                toggleMini: false,
                navbarItems: [],

                appTitle: "App Prototype",
                drawer: false,
                clipped: false,

                newitem: false,
                newitems: []
            }
        },
        methods: {
            toggleRightMenu() {
                this.rightMenu = !this.rightMenu;
            },
            buildSidebarObject() {
                let navbarArray = getNavbarItems();
                let viewPermissions = this.permissions.filter(permission => permission.includes('view'));

                this.navbarItems.push({title: "Home", href: "/", icon: "mdi-home-outline"});

                viewPermissions.forEach(permission => {
                    this.newitems.push({
                        text: navbarArray[permission]['title'],
                        href: navbarArray[permission]['href'],
                        icon: navbarArray[permission]['icon']
                    });
                })
            },
        },
        created() {
            axios.get('/api/permissions')
                .then(response => {
                    this.permissions = response.data;
                    this.buildSidebarObject();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
</script>

<style scoped>

    header {
        top:0 !important;
        left: 0 !important;
        z-index: 99999 !important;
    }

    nav, main{
        margin-top: 4rem !important;
    }

    main {
        padding: 2rem;
    }

</style>

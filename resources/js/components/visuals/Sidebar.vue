<template>
    <div>
        <v-navigation-drawer dark
                             v-model="sidebarMenu"
                             app
                             floating
                             :permanent="sidebarMenu"
                             color="grey darken-4"
        >
            <v-list class="mt-3">
                <v-list-item v-for="item in navbarItems" :key="item.title" :href="item.href">
                    <v-list-item-icon class="mr-3">
                        <v-icon color="primary">{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title class="primary--text">{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
    </div>
</template>

<script>
    import {getNavbarItems} from '../../helpers/sidebar.js'

    export default {
        name: 'new-sidebar-component',
        data: function () {
            return {
                permissions: [],
                name: '',
                sidebarMenu: true,
                toggleMini: false,
                navbarItems: []
            }
        },
        methods: {
            buildSidebarObject() {
                let navbarArray = getNavbarItems();
                let viewPermissions = this.permissions.filter(permission => permission.includes('view'));

                this.navbarItems.push({title: "Home", href: "/", icon: "mdi-home-outline"});

                viewPermissions.forEach(permission => {
                    this.navbarItems.push({
                        title: navbarArray[permission]['title'],
                        href: navbarArray[permission]['href'],
                        icon: navbarArray[permission]['icon']
                    });
                })
            },
        },
        created() {
            axios.get('/permissions')
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

    a, a:hover {
        color: white;
    }

</style>

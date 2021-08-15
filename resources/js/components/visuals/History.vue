<template>
    <v-app>
        <v-container>
            <v-timeline
                align-top
                :dense="$vuetify.breakpoint.smAndDown"
            >
                <v-timeline-item
                    v-for="(item, i) in items"
                    :key="i"
                    :color="item.color"
                    :icon="item.icon"
                    fill-dot
                >
                    <v-card
                        :color="item.color"
                        dark
                    >
                        <v-card-title class="title">
                            Lorem Ipsum Dolor
                        </v-card-title>
                        <v-card-text class="white text--primary pt-4">
                            <p>Lorem ipsum dolor sit amet, no nam oblique veritus. Commune scaevola imperdiet nec ut, sed euismod convenire principes at. Est et nobis iisque percipit, an vim zril disputando voluptatibus, vix an salutandi sententiae.</p>
                            <v-btn
                                :color="item.color"
                                class="mx-0"
                                outlined
                            >
                                Button
                            </v-btn>
                        </v-card-text>
                    </v-card>
                </v-timeline-item>
            </v-timeline>
        </v-container>
    </v-app>
</template>



<script>
    export default {
        name: 'history-component',
        data: function () {
            return {
                items: [
                    {
                        color: 'teal',
                        icon: 'mdi-star',
                    },
                    {
                        color: 'teal',
                        icon: 'mdi-book-variant',
                    },
                    {
                        color: 'teal',
                        icon: 'mdi-airballoon',
                    },
                    {
                        color: 'teal',
                        icon: 'mdi-buffer',
                    },
                ],
            }
        },
    }
</script>

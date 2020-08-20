<template>
    <div id="app">
        <v-app id="inspire">
            <navbar-component></navbar-component>
            <v-carousel>
                <v-carousel-item
                    v-for="(item,i) in items"
                    :key="i"
                    :src="item.src"
                    reverse-transition="fade"
                    transition="fade"
                ></v-carousel-item>
            </v-carousel>
            <v-container>
                <v-card>
                    <v-container fluid grid-list-md>
                        <v-layout row wrap>
                            <v-flex
                                v-for="card in cards"
                                :key="card.title"
                                v-bind="{ [`xs${card.flex}`]: true }"
                            >
                                <v-card>
                                    <v-img
                                        :src="card.src"
                                        height="350px"
                                        width="250"
                                    >
                                        <v-container
                                            fill-height
                                            fluid
                                            pa-2
                                        >
                                            <v-layout fill-height>
                                                <v-flex xs12 align-end flexbox>
                                                    <span class="headline white--text" v-text="card.title"></span>
                                                </v-flex>
                                            </v-layout>
                                        </v-container>
                                    </v-img>

                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn icon>
                                            <v-icon>favorite</v-icon>
                                        </v-btn>
                                        <v-btn icon>
                                            <v-icon>bookmark</v-icon>
                                        </v-btn>
                                        <v-btn icon>
                                            <v-icon>share</v-icon>
                                        </v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-flex>
                        </v-layout>
                    </v-container>
                    <!--            </v-card>-->
                    <!--            <v-footer-->
                    <!--                dark-->
                    <!--                padless-->
                    <!--            >-->
                    <!--        </v-container>-->
                    <!--        <v-card-->
                    <!--            flat-->
                    <!--            tile-->
                    <!--            class="indigo lighten-1 white&#45;&#45;text text-center"-->
                    <!--        >-->
                    <!--            <v-card-text>-->
                    <!--                <v-btn-->
                    <!--                    v-for="icon in icons"-->
                    <!--                    :key="icon"-->
                    <!--                    class="mx-4 white&#45;&#45;text"-->
                    <!--                    icon-->
                    <!--                >-->
                    <!--                    <v-icon size="24px">{{ icon }}</v-icon>-->
                    <!--                </v-btn>-->
                    <!--            </v-card-text>-->

                    <!--            <v-card-text class="white&#45;&#45;text pt-0">-->
                    <!--                Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit amet. Mauris cursus commodo interdum.-->
                    <!--                Praesent ut risus eget metus luctus accumsan id ultrices nunc. Sed at orci sed massa consectetur-->
                    <!--                dignissim a sit amet dui. Duis commodo vitae velit et faucibus. Morbi vehicula lacinia malesuada. Nulla-->
                    <!--                placerat augue vel ipsum ultrices, cursus iaculis dui sollicitudin. Vestibulum eu ipsum vel diam-->
                    <!--                elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur-->
                    <!--                ridiculus mus.-->
                    <!--            </v-card-text>-->

                    <!--            <v-divider></v-divider>-->

                    <!--            <v-card-text class="white&#45;&#45;text">-->
                    <!--                {{ new Date().getFullYear() }} — <strong>Vuetify</strong>-->
                    <!--            </v-card-text>-->
                    <!--        </v-card>-->
                    <!--        </v-footer>-->
                </v-card>
            </v-container>
        </v-app>
    </div>
</template>

<script>
    export default {
        name: 'landing-page',
        data() {
            return {
                items: [
                    {
                        src: 'http://www.cashadvance6online.com/data/archive/img/2697316975.jpeg'
                    },
                    {
                        src: 'https://upload.wikimedia.org/wikipedia/commons/5/5a/Books_HD_%288314929977%29.jpg'
                    },
                    {
                        src: 'https://images2.alphacoders.com/261/26102.jpg'
                    },
                ],
                cards: [
                    {
                        title: 'Pre-fab homes',
                        src: 'https://upload.wikimedia.org/wikipedia/en/1/13/Women_%28Bukowski_novel_-_front_cover%29.jpg',
                        flex: 4
                    },
                    {
                        title: 'Favorite road trips',
                        src: 'https://upload.wikimedia.org/wikipedia/en/1/13/Women_%28Bukowski_novel_-_front_cover%29.jpg',
                        flex: 4
                    },
                    {
                        title: 'Best airlines',
                        src: 'https://upload.wikimedia.org/wikipedia/en/1/13/Women_%28Bukowski_novel_-_front_cover%29.jpg',
                        flex: 4
                    },
                ],
            }
        },
    }
</script>

<!--<style>-->

<!--    #example-custom-transition-->
<!--    .fade-->
<!--    &-enter-active, &-leave-active, &-leave-to-->
<!--                                     transition: .3s ease-out-->
<!--                                                   position: absolute-->
<!--                                                   top: 0-->
<!--    left: 0-->

<!--    &-enter, &-leave, &-leave-to-->
<!--                       opacity: 0-->
<!--</style>-->


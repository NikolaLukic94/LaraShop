<template>
    <v-row justify="center">
        <v-dialog
            v-model="dialog"
            persistent
            max-width="600px"
        >
            <template v-slot:activator="{ on, attrs }">
                <v-chip color="teal" v-bind="attrs" v-on="on">
                    <v-icon class="text-white">
                        mdi-eye
                    </v-icon>
                </v-chip>
            </template>
            <v-card>
                <v-card-title>

                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-col>
                                <v-img
                                    height="250"
                                    width="180"
                                    style="margin-right: 25%;"
                                    v-bind:src="product.relationships.images.data[0].imagePath"
                                ></v-img>
                            </v-col>
                            <v-col>
                                <small>Author:</small>
                                <p>{{ product.author }}</p>
                                <br>
                                <small>Publisher</small>
                                <p>{{ product.publisher }}</p>
                                <br>
                                <p>{{ product.description }}</p>
                                <br>
                                <small>Genre</small>
                                <p>{{ product.genre }}</p>
                                <br>
                                <small>Price</small>
                                <p>${{ product.price }}</p>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="blue darken-1"
                        text
                        @click="dialog = false"
                    >
                        Close
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-row>
</template>

<script>
    export default {
        name: 'product-modal',
        props: ['product'],
        data: () => ({
            dialog: false,
        }),
        created: function () {
            console.log('user data from parent component:')
            console.log(this.product) //prints out an empty string
        },
    }
</script>

<style>
    p {
        font-family: OpenSans, sans-serif, arial;
        font-weight: 400;
    }
</style>

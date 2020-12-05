<template>
    <div>
        <v-text-field
            @input="autoComplete()"
            v-model="input"
            outlined
            label="Search"
            append-icon="mdi-file-find"
        ></v-text-field>
            <span v-if="this.isOpen && this.results.length">
                <div class="autocomplete-card">
                    <v-virtual-scroll style="background-color: 	 #fff; border-radius: 5px; border: 1px solid #008080;" 
                        :items="this.results"
                        :item-height="100"
                        height="300"
                        >
                        <template v-slot="{ item }" >
                            <v-list-item>
                                <v-list-item-avatar class="mr-4" tile>
                                    <v-avatar
                                    size="120"
                                    
                                    >
                                        <v-img :src="'/img/cover.jpg'"></v-img>
                                    </v-avatar>
                                </v-list-item-avatar>

                                <v-list-item-content class="align-self-start">
                                    <v-list-item-title>{{ item.name }}</v-list-item-title>
                                    <v-list-item-subtitle>
                                        {{ item.author }}
                                    </v-list-item-subtitle>
                                    <v-list-item-subtitle>
                                        {{ item.genre }}
                                    </v-list-item-subtitle>
                                </v-list-item-content>

                                <v-list-item-action>
                                    <v-btn title="Open in new window"  
                                        @click="callStoreCartItem(item.id)"
                                        depressed
                                        small
                                        color="teal lighten-2"
                                        class="mb-1"
                                    >
                                        <v-icon
                                            color="orange darken-4"
                                            right
                                            class="text-center p-1 m-1"
                                        >
                                        mdi-cart-plus
                                        </v-icon>
                                    </v-btn>
                                    <v-btn title="Open in new window"  :href="`/products/show/${item.id}`"
                                        @click="openSingleComponent(filteredProduct.id)"
                                        depressed
                                        small
                                        style="text-decoration: none;"
                                        >
                                        <v-icon 
                                            color="orange darken-4"
                                            right
                                            class="text-center p-1 m-1"
                                            
                                        >
                                        mdi-open-in-new
                                        </v-icon>
                                    </v-btn>
                                </v-list-item-action>
                            </v-list-item>
                            <hr>
                        </template>
                    </v-virtual-scroll>
                </div>
            </span>
    </div>
</template>

<script>

    import { mapGetters, mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'autocomplete',
        data() {
            return {
                input: '',
                isOpen: false,
                results: []
            }
        },
        methods: {
            ...mapActions('cartItem', ['storeCartItem']),
            autoComplete(){
                this.results = [];
                    if(this.input.length > 2){
                        axios.get('/api/search',
                            {params: {searchBy: this.input}}).then(response => {
                            this.results = response.data.data;

                            if (this.results.length) {
                                this.isOpen = true;
                            } else {
                                this.isOpen = false;
                            }
                        });
                    }
            },
            callStoreCartItem(productId) {
                this.storeCartItem(productId);
            },
        },
        created() {
            let self = this;

            window.addEventListener('click', function(e){
                if (!self.$el.contains(e.target)){
                    self.isOpen = false
                } 
            })
        },
    }
</script>

<style scoped>
    .autocomplete-card {
        position: absolute;
        z-index: 999;
        margin: 0 auto;
        left: 0;
        right: 0;   
        margin-right: 35px;     
        text-align: left;
        align-items:center;
        justify-content:center;
        top: 80%; /* Adjust this value to move the positioned div up and down */
        font-family: Arial,sans-serif;
        width: 30%; /* Set the width of the positioned div */
        height: 10%;
        max-height: 100px;
    }
</style>
<template>
    <div>
        <!-- <nav class="navbar navbar-light bg-light justify-content-between">
            <div class="container">
                <a class="navbar-item text-warning"><b>BOOKSTORE</b></a>
                <v-container style="width: 600px;">
                    <template>
                        <v-text-field label="Search" v-model="searchValue" @input="searchForProduct()"></v-text-field>
                    </template>
                </v-container>            
                <cart-component></cart-component>  
            </div>
        </nav> -->

<div class="dropdown" v-if="options">

    <!-- Dropdown Input -->
    <input class="dropdown-input"
      :name="name"
      @focus="showOptions()"
      @blur="exit()"
      @keyup="keyMonitor"
      v-model="searchFilter"
      :disabled="disabled"
      :placeholder="placeholder" />

    <!-- Dropdown Menu -->
    <div class="dropdown-content"
      v-show="optionsShown">
      <div
        class="dropdown-item"
        @mousedown="selectOption(option)"
        v-for="(option, index) in filteredOptions"
        :key="index">
          {{ option.name || option.id || '-' }}
      </div>
    </div>
  </div>


    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';
    import {VueGoodTable} from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        computed: {
            filteredOptions() {
                const filtered = [];
                const regOption = new RegExp(this.searchFilter, 'ig');
                for (const option of this.options) {
                if (this.searchFilter.length < 1 || option.name.match(regOption)){
                    if (filtered.length < this.maxItem) filtered.push(option);
                }
                }
                return filtered;
            }
        },
        props: {
            name: {
                type: String,
                required: false,
                default: 'dropdown',
                note: 'Input name'
            },
            options: {
                type: Array,
                required: true,
                default: [],
                note: 'Options of dropdown. An array of options with id and name',
            },
            placeholder: {
                type: String,
                required: false,
                default: 'Please select an option',
                note: 'Placeholder of dropdown'
            },
            disabled: {
                type: Boolean,
                required: false,
                default: false,
                note: 'Disable the dropdown'
            },
            maxItem: {
                type: Number,
                required: false,
                default: 6,
                note: 'Max items showing'
            }
            },
        name: 'product',
        computed: {
            chunkedProducts() {
                return _.chunk(Object.values(this.getFilteredProducts), 6);
            },
            ...mapGetters('products', ['getFilteredProducts']),
        },
        methods: {
            ...mapActions(
                'products', 
                [
                    'setFilteredProducts', 
                    'filterForProduct'
                    ]
                ),
            ...mapActions(
                'cartItem', 
                    [
                        'storeCartItem'
                    ]
                ),
            searchForProduct() {
                console.log('search is caled', this.searchValue)
                this.filterForProduct(this.searchValue);
            },
            callStoreCartItem(productId) {
                this.storeCartItem(productId);
            },
            electOption(option) {
                this.selected = option;
                this.optionsShown = false;
                this.searchFilter = this.selected.name;
                this.$emit('selected', this.selected);
            },
            showOptions(){
                if (!this.disabled) {
                this.searchFilter = '';
                this.optionsShown = true;
                }
            },
            exit() {
                if (!this.selected.id) {
                this.selected = {};
                this.searchFilter = '';
                } else {
                this.searchFilter = this.selected.name;
                }
                this.$emit('selected', this.selected);
                this.optionsShown = false;
            },
            // Selecting when pressing Enter
            keyMonitor: function(event) {
                if (event.key === "Enter" && this.filteredOptions[0])
                this.selectOption(this.filteredOptions[0]);
            }
        },
        data: function () {
            return {
                selected: {},
                optionsShown: false,
                searchFilter: '',
                hover: false,
                hoverId: null,
                searchValue: '',
                columns: [
                    {
                        label: 'Name',
                        field: 'name',
                    },
                    {
                        label: 'Created',
                        field: 'createdAt',
                    },
                    {
                        label: 'Action',
                        field: 'action',
                    },
                ],
            }
        },
        created() {
            this.$emit('selected', this.selected);
        },
        watch: {
            searchFilter() {
                if (this.filteredOptions.length === 0) {
                this.selected = {};
                } else {
                this.selected = this.filteredOptions[0];
                }
                this.$emit('filter', this.searchFilter);
            }
            }
    }
</script>


<style lang="scss" scoped>
  .dropdown {
    position: relative;
    display: block;
    margin: auto;
    .dropdown-input {
      background: #fff;
      cursor: pointer;
      border: 1px solid #e7ecf5;
      border-radius: 3px;
      color: #333;
      display: block;
      font-size: .8em;
      padding: 6px;
      min-width: 250px;
      max-width: 250px;
      &:hover {
        background: #f8f8fa;
      }
    }
    .dropdown-content {
      position: absolute;
      background-color: #fff;
      min-width: 248px;
      max-width: 248px;
      max-height: 248px;
      border: 1px solid #e7ecf5;
      box-shadow: 0px -8px 34px 0px rgba(0,0,0,0.05);
      overflow: auto;
      z-index: 1;
      .dropdown-item {
        color: black;
        font-size: .7em;
        line-height: 1em;
        padding: 8px;
        text-decoration: none;
        display: block;
        cursor: pointer;
        &:hover {
          background-color: #e7ecf5;
        }
      }
    }
    .dropdown:hover .dropdowncontent {
      display: block;
    }
  }
</style>
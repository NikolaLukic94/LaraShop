<template>
    <div id="app">
      <v-card>
        <div style="display: inline; font-family:Century Gothic; font-size: 13px; padding-left: 175px;">
            <p class="p-1 pt-2 ml-3 mb-0" style="display: inline-block;">
                <i class="fa fa-flag" aria-hidden="true"></i>
                Ship to: everywhere
            </p>
            <p class="p-1 ml-3 mb-0" style="display: inline-block;">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
                Can we help you?
            </p>
            <p class="p-1 ml-3 mb-0" style="display: inline-block;">
                <i class="fa fa-mobile" aria-hidden="true"></i>
                +381 652 66 33
            </p>
            <p class="p-1 ml-3 mb-0" style="display: inline-block;">
                Sustainability
            </p>
            <p class="p-1 mr-3 mb-0" style="display: inline-block;float: right;">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
            </p>
            <p class="p-1 mr-3 mb-0" style="display: inline-block;float: right;">
                <i class="fa fa-heart" aria-hidden="true"></i>
            </p>
            <p class="p-1 mr-3 mb-0" style="display: inline-block;float: right;">
                <i class="fa fa-user" aria-hidden="true"></i>
            </p>
            <p class="p-1 mr-3 mb-0" style="display: inline-block;float: right;">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </p>
          </div>
        </v-card>
        <v-card style="border-top: 3px solid #008080;">
          <div style="display: inline;">
            <div style="display: inline-block;">
              <img src="/img/logo.png" height="110px;">
            </div>|
            <p class="p-1 ml-3 mb-0" style="display: inline-block; font-weight: 500; margin-right: 20px;">
              NEW
            </p>|
            <p class="p-1 ml-3 mb-0" style="display: inline-block; font-weight: 500; margin-right: 20px;">
              POPULAR
            </p>|
            <p class="p-1 ml-3 mb-0" style="display: inline-block; font-weight: 500; margin-right: 20px;">
              DISCOUNTS
            </p>|
            <p class="p-1 ml-3 mb-0" style="display: inline-block; font-weight: 500; margin-right: 20px;">
              BESTSELLERS
            </p>
            <p class="p-1 ml-3 mb-0" style="display: inline-block; float:right; margin-top: 20px; margin-right:30px; font-weight: 500;">
              <v-text-field
                outlined
                label="Search"
                append-icon="mdi-file-find"
              ></v-text-field>
            </p>

          </div>
        </v-card>
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
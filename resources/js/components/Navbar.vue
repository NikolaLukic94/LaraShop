<template>
    <div id="app">
      <v-card>
        <div id="navbar">
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
            <p class="p-1 pt-2 ml-3 mb-0" style="display: inline-block;">
                Sustainability
            </p>
            <p class="p-1 pt-2 ml-3 mb-0" style="display: inline-block;">
              Shops
            </p>
            <p class="p-1 mr-3 mb-0" style="display: inline-block;float: right;">
                <div class="dropdown dropleft" style="display: inline-block;float: right;">
                  <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/login">
                        Login
                    </a>
                    <a class="dropdown-item" href="/profile">
                        Profile
                    </a>
                    <a class="dropdown-item" href="/register">Sign In</a>
                    <a class="dropdown-item" @click="sendLogOutRequest()">Logout</a>
                  </div>
                </div>
            <cart-component></cart-component>
          </div>
        </v-card>
        <v-card style="border-top: 3px solid #008080;">
          <div style="display: inline;">
            <div style="display: inline-block;">
              <a href="/">
                <img src="/img/logo.png" height="110px;">
              </a>
            </div>|
            <p class="p-1 ml-3 mb-0 navbar-p">
              NEW
            </p>|
            <p class="p-1 ml-3 mb-0 navbar-p">
              POPULAR
            </p>|
            <p class="p-1 ml-3 mb-0 navbar-p">
              DISCOUNTS
            </p>|
            <p class="p-1 ml-3 mb-0 navbar-p">
              BESTSELLERS
            </p>
            <p class="p-1 ml-3 mb-0" style="display: inline-block; float:right; margin-top: 20px; margin-right:30px; font-weight: 500;">
              <autocomplete></autocomplete>
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
                ],
            }
        },
        methods: {
           sendLogOutRequest() {
                 axios.post('/logout')
                  .then(() => location.href = '/home')
           }            
        },
    }
</script>

<style scoped>
  .navbar-p {
    display: inline-block; 
    font-weight: 500; 
    margin-right: 20px;
  }

  #navbar {
    display: inline; 
    font-family:Century Gothic; 
    font-size: 13px; 
    padding-left: 175px;
  }
</style>

<template>
  <div>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column pt-5">
            <div class="text-center pb-3">
            <i class="fa fa-book fa-3x" aria-hidden="true" style="color:white;"></i>
            </div>
            <li class="nav-item sidebar-item" v-on:click="toggleShow('showAdmin')">
                <a class="nav-link" href="#">
                    <i class="fa fa-bar-chart fa-fw"></i>
                        <span class="d-none d-md-inline">Admin</span></a>
            </li>
            <li class="nav-item sidebar-item" v-if="this.showAdmin">
                <a class="nav-link" href="/reports">
                    <i class="fa fa-bar-chart fa-fw"></i>
                        <span class="d-none d-md-inline">Dashboard</span></a>
            </li>
            <li class="nav-item sidebar-item" v-if="this.showAdmin">
                <a class="nav-link" href="/users/index">
                <i class="fa fa-user fa-fw"></i>
                    <span class="d-none d-md-inline">Users</span></a>
            </li>
            <li class="nav-item sidebar-item" v-if="this.showAdmin">
                <a class="nav-link" href="/payment-methods/index">
                <i class="fa fa-book fa-fw"></i>
                    <span class="d-none d-md-inline">Payment Methods</span></a>
            </li>
            <li class="nav-item sidebar-item" v-if="this.showAdmin">
                <a class="nav-link" href="#">
                <i class="fa fa-file" aria-hidden="true"></i>
                <span data-feather="bar-chart-2"></span>
                Reports
                </a>
            </li>
            <li class="nav-item sidebar-item" v-on:click="toggleShow('showOrder')">
                <a class="nav-link" href="#">
                    <i class="fa fa-first-order fa-fw"></i>
                        <span class="d-none d-md-inline">Orders</span></a>
            </li>
            <div class="container">
                <li class="nav-item sidebar-item" v-if="this.showOrder">
                    <a class="nav-link" href="/orders/index">
                        <i class="fa fa-first-order fa-fw"></i>
                            <span class="d-none d-md-inline">All</span></a>
                </li>
                <li class="nav-item sidebar-item" v-if="this.showOrder">
                    <a class="nav-link" href="/order-status-codes/index">
                    <i class="fa fa-first-order fa-fw"></i>
                        <span class="d-none d-md-inline">Order Status Codes</span></a>
                </li>
                <li class="nav-item sidebar-item" v-if="this.showOrder">
                    <a class="nav-link" href="/order-item-status-codes/index">
                    <i class="fa fa-first-order fa-fw"></i>
                        <span class="d-none d-md-inline">Order Items Status Codes</span></a>
                </li>
                    <li class="nav-item sidebar-item" v-if="this.showOrder">
                    <a class="nav-link" href="/shipments/index">
                    <i class="fa fa-truck fa-fw"></i>
                        <span class="d-none d-md-inline">Shiping</span></a>
                </li>
            </div>
            <li class="nav-item sidebar-item" v-on:click="toggleShow('showProduct')">
                <a class="nav-link" href="#">
                <i class="fa fa-book fa-fw"></i>
                    <span class="d-none d-md-inline">Products</span></a>
            </li>
            <div class="container">
                <li class="nav-item sidebar-item" v-if="this.showProduct">
                    <a class="nav-link" href="/products/index">
                    <i class="fa fa-book fa-fw"></i>
                        <span class="d-none d-md-inline">Products</span></a>
                </li>
                <li class="nav-item sidebar-item" v-if="this.showProduct">
                    <a class="nav-link" href="/product-types/index">
                    <i class="fa fa-book fa-fw"></i>
                        <span class="d-none d-md-inline">Product Types</span></a>
                </li>
            </div>
            <li class="nav-item sidebar-item" v-on:click="toggleShow('showInvoice')">
                <a class="nav-link" href="#">
                <i class="fa fa-files-o codeply fa-fw"></i>
                    <span class="d-none d-md-inline">Invoices</span></a>
            </li>
            <div class="container">
                <li class="nav-item sidebar-item" v-if="this.showInvoice">
                    <a class="nav-link" href="/invoices/index">
                    <i class="fa fa-files-o codeply fa-fw"></i>
                        <span class="d-none d-md-inline">Invoices</span></a>
                </li>
                <li class="nav-item sidebar-item" v-if="this.showInvoice">
                    <a class="nav-link" href="/invoice-status-codes/index">
                    <i class="fa fa-files-o codeply fa-fw"></i>
                        <span class="d-none d-md-inline">Invoice Status Codes</span></a>
                </li>
            </div>
            </ul>
        </div>
    </nav>
  </div>
</template>

<script>
    export default {
        name: 'sidebar-component',
        methods: {
            toggleShow(name) {
                if (name === 'showOrder') {
                    this.showInvoice = false;
                    this.showAdmin = false;
                    this.showProduct = false;
                    this.showOrder = !this.showOrder;
                } else if (name = 'showInvoice') {
                    this.showInvoice = !this.showInvoice;
                    this.showProduct = false;
                    this.showOrder = false;
                    this.showAdmin = false;
                } else if (name = 'showProduct') {
                    this.showProduct = !this.showProduct;
                    this.showInvoice = false;
                    this.showOrder = false;
                    this.showAdmin = false;
                } else if (name = 'showAdmin') {
                    this.showAdmin = !this.showAdmin;
                    this.showInvoice = false;
                    this.showOrder = false;
                    this.showProduct = false;
                }
            }
        },
        data: function () {
            return {
                showOrder: false,
                showInvoice: false,
                showAdmin: false,
                showProduct: false,
            }
        },
    }
</script>

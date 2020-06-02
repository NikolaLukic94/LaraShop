<template>
  <sidebar-menu :menu="menu" />
</template>

<script>
    export default {
        data() {
            return {
                menu: [
                    {
                        header: true,
                        title: 'Main Navigation',
                        hiddenOnCollapse: true
                    },
                    {
                        href: '/users/index',
                        title: 'Users',
                        icon: 'fa fa-user'
                    },
                    {
                        // href: '/charts',
                        title: 'Charts',
                        icon: 'fa fa-chart-area',
                        child: [
                            {
                                href: '/charts/sublink',
                                title: 'Sub Link'
                            }
                        ]
                    },
                    {
                        // href: '/invoices/index',
                        title: 'Invoices',
                        icon: 'fa fa-chart-area',
                        child: [
                            {
                                href: '/invoices/all',
                                title: 'Invoices'
                            },
                            {
                                href: '/invoice-status-codes/index',
                                title: 'Invoices Status Codes'
                            }                            
                        ]
                    },
                    {
                        href: '#',
                        title: 'Products',
                        icon: 'fa fa-chart-area',
                        child: [
                            {
                                href: '/products/index',
                                title: 'All'
                            },
                            {
                                href: '/product-types/index',
                                title: 'Product Types'
                            },
                            {
                                href: '/payment-methods/index',
                                title: 'Payment Methods'
                            }                                                        
                        ]
                    },
                    {
                        href: '#',
                        title: 'Orders',
                        icon: 'fa fa-chart-area',
                        child: [
                            {
                                href: '/orders/index',
                                title: 'Order'
                            },
                            {
                                href: '/order-status-codes/index',
                                title: 'Order Status Codes'
                            }                            
                        ]
                    }                                                             
                ]
            }
        }
    }
</script>
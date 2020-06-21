<template>
  <sidebar-menu :menu="menu"/>
</template>

<script>
    export default {
        data() {
            return {
                // Sidebar Collapse state
                collapsed: {
                    type: Boolean,
                    default: true
                },
                // Sidebar width (expanded)
                width: {
                    type: String,
                    default: '150px'
                },
                
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
                        title: 'Shiping',
                        icon: 'fa fa-truck',
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
                        icon: 'fa fa-files-o',
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
                        icon: 'fa fa-book',
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
                        icon: 'fa fa-first-order',
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

export function getNavbarItems() {

    return [
        {
            title: "Dashboard",
            icon: "mdi-file-document-multiple",
            route: "dashboardComponent"
        },
        {
            title: "Products",
            icon: "mdi-shape-square-rounded-plus",
            route: "productsComponent"
        },
        {
            title: "Reports",
            icon: "mdi-alarm-light-outline",
            route: "reportsComponent"
        },
        {
            title: "Users",
            icon: "mdi-account-edit",
            route: "usersComponent"
        },
        {
            title: "Shipments",
            icon: "mdi-truck-delivery",
            route: "shipmentsComponent"
        },
        {
            title: "Permissions",
            icon: "mdi-thumbs-up-down",
            route: "permissionsComponent"
        },
        {
            title: "Roles",
            icon: "mdi-wrench",
            route: 'rolesComponent'
        },
        {
            title: "Status Codes",
            icon: "mdi-checkbox-multiple-blank",
            route: "statusCodesComponent"
        },
    ]


    // navbarArray['view order']['title'] = "Orders";
    // navbarArray['view order']['href'] = "/orders";
    // navbarArray['view order']['icon'] = "mdi-shield-account";
    //
    // navbarArray['view product type'] = [];
    // navbarArray['view product type']['title'] = "Product Type";
    // navbarArray['view product type']['href'] = "/product-types";
    // navbarArray['view product type']['icon'] = "mdi-wrench";
    //
    // navbarArray['view payment method'] = [];
    // navbarArray['view payment method']['title'] = "Payment Method";
    // navbarArray['view payment method']['href'] = "/payment-methods";
    // navbarArray['view payment method']['icon'] = "mdi-wrench";
    //
    // navbarArray['view invoices'] = [];
    // navbarArray['view invoices']['title'] = "Invoices";
    // navbarArray['view invoices']['href'] = "/invoices";
    // navbarArray['view invoices']['icon'] = "mdi-wrench";
    //
    // navbarArray['view logout'] = [];
    // navbarArray['view logout']['title'] = "Logout";
    // navbarArray['view logout']['href'] = "/logout";
    // navbarArray['view logout']['icon'] = "mdi-logout";

    // return navbarArray;
}

export function getNavbarItems() {
    let navbarArray = [];

    navbarArray['view dashboard'] = [];
    navbarArray['view dashboard']['title'] = "Dashboard";
    navbarArray['view dashboard']['href'] = "/dashboard";
    navbarArray['view dashboard']['icon'] = "mdi-file-document-multiple";

    navbarArray['view user'] = [];
    navbarArray['view user']['title'] = "Users";
    navbarArray['view user']['href'] = "/users";
    navbarArray['view user']['icon'] = "mdi-shield-account";

    navbarArray['view product'] = [];
    navbarArray['view product']['title'] = "Products";
    navbarArray['view product']['href'] = "/products";
    navbarArray['view product']['icon'] = "mdi-shape-square-rounded-plus";

    navbarArray['view shipment'] = [];
    navbarArray['view shipment']['title'] = "Shipments";
    navbarArray['view shipment']['href'] = "/shipments";
    navbarArray['view shipment']['icon'] = "mdi-bus-clock";

    navbarArray['view order'] = [];
    navbarArray['view order']['title'] = "Orders";
    navbarArray['view order']['href'] = "/orders";
    navbarArray['view order']['icon'] = "mdi-shield-account";

    navbarArray['view report'] = [];
    navbarArray['view report']['title'] = "Reports";
    navbarArray['view report']['href'] = "/reports";
    navbarArray['view report']['icon'] = "mdi-alarm-light-outline";

    navbarArray['view role'] = [];
    navbarArray['view role']['title'] = "Roles";
    navbarArray['view role']['href'] = "/roles";
    navbarArray['view role']['icon'] = "mdi-wrench";

    navbarArray['view permission'] = [];
    navbarArray['view permission']['title'] = "Permission";
    navbarArray['view permission']['href'] = "/permissions";
    navbarArray['view permission']['icon'] = "mdi-wrench";

    navbarArray['view product type'] = [];
    navbarArray['view product type']['title'] = "Product Type";
    navbarArray['view product type']['href'] = "/product-types";
    navbarArray['view product type']['icon'] = "mdi-wrench";

    navbarArray['view payment method'] = [];
    navbarArray['view payment method']['title'] = "Payment Method";
    navbarArray['view payment method']['href'] = "/payment-methods";
    navbarArray['view payment method']['icon'] = "mdi-wrench";

    navbarArray['view invoices'] = [];
    navbarArray['view invoices']['title'] = "Invoices";
    navbarArray['view invoices']['href'] = "/invoices";
    navbarArray['view invoices']['icon'] = "mdi-wrench";

    return navbarArray;
}

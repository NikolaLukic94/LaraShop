import HomePage from './components/HomePage';
import About from './components/visuals/About';
import Map from './components/MapComponent';
import Login from './components/visuals/LoginFormComponent';
import Register from './components/visuals/RegisterComponent';
import NotFound from './components/visuals/NotFound';
import ProductsTable from './components/ProductComponent';
import ProductsDisplay from './components/ProductsDisplay';
import History from './components/visuals/History';
import AdminHome from './components/AdminHome';
import SingleProduct from './components/visuals/SingleProduct';
import ProductsComponent from './components/ProductComponent';
import DashboardComponent from './components/DashboardChart';
import BrowseComponent from "./components/BrowseComponent";
import ReportsComponent from "./components/ReportsComponent";
import UsersComponent from "./components/UsersComponent";
import ShipmentsComponent from "./components/ShipmentComponent";
import PermissionsComponent from "./components/PermissionsComponent";
import RolesComponent from "./components/RoleComponent";
import StatusCodesComponent from "./components/StatusCodesComponent";

export default {
    mode: 'history',

    routes: [

        {
            path: '/product/:id',
            component: SingleProduct,
            name: 'theProduct'
        },
        {
            path: '/spa/history',
            component: History,
            name: 'history'
        },
        {
            path: '/spa/home',
            component: HomePage,
            name: 'home'
        },
        {
            path: '/spa/products-display',
            component: ProductsDisplay,
            name: 'productDisplay'
        },
        {
            path: '/spa/about',
            component: About,
            name: 'about'
        },
        {
            path: '/spa/map',
            component: Map,
            name: 'map'
        },
        {
            path: '/spa/login',
            component: Login,
            name: 'login'
        },
        {
            path: '/spa/register',
            component: Register,
            name: 'register'
        },
        {
            path: '/spa/admin',
            component: AdminHome,
            name: 'admin'
        },
        {
            path: '/spa/product/:id',
            component: SingleProduct,
            name: 'singleProduct'
        },
        // admin section
        {
            path: '/spa/products',
            component: ProductsComponent,
            name: 'productsComponent'
        },
        {
            path: '/spa/dashboard',
            component: DashboardComponent,
            name: 'dashboardComponent'
        },
        {
            path: '/spa/reports',
            component: ReportsComponent,
            name: 'reportsComponent'
        },
        {
            path: '/spa/users',
            component: UsersComponent,
            name: 'usersComponent'
        },
        {
            path: '/spa/permissions',
            component: PermissionsComponent,
            name: 'permissionsComponent'
        },
        {
            path: '/spa/roles',
            component: RolesComponent,
            name: 'rolesComponent'
        },
        {
            path: '/spa/shipments',
            component: ShipmentsComponent,
            name: 'shipmentsComponent'
        },
        {
            path: '/spa/status-codes',
            component: StatusCodesComponent,
            name: 'statusCodesComponent'
        },
        {
            path: '/spa/browse',
            component: BrowseComponent,
            name: 'browse'
        },
        {
            path: '/spa/*',
            component: NotFound,
        },
    ]
}

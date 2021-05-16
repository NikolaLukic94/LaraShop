import HomePage from './components/HomePage';
import About from './components/visuals/About';
import Map from './components/MapComponent';
import Login from './components/visuals/LoginFormComponent';
import Register from './components/visuals/RegisterComponent';
import NotFound from './components/visuals/NotFound';
import ProductsTable from './components/ProductComponent';
import ProductsDisplay from './components/ProductsDisplay';
import SingleProduct from './components/visuals/SingleProduct';
import History from './components/visuals/History';

export default {
    mode: 'history',

    routes: [
        {
            path: '/spa/*',
            component: NotFound,
        },
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
            path: '/spa/products',
            component: ProductsTable,
            name: 'productsTable'
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
    ]
}

import Vue from 'vue';
import VueRouter from 'vue-router';

// user
import Login from './components/layout/admin/user/Login.vue';
import UserStore from './components/layout/admin/user/Store.vue';
import UserUpdate from './components/layout/admin/user/Update.vue';
import UserIndex from './components/layout/admin/user/Index.vue';
import IndexAdmin from './components/layout/admin/index/Index.vue';
import PasswordForget from './components/layout/admin/user/PasswordForget.vue';

// category
import CategoryItem from './components/layout/admin/category/Index.vue';
import CategoryStore from './components/layout/admin/category/Store.vue';
import CategoryEdit from './components/layout/admin/category/Update.vue';

//product
import ProductItem from './components/layout/admin/product/Index.vue';
import ProductStore from './components/layout/admin/product/Store.vue';
import ProductEdit from './components/layout/admin/product/Update.vue';

// menu
import MenuItem from './components/layout/admin/menu/Index.vue';
import MenuStore from './components/layout/admin/menu/Store.vue';
import MenuEdit from './components/layout/admin/menu/Update.vue';

// banner
import BannerItem from './components/layout/admin/banner/Index.vue';
import BannerStore from './components/layout/admin/banner/Store.vue';
import BannerEdit from './components/layout/admin/banner/Update.vue';

// slider
import SliderItem from './components/layout/admin/slider/Index.vue';
import SliderStore from './components/layout/admin/slider/Store.vue';
import SliderEdit from './components/layout/admin/slider/Update.vue';

// error
import NotFound from './components/layout/admin/error/Html404.vue';
import VueMeta from 'vue-meta'
Vue.use(VueRouter);
Vue.use(VueMeta);


// default
// index
import IndexDefault from './components/layout/default/index/Index.vue';
import CartItem from './components/layout/default/index/Cart.vue';
import HistoryItem from './components/layout/default/index/History.vue';
import LoginItem from './components/layout/default/index/Login.vue';
import RegisterItem from './components/layout/default/index/Register.vue';
// listproduct
import IndexListProduct from './components/layout/default/listproduct/Index.vue';

import ProductDetail from './components/layout/default/productdetail/Index.vue';
const routes = [
    {
        path: '/admin/dang-nhap',
        name: 'Login',
        component: Login
    },

    {
        path: '/admin/quen-mat-khau',
        name: 'PasswordForget',
        component: PasswordForget
    },

    {
        path: '/admin',
        name: 'IndexAdmin',
        component: IndexAdmin
    },

    {
        path: '/admin/user/them-nguoi-dung',
        name: 'UserStore',
        component: UserStore
    },
    {
        path: '/admin/user/:id/edit',
        name: 'UserEdit',
        component: UserUpdate
    },
    {
        path: '/admin/user',
        name: 'UserIndex',
        component: UserIndex
    },
    {
        path: '/admin/category',
        name: 'CategoryItem',
        component: CategoryItem
    },
    {
        path: '/admin/category/them-danh-muc',
        name: 'CategoryStore',
        component: CategoryStore
    },
    {
        path: '/admin/category/sua-danh-muc',
        name: 'CategoryEdit',
        component: CategoryEdit
    },
    {
        path: '/admin/product',
        name: 'ProductItem',
        component: ProductItem
    },
    {
        path: '/admin/product/them-san-pham',
        name: 'ProductStore',
        component: ProductStore
    },
    {
        path: '/admin/product/sua-san-pham',
        name: 'ProductEdit',
        component: ProductEdit
    },
    {
        path: '/admin/menu',
        name: 'MenuItem',
        component: MenuItem
    },
    {
        path: '/admin/menu/them-menu',
        name: 'MenuStore',
        component: MenuStore
    },
    {
        path: '/admin/menu/sua-menu',
        name: 'MenuEdit',
        component: MenuEdit
    },
    {
        path: '/admin/banner',
        name: 'BannerItem',
        component: BannerItem
    },
    {
        path: '/admin/banner/them-quang-cao',
        name: 'BannerStore',
        component: BannerStore
    },
    {
        path: '/admin/banner/sua-quang-cao',
        name: 'BannerEdit',
        component: BannerEdit
    },
    {
        path: '/admin/slider',
        name: 'SliderItem',
        component: SliderItem
    },
    {
        path: '/admin/slider/add-slider',
        name: 'SliderStore',
        component: SliderStore
    },
    {
        path: '/admin/slider/edit-slider',
        name: 'SliderEdit',
        component: SliderEdit
    },
    {
        path: '/',
        name: 'IndexDefault',
        component: IndexDefault
    },
    {
        path: '/:category([0-9a-z-\/]+-[0-9]+)',
        name: 'IndexListProduct',
        component: IndexListProduct
    },
    {
        path: '/:product([0-9a-z-\/]+_[0-9]+-[0-9]+)',
        name: 'ProductDetail',
        component: ProductDetail
    },
    {
        path: '/gio-hang',
        name: 'CartItem',
        component: CartItem
    },
    {
        path: '/lich-su-dat-hang',
        name: 'HistoryItem',
        component: HistoryItem
    },
    {
        path: '/dang-nhap',
        name: 'LoginItem',
        component: LoginItem
    },
    {
        path: '/dang-ky',
        name: 'RegisterItem',
        component: RegisterItem
    },
    {
        path: '/*',
        name: 'NotFound',
        component: NotFound
    }
    
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

export default router;
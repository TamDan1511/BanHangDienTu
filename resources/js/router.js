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

import VueMeta from 'vue-meta'
Vue.use(VueRouter);
Vue.use(VueMeta);

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
	}
];

const router = new VueRouter({
	mode: 'history',
	routes: routes
})

export default router;
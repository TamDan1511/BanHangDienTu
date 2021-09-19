import Vue from 'vue';
import VueRouter from 'vue-router';
import Login from './components/layout/admin/user/Login.vue';
import UserStore from './components/layout/admin/user/Store.vue';
import UserUpdate from './components/layout/admin/user/Update.vue';
import UserIndex from './components/layout/admin/user/Index.vue';
import IndexAdmin from './components/layout/admin/index/Index.vue';
import PasswordForget from './components/layout/admin/user/PasswordForget.vue';


import CategoryItem from './components/layout/admin/category/Index.vue';
import CategoryStore from './components/layout/admin/category/Store.vue';
import CategoryEdit from './components/layout/admin/category/Update.vue';

import BlogIndex from './components/layout/admin/blog/Index.vue';
import BlogStore from './components/layout/admin/blog/Store.vue';
import BlogEdit from './components/layout/admin/blog/Update.vue';

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
        path: '/admin/blog',
        name: 'BlogIndex',
        component: BlogIndex
    },
    {
        path: '/admin/blog/add-post',
        name: 'BlogStore',
        component: BlogStore
    },
    {
        path: '/admin/blog/edit-post',
        name: 'BlogEdit',
        component: BlogEdit
    },
];

const router = new VueRouter({
	mode: 'history',
	routes: routes
})

export default router;

import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import Layout from './views/layout/layout';
import SystemUser from  './views/systemUser/systemUser';
import Category from './views/category/category';

const router = new Router({
    routes: [
        {
            path: '/',
            component: Layout,
            children: [
                {
                    path: '/system/user',
                    name: 'systemUser',
                    component: SystemUser,
                },
                {
                    path: '/category',
                    name: 'category',
                    component: Category,
                }
            ]
        }
    ]
});

export default router;
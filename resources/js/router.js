import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

// 处理重复点击报错
const originalPush = Router.prototype.push
Router.prototype.push = function push(location) {
    return originalPush.call(this, location).catch(err => err)
}

import Layout from './views/layout/layout';
import SystemUser from  './views/systemUser/systemUser';
import Category from './views/category/category';
import SystemNode from './views/node/node';



const router = new Router({
    routes: [
        {
            path: '/',
            component: Layout,
            children: [
                {
                    path: '/system/member/list',
                    name: '/system/member/list',
                    component: SystemUser,
                },
                {
                    path: '/system/node/show',
                    name: '/system/node/show',
                    component: SystemNode,
                }
            ]
        }
    ]
});

export default router;
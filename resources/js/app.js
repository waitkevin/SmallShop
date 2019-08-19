import Vue from 'vue';
import ElementUI from 'element-ui';
import router from './router';
import store from './store';

Vue.use(ElementUI);


const app = new Vue({
    router,
    store
}).$mount('#app');

import axios from 'axios';
import config from '../config/config';

const apiBaseUrl = process.env.NODE_ENV === 'dev'
    ? config.apiBaseUrl.dev
    : config.apiBaseUrl.pro

/**
 * 创建一个axios请求实例
 * @type {AxiosInstance}
 */
const service = axios.create({
    baseURL: apiBaseUrl,
    timeout: 30000,
    headers: { }
});


/**
 * 创建请求拦截器
 */
service.interceptors.request.use(
    config => {
        return Object.assign(config);
    },

    error => {
        Promise.reject(error)
    }
);



/**
 * 创建响应拦截器
 */
service.interceptors.response.use(
    response => {
        if (response.status == 200) {
            return response.data;
        }
    },

    error =>{
        if ([500, 404].indexOf(error.response.status) != -1) {
            throw new Error('系统错误，请重新尝试!');
        }

        if ([401].indexOf(error.response.status) != -1) {
            throw new Error(error.response.data.message);
        }

        return Promise.reject(error)
    }
)

export default service;


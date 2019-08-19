import axios from '../common/axios';

/**
 * 用户登录
 * @param params
 * @return {AxiosPromise<any>}
 */
const login = (params = {}) => {
    return axios.post('/api/login', params);
}


/**
 * 用户菜单列表
 *
 * @return {AxiosPromise<any>}
 */
const menuTree = () => {
    return axios.get('users/menu');
}



export default {
    login,
    menuTree,
}
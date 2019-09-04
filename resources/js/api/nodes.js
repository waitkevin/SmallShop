import axios from '../common/axios';


/**
 * 系统权限列表
 *
 * @param params
 * @return {AxiosPromise<any>}
 */
const show = (params = {}) => {
    return axios.get('/node/show', {params: params});
}

/**
 * 删除权限
 *
 * @param params
 * @return {AxiosPromise<any>}
 */
const destroy = (params = {}) => {
    return axios.post('/node/destroy', params);
}


/**
 * 全部权限
 *
 * @param params
 */
const all = (params = {}) => {
    return axios.get('/node/all', {params: params});
}


/**
 * 添加|编辑权限
 *
 * @param params
 * @return {AxiosPromise<any>}
 */
const storage = (params = {}) => {
    return axios.post('/node/storage', params);
}


export default {
    all,
    show,
    destroy,
    storage
}
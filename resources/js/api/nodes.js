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


export default {
    show,
    destroy
}
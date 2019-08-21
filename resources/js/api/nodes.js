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


export default {
    show,
}
import {Message} from 'element-ui';


/**
 * API请求状态处理
 *
 * @param $response
 */
const showMessage = ($response, fn) => {
    Message({
        message: $response.message,
        type : $response.code === 1 ? 'success' : 'error',
        center: true,
        onClose: fn||function(){console.log(321321)},
    });
};

export default {
    showMessage,
}
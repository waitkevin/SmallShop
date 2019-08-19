export default {
    title: 'laravel - repast',

    /**
     * @description api请求基础路径
     */
    apiBaseUrl: {
        dev: 'http://127.0.0.1:8000/api/system',
        pro: 'http://127.0.0.1:8000/api/system'
    },

    /**
     * @description 资源基础路径
     */
    sourceBaseUrl: {
        dev: 'http://127.0.0.1:8000',
        pro: 'http://127.0.0.1:8000',
    },

    /**
     * @description 不需要带TOKEN的API
     */
    noTokenApi: [
        '/api/login',      // 登录
        '/api/logout',     // 退出
        '/api/captcha'     // 验证码
    ],
}
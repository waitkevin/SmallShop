<?php

namespace App\Services\Common;

/**
 * 数据响应规格化辅助类
 *
 * Class ResponseServices
 * @package App\Services\Common
 */
class ResponseServices
{
    /**
     * 成功响应方法
     *
     * @param string $message
     * @param null $data
     * @param int $code
     * @param null $other
     * @param int $httpCode
     * @param array $header
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($message = 'success', $data = null, $code = 1, $other = null, $httpCode = 200, $header = [])
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,
            'other' => $other,
        ], $httpCode, $header);
    }


    /**
     * 失败响应方法
     *
     * @param string $message
     * @param null $data
     * @param int $code
     * @param null $other
     * @param int $httpCode
     * @param array $header
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error($message = 'failure', $data = null, $code = 0, $other = null, $httpCode = 200, $header = [])
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,
            'other' => $other,
        ], $httpCode, $header);
    }
}
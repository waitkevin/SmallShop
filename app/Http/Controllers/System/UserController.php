<?php

namespace App\Http\Controllers\System;


use App\Models\SystemNode;
use App\Services\Common\ResponseServices;

/**
 * 系统用户管理
 *
 * Class UserController
 * @package App\Http\Controllers\System
 */
class UserController extends BasicController
{
    /**
     * 用户菜单列表
     *
     * @return mixed
     */
    public function menuTree()
    {
        $menus = SystemNode::where(['type' => 1, 'status' => 1])->get()->toTree();
        return ResponseServices::success('success', $menus);
    }


}

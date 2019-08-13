<?php

namespace App\Http\Controllers\System;


use App\Http\Requests\System\NodeStorageRequest;

/**
 * 系统权限管理
 *
 * Class NodeController
 * @package App\Http\Controllers\System
 */
class NodeController extends BasicController
{
    public function storage(NodeStorageRequest $request)
    {
        return $request->all();

    }
}

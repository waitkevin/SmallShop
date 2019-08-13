<?php

namespace App\Http\Requests\System;

use App\Models\SystemNode;
use Illuminate\Validation\Rule;
use App\Http\Requests\AbstractRequest;

class NodeStorageRequest extends AbstractRequest
{
    /**
     * 场景值
     * @var array
     */
    public $scenes = [
        'id' => 'id',
        'name'   => 'name',
        'router' => 'router',
        'icons'  => 'icons',
        'mark'   => 'mark',
        'sort'   => 'sort',
        'type'   => 'type',
        'status' => 'status',
        'parent_id' => 'parent_id'
    ];


    /**
     * 验证规则
     *
     * @return array
     */
    public function rules(SystemNode $systemNode)
    {
        return [
            'id' => ['sometimes', 'nullable', Rule::exists($systemNode->getTable(), 'id')],
            'name' => ['required', 'max:50', Rule::unique($systemNode->getTable())->ignore($this->get('id', 0))],
            'router' => ['required', 'max:200'],
            'icons' => ['required', 'max:150', 'alpha_dash'],
            'mark' => ['sometimes', 'nullable', 'max:255'],
            'sort' => ['required', 'numeric'],
            'type' => ['required', Rule::in([1, 2])],
            'status' => ['required', Rule::in([1, 2])],
            'parent_id' => ['sometimes', 'nullable', Rule::exists($systemNode->getTable(), 'id')]
        ];
    }


    /**
     * custom validation message
     * @return array
     */
    public function messages()
    {
        return [
            'id.exists' => '权限节点信息不存在',

            'name.required' => '权限路由名称必须填写',
            'name.max' => '权限路由名称最大长度为50',
            'name.unique' => '权限路由名称已存在',

            'router.required' => '权限路由必须填写',
            'router.max' => '权限路由最大长度为200',

            'icons.required' => '权限路由图标必须填写',
            'icons.max' => '权限路由图标最大长度为150',
            'icons.alpha_dash' => '权限路由图标可以为数字,字母,下划线以及中划线',

            'mark.max' => '权限备注最大长度为255',

            'sort.required' => '权限排序必须填写',
            'sort.numeric' => '权限排序格式必须为数字',

            'type.required' => '权限类型必须填写',
            'type.in' => '权限类型格式错误',

            'status.required' => '权限状态必须填写',
            'status.in' => '权限状态格式错误',

            'parent_id.exists' => '权限父级节点不存在',
        ];
    }



//    public function passwordRules()
//    {
//        return [
//            'password' => [
//                'required', 'min:6', 'max:16', 'different:$old_password'      //修改新密码不和旧密码相同，此处只是举例子，因为密码需要Hash处理才能判断是否相同
//            ]
//        ];
//    }
}

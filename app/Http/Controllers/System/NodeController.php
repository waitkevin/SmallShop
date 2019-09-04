<?php

namespace App\Http\Controllers\System;


use App\Models\SystemNode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\Common\ResponseServices;
use App\Http\Requests\System\NodeRequest;
use App\Http\Resources\System\NodeCollection;

/**
 * 系统权限管理
 *
 * Class NodeController
 * @package App\Http\Controllers\System
 */
class NodeController extends BasicController
{
    /**
     * 添加|编辑 权限节点
     *
     * @param NodeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storage(NodeRequest $request)
    {
        $request->validate();
        $params = $request->only(['name', 'router', 'icons', 'mark', 'sort', 'type', 'status', 'path']);
        $params['parent_id'] = $request->parent_id = empty($params['path']) ? null : $params['path'][count($params['path']) - 1];
        $params['path'] = implode(',', $params['path']);

        try {
            DB::transaction(function () use ($request, $params) {

                if (!empty($request->parent_id)) {
                    $parentNode = SystemNode::where('id', $request->parent_id)->first();
                    $response = $request->id
                        ? $parentNode->appendNode(SystemNode::where('id', $request->id)->first())
                        : $parentNode->children()->create($params);

                } else {
                    $response = $request->id
                        ? SystemNode::where(['id' => $request->id])->first()->makeRoot()->save()
                        : SystemNode::create($params);
                }

                if (!$response)
                    throw new \Exception('操作失败');

            }, 2);

            return ResponseServices::success('操作成功');
        } catch (\Exception $exception) {
            return ResponseServices::error('操作失败');
        }
    }


    /**
     * 删除权限节点
     *
     * @param NodeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(NodeRequest $request)
    {
        $request->with('id')->validate('destroy');
        $node = SystemNode::where('id', $request->id)->first();
        if ($node->descendants->isEmpty() && $node->delete())
            return ResponseServices::success('删除权限成功');

        return ResponseServices::error('权限存在子级节点或删除失败');
    }


    /**
     * 全部权限节点树
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        // TODO:: 可传入条件
        $response = SystemNode::where([])->get()->toTree();
        return ResponseServices::success('success', $response);
    }



    /**
     * 系统权限列表
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        $response = SystemNode::where('parent_id', $request->parent_id?? null)
            ->withCount('descendants')
            ->orderBy('sort', 'desc')
            ->orderBy('id', 'asc')
            ->get();

        return ResponseServices::success('success', new NodeCollection($response));
    }
}

<?php

namespace App\Services\Common;

/**
 * 数据结构转换
 *
 * Class StructServices
 * @package App\Services\Common
 */
class StructServices
{
    /**
     * 生成树结构
     *
     * @param  array    $data           源数据
     * @param  int      $root           顶级分类ID, 0为全部
     * @param  string   $parentName
     * @param  string   $childName
     * @return array
     */
    public static function recursiveTree(array $data = [], $root = 0, $parentName = 'parent_id', $childName = 'children')
    {
        $treeArray = [];
        foreach ($data as $k => $v) {
            if ($v[$parentName] == $root) {
                $v[$childName] = self::recursiveTree($data, $v['id'], $parentName, $childName);
                $treeArray[] = $v;
            }
        }
        return $treeArray;
    }
}




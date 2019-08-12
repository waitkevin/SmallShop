<?php

namespace App\Http\Controllers\ClientApi;


use App\Models\GoodsCategory;
use App\Services\Common\StructServices;

/**
 * 商品分类控制器
 * @author kevin <kevin_chengjian@163.com>
 *
 * Class GoodsCategoryController
 * @package App\Http\Controllers\ClientApi
 */
class GoodsCategoryController extends BasicController
{
    /**
     * GoodsCategoryController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function show(GoodsCategory $goodsCategory)
    {

        dd($result =  GoodsCategory::whereDescendantOrSelf(7)->get()->toTree()->toArray());
        dd(GoodsCategory::create([
            'category_name' => '首页',
            'category_desc' => '首页分类',
            'category_icon' => 'home icons',
            'category_status' => 1,
            'sort' => 22,
//            'parent_id' => 0,
            'children' => [
                [
                'category_name' => '食品',
                'category_desc' => '食品',
                'category_icon' => 'shiping icons',
                'category_status' => 1,
                'sort' => 22,
//                'parent_id' => 0,
                ]
            ]
        ]));

////        dump(GoodsCategory::all()); die();
//        dd(StructServices::recursiveTree(GoodsCategory::all()->toArray()));
//        return [
//            'a' => (StructServices::recursiveTree(GoodsCategory::all()->toArray())),
//            'v' =>  microtime(true) - LARAVEL_START,
//        ];
//         ;
//        $mi = microtime(true);
//        dump($mi, LARAVEL_START, $mi - LARAVEL_START);
    }


}
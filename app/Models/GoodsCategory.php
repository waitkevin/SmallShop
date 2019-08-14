<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;


/**
 * 商品分类
 *
 * Class GoodsCategory
 * @package App\Models
 */
class GoodsCategory extends BasicModel
{
    use NodeTrait;


    /**
     * @var string
     */
    protected $table = 'goods_category';


    /**
     * The blacklist
     * @var array
     */
    protected $guarded = [];
}

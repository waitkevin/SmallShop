<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * 商品分类
 *
 * Class GoodsCategory
 * @package App\Models
 */
class GoodsCategory extends Model
{
    use NodeTrait;


    /**
     * @var string
     */
    protected $table = 'goods_category';


    /**
     * @var array
     */
    protected $guarded = [];
}

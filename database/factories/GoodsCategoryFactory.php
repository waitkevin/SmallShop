<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\GoodsCategory::class, function (Faker $faker) {
    return [
        'category_name' =>  '[ ' . 11 .' ] 分类',
        'category_desc' => '[ ' . 1 .' ] 分类',
        'category_icon' => 'icons',
        'category_status' => 1,
        'sort' => mt_rand(0, 9999),
        'parent_id' => 0,
        'path' => '0',
    ];
});

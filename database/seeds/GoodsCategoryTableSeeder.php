<?php

use Illuminate\Database\Seeder;

class GoodsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(\App\Models\GoodsCategory::class, 1)->create();
        for ($i = 1; $i <= 3; $i++) {
            \App\Models\GoodsCategory::create([
                'category_name' => '一级分类',
                'category_desc' => '一级分类',
                'category_icon' => 'icons',
                'category_status' => 1,
                'sort' => mt_rand(0, 9999),
                'parent_id' => 0,
                'path' => '0',
            ]);

            for ($j = 1; $j <= 3; $j++) {
                \App\Models\GoodsCategory::create([
                    'category_name' => '二级分类',
                    'category_desc' => '二级分类',
                    'category_icon' => 'icons',
                    'category_status' => 1,
                    'sort' => mt_rand(0, 9999),
                    'parent_id' => $i,
                    'path' => '0',
                ]);
            }
        }
    }
}

<?php

use Kalnoy\Nestedset\NestedSet;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCategoryTable extends Migration
{
    /**
     * 商品分类表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_category', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('商品分类ID');
            $table->string('category_name', 50)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('商品分类ID');
            $table->string('category_desc', 150)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('商品分类描述');
            $table->string('category_icon', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('商品分类图标');
            $table->unsignedTinyInteger('category_status')->default(1)->comment('商品分类状态: 1=显示, 2=隐藏');
            $table->unsignedInteger('sort')->default(0)->comment('商品分类排序: 默认升序');
            $table->nestedSet();
            $table->dateTime('created_at')->comment('创建时间');
            $table->dateTime('updated_at')->comment('更新时间');

            $table->index('parent_id', 'index_parent_id');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_category');
    }
}

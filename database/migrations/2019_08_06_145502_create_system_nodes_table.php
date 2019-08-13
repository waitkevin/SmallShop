<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemNodesTable extends Migration
{
    /**
     * 系统权限节点表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_nodes', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->string('name', 50)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('权限名称');
            $table->string('router', 200)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('权限路由');
            $table->string('icons', 150)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('权限图标');
            $table->string('mark', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('节点备注');
            $table->unsignedInteger('sort')->default(1)->comment('排序:默认降序');
            $table->unsignedTinyInteger('type')->default(2)->comment('权限类型:1=菜单, 2=操作节点');
            $table->unsignedTinyInteger('status')->default(1)->comment('权限状态:1=显示,2=隐藏');
            $table->nestedSet();
            $table->dateTime('created_at')->comment('创建时间');
            $table->dateTime('updated_at')->comment('更新时间');

            $table->unique('name');

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
        Schema::dropIfExists('system_nodes');
    }
}

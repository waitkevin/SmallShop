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
            $table->string('node_name', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('权限节点名称');
            $table->string('node_router', 150)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('权限节点路由');
            $table->unsignedTinyInteger('status')->default(1)->comment('权限节点状态:1=显示,2=隐藏');

            $table->timestamps();
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

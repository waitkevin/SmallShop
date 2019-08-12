<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemUsersTable extends Migration
{
    /**
     * 系统用户表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('');
            $table->string('username', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('用户账号');
            $table->string('nickname', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('用户昵称');
            $table->string('password')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('登录密码');
            $table->string('avatar')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('用户头像');
            $table->string('email', 50)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('用户邮箱');
            $table->string('phone', 20)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('用户电话');
            $table->unsignedInteger('admin_id')->nullable(0)->comment('系统用户ID');
            $table->unsignedTinyInteger('status')->default(1)->comment('用户状态:1=正常,2=异常');
            $table->unsignedInteger('role_id')->default(0)->comment('系统角色ID');
            $table->softDeletes()->comment('软删除标识');

            $table->unique('username');

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
        Schema::dropIfExists('system_users');
    }
}

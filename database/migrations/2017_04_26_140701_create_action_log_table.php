<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('actionlog.table_name'), function (Blueprint $table) {
            $table->engine = "InnoDB COMMENT='用户操作记录表'";

            $table->increments('id');

            $table->integer('user_id')
                ->unsigned()
                ->comment('操作者ID');

            $table->string('type', 50)
                ->comment('操作类型');

            $table->string('table_name', 50)
                ->comment('相关的数据表');

            $table->string('content', 500)
                ->comment('操作描述');

            $table->string('ip', 20)
                ->comment('操作者IP');

            $table->timestamps();

            $table->index('user_id');
            $table->index('type');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('actionlog.table_name'));
    }
}

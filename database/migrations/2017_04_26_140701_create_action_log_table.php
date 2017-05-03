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

            $table->integer(config('actionlog.user_foreign_key'))
                ->unsigned()
                ->comment('操作者ID');

            $table->string('type', 50)
                ->comment('操作类型');

            $table->text('content')
                ->comment('操作描述');

            $table->string('client_ip', 20)
                ->comment('操作者IP');

            $table->string('client')
                ->comment('客户端信息');

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

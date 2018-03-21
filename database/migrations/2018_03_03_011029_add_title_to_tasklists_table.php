<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleToTasklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasklists', function (Blueprint $table) {
            $table->string('status', 10);
        });

        // 外部キー制約
        //$table->foreign('user_id')->references('id')->on('users');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasklists', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        // Schema::drop('tasklists');
    }
}

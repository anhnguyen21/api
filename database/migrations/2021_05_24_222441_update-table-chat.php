<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('chat');
        Schema::create('chat', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_role');
            $table->integer('id_admin');
            $table->integer('id_shop');
            $table->string('content');
            $table->dateTime('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat');
    }
}

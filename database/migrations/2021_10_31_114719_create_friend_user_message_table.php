<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendUserMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend_user_message', function (Blueprint $table) {
            $table->unsignedBigInteger('from_user')->index();
            $table->unsignedBigInteger('to_user')->index();
            $table->text('message');
            $table->boolean('read')->default(0);
            $table->timestamp('date');
            $table->foreign('from_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friend_user_message');
    }
}

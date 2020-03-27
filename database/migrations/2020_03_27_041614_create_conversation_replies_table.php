<?php
/**
 * Copyright (c) 2020.
 * [Alvaro Lucas Castillo Calabacero]
 * Contact alvarolucascc96@gmail.com
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversation_replies', function (Blueprint $table) {
            $table->id();
            $table->text("reply");
            $table->integer("user_id_fk");
            $table->string('ip');
            $table->integer("time");
            $table->integer("conversation_id_fk");
            $table->float("latitude");
            $table->float("longitude");
            $table->foreign("user_id_fk")->references("id")->on("users");
            $table->foreign("conversation_id_fk")->references("id")->on("conversations");

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
        Schema::dropIfExists('conversation_replies');
    }
}

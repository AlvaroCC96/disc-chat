<?php
/**
 * Copyright (c) 2020.
 * [Alvaro Lucas Castillo Calabacero]
 * Contact alvarolucascc96@gmail.com
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->integer("user_one_fk");
            $table->integer("user_two_fk");
            $table->text("reply");

            $table->DateTime("time"); // como int ? o como string y la parseamos a Date en la APP?

            $table->float("latitude");
            $table->float("longitude");

            $table->timestamps();

            $table->foreign("user_one_fk")->references("id")->on("users");
            $table->foreign("user_two_fk")->references("id")->on("users");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}

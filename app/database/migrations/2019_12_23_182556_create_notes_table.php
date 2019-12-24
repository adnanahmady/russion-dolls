<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('card_id');
            $table->text('body');
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('card_id')->on('cards')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (config('database.default') !== 'sqlite') {
            Schema::table('notes', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropForeign(['card_id']);
            });
        }

        Schema::dropIfExists('notes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetlistSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setlistSongs', function (Blueprint $table) {
            $table->id();
            $table->integer('order');
            $table->foreignId('songId')->references('id')->on('songs');
            $table->foreignId('setlistId')->references('id')->on('setlists');
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
        Schema::dropIfExists('setlist_songs');
    }
}

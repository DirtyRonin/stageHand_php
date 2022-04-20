<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customEvents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->default('combined text');
            $table->dateTime('date');
            $table->foreignId('bandId')->references('id')->on('bands');
            $table->foreignId('locationId')->references('id')->on('locations');
            $table->foreignId('setlistId')->references('id')->on('setlists');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_events');
    }
}

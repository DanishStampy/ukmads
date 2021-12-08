<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->string('id_event')->primary();
            $table->string('creator_email');
            $table->foreign('creator_email')->references('email')->on('users');
            $table->string('name', 255);
            $table->string('location');
            $table->time('time');  # HH:MI
            $table->date('date');   # YYYY-MM-DD
            $table->string('organizer');
            $table->string('contact');
            $table->text('description');
            $table->string('picture', 255);
            $table->boolean('status');
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
        Schema::dropIfExists('events');
    }
}

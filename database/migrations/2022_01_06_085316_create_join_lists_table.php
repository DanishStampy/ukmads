<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_event');
            $table->foreign('id_event')->references('id_event')->on('events'); //key 1
            $table->string('guest_email', 255); //key 2
            $table->string('guest_name', 255);
            $table->string('guest_contact');
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
        Schema::dropIfExists('join_lists');
    }
}

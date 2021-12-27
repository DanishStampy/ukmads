<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->string('id_ads')->primary();
            $table->string('creator_email');
            $table->foreign('creator_email')->references('email')->on('users');
            $table->string('name', 255);
            $table->string('type');
            $table->float('price', 5, 2);
            $table->string('seller_name', 255);
            $table->string('contact');
            $table->text('description');
            $table->string('picture', 255)->nullable();
            $table->text('reason', 255)->nullable();
            $table->enum("status", ["draft","pending", "verified", "rejected"]);
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
        Schema::dropIfExists('advertisements');
    }
}

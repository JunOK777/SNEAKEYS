<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('image_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('like_count')->default(0);

            $table->string('size');
            $table->string('stars')->nullable();
            $table->text('comfort');
            
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('reviews');
    }
}

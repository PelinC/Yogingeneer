<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            //should be unsignedBigInteger to relate to categories table
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('image');
            $table->longtext('content');
            $table->integer('hit')->default(0);
            $table->integer('status')->default(0)->comment('0: passive 1:active');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

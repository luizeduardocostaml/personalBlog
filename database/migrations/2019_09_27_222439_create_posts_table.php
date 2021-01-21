<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['blog', 'notice']);
            $table->string('title', 50);
            $table->string('slug', 60)->unique();
            $table->string('resume',400);
            $table->text('text');
            $table->string('image',256);
            $table->unsignedBigInteger('author_id');
            $table->integer('views');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')->references('id')->on('users');
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

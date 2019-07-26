<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->softDeletes();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('content');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
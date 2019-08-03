<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationTagArticleTable extends Migration
{
    public function up()
    {
        Schema::create('relation_tag_article', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('tag_id')->unsigned()->index();
            $table->integer('article_id')->unsigned()->index();
        });
    }
    public function down()
    {
        Schema::dropIfExists('relation_tag_article');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            # id 删除时间 发布时间 创建时间 修改时间
            $table->increments('id');
            $table->softDeletes();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            # 是否草稿
            $table->boolean('is_draft');

            # 模板
            $table->string('layout')->default('stage.layout');

            # 短标题
            $table->string('slug')->unique();

            # 标题和子标题
            $table->string('title');
            $table->string('subtitle');

            # 内容
            $table->text('content_raw');
            $table->text('content_html');

            # 图片和元描述
            $table->string('page_image');
            $table->string('meta_description');
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}

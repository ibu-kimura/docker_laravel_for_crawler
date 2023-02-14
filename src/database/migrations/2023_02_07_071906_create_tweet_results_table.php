<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweet_results', function (Blueprint $table) {
            $table->id()->comment('twitterデータコード');
            $table->string('tweet_id',255)->comment('ツイートコード');
            $table->string('user_id',255)->comment('ユーザーコード');
            $table->string('user_name',255)->comment('ユーザー名')->nullable();
            $table->text('url')->comment('ツイートURL');
            $table->unsignedBigInteger('works_id')->comment('作品コード');
            $table->unsignedBigInteger('search_word_id')->comment('検索語コード');
            $table->string('type',255)->comment('ツイート種別');
            $table->text('full_text')->comment('ツイート本文');
            $table->text('comment')->comment('管理コメント')->nullable();
            $table->integer('alert_cnt')->comment('警告回数');
            $table->datetime('created')->comment('作成日');
            $table->datetime('updated')->comment('更新日')->nullable();
            $table->datetime('alerted')->comment('警告日')->nullable();
            $table->datetime('deleted')->comment('削除日')->nullable();

            $table->foreign('works_id')->references('id')->on('mst_works')->onDelete('cascade');
            $table->foreign('search_word_id')->references('id')->on('search_words')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweet_results');
    }
};

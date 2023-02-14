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
        Schema::create('web_results', function (Blueprint $table) {
            $table->id()->comment('webデータコード');
            $table->unsignedBigInteger('target_id')->comment('検索サービス種別コード');
            $table->unsignedBigInteger('search_word_id')->comment('検索語コード');
            $table->text('url')->comment('url');
            $table->string('status',255)->comment('警告ステータス')->nullable();
            $table->integer('alert_cnt')->comment('警告回数')->nullable();
            $table->datetime('alerted')->comment('警告日')->nullable();
            $table->datetime('patroled')->comment('巡回日')->nullable();
            $table->datetime('created')->comment('作成日');


            $table->foreign('target_id')->references('id')->on('target_services')->onDelete('cascade');
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
        Schema::dropIfExists('web_results');
    }
};

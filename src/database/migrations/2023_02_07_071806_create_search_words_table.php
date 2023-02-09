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
        Schema::create('search_words', function (Blueprint $table) {
            $table->id()->comment('検索語コード');
            $table->integer('target_type')->comment('検索サービス種別コード');
            $table->unsignedBigInteger('works_id')->comment('作品コード');
            $table->string('keyword',255)->comment('検索語');
            $table->datetime('created')->comment('作成日');
            $table->datetime('updated')->comment('更新日')->nullable();
            $table->datetime('searched')->comment('検索日');

            $table->foreign('works_id')->references('id')->on('mst_works');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_words');
    }
};

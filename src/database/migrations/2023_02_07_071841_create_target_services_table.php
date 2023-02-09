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
        Schema::create('target_services', function (Blueprint $table) {
            $table->id()->comment('検索サービスコード');
            $table->integer('type')->comment('検索サービス種別1:WEB 2:twitter 3:google');
            $table->string('site_name',255)->comment('サービス名');
            $table->text('url')->comment('サービスURL');
            $table->text('alert_type')->comment('警告種別');
            $table->text('domain_name')->comment('ドメイン名');
            $table->string('adress',500)->comment('メールアドレス');
            $table->text('directory')->comment('サイト別動画ページディレクトリ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('target_services');
    }
};

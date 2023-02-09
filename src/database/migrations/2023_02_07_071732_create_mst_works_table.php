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
        Schema::create('mst_works', function (Blueprint $table) {
            $table->id()->comment('作品コード');
            $table->string('code',255)->comment('品番');
            $table->text('title')->comment('タイトル');
            $table->string('actress',100)->comment('女優名')->nullable();
            $table->text('url')->comment('作品URL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_works');
    }
};

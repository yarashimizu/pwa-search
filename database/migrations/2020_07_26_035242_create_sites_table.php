<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default("");          // サイト名
            $table->string('company')->default("");       // サイト管理会社名 or サイトサイト管理者
            $table->string('url')->default("");           // 該当URL 必須
            $table->string('category')->default("");      // サイトのカテゴリー
            $table->string('tags')->default("");          // タグ(#等で設定をする想定...)
            $table->string('language')->default("japan"); // 対応言語
            $table->boolean('show')->default(true);       // 見せるか見せないか制御する
            $table->boolean('deleted')->default(false);   // 削除済みフラグ
            $table->string('comment')->default("");       // コメント(備考)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sites');
    }
}

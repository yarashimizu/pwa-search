<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('psites', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // サイト名
            $table->string('company');       // サイト管理会社名 or サイトサイト管理者
            $table->string('url');           // 該当URL 必須
            $table->string('category');      // サイトのカテゴリー
            $table->string('tags');          // タグ(#等で設定をする想定...)
            $table->boolean('show');         // 見せるか見せないか制御する
            $table->boolean('deleted');      // 削除済みフラグ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('psites');
    }
}

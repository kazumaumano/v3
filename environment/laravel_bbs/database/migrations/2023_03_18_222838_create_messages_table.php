<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',20);
            $table->string('body',100);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}






//データベースの作り方　xxxx_create_messages_table.phpのupメソッドにカラムを記入してphp artisan migrateを実行するのみ　ロールバックなど戻すこともできる


// モデルという言葉における混乱
// 実は、Laravelにおいてモデルという言葉は３つの意味で利用されています。そのため、混乱しやすいところです。

// 1. ソフトウェアの全体構造を表す
// 「MVCモデル」という言葉のカタカナの「モデル」は、ソフトウェアの全体の構造（アーキテクチャ）を表しています。

// 2. MVCのうち、データの処理を担当する役割
// 「MVCモデル」といった時のアルファベットの「M」は、その中でもデータの処理（ビジネスロジック）を担当する Model の役割を指しています。

// 3. データ処理の中でも、データベースとのやり取りを担当するオブジェクト
// そして、今回コマンドで作成した Message モデルという時のモデルは、データ処理の中でもデータベースとのやりとりを担当するものです。
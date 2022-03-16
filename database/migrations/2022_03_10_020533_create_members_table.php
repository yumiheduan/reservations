<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('会員ID');
            $table->integer('user_id')->comment('ユーザーID');
            $table->string('kana_name', 100)->collation('utf8_unicode_ci')->comment('氏名かな');
            $table->string('phone', 100)->comment('電話番号');
            $table->string('email')->comment('メールアドレス')->nullable();
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
        Schema::dropIfExists('members');
    }
}

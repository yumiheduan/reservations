<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->integer('reservation_id')->comment('予約ID');
            $table->integer('member_id')->comment('会員ID');
            $table->date('reservation_date')->comment('予約日')->collation('utf8_unicode_ci');
            $table->char('start_time', 2)->comment('開始時間')->collation('utf8_unicode_ci');
            $table->integer('room_id')->comment('部屋ID');
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
        Schema::dropIfExists('times');
    }
}

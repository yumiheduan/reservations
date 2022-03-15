<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('予約ID');
            $table->integer('member_id')->comment('会員ID');
            $table->date('reservation_time')->comment('予約日時')->collation('utf8_unicode_ci');
            $table->char('utilization_time', 2)->comment('利用時間');
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
        Schema::dropIfExists('reservations');
    }
}

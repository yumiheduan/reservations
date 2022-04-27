<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * ReservationModelクラス
 */
class Reservation extends Model
{
    /**
     * リレーション
     */
    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function room()
    {
        return $this->hasone('App\Room');
    }

    public function time()
    {
        return $this->hasMany('App\Time');
    }

    /**
     * @var array 値を代入しないプロパティ
     */
    protected $guarded = ['id',];
    protected $dates = ['reservation_date'];
}

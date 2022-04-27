<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * TimeModelクラス
 */
class Time extends Model
{
    /**
     * リレーション
     */
    public function room()
    {
        return $this->hasone('App\Room');
    }

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    /**
     * @var array 値を代入しないプロパティ
     */
    protected $guarded = ['id',];
    protected $dates = ['reservation_time'];
}

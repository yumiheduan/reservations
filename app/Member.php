<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * MemberModelクラス
 */
class Member extends Model
{
    /**
     * リレーション
     */
    public function reservation()
    {
        return $this->hasMany("App\Reservation");
    }

    public function time()
    {
        return $this->hasMany("App\Time");
    }

    /**
     * @var array 値を代入しないプロパティ
     */
    protected $guarded = ['id',];

}

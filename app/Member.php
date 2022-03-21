<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
    * リレーション
    */
    public function reservation()
    {
        return $this->hasMany("App\Reservation");
    }
}

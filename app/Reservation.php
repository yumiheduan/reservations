<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function member()
    {
        return $this->belongsTo('App\Member');
        return $this->hasOne('App\Room');
    }
}

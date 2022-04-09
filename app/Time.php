<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public function room()
    {
        return $this->hasone('App\Room');
    }

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    protected $guarded = ['id',];
    protected $dates = ['reservation_time'];
}

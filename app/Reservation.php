<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
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


    protected $guarded = ['id',];
    protected $dates = ['reservation_date'];
}

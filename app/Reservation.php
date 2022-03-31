<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function room()
    {
        return $this->hasone('App\Room');
    }

    protected $guarded = ['id',];
    protected $dates = ['reservation_time'];
}

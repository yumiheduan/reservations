<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function room()
    {
        return $this->hasone('App\room');
    }
}

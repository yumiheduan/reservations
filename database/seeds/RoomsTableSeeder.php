<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = ['room_type' => 'A'];
        $rooms = new Room;
        $rooms->fill($param)->save();

        $param = ['room_type' => 'B'];
        $rooms = new Room;
        $rooms->fill($param)->save();
    }
}

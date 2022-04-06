<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'kana_name' => mb_convert_kana(str_replace(' ','',$faker->kanaName), 'c'),
        'phone'=> $faker->phoneNumber,
        'email' => $faker->safeEmail,
    ];
});

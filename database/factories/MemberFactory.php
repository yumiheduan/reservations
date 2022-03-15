<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'kana_name' => $faker->name,
        'phone'=> $faker->phoneNumber,
        'email' => $faker->safeEmail,
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Info;
use App\Models\Temp;
use Faker\Generator as Faker;

$factory->define(Info::class, function (Faker $faker) {
    return [
        'temp_id' => function () {
            return \factory(Temp::class)->create()->id;
        },
        'hobby' => $faker->word,
    ];
});

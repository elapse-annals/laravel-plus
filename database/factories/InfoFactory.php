<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Info;
use App\Models\Tmpl;
use Faker\Generator as Faker;

$factory->define(Info::class, function (Faker $faker) {
    return [
        'tmpl_id' => function () {
            return \factory(Tmpl::class)->create()->id;
        },
        'hobby' => $faker->word,
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Temp;
use Faker\Generator as Faker;
use Faker\Factory as Factory;

$factory->define(Temp::class, function () {
    $faker = Factory::create('zh_CN');
    return [
        'name' => $faker->name,
        'sex'  => $faker->numberBetween(0, 1),
    ];
});

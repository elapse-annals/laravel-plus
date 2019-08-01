<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Temp;
use Faker\Generator as Faker;
use Faker\Factory as Factory;

$factory->define(Temp::class, function () {
    $faker = Factory::create('zh_CN');
    $operated_by = $faker->name;
    return [
        'name' => $faker->name,
        'sex' => $faker->numberBetween(0, 1),
        'created_by' => $operated_by,
        'updated_by' => $operated_by,
    ];
});

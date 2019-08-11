<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Langauge;
use Faker\Generator as Faker;

$factory->define(Langauge::class, function (Faker $faker) {
    $operated_by = $faker->userName;
    $code_part_list = ['zh', 'en', 'ja', 'de'];
    return [
        'key'        => $faker->word,
        'code'       => array_rand($code_part_list),
        'value'      => $faker->word,
        'created_by' => $operated_by,
        'updated_by' => $operated_by,
    ];
});

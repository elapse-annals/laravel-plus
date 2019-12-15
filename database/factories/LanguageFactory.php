<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Language;
use Faker\Generator as Faker;

$factory->define(Language::class, function (Faker $faker) {
    $operated_by = $faker->userName;
    $code_part_list = ['zh', 'en', 'ja', 'de'];
    $code_part_list_count = count($code_part_list);
    return [
        'key_word'    => $faker->word,
        'code'       => $code_part_list[mt_rand(0, $code_part_list_count - 1)],
        'key_value'  => $faker->word,
        'created_by' => $operated_by,
        'updated_by' => $operated_by,
    ];
});

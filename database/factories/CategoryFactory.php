<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\category;
use Faker\Generator as Faker;

$factory->define(category::class, function (Faker $faker) {
    return [
        "category_name" => $faker->name
    ];
});

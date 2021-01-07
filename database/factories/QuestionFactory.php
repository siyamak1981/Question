<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title'=>rtrim($faker->sentence(rand(3,5)),'.'),
        'body'=>$faker->paragraph(rand(3,7),true),
    ];
});

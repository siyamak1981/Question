<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Question;
use Faker\Generator as Faker;


$factory->define(Question::class, function (Faker $faker) {
    return [
        'title'=>rtrim($faker->sentence(rand(3,5)),'.'),
        'body'=>$faker->paragraph(rand(3,7),true),
        'votes'=>rand(-10, 10),
        'answers'=>rand(0,10),
        'views'=>rand(0,10),
    ];
});

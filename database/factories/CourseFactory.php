<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'class' => $faker->randomElement(['class-11', 'class-12', 'JEE-NEET']),
        'heading' => $faker->sentence(2),
        'youtube_url' => $faker->randomElement(['https://www.youtube.com/embed/iGwBZTWySWk', 'https://www.youtube.com/embed/B6mi1-YoRT4']),     
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'pdf' => $faker->randomElement(['http://127.0.0.1:8000/pdf/class-11/1620665809.pdf', 'http://127.0.0.1:8000/pdf/class-11/1620665847.pdf'])
    ];
});

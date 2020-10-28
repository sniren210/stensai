<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(post::class, function (Faker $faker) {
    return [
        'nama' => null,
        'judul' => $this->faker->sentence(
            $nbWords = 3,
            $variableNbWords = true
        ),
        'deskripsi' => $this->faker->paragraph(
            $nbSentences = 2,
            $variableNbSentences = true
        ),
        'thumbnail' => 'thumbnail-default.png',
        'tanggal' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        'kategori_id' => 1,
        'user_id' => 1,
    ];
});

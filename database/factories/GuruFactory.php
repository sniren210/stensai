<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\guru;
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

$factory->define(guru::class, function (Faker $faker) {
    return [
        //
        'nama' => $this->faker->name(),
        'nip' => $this->faker->randomNumber($nbDigits = 8),
        'npwp' => $this->faker->randomNumber($nbDigits = 8),
        'tmp_lahir' => $this->faker->state,
        'tgl_lahir' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        'jk' => 'Laki-laki',
        'agama' => 'Islam',
        'alamat' => $this->faker->address,
        'foto' => 'guru-default.png',
    ];
});


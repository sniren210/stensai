<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\siswa;
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

$factory->define(siswa::class, function (Faker $faker) {
    return [
        //
        'nama' => $this->faker->name(),
        'nis' => $this->faker->randomNumber($nbDigits = 8),
        'nisn' => $this->faker->randomNumber($nbDigits = 8),
        'jk' => 'Laki-laki',
        'tmp_lahir' => $this->faker->state,
        'tgl_lahir' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        'agama' => 'Islam',
        'anak_ke' => 1,
        'foto' => 'siswa-default.png',
        'alamat' => $this->faker->address,
        'nama_ayah' => $this->faker->name($gender = 'male'),
        'nama_ibu' => $this->faker->name($gender = 'female'),
        'jurusan_id' => 1,
        'kelas_id' => 1,
    ];
});


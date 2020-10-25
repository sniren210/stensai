<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            KategoriPostSeeder::class,
            SaranSeeder::class,
            AjuanSeeder::class,
            PostSeeder::class,
            EventSeeder::class,
            GuruSeeder::class,
            JadwalGuruSeeder::class,
            JadwalKelasSeeder::class,
            JadwalRuangSeeder::class,
            JurusanSeeder::class,
            KelasSeeder::class,
            MapelSeeder::class,
            NilaiSiswaSeeder::class,
            RuangSeeder::class,
            SekolahSeeder::class,
            SiswaSeeder::class,
            WaliKelasSeeder::class,
            UserSeeder::class,
            PengajuanSeeder::class
        ]);
    }
}

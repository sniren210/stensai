<?php

use Illuminate\Database\Seeder;

class NilaiSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('nilai_siswa')->insert(array(
            [
                'nilai' => 89,
                'siswa_id' => 1,
                'mapel_id' =>  1
            ],
            [
                'nilai' => 75,
                'siswa_id' => 2,
                'mapel_id' =>  4
            ],
            [
                'nilai' => 67,
                'siswa_id' => 3,
                'mapel_id' =>  2
            ],
            [
                'nilai' => 78,
                'siswa_id' => 4,
                'mapel_id' =>  3
            ],
            [
                'nilai' => 90,
                'siswa_id' => 3,
                'mapel_id' =>  5
            ],
            [
                'nilai' => 97,
                'siswa_id' => 5,
                'mapel_id' =>  2
            ],
        ));
    }
}

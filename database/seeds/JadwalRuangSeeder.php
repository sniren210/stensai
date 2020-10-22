<?php

use Illuminate\Database\Seeder;

class JadwalRuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jadwal_ruang')->insert(array(
            [
                'ruang_id' => 5,
                'mapel_id' => 2,
                'jam_ke' => 2
            ],
            [
                'ruang_id' => 4,
                'mapel_id' => 4,
                'jam_ke' => 3
            ],
            [
                'ruang_id' => 3,
                'mapel_id' => 3,
                'jam_ke' => 4
            ],
            [
                'ruang_id' => 2,
                'mapel_id' => 1,
                'jam_ke' => 5
            ],
            [
                'ruang_id' => 1,
                'mapel_id' => 1,
                'jam_ke' => 1
            ],
        ));
    }
}

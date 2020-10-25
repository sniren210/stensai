<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jadwal_kelas')->insert(array(
            [
                'kelas_id' => 2,
                'mapel_id' => 2,
                'jam_ke' => 2
            ],
            [
                'kelas_id' => 1,
                'mapel_id' => 4,
                'jam_ke' => 3
            ],
            [
                'kelas_id' => 3,
                'mapel_id' => 3,
                'jam_ke' => 4
            ],
            [
                'kelas_id' => 4,
                'mapel_id' => 1,
                'jam_ke' => 5
            ],
            [
                'kelas_id' => 5,
                'mapel_id' => 1,
                'jam_ke' => 1
            ],
        ));
    }
}

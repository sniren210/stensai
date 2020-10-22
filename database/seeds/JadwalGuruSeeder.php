<?php

use Illuminate\Database\Seeder;

class JadwalGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jadwal_guru')->insert(array(
            [
                'guru_id' => 1,
                'mapel_id' => 2,
                'jam_ke' => 2
            ],
            [
                'guru_id' => 5,
                'mapel_id' => 4,
                'jam_ke' => 3
            ],
            [
                'guru_id' => 3,
                'mapel_id' => 3,
                'jam_ke' => 4
            ],
            [
                'guru_id' => 4,
                'mapel_id' => 1,
                'jam_ke' => 5
            ],
            [
                'guru_id' => 2,
                'mapel_id' => 1,
                'jam_ke' => 1
            ],
        ));
    }
}

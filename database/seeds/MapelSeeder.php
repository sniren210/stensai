<?php

use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('mapel')->insert(array(
            [
                'nama' => 'Pemrograman Dasar',
                'singkatan' => 'PD',
                'jenis_mapel' => 'Bengkel',
                'kkm' => 75
            ],
            [
                'nama' => 'Pemrograman Android',
                'singkatan' => 'PA',
                'jenis_mapel' => 'Bengkel',
                'kkm' => 75
            ],
            [
                'nama' => 'Matematika',
                'singkatan' => 'MTK',
                'jenis_mapel' => 'Umum',
                'kkm' => 75
            ],
            [
                'nama' => 'Ilmu Pengetahuan Alam',
                'singkatan' => 'IPA',
                'jenis_mapel' => 'Umum',
                'kkm' => 75
            ],
            [
                'nama' => 'Ilmu Pengetahuan Sosial',
                'singkatan' => 'IPS',
                'jenis_mapel' => 'Umum',
                'kkm' => 75
            ],
        ));
    }
}

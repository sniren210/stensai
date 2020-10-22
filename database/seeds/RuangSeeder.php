<?php

use Illuminate\Database\Seeder;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ruang')->insert(array(
            [
                'nmr_ruang' => 5,
                'jenis_ruang' => 'Umum'
            ],
            [
                'nmr_ruang' => 3,
                'jenis_ruang' => 'Umum'
            ],
            [
                'nmr_ruang' => 1,
                'jenis_ruang' => 'Bengkel'
            ],
            [
                'nmr_ruang' => 2,
                'jenis_ruang' => 'Bengkel'
            ],
            [
                'nmr_ruang' => 4,
                'jenis_ruang' => 'Umum'
            ],
        ));
    }
}

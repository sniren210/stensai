<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kelas')->insert(array(
            [
            'kelas' => 'X',
            'sub_kelas' => 'A'
            ],
            [
            'kelas' => 'X',
            'sub_kelas' => 'B'
            ],
            [
            'kelas' => 'XI',
            'sub_kelas' => 'A'
            ],
            [
            'kelas' => 'XII',
            'sub_kelas' => 'A'
            ],
            [
            'kelas' => 'XII',
            'sub_kelas' => 'B'
            ],
        ));
    }
}

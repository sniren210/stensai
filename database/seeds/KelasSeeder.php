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
            'sub_kelas' => 'A',
            'jurusan_id' => 1,
            ],
            [
            'kelas' => 'X',
            'sub_kelas' => 'B',
            'jurusan_id' => 2,
            ],
            [
            'kelas' => 'XI',
            'sub_kelas' => 'A',
            'jurusan_id' => 1,
            ],
            [
            'kelas' => 'XII',
            'sub_kelas' => 'A',
            'jurusan_id' => 2,
            ],
            [
            'kelas' => 'XII',
            'sub_kelas' => 'B',
            'jurusan_id' => 2,
            ],
        ));
    }
}

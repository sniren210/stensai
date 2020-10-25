<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jurusan')->insert(array(
            [
            'nama' => 'Rekayasa Perangkat Lunak',
            'singkatan' => 'RPL',
            'sub_nama' => 'A'
            ],
           [
            'nama' => 'Teknik Komputer Jaringan',
            'singkatan' => 'TKJ',
            'sub_nama' => 'A'
            ],
        ));
    }
}

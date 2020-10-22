<?php

use Illuminate\Database\Seeder;

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
            'singkatan' => 'RPL'
            ],
           [
            'nama' => 'Teknik Komputer Jaringan',
            'singkatan' => 'TKJ'
            ],
        ));
    }
}

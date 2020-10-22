<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kategori_post')->insert(array(
            [
            'kategori' => 'Karya',
            ],
           [
            'kategori' => 'Eskul',
            ],
        ));
    }
}

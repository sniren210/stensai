<?php

use Illuminate\Database\Seeder;

class WaliKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('wali_kelas')->insert(array(
            [
                'guru_id' => 1,
                'kelas_id' => 1
            ],
            [
                'guru_id' => 2,
                'kelas_id' => 5
            ],
            [
                'guru_id' => 3,
                'kelas_id' => 4
            ],
            [
                'guru_id' => 4,
                'kelas_id' => 2
            ],
            [
                'guru_id' => 5,
                'kelas_id' => 3
            ],
        ));
    }
}

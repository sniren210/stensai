<?php

use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sekolah')->insert(array(
            [
                'nama' => 'SMKN 1 Majalengka',
                'nss' => 201920,
                'npsn' => 39009,
                'prov' => 'Jawa barat',
                'kab' => 'Majalengka',
                'kec' => 'Cigasong',
                'desa' => 'Cicenang',
                'jln' => 'jln raya 68',
                'kd_pos' => 202010,
                'akreditas' => 'B',
                'th_akreditas' => '2002-10-01',
                'th_berdiri' => '1989-10-01',
                'foto' => 'sekolah.png',
                'guru_id' => 1
            ]
        ));
    }
}

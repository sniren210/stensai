<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // factory(App\siswa::class,5)->create();

        DB::table('siswa')->insert([
            [
                'nama' => 'siswa',
                'nis' => '19283912',
                'nisn' => '109981099',
                'jk' => 'Laki-laki',
                'tmp_lahir' => 'tempat lahir',
                'tgl_lahir' => '2000-10-10',
                'agama' => 'Islam',
                'anak_ke' => 1,
                'foto' => 'default.png',
                'alamat' => 'alamat seorang siswa',
                'nama_ayah' => 'nama ayah',
                'nama_ibu' => 'nama ibu',
                'kelas_id' => 1,
                'email' => 'siswa@gmail.com',
                'password' =>
                    '$2y$10$gStH2y1DfslubmTASGuj5OcRvvvvc/YYBAcHY67GmhWp8euuygqe6',
                //admin1234
            ],
        ]);
    }
}

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
            [
                'nama' => 'siswa1',
                'nis' => '19283912',
                'nisn' => '109981099',
                'jk' => 'Laki-laki',
                'tmp_lahir' => 'tempat lahir',
                'tgl_lahir' => '2000-10-10',
                'agama' => 'Islam',
                'anak_ke' => 1,
                'foto' => 'default.png',
                'alamat' => 'alamat seorang siswa1',
                'nama_ayah' => 'nama ayah',
                'nama_ibu' => 'nama ibu',
                'kelas_id' => 1,
                'email' => 'siswa1@gmail.com',
                'password' =>
                    '$2y$10$gStH2y1DfslubmTASGuj5OcRvvvvc/YYBAcHY67GmhWp8euuygqe6',
                //admin1234
            ],
            [
                'nama' => 'siswa2',
                'nis' => '19283912',
                'nisn' => '109981099',
                'jk' => 'Laki-laki',
                'tmp_lahir' => 'tempat lahir',
                'tgl_lahir' => '2000-10-10',
                'agama' => 'Islam',
                'anak_ke' => 1,
                'foto' => 'default.png',
                'alamat' => 'alamat seorang siswa2',
                'nama_ayah' => 'nama ayah',
                'nama_ibu' => 'nama ibu',
                'kelas_id' => 1,
                'email' => 'siswa2@gmail.com',
                'password' =>
                    '$2y$10$gStH2y1DfslubmTASGuj5OcRvvvvc/YYBAcHY67GmhWp8euuygqe6',
                //admin1234
            ],
            [
                'nama' => 'siswa3',
                'nis' => '19283912',
                'nisn' => '109981099',
                'jk' => 'Laki-laki',
                'tmp_lahir' => 'tempat lahir',
                'tgl_lahir' => '2000-10-10',
                'agama' => 'Islam',
                'anak_ke' => 1,
                'foto' => 'default.png',
                'alamat' => 'alamat seorang siswa3',
                'nama_ayah' => 'nama ayah',
                'nama_ibu' => 'nama ibu',
                'kelas_id' => 1,
                'email' => 'siswa3@gmail.com',
                'password' =>
                    '$2y$10$gStH2y1DfslubmTASGuj5OcRvvvvc/YYBAcHY67GmhWp8euuygqe6',
                //admin1234
            ],
            [
                'nama' => 'siswa4',
                'nis' => '19283912',
                'nisn' => '109981099',
                'jk' => 'Laki-laki',
                'tmp_lahir' => 'tempat lahir',
                'tgl_lahir' => '2000-10-10',
                'agama' => 'Islam',
                'anak_ke' => 1,
                'foto' => 'default.png',
                'alamat' => 'alamat seorang siswa4',
                'nama_ayah' => 'nama ayah',
                'nama_ibu' => 'nama ibu',
                'kelas_id' => 1,
                'email' => 'siswa4@gmail.com',
                'password' =>
                    '$2y$10$gStH2y1DfslubmTASGuj5OcRvvvvc/YYBAcHY67GmhWp8euuygqe6',
                //admin1234
            ],
        ]);
    }
}

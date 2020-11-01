<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pengajuan')->insert([
            [
                'siswa_id' => 1,
                'pengajuan' => 'Fasilitas Bengkel',
                'deskripsi' =>
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et tenetur architecto alias dicta hic dolor vel perferendis, qui atque sapiente! Vitae velit architecto qui adipisci!',
                'siswa_b' => true,
            ],
            [
                'siswa_id' => 3,
                'pengajuan' => 'Fasilitas Bengkel',
                'deskripsi' =>
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et tenetur architecto alias dicta hic dolor vel perferendis, qui atque sapiente! Vitae velit architecto qui adipisci!',
                'siswa_b' => true,
            ],
            [
                'siswa_id' => 5,
                'pengajuan' => 'Fasilitas Perspustakaan',
                'deskripsi' =>
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et tenetur architecto alias dicta hic dolor vel perferendis, qui atque sapiente! Vitae velit architecto qui adipisci!',
                'siswa_b' => true,
            ],
            [
                'siswa_id' => 2,
                'pengajuan' => 'Fasilitas Umum',
                'deskripsi' =>
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et tenetur architecto alias dicta hic dolor vel perferendis, qui atque sapiente! Vitae velit architecto qui adipisci!',
                'siswa_b' => true,
            ],
            [
                'siswa_id' => 3,
                'pengajuan' => 'Fasilitas Umum',
                'deskripsi' =>
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et tenetur architecto alias dicta hic dolor vel perferendis, qui atque sapiente! Vitae velit architecto qui adipisci!',
                'siswa_b' => true,
            ],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // factory(App\guru::class,5)->create();

        DB::table('guru')->insert([
            [
                'nama' => 'guru',
                'nip' => '123123123',
                'npwp' => '132413424',
                'tmp_lahir' => 'example tmp lahir',
                'tgl_lahir' => '2002,10,10',
                'jk' => 'Laki-laki',
                'agama' => 'Islam',
                'alamat' => 'isekai dunia baru',
                'foto' => 'default.png',
                'email' => 'guru@gmail.com',
                'password' =>
                    '$2y$10$gStH2y1DfslubmTASGuj5OcRvvvvc/YYBAcHY67GmhWp8euuygqe6',
            ],
            [
                'nama' => 'guru1',
                'nip' => '123123123',
                'npwp' => '132413424',
                'tmp_lahir' => 'example tmp lahir',
                'tgl_lahir' => '2002,10,10',
                'jk' => 'Laki-laki',
                'agama' => 'Islam',
                'alamat' => 'isekai dunia baru',
                'foto' => 'default.png',
                'email' => 'guru1@gmail.com',
                'password' =>
                    '$2y$10$gStH2y1DfslubmTASGuj5OcRvvvvc/YYBAcHY67GmhWp8euuygqe6',
            ],
            [
                'nama' => 'guru2',
                'nip' => '123123123',
                'npwp' => '132413424',
                'tmp_lahir' => 'example tmp lahir',
                'tgl_lahir' => '2002,10,10',
                'jk' => 'Laki-laki',
                'agama' => 'Islam',
                'alamat' => 'isekai dunia baru',
                'foto' => 'default.png',
                'email' => 'guru2@gmail.com',
                'password' =>
                    '$2y$10$gStH2y1DfslubmTASGuj5OcRvvvvc/YYBAcHY67GmhWp8euuygqe6',
            ],
            [
                'nama' => 'guru3',
                'nip' => '123123123',
                'npwp' => '132413424',
                'tmp_lahir' => 'example tmp lahir',
                'tgl_lahir' => '2002,10,10',
                'jk' => 'Laki-laki',
                'agama' => 'Islam',
                'alamat' => 'isekai dunia baru',
                'foto' => 'default.png',
                'email' => 'guru3@gmail.com',
                'password' =>
                    '$2y$10$gStH2y1DfslubmTASGuj5OcRvvvvc/YYBAcHY67GmhWp8euuygqe6',
            ],
            [
                'nama' => 'guru4',
                'nip' => '123123123',
                'npwp' => '132413424',
                'tmp_lahir' => 'example tmp lahir',
                'tgl_lahir' => '2002,10,10',
                'jk' => 'Laki-laki',
                'agama' => 'Islam',
                'alamat' => 'isekai dunia baru',
                'foto' => 'default.png',
                'email' => 'guru4@gmail.com',
                'password' =>
                    '$2y$10$gStH2y1DfslubmTASGuj5OcRvvvvc/YYBAcHY67GmhWp8euuygqe6',
            ],
        ]);
    }
}

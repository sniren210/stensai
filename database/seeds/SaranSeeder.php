<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('saran')->insert([
            [
                'siswa_id' => 1,
                'event_id' => 1,
                'deskripsi' =>
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et tenetur architecto alias dicta hic dolor vel perferendis, qui atque sapiente! Vitae velit architecto qui adipisci!',
                'siswa_b' => true,
            ],
            [
                'siswa_id' => 3,
                'event_id' => 2,
                'deskripsi' =>
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et tenetur architecto alias dicta hic dolor vel perferendis, qui atque sapiente! Vitae velit architecto qui adipisci!',
                'siswa_b' => true,
            ],
            [
                'siswa_id' => 5,
                'event_id' => 3,
                'deskripsi' =>
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et tenetur architecto alias dicta hic dolor vel perferendis, qui atque sapiente! Vitae velit architecto qui adipisci!',
                'siswa_b' => true,
            ],
            [
                'siswa_id' => 2,
                'event_id' => 1,
                'deskripsi' =>
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et tenetur architecto alias dicta hic dolor vel perferendis, qui atque sapiente! Vitae velit architecto qui adipisci!',
                'siswa_b' => true,
            ],
            [
                'siswa_id' => 3,
                'event_id' => 4,
                'deskripsi' =>
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et tenetur architecto alias dicta hic dolor vel perferendis, qui atque sapiente! Vitae velit architecto qui adipisci!',
                'siswa_b' => true,
            ],
            [
                'siswa_id' => 5,
                'event_id' => 4,
                'deskripsi' =>
                    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et tenetur architecto alias dicta hic dolor vel perferendis, qui atque sapiente! Vitae velit architecto qui adipisci!',
                'siswa_b' => true,
            ],
        ]);
    }
}

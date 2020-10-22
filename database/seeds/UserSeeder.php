<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(array(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$gStH2y1DfslubmTASGuj5OcRvvvvc/YYBAcHY67GmhWp8euuygqe6',
                //admin1234
                'is_admin' => 1,
                'foto' => 'admin.png'
            ]
        ));
    }
}

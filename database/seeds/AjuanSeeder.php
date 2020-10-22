<?php

use Illuminate\Database\Seeder;

class AjuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Ajuan::class,5)->create();
    }
}

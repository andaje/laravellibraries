<?php

use Illuminate\Database\Seeder;

class BarcodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Barcode',5)->create();
    }
}


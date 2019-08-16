<?php
/**
 * Created by PhpStorm.
 * User: Anda
 * Date: 8/7/2019
 * Time: 2:39 PM
 */

class RentsTableSeeder
{
    public function run()
    {
        factory('App\Rent',5)->create();
    }
}

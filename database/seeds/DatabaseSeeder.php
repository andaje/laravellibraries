<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AddressesTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(AuthorsTableSeeder::class);
         $this->call(BooksTableSeeder::class);
         $this->call(BarcodesTableSeeder::class);

    }
}

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
         $this->call(UsersTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(CountriesTableSeeder::class);
         $this->call(CitiesTableSeeder::class);
         $this->call(AuthorsTableSeeder::class);
         $this->call(AddressesTableSeeder::class);
         $this->call(BooksTableSeeder::class);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StoresTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}

<?php

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
        // create user for test
        factory(\App\Models\User::class)->create([
           'name' => 'User',
           'email' => 'user@gmail.com'
        ]);
    }
}

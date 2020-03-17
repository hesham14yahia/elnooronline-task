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
        // create main test user
        factory(\App\Models\User::class)->create([
            'name' => 'User',
            'email' => 'user@gmail.com'
        ]);

        // create users for test articles
        factory(\App\Models\User::class, 10)->create();

        // create articles and random likes and dislkes
        $this->call(ArticlesSeeder::class);
    }
}

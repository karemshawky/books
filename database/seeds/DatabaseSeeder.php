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
        $this->call([  
                RolesTableSeeder::class,
                UsersTableSeeder::class,
                SettingsTableSeeder::class,
                CategoriesTableSeeder::class,
                TagsTableSeeder::class,
                AuthorsTableSeeder::class,
                BooksTableSeeder::class
        ]);
    }
}

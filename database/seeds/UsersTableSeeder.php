<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = User::create([
            'name'     => 'Super Admin',
            'email'    => 'super@books.com',
            'password' => bcrypt('123456')
        ]);

        $super->assignRole('super');

        $admin = User::create([
            'name'     => 'Admin Test',
            'email'    => 'admin@books.com',
            'password' => bcrypt('123456')
        ]);

        $admin->assignRole('admin');

        $admin = User::create([
            'name'     => 'Author Test',
            'email'    => 'author@books.com',
            'password' => bcrypt('123456')
        ]);

        $admin->assignRole('author');
    }
}

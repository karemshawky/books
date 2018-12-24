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
            'name'     => 'Karem Shawky' ,
            'email'    => 'karemshawky90@gmail.com' ,
            'password' => bcrypt('123456')
        ]);

        $super->assignRole('super');

        $admin = User::create([
            'name'     => 'Karem Test' ,
            'email'    => 'test@test.com' ,
            'password' => bcrypt('123456')
        ]);

        $admin->assignRole('admin');

    }
}

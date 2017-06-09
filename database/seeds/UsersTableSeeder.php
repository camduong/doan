<?php

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
        DB::table('users')->insert([
            [
            'f_name' => 'Master',
            'l_name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('user123'),
            'address' => 'HCM',
            'phone' => '0901234567',
            'gender' => '0',
            'p_code' => '1234567890',
            'birthday' => '1994/08/12',
            'role' => 'user',
            ],
            [
            'f_name' => 'Master',
            'l_name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'address' => 'HCM',
            'phone' => '0907654321',
            'gender' => '1',
            'p_code' => '233464575',
            'birthday' => '1982/08/12',
            'role' => 'admin',
            ]
        ]);
    }
}

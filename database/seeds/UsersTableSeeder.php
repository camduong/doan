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
            'f_name' => 'Master',
            'l_name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('user123'),
            'address' => 'HCM',
            'phone' => '0901234567',
            'gender' => true,
            'p_code' => '1234567890',
            'birthday' => '1994/08/12'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class HotelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->insert([
            'name' => 'New World',
            'phone' => '84812345678',
            'address' => 'Lê Lợi',
            'location_id' => '1'
        ]);
    }
}

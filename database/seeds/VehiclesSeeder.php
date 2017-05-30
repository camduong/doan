<?php

use Illuminate\Database\Seeder;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            'name' => 'VietJet Air',
            'introduce' => 'Hãng hàng không VietJet Air',
        ]);
    }
}

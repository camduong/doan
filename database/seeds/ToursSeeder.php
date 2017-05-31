<?php

use Illuminate\Database\Seeder;

class ToursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tours')->insert([[
             'name' => 'Hồ Chí Minh-Thành phố về đêm',
             'slug' => 'ho-chi-minh-thanh-pho-ve-dem',
             'number' => '20',
             'hotel_id' => '1',
             'depart_location_id' => '1',
             'dest_location_id' => '2',
             'type' => '0',
             'vehicle_id' => '1',
             'depart_date' => '2017/06/02',
             'return_date' => '2017/06/04',
             'day' => '3',
             'price' => '2000000',
             'schedule' => '<h4>Ngày 1:</h4?'
         ]]);
    }
}

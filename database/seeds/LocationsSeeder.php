<?php

use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'name' => 'Đà Lạt',
            'slug' => 'da-lat',
            'region_id' => '3',
            'introduce' => 'Đà Lạt'
        ],
        [
            'name' => 'Hồ Chí Minh',
            'slug' => 'ho-chi-minh',
            'region_id' => '3',
            'introduce' => 'Hồ Chí Minh'
        ],
        [
            'name' => 'Nha Trang',
            'slug' => 'nha-trang',
            'region_id' => '2',
            'introduce' => 'Nha Trang'
        ],
        [
            'name' => 'Hà Nội',
            'slug' => 'ha-noi',
            'region_id' => '1',
            'introduce' => 'Hà Nội'
        ],
        [
            'name' => 'Hàn Quốc',
            'slug' => 'han-quoc',
            'region_id' => '4',
            'introduce' => 'Hàn Quốc'
        ],
        [
            'name' => 'Pháp',
            'slug' => 'phap',
            'region_id' => '5',
            'introduce' => 'Pháp'
        ],
        [
            'name' => 'Nước Úc',
            'slug' => 'nuoc-uc',
            'region_id' => '6',
            'introduce' => 'Nước Úc'
        ],
        [
            'name' => 'Cananda',
            'slug' => 'canada',
            'region_id' => '7',
            'introduce' => 'Canada'
        ]);
    }
}

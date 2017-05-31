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
        DB::table('locations')->insert([[
            'name' => 'Đà Lạt',
            'slug' => 'da-lat',
            'introduce' => 'Đà Lạt',
            'region_id' => '3',
        ],
        [
            'name' => 'Hồ Chí Minh',
            'slug' => 'ho-chi-minh',
            'introduce' => 'Hồ Chí Minh',
            'region_id' => '3',
        ],
        [
            'name' => 'Nha Trang',
            'slug' => 'nha-trang',
            'introduce' => 'Nha Trang',
            'region_id' => '2',
        ],
        [
            'name' => 'Hà Nội',
            'slug' => 'ha-noi',
            'introduce' => 'Hà Nội',
            'region_id' => '1',
        ],
        [
            'name' => 'Hàn Quốc',
            'slug' => 'han-quoc',
            'introduce' => 'Hàn Quốc',
            'region_id' => '4',
        ],
        [
            'name' => 'Pháp',
            'slug' => 'phap',
            'introduce' => 'Pháp',
            'region_id' => '5',
        ],
        [
            'name' => 'Nước Úc',
            'slug' => 'nuoc-uc',
            'introduce' => 'Nước Úc',
            'region_id' => '6',
        ],
        [
            'name' => 'Cananda',
            'slug' => 'canada',
            'introduce' => 'Canada',
            'region_id' => '7',
<<<<<<< HEAD
=======
            'introduce' => 'Canada'
>>>>>>> sửa cart
        ]]);
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
<<<<<<< HEAD
        $this->call(RegionsSeeder::class);
        $this->call(LocationsSeeder::class);
        $this->call(HotelsSeeder::class);
        $this->call(VehiclesSeeder::class);
        $this->call(ToursSeeder::class);
=======
        // $this->call(RegionsSeeder::class);
        // $this->call(LocationsSeeder::class);
        // $this->call(HotelsSeeder::class);
        // $this->call(VehiclesSeeder::class);
        // $this->call(ToursSeeder::class);
>>>>>>> sửa cart
    }
}

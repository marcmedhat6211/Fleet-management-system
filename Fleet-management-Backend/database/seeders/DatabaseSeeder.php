<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stations')->insert([
            'id' => 1,
            'name' => 'Cairo'
        ]);

        DB::table('stations')->insert([
            'id' => 2,
            'name' => 'Giza'
        ]);

        DB::table('stations')->insert([
            'id' => 3,
            'name' => 'AlFayyum'
        ]);

        DB::table('stations')->insert([
            'id' => 4,
            'name' => 'AlMinya'
        ]);

        DB::table('stations')->insert([
            'id' => 5,
            'name' => 'Asyut'
        ]);

        DB::table('admin_menu')->insert([
            'parent_id' => 0,
            'order' => 1,
            'title' => 'Buses',
            'icon' => 'fa-angle-right',
            'uri' => 'buses',
            'permission' => null,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('admin_menu')->insert([
            'parent_id' => 0,
            'order' => 2,
            'title' => 'Trips',
            'icon' => 'fa-angle-right',
            'uri' => 'trips',
            'permission' => null,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('admin_menu')->insert([
            'parent_id' => 0,
            'order' => 0,
            'title' => 'Stations',
            'icon' => 'fa-angle-right',
            'uri' => 'stations',
            'permission' => null,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('buses')->insert([
            'src_name' => 'Cairo',
            'dest_name' => 'Asyut',
            'seat_1' => true,
            'seat_2' => true,
            'seat_3' => true,
            'seat_4' => true,
            'seat_5' => true,
            'seat_6' => true,
            'seat_7' => true,
            'seat_8' => true,
            'seat_9' => true,
            'seat_10' => true,
            'seat_11' => true,
            'seat_12' => true,
            'seats_number' => 12,
            'availability' => true
        ]);
    }
}

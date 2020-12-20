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
    }
}

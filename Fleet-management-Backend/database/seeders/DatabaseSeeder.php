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
            'name' => 'Cairo'
        ]);

        DB::table('stations')->insert([
            'name' => 'Giza'
        ]);

        DB::table('stations')->insert([
            'name' => 'AlFayyum'
        ]);

        DB::table('stations')->insert([
            'name' => 'AlMinya'
        ]);

        DB::table('stations')->insert([
            'name' => 'Asyut'
        ]);
    }
}

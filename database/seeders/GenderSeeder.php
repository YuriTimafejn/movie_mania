<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genders')->insert(['gender' => strtoupper('adventure'), 'created_at' => Carbon::now()]);
        DB::table('genders')->insert(['gender' => strtoupper('sci-fi'), 'created_at' => Carbon::now()]);
        DB::table('genders')->insert(['gender' => strtoupper('western'), 'created_at' => Carbon::now()]);
        DB::table('genders')->insert(['gender' => strtoupper('war'), 'created_at' => Carbon::now()]);
    }
}

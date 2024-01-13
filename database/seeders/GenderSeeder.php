<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genders')->insert(['gender' => strtoupper('adventure')]);
        DB::table('genders')->insert(['gender' => strtoupper('sci-fi')]);
        DB::table('genders')->insert(['gender' => strtoupper('western')]);
        DB::table('genders')->insert(['gender' => strtoupper('war')]);
    }
}

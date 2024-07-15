<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnumerationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('enumerations')->insert(['name' => 'High', 'type' => 'IssuePriority']);
        DB::table('enumerations')->insert(['name' => 'Medium', 'type' => 'IssuePriority']);
        DB::table('enumerations')->insert(['name' => 'Low', 'type' => 'IssuePriority']);
    }
}

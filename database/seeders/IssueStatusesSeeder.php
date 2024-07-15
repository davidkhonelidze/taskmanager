<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssueStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('issue_statuses')->insert(['name' => 'Pending']);
        DB::table('issue_statuses')->insert(['name' => 'In progress']);
        DB::table('issue_statuses')->insert(['name' => 'Delayed']);
        DB::table('issue_statuses')->insert(['name' => 'Done']);
    }
}

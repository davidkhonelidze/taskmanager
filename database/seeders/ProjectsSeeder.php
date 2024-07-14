<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('projects')->insert([
                'name' => $faker->unique()->words(3, true),
                'description' => $faker->paragraph,
                'identifier' => $faker->unique()->slug(2),
                'status' => $faker->randomElement([1, 5, 9]), // 1: active, 5: archived, 9: closed
                'created_on' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_on' => $faker->dateTimeBetween('-6 months', 'now'),
                'is_public' => $faker->boolean,
                'inherit_members' => $faker->boolean,
                'default_version_id' => $faker->numberBetween(1, 10),
                'default_assigned_to_id' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}

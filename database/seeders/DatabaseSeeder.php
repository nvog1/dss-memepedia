<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(MemeTableSeeder::class);
        $this->call(EvaluationTableSeeder::class);
        $this->call(LikeTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(TierListTableSeeder::class);
    }
}

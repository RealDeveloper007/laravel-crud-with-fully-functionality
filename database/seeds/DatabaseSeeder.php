<?php

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
        $this->call(SchoolTableSeeder::class);
        $this->call(ClassTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(UserTableSeeder::class);

    }
}

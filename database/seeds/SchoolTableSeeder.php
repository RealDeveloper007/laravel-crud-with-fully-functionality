<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use App\Schools;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schools::create([
            'school_name'       => 'Govt School',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        Schools::create([
            'school_name'       => 'Private School',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
    }
}

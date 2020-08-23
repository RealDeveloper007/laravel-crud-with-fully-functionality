<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use App\Classes;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classes::create([
            'school_id'         => 1,
            'class_name'        => '10th',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        Classes::create([
            'school_id'         => 1,
            'class_name'        => '11th',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        Classes::create([
            'school_id'         => 2,
            'class_name'        => '12th',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        Classes::create([
            'school_id'         => 2,
            'class_name'        => '12th',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
    }
}

<?php


use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use App\Subject;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'class_id'          => 1,
            'subject_name'      => 'Mathematics',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        Subject::create([
            'class_id'          => 2,
            'subject_name'      => 'Physics',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        Subject::create([
            'class_id'          => 3,
            'subject_name'      => 'Computer',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        Subject::create([
            'class_id'          => 2,
            'subject_name'      => 'Chemistry',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

       
    }
}

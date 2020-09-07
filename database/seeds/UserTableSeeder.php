<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'test',
            'email'             => 'test@gmail.com',
            'short_image'       => '1598120480default_user_female.jpg',
            'full_image'        => '15981621032.jpg,15981621032.jpg',
            'password'          => bcrypt('123456'),
            'school_id'         => 1,
            'class_id'          => 2,
            'subject_id'        => 4,
            'gender'            => 1,
            'interests'         => json_encode(['1','2']),
            'remember_token'    => NULL,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
    ]);
    }
}

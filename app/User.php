<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','school_code','class_id','subject_id','short_image','full_image','gender','interests','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAllInterestsAttribute(){
        
        $interests = '';
        
        $userinterests = $this->interests;
 
        //print_r(json_decode($this->tags)); die;
        $IntersetArray = ['1' => 'Play Football', '2' => 'Listen Music','3'=>'Reading Books','4'=>'Surfing Internet'];
        foreach(json_decode($userinterests) as $key => $interest)
        {
           
           $interests .= $IntersetArray[$interest].', ';
            
        }
        return rtrim($interests,', ');
 
     }

     public function school()
     {
         return $this->hasOne('App\Schools','id','school_id');
     }

     public function class()
     {
         return $this->hasOne('App\Classes','id','class_id');
     }

     public function subject()
     {
         return $this->hasOne('App\Subject','id','subject_id');
     }
}

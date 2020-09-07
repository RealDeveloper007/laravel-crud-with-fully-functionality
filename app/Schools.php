<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    //

    protected $table = "school";


    public function User()
    {
        return $this->belongsTo('App\User','school_id','id');
    }

    public function subjects()
    {
        // return $this->hasOneThrough('App\Subject', 'App\Classes');

        return $this->hasManyThrough(
            'App\Subject',
            'App\Classes',
            'school_id', // Foreign key on class table...
            'class_id', // Foreign key on subject table...
            'id', // Local key on school table...
            'id' // Local key on class table...
        );
    }

    public function classes()
    {
        return $this->hasMany('App\Classes','school_id','id');

    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $table = "subject";

    public function User()
    {
        return $this->belongsTo('App\User','subject_id','id');
    }

}

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

}

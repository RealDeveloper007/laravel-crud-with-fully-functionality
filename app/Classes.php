<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
    protected $table = "class";

    public function User()
    {
        return $this->belongsTo('App\User','class_id','id');
    }

}

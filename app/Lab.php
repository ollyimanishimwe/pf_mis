<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    //
    public function patient()
    {
        return $this->hasMany('App\Patient');
    }
}

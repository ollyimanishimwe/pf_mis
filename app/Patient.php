<?php

namespace App;
use App\Nurse;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    public function lab()
    {
        return $this->hasMany('App\Lab');
    }
    public function nurse()
    {
        return $this->hasMany('App\Nurse');
    }
}

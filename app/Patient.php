<?php

namespace App;
use App\Nurse;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    public function nurse()
    {
        return $this->hasMany('App\Nurse', 'n_id');
    }
}

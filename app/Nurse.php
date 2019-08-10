<?php

namespace App;
use App\Patient;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    //
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}

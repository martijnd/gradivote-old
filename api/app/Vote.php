<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function gradient() {
        return $this->belongsTo('App\Gradient');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}

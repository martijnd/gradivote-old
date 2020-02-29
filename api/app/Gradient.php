<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gradient extends Model
{
    public function votes() {
        return $this->hasMany('App\Vote');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}

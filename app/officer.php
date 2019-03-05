<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class officer extends Model
{
    public function causes() {
        return $this->hasMany('App\officer');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accusation extends Model
{
    public function causes() {
        return $this->hasMany('App\accusation');
    }
}

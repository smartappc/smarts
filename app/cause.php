<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cause extends Model
{
    public function officer () {
        return $this->belongsTo('App\cause');
    }
    public function accusation () {
        return $this->belongsTo('App\cause');
    }
}

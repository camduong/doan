<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    public function tour()
    {
        return $this->hasMany('App\Tour');
    }

    public function hotel()
    {
        return $this->hasMany('App\Hotel');
    }
}

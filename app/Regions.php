<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    protected $table = 'regions';

    public function location()
    {
        return $this->hasMany('App\Location');
    }
}

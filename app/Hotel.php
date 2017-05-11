<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';

    public function tour()
    {
        return $this->hasMany('App\Tour');
    }

    public function locations()
    {
        return $this->belongsTo('App\Location', 'location_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public function hotels()
    {
        return $this->belongsTo('App\Hotel', 'hotel_id');
    }

    public function locations()
    {
        return $this->belongsTo('App\Location', 'location_id');
    }

    public function vehicles()
    {
        return $this->belongsTo('App\Vehicle', 'vehicle_id');
    }

    public function image()
    {
        return $this->hasMany('App\Images');
    }
}

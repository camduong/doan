<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    public function tours()
    {
        return $this->belongsTo('App\Tour', 'tour_id');
    }
}

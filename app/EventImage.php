<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    protected $fillable = ['event_id', 'event_image_path', 'created_by', 'updated_by'];

    public function event() {
        return $this->belongsTo('App\Event');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'details', 'address', 'type', 'institute_funding', 'sponsor_funding', 'expenditure', 'start_date', 'end_date',
        'internal_participants_count', 'external_participants_count', 'is_completed', 'additional_columns', 'created_by', 'created_at',
        'updated_at'
    ];


    public function staff()
    {
        return $this->belongsToMany('App\Staff', 'event_staff');
    }
}

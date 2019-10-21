<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffCourse extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'details', 'location', 'name', 'start_date', 'end_date', 'created_by'
    ];


    public function staff()
    {
        return $this->belongsTo('staff','created_by');
    }
}

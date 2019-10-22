<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffLecture extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function staff()
    {
        return $this->belongsTo('staff','created_by');
    }
}

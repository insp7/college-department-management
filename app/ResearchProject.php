<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchProject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'staff_id', 'principal_investigator', 'grant_details', 'title', 'amount', 'year', 'created_by', 'created_at', 'updated_at',
    ];


    public function staff()
    {
        return $this->belongsTo('staff','created_by');
    }

}

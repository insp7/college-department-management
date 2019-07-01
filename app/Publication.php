<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'staff_id', 'year', 'citation', 'additional_columns', 'created_by', 'created_at', 'updated_at'
    ];


    public function staff()
    {
        return $this->belongsTo('staff','created_by');
    }

}
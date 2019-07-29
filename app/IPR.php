<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IPR extends Model
{
    use SoftDeletes;
    protected $table = 'ipr';

    protected $fillable = [
        'staff_id', 'year', 'patents_published_count', 'patents_granted_count', 'additional_columns', 'created_by', 'created_at', 'updated_at'
    ];

}
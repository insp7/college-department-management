<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentScholarship extends Model
{
    use SoftDeletes;
    protected $table = 'student_scholarships';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $casts = [
        'year'  => 'date:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo('student', 'created_by');
    }
}

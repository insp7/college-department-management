<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentScholarship extends Model
{
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

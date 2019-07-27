<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentFurtherStudies extends Model
{
    use SoftDeletes;
    protected $table = 'student_further_studies';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('student', 'created_by');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentInternship extends Model
{
    protected $table = 'student_internships';
    protected $primaryKey = 'id';
    use SoftDeletes;
    protected $fillable = ['start_date','end_date', 'company_name', 'created_by', 'updated_by','is_paid'];

    public function user()
    {
        return $this->belongsTo('student', 'created_by');
    }
}

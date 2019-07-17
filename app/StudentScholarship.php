<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentScholarship extends Model
{
    protected $table = 'student_scholarships';
    protected $primaryKey = 'id';
    protected $guarded = [];
    // protected $fillable = ['start_date','end_date', 'sponsors_name', 'created_by', 'updated_by','isPrivate','year','amount','year'];

    public function user()
    {
        return $this->belongsTo('student', 'created_by');
    }
}

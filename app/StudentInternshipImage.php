<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInternshipImage extends Model
{
    protected $fillable = ['student_internship_id', 'image_path', 'created_by', 'updated_by'];
    protected $table = 'student_internship_images';
}

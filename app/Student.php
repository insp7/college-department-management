<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 7/2/2019
 * Time: 12:19 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['roll_no', 'user_id', 'class_id', 'is_fully_registered', 'additional_columns', 'created_by', 'updated_by'];
    
    
    public function internship()
    {
        return $this->hasMany('App\StudentInternship','created_by','user_id');
    }

    public function scholarship()
    {
        return $this->hasMany('App\StudentScholarship','created_by','user_id');
    }

    public function furtherstudies()
        {
            return $this->hasMany('App\StudentFurtherStudies');
        }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
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
}
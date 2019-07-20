<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 6/25/2019
 * Time: 12:47 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classs extends Model
{
    use SoftDeletes;

    protected $table = 'classes';

    protected $fillable = [
        'year', 'additional_columns', 'created_by', 'created_at', 'updated_at',
    ];

    public function students(){
        return $this->hasMany('App\Student','class_id', 'id');
    }

}
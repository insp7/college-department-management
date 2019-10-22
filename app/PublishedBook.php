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

class PublishedBook extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'staff_id', 'details','book_name','publisher_name','date','additional_columns', 'created_by', 'created_at', 'updated_at',
    ];


    public function staff()
    {
        return $this->belongsTo('staff','created_by');
    }

}
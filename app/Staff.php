<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 6/24/2019
 * Time: 11:32 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model {
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    // Change if required
    public function researchProjects() {
        return $this->hasMany('App\ResearchProject');
    }

    // Change if required
    public function ipr() {
        return $this->hasMany('App\IPR', 'staff_id', 'id');
    }

    public function events() {
        return $this->belongsToMany('App\Event', 'event_staff');

    }
  
    public function user() {
        return $this->belongsTo('App\User');
    }
  
    public function internship()
    {
        return $this->hasMany('App\StudentInternship');
    }
}
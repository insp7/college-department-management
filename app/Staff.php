<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 6/24/2019
 * Time: 11:32 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    // Change if required
    public function researchProjects() {
        return $this->hasMany('App\ResearchProject');
    }

    // Change if required
    public function ipr() {
        return $this->hasMany('App\IPR');
    }

    public function events() {
        return $this->belongsToMany('App\Event', 'event_staff');

    }
}
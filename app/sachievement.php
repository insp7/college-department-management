<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sachievement extends Model
{
    use SoftDeletes;
    protected $table = 'staffachievements';
    protected $fillable = [
        'staff_id', 'achievement_name', 'achievement_description', 'year', 'created_by','updated_by', 'created_at', 'updated_at',
    ];

    public function staff()
    {
        return $this->belongsTo('staff','created_by');
    }
    public function media()
    {
        return $this->hasOne('App\sachievementimage', 'sachievement_id', 'id');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 

class sachievementimage extends Model
{
    protected $fillable = ['sachievement_id', 'image_path', 'created_by', 'updated_by'];
    protected $table = 'sachievementimages';
}
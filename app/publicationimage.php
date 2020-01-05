<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publicationimage extends Model
{
    protected $fillable = ['publication_id', 'image_path', 'created_by', 'updated_by'];
    protected $table = 'publicationimages';
}

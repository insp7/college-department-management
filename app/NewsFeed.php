<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFeed extends Model
{
    //

    protected $table = 'news_feed';
    protected $fillable = ['created_at', 'title', 'created_by', 'updated_by', 'description'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsFeed extends Model {

    use SoftDeletes;

    protected $table = 'news_feed';
    protected $fillable = ['created_at', 'title', 'created_by', 'updated_by', 'description'];


    public function newsFeedImages() {
        return $this->hasMany('App\NewsFeedImage');
    }
}

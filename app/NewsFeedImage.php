<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFeedImage extends Model {

    protected $fillable = ['news_feed_id', 'image_path', 'created_by', 'updated_by'];

    public function newsFeed() {
        return $this->belongsTo('App\NewsFeed');
    }
}

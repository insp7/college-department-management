<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 6/28/2019
 * Time: 5:27 PM
 */

namespace App\Services;


use App\NewsFeed;
use App\NewsFeedImage;
use Illuminate\Support\Facades\DB;

class NewsFeedService
{
    public function create($validatedData,$image_relative_paths, $user_id){
        DB::beginTransaction();

        $news_feed=NewsFeed::create([
            'title' => $validatedData['title'],
            'description' =>$validatedData['description'],
            'created_by' => $user_id
        ]);

        error_log(json_encode($image_relative_paths));

        foreach ($image_relative_paths as $image_relative_path){
            error_log($image_relative_path);
            NewsFeedImage::create([
                'news_feed_id' => $news_feed->id,
                'image_path' => $image_relative_path,
                'created_by' => $user_id
            ]);
        }

        DB::commit();
    }
}
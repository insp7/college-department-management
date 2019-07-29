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
use mysql_xdevapi\Exception;

class NewsFeedService {

    /**
     * @param $validatedData
     * @param $image_relative_paths
     * @param $user_id
     */
    public function create($validatedData,$image_relative_paths, $user_id){
        DB::beginTransaction();

            $news_feed=NewsFeed::create([
                'title' => $validatedData['title'],
                'description' =>$validatedData['description'],
                'created_by' => $user_id
            ]);

            error_log(json_encode($image_relative_paths));

            foreach ($image_relative_paths as $image_relative_path) {
                error_log($image_relative_path);
                NewsFeedImage::create([
                    'news_feed_id' => $news_feed->id,
                    'image_path' => $image_relative_path,
                    'created_by' => $user_id
                ]);
            }

        DB::commit();
    }

    /**
     * @return mixed
     */
    public function getDatatable() {
        return NewsFeed::orderBy('created_at', 'desc')->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getNewsFeedDetailsById($id) {
        return NewsFeed::findOrFail($id);
    }

    /**
     * @param $validatedData
     * @param $id
     * @param $user_id
     * @return bool
     */
    public function update($validatedData, $id, $user_id) {
        try {
            $news_feed = NewsFeed::findOrFail($id);
            $news_feed->title = $validatedData['title'];
            $news_feed->description = $validatedData['description'];
            $news_feed->updated_by = $user_id;
            $news_feed->save();

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id) {
        try{
            NewsFeed::destroy($id);
            return true;
        } catch(Exception $e) {
            return false;
        }
    }

    /**
     * @param $news_feed_id
     * @return mixed
     */
    public function getImagesPath($news_feed_id) {
        return NewsFeedImage::where('news_feed_id', $news_feed_id)->get();
    }
}
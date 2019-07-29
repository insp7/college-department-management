<?php

namespace App\Http\Controllers;

use App\Constants\FileConstants;
use App\NewsFeed;
use App\Services\NewsFeedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class NewsFeedController extends Controller {

    protected $newsFeedService;

    public function __construct(NewsFeedService $newsFeedService)
    {
        $this->newsFeedService = $newsFeedService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news-feed.manage-news-feed');
    }

//    public function index()
//    {
//        $news_feeds = NewsFeed::orderBy('created_at', 'desc')->get();
//        return view('news-feed.view-news-feed')->with('news_feeds', $news_feeds);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news-feed.add-news-feed');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'title' => 'required',
            'description' => 'required',
            'news_feed_images' => 'sometimes|required',
            'news_feed_images.*' =>'sometimes|mimes:jpeg,png,bmp,tiff'
        ]);


        $image_relative_paths =[];
        $user_id = Auth::id();

        if($request->hasfile('news_feed_images')) {
            $i=0;

            foreach($request->file('news_feed_images') as $news_feed_image) {

                // The file name of the attachment
                $fileName = $user_id.'_'.$i++.'_'.time().'.'.$news_feed_image->getClientOriginalExtension();

                // exact path on the current machine
                $destinationPath = public_path(FileConstants::NEWS_FEED_ATTACHMENTS_PATH);

                // Moving the image
                $news_feed_image->move($destinationPath, $fileName);

                // The relative path to the image
                $image_relative_paths[]= FileConstants::NEWS_FEED_ATTACHMENTS_PATH.$fileName;

            }
        }

        try {
            $this->newsFeedService->create($validatedData, $image_relative_paths, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'News added successfully',
                'message' => 'The given news has been added successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the news',
                'message' => "There was some issue in adding the news"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {

        $id = $request->news_feed;
        $news_feed = $this->newsFeedService->getNewsFeedDetailsById($id);
        return view('news-feed.edit-news-feed')->with('news_feed', $news_feed);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $updateSuccessful = $this->newsFeedService->update($validatedData, $id, Auth::id());

        if($updateSuccessful) {
            return redirect('/news-feed/')->with([
                'type' => 'success',
                'title' => 'News updated successfully',
                'message' => 'The given News has been updated successfully'
            ]);
        }

        return redirect()->back()->with([
            'type' => 'danger',
            'title' => 'Failed to update the News',
            'message' => "There was some issue in updating the News"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->newsFeedService->delete($id);
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'News Deleted successfully',
                'message' => 'The given news has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete News',
                'message' => 'Error in deleting news'
            ]);
        }
    }

    public function getAllNewsFeeds() {
        $news_feed = $this->newsFeedService->getDatatable();

        return DataTables::of($news_feed)
            ->addColumn('title', function (NewsFeed $newsFeed) {
                return $newsFeed->title;
            })
            ->addColumn('description', function (NewsFeed $newsFeed) {
                return $newsFeed->description;
            })
            ->addColumn('view_news_feed_images', function(NewsFeed $newsFeed) {
                return '<button id="' . $newsFeed->id . '" class="view-news-feed-images fa fa-street-view btn-sm btn-info"></button>';
            })
            ->addColumn('edit', function(NewsFeed $newsFeed) {
                return '<button id="' . $newsFeed->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning"></button>';
            })
            ->addColumn('delete', function(NewsFeed $newsFeed) {
                return '<button id="' . $newsFeed->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('created_at', function(NewsFeed $newsFeed) {
                return date('F d, Y', strtotime($newsFeed->created_at));
            })
            ->rawColumns(['view_news_feed_images', 'edit', 'delete'])
            ->make(true);
    }

    public function showAllNewsFeeds() {
        $news_feeds = $this->newsFeedService->getDatatable();
        return view('news-feed.view-news-feed')->with('news_feeds', $news_feeds);
    }

    public function getImagesForNewsFeed(Request $request) {
        $news_feed_id = $request->id;
        $news_feed_images_path = $this->newsFeedService->getImagesPath($news_feed_id);
        $hostName = $request->getHttpHost();

        return view('news-feed.news-feed-images')
            ->with('news_feed_images_path', $news_feed_images_path)
            ->with('hostName', $hostName);
    }
}

<?php

namespace App\Http\Controllers;

use App\Constants\FileConstants;
use App\NewsFeed;
use App\NewsFeedImage;
use App\Services\NewsFeedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsFeedController extends Controller
{

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
        $news_feeds = NewsFeed::orderBy('created_at', 'desc')->get();
        return view('news-feed.view-news-feed')->with('news_feeds', $news_feeds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        error_log('i am inside new feed store........................');
        //
        $validatedData=$request->validate([
            'title' => 'required',
            'description' => 'required',
            'news_feed_images' => 'sometimes|required',
            'news_feed_images.*' =>'sometimes|mimes:jpeg,png,bmp,tiff'
        ]);


        $image_relative_paths =[];
        $user_id = Auth::id();
        error_log('i am dhananjay');
        error_log(json_encode($request->file()));
        if($request->hasfile('news_feed_images'))
        {


            $i=0;
            error_log(json_encode($request->file('news_feed_images')));
            foreach($request->file('news_feed_images') as $news_feed_image)
            {

                error_log('i am here and theres');

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
            $this->newsFeedService->create($validatedData, $image_relative_paths,Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Staff added successfully',
                'message' => 'The given staff has been added successfully'
            ]);
        }catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the staff',
                'message' => "There was some issue in adding the staff"
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

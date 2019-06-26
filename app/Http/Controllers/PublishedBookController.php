<?php

namespace App\Http\Controllers;

use App\PublishedBook;
use App\Services\PublishedBookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PublishedBookController extends Controller
{

    protected $publishedBookService;

    public function __construct(PublishedBookService $publishedBookService)
    {
        $this->publishedBookService = $publishedBookService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('published-books.manage-published-books');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('published-books.add-published-book');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData=$request->validate([
            'details' => 'required',
        ]);

        try {
            $this->publishedBookService->store($validatedData, Auth::id());
            return redirect('/published-books')->with([
                'type' => 'success',
                'title' => 'Published Book added successfully',
                'message' => 'The given Published Book has been added successfully'
            ]);
        }catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Published Book',
                'message' => "There was some issue in adding the Published Book"
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
        //fetch the published according to id and auth::id
        //$gst = $this->gstService->get($id);
        //        return view('gsts.edit-gst')->with([
        //            'gst' => $gst
        //        ]);
        return view('published-books.edit-published-book');
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
        $validatedData=$request->validate([
            'state_name' => 'required|max:255|regex:/[a-zA-Z]+$/',
            'code' => 'required|numeric|unique:states,code,'.$id
        ]);

        try {
            $this->stateService->edit($validatedData, $id, Auth::id);
            return redirect('/published-books')->with([
                'type' => 'success',
                'title' => 'Published Book added successfully',
                'message' => 'The given Published Book has been added successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Published Book added successfully',
                'message' => 'The given Published Book has been added successfully'
            ]);
        }
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
        try {
            $this->publishedBookService->delete($id,Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Published Book Deleted successfully',
                'message' => 'The given Published Book has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Published Book',
                'message' => 'Error in deleting Published Book'
            ]);
        }
    }

    /**
     * Returns the data for datatables.
     * @return mixed Resulting data in datatables.net format
     * @throws \Exception*
     */
    public function getPublishedBooks()
    {
        /*CURRENT USER PUBLISHED BOOKS*/
        $publishedBooks = $this->publishedBookService->getDatatable(Auth::id());

        return DataTables::of($publishedBooks)
            ->addColumn('edit', function(PublishedBook $publishedBook) {
//                Redirect to page
                return '<button id="'.$publishedBook->id.'" class="edit fa fa-pencil-alt btn-sm btn-warning" data-toggle="modal" data-target="#editModal"></button>';
            })
            ->addColumn('delete', function(PublishedBook $publishedBook) {
                return '<button id="'.$publishedBook->id.'" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('date', function(PublishedBook $publishedBook) {
                return date('F d, Y', strtotime($publishedBook->created_at));
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }

}

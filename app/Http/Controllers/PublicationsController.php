<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PublicationsService;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Publication;
use App\Constants\FileConstants;

class PublicationsController extends Controller
{

    protected $publicationsService;

    public function __construct(PublicationsService $publicationsService)
    {
        $this->publicationsService = $publicationsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('publications.manage-publications');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publications.add-publication');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'year' => ['required', 'date'],
            'citation' => ['required'],
            'additional_columns'=> ['nullable'],
            'file' => ['required']
        ]);
            $user_id = Auth::id();
            $attachments = $request->file();
            foreach ($attachments as $name => $attachment) {
            // The file name of the attachment
            $fileName = $user_id . '_' . $name . '_' . time() . '.' . $attachment->getClientOriginalExtension();
            // exact path on the current machine
            $destinationPath = public_path(FileConstants::PUBLICATION_ATTACHMENTS_PATH );
            // Moving the image
            $attachment->move($destinationPath, $fileName);
            // The relative path to the image
            $image_relative_path = FileConstants::PUBLICATION_ATTACHMENTS_PATH  . $fileName;
            }
        try {
            $this->publicationsService->store($validatedData,$image_relative_path, Auth::id());
            return redirect('/publications')->with([
                'type' => 'success',
                'title' => 'IPR added successfully',
                'message' => 'The given Publication has been added successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Publication',
                'message' => "There was some issue in adding the Publication"
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $id = $request->publication;
        $publication = Publication::find($id);
        return view('publications.edit-publication')->with('publication', $publication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'year' => ['required', 'date'],
            'citation' => ['required'],
        ]);

        $updateSuccessful = $this->publicationsService->update($validatedData, $id, Auth::id());

        if($updateSuccessful) {
            return redirect('/publications')->with([
                'type' => 'success',
                'title' => 'Publication updated successfully',
                'message' => 'The given Publication has been updated successfully'
            ]);
        }

        return redirect()->back()->with([
            'type' => 'danger',
            'title' => 'Failed to update the Publication',
            'message' => "There was some issue in updating the Publication"
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
            $this->publicationsService->delete($id, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Publication Deleted successfully',
                'message' => 'The given Publication has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete IPR',
                'message' => 'Error in deleting IPR'
            ]);
        }
    }

    public function getPublications() {
        /*CURRENT USER's Publications*/
        $publications = $this->publicationsService->getDatatable(Auth::id());

        return DataTables::of($publications)
            ->addColumn('edit', function(Publication $publication) {
//                Redirect to page
                return '<button id="' . $publication->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning"></button>';
            })
            ->addColumn('delete', function(Publication $publication) {
                return '<button id="' . $publication->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('view', function (Publication $publication) {
                return '<button id="' . $publication->media->image_path . '" class="view fa fa-eye btn-sm btn-success" data-toggle="modal" data-target="#viewModal"></button>';
            })
            ->addColumn('date', function(Publication $publication) {
                return date('F d, Y', strtotime($publication->created_at));
            })
            ->rawColumns(['edit', 'delete','view'])
            ->make(true);dd($id);
    }
}

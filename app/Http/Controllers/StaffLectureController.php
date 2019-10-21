<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\StaffLecture;
use App\Constants\FileConstants;
use Illuminate\Support\Facades\Auth;
use App\Services\StaffLectureService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

class StaffLectureController extends Controller
{
    protected $stafflectureservice;

    public function __construct(StaffLectureService $stafflectureservice)
    {
        $this->stafflectureservice = $stafflectureservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff-lectures.manage-staff-lectures');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff-lectures.add-staff-lectures');
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
            'date' => 'required|date',
            'subject' => 'required',
            'class' => 'required',
            'no_of_students' => 'required',
            'expert_name' => 'required',
            'expert_profile' => 'required',
            'organization' => 'required',
            'report_path' => 'required|file|mimes:pdf'
        ]);

        $user_id = Auth::id();
        $attachments = $request->file();
        $user_id = Auth::id();
        foreach ($attachments as $name => $attachment) {
            // The file name of the attachment
            $fileName = $user_id . '_' . $name . '_' . time() . '.' . $attachment->getClientOriginalExtension();
            // exact path on the current machine
            $destinationPath = public_path(FileConstants::STAFF_LECTURE_REPORT_ATTACHMENTS_PATH);
            // Moving the image
            $attachment->move($destinationPath, $fileName);
            // The relative path to the image
            $report_relative_path = FileConstants::STAFF_LECTURE_REPORT_ATTACHMENTS_PATH . $fileName;
        }


        try {
            $this->stafflectureservice->create($validatedData, $report_relative_path, Auth::id());

            /*LOG ACTIVITY*/
            activity()
                ->causedBy(Auth::user())
                ->withProperties([
                    'date' => Carbon::now()->toDateTimeString(),
                    'title' => 'Staff Lecture Added',
                ])
                ->log("Staff Lecture $request->subject added");

            return redirect('staff-lecture')->with([
                'type' => 'success',
                'title' => 'Staff Lecture added successfully',
                'message' => 'The Staff Lecture has been added successfully'
            ]);
        } catch (Exception $exception) {

            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Staff Lecture',
                'message' => "There was some issue in adding the Staff Lecture"
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\StaffLecture  $StaffLecture
     * @return \Illuminate\Http\Response
     */
    public function show(StaffLecture $StaffLecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaffLecture  $StaffLecture
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffLecture $StaffLecture)
    {
        
        return view('staff-lectures.edit-staff-lectures',['staff'=>$StaffLecture]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaffLecture  $StaffLecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $validatedData = $request->validate([
            'date' => 'required|date',
            'subject' => 'required',
            'class' => 'required',
            'no_of_students' => 'required',
            'expert_name' => 'required',
            'expert_profile' => 'required',
            'organization' => 'required',
            
        ]); 
        $validatedfile=$request->validate([
            'report_path' => 'required|file|mimes:pdf'
        ]);
        $validatedData['updated_by']=Auth::id();
        $attachments=$request->file();
        $user_id = Auth::id();
        foreach ($attachments as $name => $attachment) {
            // The file name of the attachment
            $fileName = $user_id . '_' . $name.''.$attachment->getClientOriginalExtension();
            // exact path on the current machine
            $destinationPath = public_path(FileConstants::STAFF_LECTURE_REPORT_ATTACHMENTS_PATH);
            // Moving the image
            $attachment->move($destinationPath, $fileName);
            // The relative path to the image
            $report_path = FileConstants::STAFF_LECTURE_REPORT_ATTACHMENTS_PATH . $fileName;
        }
         try {
            $this->StaffLectureservice->update($validatedData, $image_relative_path, Auth::id(),$id);
            return redirect('staff-lecture')->with([
                'type' => 'success',
                'title' => 'Staff Lecture updated successfully',
                'message' => 'The Staff Lecture has been updated successfully'
            ]);
        } catch (Exception $exception) {

            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to update the Staff Lecture',
                'message' => "There was some issue in adding the Staff Lecture"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaffLecture  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->stafflectureservice->delete($id, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Staff Lecture Deleted successfully',
                'message' => 'The given Staff Lecture has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Staff Lecture',
                'message' => 'Error in deleting Staff Lecture'
            ]);
        }
    }
    /**
     * Returns the data for datatables.
     * @return mixed Resulting data in datatables.net format
     * @throws \Exception*
     */
    public function getStaffLectures()
    {
        /*CURRENT Staff Lectures*/
        $StaffLecture = $this->stafflectureservice->getDatatable(Auth::id());

        return DataTables::of($StaffLecture)
            ->addColumn('edit', function (StaffLecture $StaffLecture) {
            return '<button id="' . $StaffLecture->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning"></button>'
            ;})
            ->addColumn('delete', function ( StaffLecture $StaffLecture) {
                return '<button id="' . $StaffLecture->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('view', function (StaffLecture $StaffLecture) {
                $StaffLecture=StaffLecture::where('id', $StaffLecture->id)->first();
                return '<button id="'.$StaffLecture->report_path. '" class="view fa fa-eye btn-sm btn-success" data-toggle="modal" data-target="#viewModal" ></button>';
            })
            ->rawColumns(['edit', 'delete','view'])
            ->make(true);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\StaffCoursesService;
use App\StaffCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class StaffCourseController extends Controller
{

    protected $staffCoursesService;
    public function __construct(StaffCoursesService $staffCoursesService)
    {
        $this->staffCoursesService = $staffCoursesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff-courses.manage-staff-courses');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff-courses.add-staff-course');
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
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'details' => 'required|max:255',
            'location' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        try {
            $this->staffCoursesService->store($validatedData, Auth::id());
            return redirect('/staff-courses')->with([
                'type' => 'success',
                'title' => 'Course for staff successfully added',
                'message' => 'The given Course has been added successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Course',
                'message' => "There was some issue in adding the course"
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
    public function edit(Request $request)
    {
        $id = $request->staff_course;
        $staff_course = StaffCourse::find($id);
        return view('staff-courses.edit-staff-course')->with('staff_course', $staff_course);
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
            'name' => 'required|max:100',
            'details' => 'required|max:255',
            'location' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $updateSuccessful = $this->staffCoursesService->update($validatedData, $id, Auth::id());

        if($updateSuccessful) {
            return redirect('/staff-courses')->with([
                'type' => 'success',
                'title' => 'staff Course updated successfully',
                'message' => 'The given course has been updated successfully'
            ]);
        }

        return redirect()->back()->with([
            'type' => 'danger',
            'title' => 'Failed to update the staff course',
            'message' => "There was some issue in updating the course"
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
            $this->staffCoursesService->delete($id, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Staff Course Deleted successfully',
                'message' => 'The given Course has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Student Course',
                'message' => 'Error in deleting Course'
            ]);
        }
    }

    public function getStaffCourses() {
        $staff_course = $this->staffCoursesService->getDatatable(Auth::id());

        return DataTables::of($staff_course)
            ->addColumn('duration', function (StaffCourse $staffCourse) {
                return 'Start Date: ' . $staffCourse->start_date . ' End Date: ' . $staffCourse->end_date;
            })
            ->addColumn('edit', function(StaffCourse $staffCourse) {
                return '<button id="' . $staffCourse->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning"></button>';
            })
            ->addColumn('delete', function(StaffCourse $staffCourse) {
                return '<button id="' . $staffCourse->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('date', function(StaffCourse $staffCourse) {
                return date('F d, Y', strtotime($staffCourse->created_at));
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
}

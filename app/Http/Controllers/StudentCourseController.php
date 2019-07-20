<?php

namespace App\Http\Controllers;


use App\StudentCourse;
use App\Services\StudentCoursesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class StudentCourseController extends Controller
{

    protected $studentCoursesService;

    public function __construct(StudentCoursesService $studentCoursesService) {
        $this->studentCoursesService = $studentCoursesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student-courses.manage-student-courses');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student-courses.add-student-course');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//        dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'details' => 'required|max:255',
            'location' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

//        dd($validatedData);
        try {
            $this->studentCoursesService->store($validatedData, Auth::id());
            return redirect('/student-courses')->with([
                'type' => 'success',
                'title' => 'Course for student successfully added',
                'message' => 'The given Course has been added successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Course',
                'message' => "There was some issue in adding the "
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $id = $request->student_course;
        $student_course = StudentCourse::find($id);
        return view('student-courses.edit-student-course')->with('student_course', $student_course);
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

        $updateSuccessful = $this->studentCoursesService->update($validatedData, $id, Auth::id());

        if($updateSuccessful) {
            return redirect('/student-courses')->with([
                'type' => 'success',
                'title' => 'Student Course updated successfully',
                'message' => 'The given course has been updated successfully'
            ]);
        }

        return redirect()->back()->with([
            'type' => 'danger',
            'title' => 'Failed to update the Student course',
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
            $this->studentCoursesService->delete($id, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Student Course Deleted successfully',
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

    public function getStudentCourses() {
        $student_course = $this->studentCoursesService->getDatatable(Auth::id());

        return DataTables::of($student_course)
            ->addColumn('duration', function (StudentCourse$studentCourse) {
                return 'Start Date: ' . $studentCourse->start_date . ' End Date: ' . $studentCourse->end_date;
            })
            ->addColumn('edit', function(StudentCourse $student_course) {
                return '<button id="' . $student_course->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning"></button>';
            })
            ->addColumn('delete', function(StudentCourse $student_course) {
                return '<button id="' . $student_course->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('date', function(StudentCourse $student_course) {
                return date('F d, Y', strtotime($student_course->created_at));
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
}

<?php

namespace App\Http\Controllers;

use App\StudentInternship;
use App\Constants\FileConstants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\StudentInternshipService;
use Yajra\DataTables\Facades\DataTables;



class StudentInternshipController extends Controller
{
    protected $studentinternshipservice;

    public function __construct(StudentInternshipService $studentinternshipservice)
    {
        $this->studentinternshipservice = $studentinternshipservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student-Internships.managestudent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student-Internships.addstudentinternship');
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
            'company_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_paid' => 'boolean',
            'student_internship_image' => 'sometimes|file|mimes:jpeg,png,bmp,tiff'
        ]);





        $user_id = Auth::id();
        $attachments = $request->file();
        $user_id = Auth::id();
        foreach ($attachments as $name => $attachment) {
            // The file name of the attachment
            $fileName = $user_id . '_' . $name . '_' . time() . '.' . $attachment->getClientOriginalExtension();
            // exact path on the current machine
            $destinationPath = public_path(FileConstants::STUDENT_INTERNSHIP_ATTACHMENTS_PATH);
            // Moving the image
            $attachment->move($destinationPath, $fileName);
            // The relative path to the image
            $image_relative_path = FileConstants::STUDENT_INTERNSHIP_ATTACHMENTS_PATH . $fileName;
        }


        try {
            $this->studentinternshipservice->create($validatedData, $image_relative_path, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Internship added successfully',
                'message' => 'The Internship staff has been added successfully'
            ]);
        } catch (Exception $exception) {

            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Internship',
                'message' => "There was some issue in adding the Internship"
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\StudentInternship  $studentInternship
     * @return \Illuminate\Http\Response
     */
    public function show(StudentInternship $studentInternship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentInternship  $studentInternship
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentInternship $studentInternship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentInternship  $studentInternship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentInternship $studentInternship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentInternship  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->studentinternshipservice->delete($id, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Student Internship Deleted successfully',
                'message' => 'The given Student Internship has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Student Internship',
                'message' => 'Error in deleting Student Internship'
            ]);
        }
    }
    /**
     * Returns the data for datatables.
     * @return mixed Resulting data in datatables.net format
     * @throws \Exception*
     */
    public function getStudentInternships()
    {
        /*CURRENT Student Internship*/
        $studentinternship = $this->studentinternshipservice->getDatatable(Auth::id());

        return DataTables::of($studentinternship)
            ->addColumn('edit', function (StudentInternship $studentInternship) {
                return '<button id="'.$studentInternship->id .'" class="edit fa fa-pencil-alt btn-sm btn-warning" data-toggle="modal" data-target="#editModal"></button>';
            })
            ->addColumn('delete', function ( StudentInternship $studentInternship) {
                return '<button id="' . $studentInternship->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
}

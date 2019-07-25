<?php

namespace App\Http\Controllers;

use App\StudentInternship;
use App\Constants\FileConstants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\StudentInternshipService;
use Yajra\DataTables\Facades\DataTables;
use App\StudentInternshipImage;

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
        return view('student-Internships.managestudentinternship');
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
            'is_paid' => 'boolean|required',
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
            return redirect('student-internship')->with([
                'type' => 'success',
                'title' => 'Internship added successfully',
                'message' => 'The Internship has been added successfully'
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
        
        return view('student-Internships.editstudentinternship',['student'=>$studentInternship]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentInternship  $studentInternship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $validatedData = $request->validate([
            'company_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_paid' => 'boolean',
        ]); 
        $validatedfile=$request->validate([
            'student_internship_image' => 'sometimes|file|mimes:jpeg,png,bmp,tiff'
        ]);
        $validatedData['updated_by']=Auth::id();
        $attachments=$request->file();
        $user_id = Auth::id();
        foreach ($attachments as $name => $attachment) {
            // The file name of the attachment
            $fileName = $user_id . '_' . $name.''.$attachment->getClientOriginalExtension();
            // exact path on the current machine
            $destinationPath = public_path(FileConstants::STUDENT_INTERNSHIP_ATTACHMENTS_PATH);
            // Moving the image
            $attachment->move($destinationPath, $fileName);
            // The relative path to the image
            $image_relative_path = FileConstants::STUDENT_INTERNSHIP_ATTACHMENTS_PATH . $fileName;
        }
         try {
            $this->studentinternshipservice->update($validatedData, $image_relative_path, Auth::id(),$id);
            return redirect('student-internship')->with([
                'type' => 'success',
                'title' => 'Internship updated successfully',
                'message' => 'The Internship has been updated successfully'
            ]);
        } catch (Exception $exception) {

            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to update the Internship',
                'message' => "There was some issue in adding the Internship"
            ]);
        }


        

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
        $studentInternship = $this->studentinternshipservice->getDatatable(Auth::id());

        return DataTables::of($studentInternship)
            ->addColumn('status', function (StudentInternship $studentInternship) {
                if($studentInternship->is_paid===1){
                return 'Paid';
            } else{
                return 'Unpaid';
            }
            })
            ->addColumn('edit', function (StudentInternship $studentInternship) {
            return '<button id="' . $studentInternship->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning"></button>'
            ;})
            ->addColumn('delete', function ( StudentInternship $studentInternship) {
                return '<button id="' . $studentInternship->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('view', function (StudentInternship $studentInternship) {
                $studentinternshipImage=StudentInternshipImage::where('student_internship_id', $studentInternship->id)->first();
                return '<button id="'.$studentinternshipImage->image_path. '" class="view fa fa-eye btn-sm btn-success" data-toggle="modal" data-target="#viewModal" ></button>';
            })
            ->rawColumns(['status','edit', 'delete','view'])
            ->make(true);
    }
}

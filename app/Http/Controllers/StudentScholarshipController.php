<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student-scholarship.manage-scholarship');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student-scholarship.add-scholarship');
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
            'sponsors_name' => 'required',
            'details' => 'required',
            'amount' => 'required',
            'isPrivate' => 'boolean',
            'year' => 'required',
            //'student_scholarship_image' => 'sometimes|file|mimes:jpeg,png,bmp,tiff'   Table Not Made
        ]);

        // $user_id = Auth::id();
        // $attachments = $request->file();
        // $user_id = Auth::id();
        // foreach ($attachments as $name => $attachment) {
        //     // The file name of the attachment
        //     $fileName = $user_id . '_' . $name . '_' . time() . '.' . $attachment->getClientOriginalExtension();
        //     // exact path on the current machine
        //     $destinationPath = public_path(FileConstants::STUDENT_SCHOLARSHIP_ATTACHMENTS_PATH);
        //     // Moving the image
        //     $attachment->move($destinationPath, $fileName);
        //     // The relative path to the image
        //     $image_relative_path = FileConstants::STUDENT_SCHOLARSHIP_ATTACHMENTS_PATH . $fileName;

        try {
            $this->StudentScholarship::$studentscholarship->create($validatedData, Auth::id());
            return redirect('student-scholarship')->with([
                'type' => 'success',
                'title' => 'Scholarship added successfully',
                'message' => 'The Scholarship has been added successfully'
            ]);
        } catch (Exception $exception) {

            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed to add the Scholarship',
                'message' => "There was some issue in adding the Scholarship"
            ]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentScholarship  $studentScholarship
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentInternship $studentScholarship)
    {
        
        return view('student-scholarships.edit-scholarship',['student'=>StudentScholarship::$studentscholarship]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentScholarship  $studentScholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $validatedData = $request->validate([
            'sponsors_name' => 'required',
            'details' => 'required',
            'amount' => 'required',
            'isPrivate' => 'boolean',
            'year' => 'required',
        ]); 
        // $validatedfile=$request->validate([
        //     'student_scholarship_image' => 'sometimes|file|mimes:jpeg,png,bmp,tiff'
        // ]);

        // $validatedData['updated_by']=Auth::id();
        // $attachments=$request->file();
        // $user_id = Auth::id();
        // foreach ($attachments as $name => $attachment) {
        //     // The file name of the attachment
        //     $fileName = $user_id . '_' . $name.''.$attachment->getClientOriginalExtension();
        //     // exact path on the current machine
        //     $destinationPath = public_path(FileConstants::STUDENT_SCHOLARSHIP_ATTACHMENTS_PATH);
        //     // Moving the image
        //     $attachment->move($destinationPath, $fileName);
        //     // The relative path to the image
        //     $image_relative_path = FileConstants::STUDENT_SCHOLARSHIP_ATTACHMENTS_PATH . $fileName;
        // }
        //  try {
        //     $this->StudentScholarship::$studentscholarship->update($validatedData, $image_relative_path, Auth::id(),$id);
        //     return redirect('student-internship')->with([
        //         'type' => 'success',
        //         'title' => 'Scholarship updated successfully',
        //         'message' => 'The Scholarship has been updated successfully'
        //     ]);
        // } catch (Exception $exception) {

        //     return redirect()->back()->with([
        //         'type' => 'danger',
        //         'title' => 'Failed to add the Scholarship',
        //         'message' => "There was some issue in updating the Scholarship"
        //     ]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentScholarship  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->StudentScholarship::$studentscholarship->delete($id, Auth::id());
            return redirect()->back()->with([
                'type' => 'success',
                'title' => 'Student Scholarship Deleted successfully',
                'message' => 'The given Student Scholarship has been deleted successfully'
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with([
                'type' => 'danger',
                'title' => 'Failed To Delete Student Scholarship',
                'message' => 'Error in deleting Student Scholarship'
            ]);
        }
    }

    /**
     * Returns the data for datatables.
     * @return mixed Resulting data in datatables.net format
     * @throws \Exception*
     */
    public function getStudentScholarships()
    {
        /*CURRENT Student Scholarship*/
        $studentInternship = $this->StudentScholarship::$studentscholarship->getDatatable(Auth::id());

        return DataTables::of($student_scholarships)
            ->addColumn('edit', function (StudentScholarship $studentScholarship) {
            return '<button id="' . $studentScholarship->id . '" class="edit fa fa-pencil-alt btn-sm btn-warning"></button>'
            ;})
            ->addColumn('delete', function (StudentScholarship $studentScholarship) {
                return '<button id="' . $studentScholarship->id . '" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
}

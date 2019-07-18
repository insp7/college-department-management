<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\StudentScholarship;
use Illuminate\Support\Facades\Auth;
use App\Services\StudentScholarshipService;
use Yajra\DataTables\Facades\DataTables;



class StudentScholarshipController extends Controller
{
    protected $studentscholarshipservice;

    public function __construct(StudentScholarshipService $studentscholarshipservice)
    {
        $this->studentscholarshipservice = $studentscholarshipservice;
    }
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
        ]);

        try {
            $this->studentscholarshipservice->create($validatedData, Auth::id());
            return redirect('scholarships/get-scholarships')->with([
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
     * Display the specified resource.
     *
     * @param  \App\StudentScholarship
     * @return \Illuminate\Http\Response
     */
    public function show(StudentScholarship $studentScholarship)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentScholarship  $studentScholarship
     * @return \Illuminate\Http\Response
     */
    public function edit(Studentscholarship $studentScholarship)
    {
        
        return view('student-scholarship.edit-scholarship',['student'=>$studentScholarship]);
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
            StudentScholarship::$studentscholarship->delete($id, Auth::id());
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
        $studentScholarship1 =$this->studentscholarshipservice->getDatatable(Auth::id());

        return DataTables::of($studentScholarship1)
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
